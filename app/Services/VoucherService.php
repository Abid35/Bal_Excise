<?php

namespace App\Services;

use App\Models\transfer;
use App\Models\eto_location;
use App\Services\TransferOwnerService;
use Carbon\CarbonImmutable;
use Carbon\Carbon;
use App\Models\fees;
use App\Models\dependent;
use App\Models\multiconstant;
use App\Models\register;
use App\Models\arrival;
use App\Models\alteration;
use App\Models\cities;
use Illuminate\Support\Facades\Log;

class VoucherService
{
    protected $transferOwnerService;

    public function __construct(TransferOwnerService $transferOwnerService)
    {
        $this->transferOwnerService = $transferOwnerService;
    }

    public function calculateLastTaxDate(string $taxYearTo): string
    {
        try {
            $date = Carbon::createFromFormat('d/m/Y', $taxYearTo);
        } catch (\Exception $e) {
            try {
                $date = Carbon::createFromFormat('Y-m-d', $taxYearTo);
            } catch (\Exception $e) {
                Log::error('Invalid tax date format', ['taxYearTo' => $taxYearTo, 'error' => $e->getMessage()]);
                return '';
            }
        }

        return $date ? $date->addDay()->format('d/m/Y') : '';
    }

    public function calculateTaxes(object $vehicleData, $category, array $taxIds, array $requestData): array
    {
        Log::info('Calculating taxes', ['taxIds' => $taxIds, 'vehicleData' => (array) $vehicleData]);
        $taxes = [];
        $electricPriceLimit = env('ElectricVehiclePriceLimit', 5000000);
        $vehicleAge = Carbon::parse($vehicleData->registration_date ?? 'now')->diffInYears(Carbon::now());
        $vehicleData->{'234_year'} = $vehicleAge;

        $fees = fees::whereIn('id', $taxIds)->get()->keyBy('id');
        $dependents = dependent::whereIn('fees_id', $taxIds)->get()->groupBy('fees_id');

        foreach ($taxIds as $taxId) {
            Log::info('Processing tax ID', ['taxId' => $taxId]);
            if (!isset($fees[$taxId])) {
                Log::warning('Fee not found', ['taxId' => $taxId]);
                continue;
            }

            $fee = $fees[$taxId];
            $dependencies = $dependents[$taxId] ?? collect([]);
            $total = 0;

            // Capital Value Tax (ID 24)
            if ($taxId == 24 && ($requestData['ct'] ?? '') === 'capital') {
                if (($vehicleData->engine_capacity ?? 0) > 1300 && ($vehicleData->owner_type_id ?? 0) != 2 && ($vehicleData->vehicle_price ?? 0)) {
                    $total = floatval($vehicleData->vehicle_price) * 0.01;
                    $taxes[] = [
                        'Name' => $fee->title,
                        'id' => $taxId,
                        'type' => $fee->type,
                        'Amount' => $total,
                    ];
                }
                continue;
            }

            // Professional Tax (ID 25)
            if ($taxId == 25 && ($vehicleData->category_of_vehicle_id ?? 0) == 1) {
                $total = $this->calculateProfessionalTax($dependencies, $requestData);
                $taxes[] = [
                    'Name' => $fee->title,
                    'id' => $taxId,
                    'type' => $fee->type,
                    'Amount' => $total,
                ];
                continue;
            }

            // File Return Fee (ID 10) and others
            $total = $this->calculateGeneralTax($taxId, $dependencies, $vehicleData, $requestData, $electricPriceLimit);
            if ($total > 0) {
                $taxes[] = [
                    'Name' => $fee->title,
                    'id' => $taxId,
                    'type' => $fee->type,
                    'Amount' => $total,
                    'fix' => $taxId == 23 && $this->isFixedTax($dependencies, $vehicleData, $requestData),
                ];
            }
        }

        Log::info('Calculated taxes', ['taxes' => $taxes]);
        return $taxes;
    }

