<?php

namespace App\Http\Controllers;
use App\Models\register;
use App\Models\type_of_body;
use App\Models\pral_vehicle_taxes;
use App\Models\eto_location;
use App\Models\voucher_managment;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FilerReportExport;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Http\Request;

class FilerController extends Controller
{
    public function index()
    {
        $districts = eto_location::orderBy('eto_location')->get();
        $bodyTypes = type_of_body::orderBy('type_of_body')->get();

        return view('Filer.index', [
            'districts' => $districts,
            'bodyTypes' => $bodyTypes,
            'reportData' => [],
            'totals' => [
                'registration_fee' => 0,
                'late_payment_surcharge' => 0,
                'transfer_fee' => 0,
                'alteration_fee' => 0,
                'computerized_plate_fee' => 0,
                'duplicate_book_fee' => 0,
                'token_tax' => 0,
                'surcharge' => 0,
                'late_registration_fee' => 0,
                'professional_tax' => 0,
                'fedral_tax_231b(1)' => 0,
                'fedral_tax_231b(3)' => 0,
                'capital_value_tax' => 0,
                'fedral_arrears' => 0,
            ]
        ]);
    }

    // Get body types by district
    public function getBodyTypesByDistrict(Request $request)
    {
        $districtId = $request->district_id;

        if (empty($districtId)) {
            $bodyTypes = type_of_body::orderBy('type_of_body')->get();
        } else {
            $bodyTypes = type_of_body::where('eto_location_id', $districtId)
            ->orderBy('type_of_body')
            ->get();
        }

        return response()->json($bodyTypes);
    }

    public function generateReport(Request $request)
    {
        $request->validate([
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date|after_or_equal:date_from',
            'district_id' => 'nullable|exists:eto_location,id',
            'registration_no' => 'nullable|string',
            'type_of_body_id' => 'nullable|string',
        ]);

        $query = voucher_managment::with(['voucher_ids', 'voucher_arrears', 'registration']);

        if ($request->filled('district_id')) {
            $query->where('district_id', $request->district_id);
        }

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $query->whereBetween('issue_date', [$request->date_from, $request->date_to]);
        } elseif ($request->filled('date_from')) {
            $query->whereDate('issue_date', '=', $request->date_from);
        } elseif ($request->filled('date_to')) {
            $query->whereDate('issue_date', '=', $request->date_to);
        }

        if ($request->filled('registration_no')) {
            $query->where('reg_no', 'like', '%' . strtoupper($request->registration_no) . '%');
        }

        if ($request->filled('type_of_body_id')) {
            $query->whereHas('registration', function ($q) use ($request) {
                $q->where('type_of_body', $request->type_of_body_id);
            });
        }

        $vouchers = $query->orderBy('issue_date', 'desc')->paginate(10);
        $allVouchers = $query->orderBy('issue_date', 'desc')->get();
        $processedData = $this->processVoucherData($allVouchers);
        $paginatedData = $this->processVoucherData($vouchers);

        $district = null;
        if ($request->filled('district_id')) {
            $districtObj = eto_location::find($request->district_id);
            $district = $districtObj ? $districtObj->eto_location : null;
        }

        // Get body types filtered by district
        if ($request->filled('district_id')) {
            $bodyTypes = type_of_body::where('eto_location_id', $request->district_id)
                ->orderBy('type_of_body')
                ->get();
        } else {
            $bodyTypes = type_of_body::orderBy('type_of_body')->get();
        }

