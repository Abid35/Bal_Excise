<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\conversion;
use App\Models\voucher_managment;
use App\Models\colors;
use App\Models\transfer_owner;
use App\Models\eto_location;
use App\Models\fuel_type;
use App\Models\manufacturer;
use App\Models\cities;
use App\Models\owner_type;
use App\Models\category_of_vehicle;
use App\Models\type_of_body;
use App\Models\vouchers_ids;
use App\Models\register;
use App\Models\cancellation;
use App\Models\reg_maker;
use App\Models\bill_transactions;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Jobs\FetchVehicleInfo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class NadraController extends Controller
{

    public function __construct()
    {
        $this->middleware('authbasic');
    }

    public function index1(Request $request)
    {
        $email = $request->header('Email');
        $password = $request->header('Pwd');

        if (empty($email) || empty($password)) {
            return response()->json([
                'message' => "Unauthorized",
                'status'  => 401,
            ]);
        }

        if ($email !== "exice.job.pk@etanb.com" || $password !== "0!3-p23t#nB") {
            return response()->json([
                'message' => "Unauthorized: Invalid email or password",
                'status'  => 401,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date_format:m-d-Y',
            'end_date'   => 'required|date_format:m-d-Y',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $startDate = Carbon::createFromFormat('m-d-Y', $request->input('start_date'))->format('Y-m-d');
            $endDate   = Carbon::createFromFormat('m-d-Y', $request->input('end_date'))->format('Y-m-d');
            $page      = $request->get('page', 1);
            $perPage   = $request->get('per_page', 20);

            // Step 1: Get distinct registration numbers and locations
            $vehicleInfos = register::select('registration_no', 'eto_location_id')
                ->where('active_status', 'Active')
                ->where(function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('registration_date', [$startDate, $endDate])
                        ->orWhereBetween('updated_at', [$startDate, $endDate]);
                })
                ->distinct()
                ->paginate($perPage, ['*'], 'page', $page);

            if ($vehicleInfos->isEmpty()) {
                return response()->json(['message' => 'No vehicles found', 'status' => 404]);
            }

            // Step 2: Fetch all required vehicle records at once
            $registrations = register::whereIn('registration_no', $vehicleInfos->pluck('registration_no'))
                ->whereIn('eto_location_id', $vehicleInfos->pluck('eto_location_id'))
                ->get()
                ->keyBy(fn($item) => $item->registration_no . '-' . $item->eto_location_id);

            $responseData = [];

            foreach ($vehicleInfos as $info) {
                $key = $info->registration_no . '-' . $info->eto_location_id;
                $vehicle = $registrations[$key] ?? null;
                if (!$vehicle) continue;

                $color = Cache::remember("color_{$vehicle->color_of_vehicle_id}", 3600, function () use ($vehicle) {
                    return colors::where('id', $vehicle->color_of_vehicle_id)->value('colors') ?? '';
                });

                $currentTransfer = Cache::remember("transfer_{$vehicle->registration_no}_{$vehicle->eto_location_id}", 3600, function () use ($vehicle) {
                    return transfer_owner::leftJoin('owner_type', 'transfer.owner_type_id', '=', 'owner_type.id')
                        ->leftJoin('cities', 'transfer.p_city', '=', 'cities.city_code')
                        ->where('transfer.registration_no', $vehicle->registration_no)
                        ->where('transfer.eto_location_id', $vehicle->eto_location_id)
                        ->orderBy('transfer.transfer_code', 'desc')
                        ->first(['transfer.*', 'owner_type.owner_type', 'cities.cities']);
                });

                $owner_name   = $currentTransfer->name ?? $vehicle->name_;
                $owner_f_name = $currentTransfer->f_name ?? $vehicle->father_or_husband_name;
                $owner_address= $currentTransfer->c_address ?? $vehicle->address;
                $owner_ntn_no = $currentTransfer->ntn_no ?? $vehicle->ntn_no;
                $owner_cnic   = $currentTransfer->new_cnic_no ?? $currentTransfer->old_cnic_no ?? $vehicle->new_cnic_no ?? $vehicle->old_cnic_no;

                $makers_name = Cache::remember("maker_{$vehicle->eto_location_id}_{$vehicle->makers_name}", 3600, function () use ($vehicle) {
                    return manufacturer::where('eto_location_id', $vehicle->eto_location_id)
                            ->where('code', $vehicle->makers_name)
                            ->value('manufacturer') ?? '';
                });

                $category_name = Cache::remember("category_{$vehicle->category_of_vehicle_id}", 3600, function () use ($vehicle) {
                    return category_of_vehicle::where('categ_code', $vehicle->category_of_vehicle_id)->value('category_of_vehicle') ?? '';
                });

                $type_of_body = Cache::remember("bodytype_{$vehicle->eto_location_id}_{$vehicle->type_of_body}", 3600, function () use ($vehicle) {
                    return type_of_body::where('tob_code', $vehicle->type_of_body)
                            ->where('eto_location_id', $vehicle->eto_location_id)
                            ->value('type_of_body') ?? '';
                });

                $voucherData = DB::table('voucher_managment')
                    ->leftJoin('voucher_ids', 'voucher_managment.id', '=', 'voucher_ids.voucher_id')
                    ->where('voucher_managment.reg_no', $vehicle->registration_no)
                    ->where('voucher_managment.status_voucher', 'Paid')
                    ->where('voucher_managment.district_id', $vehicle->eto_location_id)
                    ->whereIn('voucher_ids.title', ['Token Tax', 'Fedral Tax 234'])
                    ->select(
                        'voucher_managment.tax_app_year_to',
                        DB::raw("SUM(CASE WHEN voucher_ids.title = 'Token Tax' THEN voucher_ids.amount ELSE 0 END) as token_tax_total"),
                        DB::raw("SUM(CASE WHEN voucher_ids.title = 'Fedral Tax 234' THEN voucher_ids.amount ELSE 0 END) as fedral_tax_total")
                    )
                    ->groupBy('voucher_managment.tax_app_year_to')
                    ->first();

                // Handle comma-separated owners
                $names       = array_map('trim', explode(',', $owner_name));
                $fatherNames = array_map('trim', explode(',', $owner_f_name));
                $cnics       = array_map('trim', explode(',', $owner_cnic));
                $ntns        = array_map('trim', explode(',', $owner_ntn_no));

                $data = [
                    'REGID'             => $vehicle->id,
                    'REGISTRATIONNUMBER'=> $vehicle->registration_no,
                    'BOOKNUMBER'        => $vehicle->book_serialNo,
                    'REGISTRATIONDATE'  => $vehicle->registration_date,
                    'LASTTAXPAID'       => $voucherData->tax_app_year_to ?? null,
                    'ADDRESS'           => $owner_address,
                    'CHASSISNO'         => $vehicle->chassis_no,
                    'ENGINENO'          => $vehicle->engine_no,
                    'ENGINECAPACITY'    => $vehicle->engine_capacity,
                    'MAKENAME'          => $makers_name,
                    'MAKEMODEL'         => "",
                    'VEHICLETYPE'       => $type_of_body,
                    'VEHICLECOLOR'      => trim($color) !== '' ? $color : null,
                    'LADENWEIGHT'       => $vehicle->laden_weight,
                    'UNLADENWEIGHT'     => $vehicle->unladen_weight,
                    'SEATINGCAPACITY'   => $vehicle->seating_capacity,
                    'MANUFACTURINGYEAR' => $vehicle->year_of_manufacture,
                    'VEHICLECATEGORY'   => $category_name,
                ];

                // ✅ Get max length from all arrays
                $max = max(count($names), count($fatherNames), count($cnics), count($ntns));

                for ($i = 0; $i < $max; $i++) {
                    $keyName = $i === 0 ? 'OWNERNAME' : 'OWNERNAME' . $i;
                    $data[$keyName] = $names[$i] ?? null;

                    $keyFName = $i === 0 ? 'OWNERFATHERNAME' : 'OWNERFATHERNAME' . $i;
                    $data[$keyFName] = $fatherNames[$i] ?? null;

                    $keyCnic = $i === 0 ? 'CNIC' : 'CNIC' . $i;
                    $data[$keyCnic] = isset($cnics[$i]) ? preg_replace('/\D/', '', $cnics[$i]) : null;

                    $keyNtn = $i === 0 ? 'NTN' : 'NTN' . $i;
                    $data[$keyNtn] = $ntns[$i] ?? null;
                }

                // ✅ Push this vehicle's data to response
                $responseData[] = $data;

            }

            return response()->json([
                'data' => $responseData,
                'pagination' => [
                    'current_page' => $vehicleInfos->currentPage(),
                    'per_page'     => $vehicleInfos->perPage(),
                    'total'        => $vehicleInfos->total(),
                    'last_page'    => $vehicleInfos->lastPage(),
                ],
                'status' => 200
            ]);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'status' => 500]);
        }
    }

    public function index(Request $request)
    {
        $email = $request->header('Email');
        $password = $request->header('Pwd');

        if (empty($email) || empty($password)) {
            return response()->json(['message' => "Unauthorized", 'status' => 401]);
        }

        if ($email !== "exice.job.pk@etanb.com" || $password !== "0!3-p23t#nB") {
            return response()->json(['message' => "Unauthorized: Invalid email or password", 'status' => 401]);
        }

        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date_format:m-d-Y',
            'end_date'   => 'required|date_format:m-d-Y',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $startDate = Carbon::createFromFormat('m-d-Y', $request->input('start_date'))->startOfDay();
            $endDate   = Carbon::createFromFormat('m-d-Y', $request->input('end_date'))->endOfDay();

            // $startDate = Carbon::createFromFormat('m-d-Y', $request->input('start_date'))->format('Y-m-d');
            // $endDate   = Carbon::createFromFormat('m-d-Y', $request->input('end_date'))->format('Y-m-d');
            $page      = $request->get('page', 1);
            $perPage   = $request->get('per_page', 20);

            // ✅ Step 1: Base query with pagination
            // $vehicleInfos = register::select('registration_no', 'eto_location_id')
            //     ->where('active_status', 'Active')
            //     ->where(function ($query) use ($startDate, $endDate) {
            //         $query->whereBetween('registration_date', [$startDate, $endDate])
            //             ->orWhereBetween('updated_at', [$startDate, $endDate]);
            //     })
            //     ->distinct()
            //     ->paginate($perPage, ['*'], 'page', $page);
            
            $vehicleInfos = register::select('registration_no', 'eto_location_id')
    ->where('active_status', 'Active')
    ->where(function ($query) use ($startDate, $endDate) {
        $query->whereBetween('registration_date', [$startDate->toDateString(), $endDate->toDateString()])
              ->orWhereBetween(DB::raw('DATE(updated_at)'), [$startDate->toDateString(), $endDate->toDateString()]);
    })
    ->distinct()
    ->paginate($perPage, ['*'], 'page', $page);

            if ($vehicleInfos->isEmpty()) {
                return response()->json(['message' => 'No vehicles found', 'status' => 404]);
            }

            $regNos   = $vehicleInfos->pluck('registration_no');
            $locations= $vehicleInfos->pluck('eto_location_id');

            // ✅ Step 2: Bulk fetch vehicle records
            $registrations = register::whereIn('registration_no', $regNos)
                ->whereIn('eto_location_id', $locations)
                ->get()
                ->keyBy(fn($item) => $item->registration_no . '-' . $item->eto_location_id);

            // ✅ Step 3: Preload reference tables (one query each)
            $colors      = colors::pluck('colors', 'id');
            $makers      = manufacturer::pluck('manufacturer', 'code');
            $categories  = category_of_vehicle::pluck('category_of_vehicle', 'categ_code');
            $bodyTypes   = type_of_body::pluck('type_of_body', 'tob_code');

            // ✅ Step 4: Preload latest transfers (one query instead of per-loop)
            $transfers = transfer_owner::leftJoin('owner_type', 'transfer.owner_type_id', '=', 'owner_type.id')
                ->leftJoin('cities', 'transfer.p_city', '=', 'cities.city_code')
                ->whereIn('transfer.registration_no', $regNos)
                ->whereIn('transfer.eto_location_id', $locations)
                ->select('transfer.*', 'owner_type.owner_type', 'cities.cities')
                ->orderBy('transfer.transfer_code', 'desc')
                ->get()
                ->groupBy(fn($t) => $t->registration_no . '-' . $t->eto_location_id);

            // ✅ Step 5: Preload voucher data (grouped)
            $vouchers = DB::table('voucher_managment')
                ->leftJoin('voucher_ids', 'voucher_managment.id', '=', 'voucher_ids.voucher_id')
                ->whereIn('voucher_managment.reg_no', $regNos)
                ->whereIn('voucher_managment.district_id', $locations)
                ->where('voucher_managment.status_voucher', 'Paid')
                ->whereIn('voucher_ids.title', ['Token Tax', 'Fedral Tax 234'])
                ->select(
                    'voucher_managment.reg_no',
                    'voucher_managment.district_id',
                    'voucher_managment.tax_app_year_to',
                    DB::raw("SUM(CASE WHEN voucher_ids.title = 'Token Tax' THEN voucher_ids.amount ELSE 0 END) as token_tax_total"),
                    DB::raw("SUM(CASE WHEN voucher_ids.title = 'Fedral Tax 234' THEN voucher_ids.amount ELSE 0 END) as fedral_tax_total")
                )
                ->groupBy('voucher_managment.reg_no', 'voucher_managment.district_id', 'voucher_managment.tax_app_year_to')
                ->get()
                ->keyBy(fn($v) => $v->reg_no . '-' . $v->district_id);

            $responseData = [];

            foreach ($vehicleInfos as $info) {
                $key = $info->registration_no . '-' . $info->eto_location_id;
                $vehicle = $registrations[$key] ?? null;
                if (!$vehicle) continue;

                $transfer = $transfers[$key][0] ?? null;
                $voucher  = $vouchers[$key] ?? null;

                $owner_name   = $transfer->name ?? $vehicle->name_;
                $owner_f_name = $transfer->f_name ?? $vehicle->father_or_husband_name;
                $owner_address= $transfer->c_address ?? $vehicle->address;
                $owner_ntn_no = $transfer->ntn_no ?? $vehicle->ntn_no;
                $owner_cnic   = $transfer->new_cnic_no ?? $transfer->old_cnic_no ?? $vehicle->new_cnic_no ?? $vehicle->old_cnic_no;

                $data = [
                    'REGID'             => $vehicle->id,
                    'REGISTRATIONNUMBER'=> $vehicle->registration_no,
                    'BOOKNUMBER'        => $vehicle->book_serialNo,
                    'REGISTRATIONDATE'  => $vehicle->registration_date,
                    'LASTTAXPAID'       => $voucher->tax_app_year_to ?? null,
                    'ADDRESS'           => $owner_address,
                    'CHASSISNO'         => $vehicle->chassis_no,
                    'ENGINENO'          => $vehicle->engine_no,
                    'ENGINECAPACITY'    => $vehicle->engine_capacity,
                    'MAKENAME'          => $makers[$vehicle->makers_name] ?? '',
                    'MAKEMODEL'         => "",
                    'VEHICLETYPE'       => $bodyTypes[$vehicle->type_of_body] ?? '',
                    'VEHICLECOLOR'      => $colors[$vehicle->color_of_vehicle_id] ?? null,
                    'LADENWEIGHT'       => $vehicle->laden_weight,
                    'UNLADENWEIGHT'     => $vehicle->unladen_weight,
                    'SEATINGCAPACITY'   => $vehicle->seating_capacity,
                    'MANUFACTURINGYEAR' => $vehicle->year_of_manufacture,
                    'VEHICLECATEGORY'   => $categories[$vehicle->category_of_vehicle_id] ?? '',
                ];

                // ✅ Owners (comma separated logic preserved)
                $names       = array_map('trim', explode(',', $owner_name));
                $fatherNames = array_map('trim', explode(',', $owner_f_name));
                $cnics       = array_map('trim', explode(',', $owner_cnic));
                $ntns        = array_map('trim', explode(',', $owner_ntn_no));

                $max = max(count($names), count($fatherNames), count($cnics), count($ntns));

                for ($i = 0; $i < $max; $i++) {
                    $data[$i === 0 ? 'OWNERNAME' : 'OWNERNAME'.$i] = $names[$i] ?? null;
                    $data[$i === 0 ? 'OWNERFATHERNAME' : 'OWNERFATHERNAME'.$i] = $fatherNames[$i] ?? null;
                    $data[$i === 0 ? 'CNIC' : 'CNIC'.$i] = isset($cnics[$i]) ? preg_replace('/\D/', '', $cnics[$i]) : null;
                    $data[$i === 0 ? 'NTN' : 'NTN'.$i]   = $ntns[$i] ?? null;
                }

                $responseData[] = $data;
            }

            return response()->json([
                'data' => $responseData,
                'pagination' => [
                    'current_page' => $vehicleInfos->currentPage(),
                    'per_page'     => $vehicleInfos->perPage(),
                    'total'        => $vehicleInfos->total(),
                    'last_page'    => $vehicleInfos->lastPage(),
                ],
                'status' => 200
            ]);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'status' => 500]);
        }
    }


}