    protected function calculateProfessionalTax($dependencies, array $requestData): float
    {
        if (!isset($requestData['fromdate'], $requestData['todate'])) {
            Log::warning('Missing date parameters for professional tax');
            return 0;
        }

        try {
            $fromDate = Carbon::createFromFormat('d/m/Y', $requestData['fromdate']);
            $toDate = Carbon::createFromFormat('d/m/Y', $requestData['todate']);
            $months = $toDate->diffInMonths($fromDate);
        } catch (\Exception $e) {
            Log::error('Invalid date format for professional tax', ['error' => $e->getMessage()]);
            return 0;
        }

        $baseMultiplier = 1;
        $multiplierIncrement = 1;
        $maxTiers = 60;
        $tierIndex = $months >= 3 ? intdiv($months, 3) : 0;
        $tierIndex = min($tierIndex, $maxTiers - 1);
        $multiplier = $baseMultiplier + ($tierIndex * $multiplierIncrement);

        return $dependencies->sum(fn($dep) => floatval($dep->fixed_amount) * $multiplier);
    }

    protected function calculateGeneralTax(int $taxId, $dependencies, object $vehicleData, array $requestData, float $electricPriceLimit): float
    {
        $total = 0;
        $columns = (new register)->getTableColumns();

        foreach ($dependencies as $dep) {
            $amount = 0;

            if ($dep->multiconstant_id) {
                $amount = $this->calculateMultiConstantTax($dep, $vehicleData, $columns, $requestData);
            } elseif ($taxId == 10) {
                // Handle File Return Fee (ID 10)
                $amount = $this->calculateFileReturnFee($dep, $vehicleData);
            } elseif ($dep->type === 'PERWEIGHT/10' && $taxId == 23) {
                $limit = explode('/', $dep->type)[1];
                if ($vehicleData->{'234_year'} <= $limit) {
                    $amount = floatval($vehicleData->unladen_weight ?? 0) * floatval($dep->fixed_amount);
                } else {
                    $amount = floatval($dep->fixed_amount);
                }
            } elseif ($dep->type === 'LIMIT/10' && $taxId == 23) {
                $limit = explode('/', $dep->type)[1];
                if ($vehicleData->{'234_year'} != $limit) {
                    $amount = $this->calculateMultiConstantTax($dep, $vehicleData, $columns, $requestData);
                }
            } elseif ($dep->type === 'LT' && $taxId == 23) {
                $amount = $this->calculateMultiConstantTax($dep, $vehicleData, $columns, $requestData);
            } elseif ($dep->type === 'LIMIT/5' && $taxId == 21) {
                $limit = explode('/', $dep->type)[1];
                if ($vehicleData->{'231b(2)_year'} != $limit) {
                    $multiplier = ($vehicleData->{'231b(2)_year'} + 1) * (floatval($dep->fixed_amount) / 100);
                    $base = ($vehicleData->class_of_vehicle_id == 25 || ($vehicleData->vehicle_price ?? 0) > $electricPriceLimit)
                        ? ($dep->type2 == 'F' ? 20000 : 60000)
                        : 0;
                    $amount = $base * $multiplier;
                }
            } else {
                $amount = floatval($dep->fixed_amount);
            }

            $opt = $requestData['opt'] ?? '';
            $taxDur = $requestData['tax_dur23'] ?? '';
            $val = $this->percc($taxId, $dep, $vehicleData, $amount, $opt, $dep->title ?? 'unknown', $taxDur);
            $total += $val['total'];
        }

        return $total;
    }