        return view('filer.index', [
            'districts' => eto_location::orderBy('eto_location')->get(),
            'bodyTypes' => $bodyTypes,
            'reportData' => $paginatedData['data'],
            'vouchers' => $vouchers,
            'totals' => $processedData['totals'],
            'selectedDateFrom' => $request->date_from,
            'selectedDateTo' => $request->date_to,
            'selectedDistrict' => $district,
            'selectedDistrictId' => $request->district_id,
            'selectedRegNo' => $request->registration_no,
            'selectedBodyId' => $request->type_of_body_id
        ]);
    }

    public function exportExcel(Request $request)
    {
        $request->validate([
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date|after_or_equal:date_from',
            'district_id' => 'nullable|exists:eto_location,id',
            'registration_no' => 'nullable|string',
            'type_of_body_id' => 'nullable|string',
        ]);

        $query = voucher_managment::with(['voucher_ids', 'voucher_arrears', 'registration']);

        // Filters
        if ($request->filled('district_id')) {
            $query->where('district_id', $request->district_id);
        }

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $query->whereBetween('issue_date', [$request->date_from, $request->date_to]);
        } elseif ($request->filled('date_from')) {
            $query->whereDate('issue_date', '=', $request->date_from);
        } elseif ($request->filled('date_to')) {
            $query->whereDate('issue_date', '=', $request->date_to);
        }

        if ($request->filled('registration_no')) {
            $query->where('reg_no', 'like', '%' . strtoupper($request->registration_no) . '%');
        }

        if ($request->filled('type_of_body_id')) {
            $query->whereHas('registration', function ($q) use ($request) {
                $q->where('type_of_body', $request->type_of_body_id);
            });
        }

        $vouchers = $query->orderBy('issue_date', 'desc')->get();

        $processedData = $this->processVoucherData($vouchers);

        $filename = 'filer_report_' . date('Y-m-d_His') . '.xlsx';

        return Excel::download(
            new FilerReportExport($processedData['data'], $processedData['totals']),
            $filename
        );
    }

    private function processVoucherData($vouchers)
    {
        $totals = [
            'registration_fee' => 0,
            'late_payment_surcharge' => 0,
            'transfer_fee' => 0,
            'alteration_fee' => 0,
            'computerized_plate_fee' => 0,
            'duplicate_book_fee' => 0,
            'token_tax' => 0,
            'surcharge' => 0,
            'late_registration_fee' => 0,
            'professional_tax' => 0,
            'fedral_tax_231b(1)' => 0,
            'fedral_tax_231b(3)' => 0,
            'capital_value_tax' => 0,
            'fedral_arrears' => 0,
            'total' => 0
        ];

        $reportData = [];

        foreach ($vouchers as $index => $voucher) {
            $ownerName = '';
            $cnic = '';
            $address = '';

            // First, try transfer table
            $transferOwner = \App\Models\transfer::where('registration_no', $voucher->reg_no)
                ->where('eto_location_id', $voucher->district_id)
                ->orderBy('transfer_code', 'desc')
                ->first();

            if ($transferOwner) {
                $ownerName = $transferOwner->name ?? '';
                $cnic = $transferOwner->new_cnic_no ?? $transferOwner->old_cnic_no ?? '';
                $address = $transferOwner->c_address ?? $transferOwner->p_address ??  '';
            }

            // If not found in transfer table, fallback to registration
            if (empty($ownerName) || empty($cnic)) {
                if ($voucher->registration) {
                    if (empty($ownerName)) {
                        $ownerName = $voucher->registration->name_ ?? '';
                    }
                    if (empty($cnic)) {
                        $cnic = $voucher->registration->new_cnic_no ?? $voucher->registration->old_cnic_no ?? '';
                    }
                    if (empty($cnic)) {
                        $cnic = $voucher->registration->address ?? '';
                    }
                }
            }

            $row = [
                'sno' => $index + 1,
                'vehicle' => $voucher->reg_no ?? 'NULL',
                'owner_name' => $transferOwner->name ?? $voucher->registration->name_ ?? 'NULL',
                'cnic' => $transferOwner->new_cnic_no ?? $transferOwner->old_cnic_no ?? $voucher->registration->new_cnic_no ?? $voucher->registration->old_cnic_no ?? 'NULL',
                'address' => $transferOwner->c_address ?? $transferOwner->p_address ?? $voucher->registration->address ?? 'NULL',
                'status' => $voucher->status ?? 'NULL',
                'type_of_body' => $voucher->registration->type_of_body ?? 'NULL',
                'district' => $voucher->district ?? 'NULL',
                'book_serialNo' => $voucher->registration->book_serialNo ?? 'NULL',
                'bank_branch' => $voucher->bank_branch ?? 'NULL',
                'date' => $voucher->date ?? 'NULL',
                'challan_no' => $voucher->challan_no ?? 'NULL',
                'tax_app_year_from' => $voucher->tax_app_year_from ?? 'NULL',
                'tax_app_year_to' => $voucher->tax_app_year_to ?? 'NULL',
                'registration_date' => $voucher->registration->registration_date ?? 'NULL',
                'engine_capacity' => $voucher->registration->engine_capacity ?? 'NULL',
                'seating_capacity' => $voucher->registration->seating_capacity ?? 'NULL',
                'laden_weight' => $voucher->registration->laden_weight ?? 'NULL',
                'registration_fee' => 0,
                'late_payment_surcharge' => 0,
                'transfer_fee' => 0,
                'alteration_fee' => 0,
                'computerized_plate_fee' => 0,
                'duplicate_book_fee' => 0,
                'token_tax' => 0,
                'surcharge' => 0,
                'late_registration_fee' => 0,
                'professional_tax' => 0,
                'fedral_tax_231b(1)' => 0,
                'fedral_tax_231b(3)' => 0,
                'capital_value_tax' => 0,
                'fedral_arrears' => 0
            ];

            // Process voucher_ids (fees)
            if ($voucher->voucher_ids) {
                foreach ($voucher->voucher_ids as $fee) {
                    $amount = $fee->amount ?? 0;

                    switch ($fee->fees_id) {
                        case 1:  $row['computerized_plate_fee'] += $amount; break;
                        case 6:  $row['transfer_fee'] += $amount; break;
                        case 7:  $row['duplicate_book_fee'] += $amount; break;
                        case 11: $row['alteration_fee'] += $amount; break;
                        case 13: $row['surcharge'] += $amount; break;
                        case 14: $row['late_payment_surcharge'] += $amount; break;
                        case 15: $row['registration_fee'] += $amount; break;
                        case 16: $row['token_tax'] += $amount; break;
                        case 25: $row['professional_tax'] += $amount; break;
                        case 26: $row['late_registration_fee'] += $amount; break;
                        case 17: $row['fedral_tax_231b(1)'] += $amount; break;
                        case 18: $row['fedral_tax_231b(3)'] += $amount; break;
                        case 24: $row['capital_value_tax'] += $amount; break;
                    }
                }
            }

            // Process voucher_arrears
            if ($voucher->voucher_arrears) {
                foreach ($voucher->voucher_arrears as $arrear) {
                    $title = strtolower($arrear->title ?? '');
                    $amount = $arrear->amount ?? 0;
                    $taxArrearType = strtolower($arrear->tax_arrears_type ?? '');

                    // Add federal arrears separately
                    if ($taxArrearType === 'fedral' || $taxArrearType === 'federal') {
                        $row['fedral_arrears'] += $amount;
                    }

                    // Existing arrear processing
                    if (str_contains($title, 'fedral_tax_231b(1)')) {
                        $row['fedral_tax_231b(1)'] += $amount;
                    } elseif (str_contains($title, 'fedral_tax_231b(3)')) {
                        $row['fedral_tax_231b(3)'] += $amount;
                    } elseif (str_contains($title, 'fedral_tax_231_2A')) {
                        $row['fedral_tax_231_2A'] += $amount;
                    } elseif (str_contains($title, 'fedral_tax_231b(2)')) {
                        $row['fedral_tax_231b(2)'] += $amount;
                    } elseif (str_contains($title, 'fedral_tax_234')) {
                        $row['fedral_tax_234'] += $amount;
                    } elseif (str_contains($title, 'capital_value_tax')) {
                        $row['capital_value_tax'] += $amount;
                    }
                }
            }

            // Calculate total for this row
            $row['total'] =
                $row['registration_fee'] +
                $row['late_payment_surcharge'] +
                $row['transfer_fee'] +
                $row['alteration_fee'] +
                $row['computerized_plate_fee'] +
                $row['duplicate_book_fee'] +
                $row['token_tax'] +
                $row['surcharge'] +
                $row['late_registration_fee'] +
                $row['professional_tax'] +
                $row['fedral_tax_231b(1)'] +
                $row['fedral_tax_231b(3)'] +
                $row['capital_value_tax'] +
                $row['fedral_arrears'];

            // Update totals for each column
            foreach ([
                'computerized_plate_fee', 'transfer_fee', 'duplicate_book_fee', 'alteration_fee',
                'surcharge', 'late_payment_surcharge', 'registration_fee', 'token_tax',
                'professional_tax', 'late_registration_fee', 'fedral_tax_231b(1)',
                'fedral_tax_231b(3)', 'capital_value_tax', 'fedral_arrears'
           ] as $field) {
                $totals[$field] += $row[$field];
            }

            //include total in the grand total
            $totals['total'] += $row['total'];
            $reportData[] = $row;
        }

        return [
            'data' => $reportData,
            'totals' => $totals
        ];
    }
}