    protected function calculateFileReturnFee($dep, $vehicleData): float
    {
        $amount = 0;
        if (!isset($dep->dep_table, $dep->dep_table_id, $dep->amount)) {
            Log::warning('Invalid dependent data for File Return Fee', ['dep' => (array) $dep]);
            return 0;
        }

        $depTables = explode(',', $dep->dep_table); // e.g., ['class_of_vehicle', 'category_of_vehicle']
        $depTableIds = explode(',', $dep->dep_table_id); // e.g., ['4-3', '1-2']
        $amounts = explode(',', $dep->amount); // e.g., ['150-150', '500-300']

        $classOfVehicleIds = explode('-', $depTableIds[0] ?? ''); // e.g., ['4', '3']
        $categoryOfVehicleIds = explode('-', $depTableIds[1] ?? ''); // e.g., ['1', '2']
        $classAmounts = explode('-', $amounts[0] ?? ''); // e.g., ['150', '150']
        $categoryAmounts = explode('-', $amounts[1] ?? ''); // e.g., ['500', '300']

        $classOfVehicle = $vehicleData->class_of_vehicle_id ?? 0;
        $categoryOfVehicle = $vehicleData->category_of_vehicle_id ?? 0;

        Log::info('Calculating File Return Fee', [
            'class_of_vehicle_id' => $classOfVehicle,
            'category_of_vehicle_id' => $categoryOfVehicle,
            'class_amounts' => $classAmounts,
            'category_amounts' => $categoryAmounts
        ]);

        // Check class_of_vehicle
        if (in_array($classOfVehicle, $classOfVehicleIds)) {
            $index = array_search($classOfVehicle, $classOfVehicleIds);
            if (isset($classAmounts[$index])) {
                $amount = floatval($classAmounts[$index]);
            }
        }

        // Override with category_of_vehicle if applicable
        if (in_array($categoryOfVehicle, $categoryOfVehicleIds)) {
            $index = array_search($categoryOfVehicle, $categoryOfVehicleIds);
            if (isset($categoryAmounts[$index])) {
                $amount = floatval($categoryAmounts[$index]);
            }
        }

        if ($amount == 0) {
            Log::warning('No matching conditions for File Return Fee', [
                'class_of_vehicle_id' => $classOfVehicle,
                'category_of_vehicle_id' => $categoryOfVehicle
            ]);
        }

        return $amount;
    }

    protected function calculateMultiConstantTax($dep, $vehicleData, array $columns, array $requestData): float
    {
        $total = 0;
        $multiconstant = multiconstant::find($dep->multiconstant_id);
        if (!$multiconstant) {
            Log::warning('Multiconstant not found', ['multiconstant_id' => $dep->multiconstant_id]);
            return $total;
        }

        $titles = explode(',', $multiconstant->title);
        $values = explode(',', $multiconstant->value);
        $amounts = explode(',', $multiconstant->amount ?: ($dep->fixed_amount ?? ''));

        foreach ($titles as $index => $title) {
            foreach ($columns as $col) {
                if (str_contains($col, $title) && isset($vehicleData->$col)) {
                    $ids = explode(';', $values[$index] ?? '');
                    $amts = explode(';', $amounts[$index] ?? '');

                    foreach ($ids as $k => $id) {
                        if (isset($amts[$k]) && $this->matchesCondition($id, $vehicleData->$col)) {
                            $total += floatval($amts[$k] ?: $dep->fixed_amount);
                        }
                    }
                }
            }
        }

        return $total;
    }

    protected function matchesCondition(string $condition, $value): bool
    {
        if (str_contains($condition, '<=')) {
            return $value <= floatval(str_ireplace('<=', '', $condition));
        }
        if (str_contains($condition, '>=')) {
            return $value >= floatval(str_ireplace('>=', '', $condition));
        }
        if (str_contains($condition, '<')) {
            return $value < floatval(str_ireplace('<', '', $condition));
        }
        if (str_contains($condition, '>')) {
            return $value > floatval(str_ireplace('>', '', $condition));
        }
        if (str_contains($condition, '=')) {
            if (str_contains($condition, '-')) {
                [$min, $max] = explode('-', str_ireplace('=', '', $condition));
                return $value >= floatval($min) && $value <= floatval($max);
            }
            return $value == floatval(str_ireplace('=', '', $condition));
        }
        return false;
    }

    protected function isFixedTax($dependencies, object $vehicleData, array $requestData): bool
    {
        foreach ($dependencies as $dep) {
            if ($dep->type === 'PERWEIGHT/10') {
                $limit = explode('/', $dep->type)[1];
                return $vehicleData->{'234_year'} > $limit;
            }
        }
        return false;
    }

    protected function percc(int $taxId, $dep, $vehicleData, float $total, string $opt, string $title, string $taxDur): array
    {
        $token = [];
        $token_ch = false;

        if ($taxId == 23) {
            if ($dep->type === 'PERWEIGHT/10' && ($vehicleData->unladen_weight ?? 0)) {
                $limit = explode('/', $dep->type)[1];
                if ($vehicleData->{'234_year'} <= $limit) {
                    $total = floatval($vehicleData->unladen_weight) * floatval($dep->fixed_amount);
                    $token[] = 'perweight_adjusted';
                    $token_ch = true;
                }
            } elseif ($dep->type === 'LIMIT/10' && $dep->multiconstant_id) {
                $total = $this->calculateMultiConstantTax($dep, $vehicleData, (new register)->getTableColumns(), []);
                $token[] = 'limit_adjusted';
                $token_ch = true;
            } elseif ($dep->type === 'LT' && $taxDur === 'lifetime') {
                if ($dep->multiconstant_id == 72 && ($vehicleData->seating_capacity ?? 0)) {
                    $total = $this->calculateMultiConstantTax($dep, $vehicleData, (new register)->getTableColumns(), []);
                    $token[] = 'lifetime_seating_adjusted';
                    $token_ch = true;
                } elseif ($dep->multiconstant_id == 79 && ($vehicleData->engine_capacity ?? 0)) {
                    $total = $this->calculateMultiConstantTax($dep, $vehicleData, (new register)->getTableColumns(), []);
                    $token[] = 'lifetime_engine_adjusted';
                    $token_ch = true;
                }
            } elseif ($opt === 'seat_cap' && ($vehicleData->seating_capacity ?? 0)) {
                $total *= (1 + ($vehicleData->seating_capacity / 100));
                $token[] = 'seat_cap_adjusted';
                $token_ch = true;
            } elseif ($opt === 'cc_annual' && ($vehicleData->engine_capacity ?? 0)) {
                $total += ($vehicleData->engine_capacity * 0.05);
                $token[] = 'cc_annual_adjusted';
                $token_ch = true;
            }
        } elseif ($taxId == 17) {
            if ($vehicleData->class_of_vehicle_id == 25 && ($vehicleData->vehicle_price ?? 0)) {
                $total = ($vehicleData->vehicle_price > env('ElectricVehiclePriceLimit', 5000000))
                    ? ($dep->type2 == 'F' ? 20000 : 60000)
                    : floatval($dep->fixed_amount);
                $token[] = 'electric_vehicle_adjusted';
                $token_ch = true;
            }
        }

        Log::info('percc result', [
            'taxId' => $taxId,
            'total' => $total,
            'opt' => $opt,
            'taxDur' => $taxDur,
            'token' => $token,
            'token_ch' => $token_ch
        ]);

        return ['total' => $total, 'token' => $token, 'token_ch' => $token_ch];
    }

    public function get_revised_transfer($data, $tableUsed)
    {
        if (isset($data->City_id) && $data->City_id != "") {
            $city = cities::where('city_code', $data->City_id)
                ->where('eto_location_id', $data->eto_location_id)
                ->first();
            $data->Province_id = $city ? $city->province_id : null;
        }

        if (isset($data->name_) && $data->name_ != "") {
            $data->owner_type_id = 1;
        }

        if (isset($data->house_no) && $data->house_no == "") {
            $data->house_no = $data->address ?? '';
        }

        $data = $this->transferOwnerService->processTransferOwnerData($data);

        $alt = alteration::where('registration_no', $data->registration_no)
            ->where('eto_location_id', $data->eto_location_id)
            ->get();

        if ($alt->isNotEmpty()) {
            foreach ($alt as $a) {
                if ($a->new_alteration != null) {
                    if ($a->alteration_code == 1) {
                        $data->seating_capacity = $a->new_alteration;
                    } elseif ($a->alteration_code == 2) {
                        $data->engine_capacity = $a->new_alteration;
                    } elseif ($a->alteration_code == 3) {
                        $data->wheelbox = $a->new_alteration;
                    }
                }
            }
        }

        return [$data, null];
    }

    public function getRevisedTransfer($vehicle)
    {
        return $vehicle;
    }
}
