<?php

namespace App\Http\Controllers;
use App\Models\register;
use App\Models\pral_vehicle_taxes;
use App\Models\eto_location;
use App\Models\voucher_managment;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VoucherReportExport;

use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {
        $districts = eto_location::orderBy('eto_location')->get();

        return view('Reports.index', [
            'districts' => $districts,
            'reportData' => [],
            'totals' => [
                'computerized_plate_fee' => 0,
                'personalize_book_fee' => 0,
                'computerized_book_fee' => 0,
                'security_feature_no._plate_fee' => 0,
                'transfer_fee' => 0,
                'duplicate_book_fee' => 0,
                'arrival_fee' => 0,
                'no_objection_certificate_fee' => 0,
                'file_return_fee' => 0,
                'alteration_fee' => 0,
                'hire_purchase_deletion_fee' => 0,
                'surcharge' => 0,
                'late_payment_surcharge' => 0,
                'registration_fee' => 0,
                'token_tax' => 0,
                'professional_tax' => 0,
                'late_registration_fee' => 0,
                'smartcard_fee' => 0,
                'fedral_tax_231b(1)' => 0,
                'fedral_tax_231b(3)' => 0,
                'fedral_tax_231_2A' => 0,
                'fedral_tax_231b(2)' => 0,
                'fedral_tax_234' => 0,
                'capital_value_tax' => 0,
                'total' => 0
            ]
        ]);
    }

    public function generateReport(Request $request)
    {
        // Validate that at least one filter is provided
        $request->validate([
            'date' => 'nullable|date',
            'district_id' => 'nullable|exists:eto_location,id',
            'registration_no' => 'nullable|string',
            'report_type' => 'nullable|in:vehicle,challan'
        ]);

        // Default to 'challan' if not specified
        $reportType = $request->input('report_type', 'challan');

        $query = voucher_managment::with(['voucher_ids', 'voucher_arrears', 'registration', 'user']);

        // Apply filters based on report type
        if ($request->filled('district_id')) {
            if ($reportType === 'vehicle') {
                // Filter by vehicle registration district
                $query->whereHas('registration', function($q) use ($request) {
                    $q->where('eto_location_id', $request->district_id);
                });
            }else {
                $query->whereHas('user', function($q) use ($request) {
                    $q->where('eto_location_id', $request->district_id);
                });
            }
        }

        if ($request->filled('date')) {
            $query->whereDate('issue_date', $request->date);
        }

        if ($request->filled('registration_no')) {
            $query->where('reg_no', 'like', '%' . strtoupper($request->registration_no) . '%');
        }

        // Get paginated results (10 per page)
        $vouchers = $query->orderBy('issue_date', 'desc')->paginate(10);
        // Get all results for totals calculation
        $allVouchers = $query->orderBy('issue_date', 'desc')->get();
        $processedData = $this->processVoucherData($allVouchers);
        // Process only paginated data for display
        $paginatedData = $this->processVoucherData($vouchers);

        $district = null;
        if ($request->filled('district_id')) {
            $districtObj = eto_location::find($request->district_id);
            $district = $districtObj ? $districtObj->eto_location : null;
        }

        return view('reports.index', [
            'districts' => eto_location::orderBy('eto_location')->get(),
            'reportData' => $paginatedData['data'],
            'vouchers' => $vouchers,
            'totals' => $processedData['totals'],
            'selectedDate' => $request->date,
            'selectedDistrict' => $district,
            'selectedDistrictId' => $request->district_id,
            'selectedRegNo' => $request->registration_no,
            'reportType' => $reportType
        ]);
    }

    public function exportReport(Request $request)
    {
        $date = $request->input('date');
        $districtId = $request->input('district_id');
        $regNo = $request->input('registration_no');
        $reportType = $request->input('report_type', 'challan');

        return \Maatwebsite\Excel\Facades\Excel::download(
            new \App\Exports\VoucherReportExport($date, $districtId, $regNo, $reportType),
            'voucher_report_' . ($date ?? date('Y-m-d')) . '.xlsx'
        );
    }

    private function processVoucherData($vouchers)
    {
        $totals = [
            'computerized_plate_fee' => 0,
            'personalize_book_fee' => 0,
            'computerized_book_fee' => 0,
            'security_feature_no._plate_fee' => 0,
            'transfer_fee' => 0,
            'duplicate_book_fee' => 0,
            'arrival_fee' => 0,
            'no_objection_certificate_fee' => 0,
            'file_return_fee' => 0,
            'alteration_fee' => 0,
            'hire_purchase_deletion_fee' => 0,
            'surcharge' => 0,
            'late_payment_surcharge' => 0,
            'registration_fee' => 0,
            'token_tax' => 0,
            'professional_tax' => 0,
            'late_registration_fee' => 0,
            'smartcard_fee' => 0,
            'fedral_tax_231b(1)' => 0,
            'fedral_tax_231b(3)' => 0,
            'fedral_tax_231_2A' => 0,
            'fedral_tax_231b(2)' => 0,
            'fedral_tax_234' => 0,
            'capital_value_tax' => 0,
            'total' => 0
        ];

        $reportData = [];
        $startIndex = ($vouchers instanceof \Illuminate\Pagination\LengthAwarePaginator)
        ? ($vouchers->currentPage() - 1) * $vouchers->perPage()
        : 0;

        foreach ($vouchers as $index => $voucher) {
            $ownerName = '';
            $cnic = '';

            // First, try transfer_owner
            $transferOwner = \App\Models\transfer::where('registration_no', $voucher->reg_no)
            ->where('eto_location_id', $voucher->district_id)
            ->orderBy('transfer_code', 'desc')
            ->first();

            if ($transferOwner) {
                $ownerName = $transferOwner->name ?? '';
                $cnic = $transferOwner->new_cnic_no ?? $transferOwner->old_cnic_no ?? '';
            }

            // If not found in transfer_owner, fallback to registration
            if (empty($ownerName) || empty($cnic)) {
                if ($voucher->registration) {
                    if (empty($ownerName)) {
                        $ownerName = $voucher->registration->name_ ?? '';
                    }
                    if (empty($cnic)) {
                        $cnic = $voucher->registration->new_cnic_no ?? $voucher->registration->old_cnic_no ?? '';
                    }
                }
            }
        }

        foreach ($vouchers as $index => $voucher){
            $vehicleDistrict = "";

            if ($voucher->registration) {
                $vehicleDistrict = $voucher->registration->eto_location_id ?? '';
            }
        }

        foreach ($vouchers as $index => $voucher) {
            $row = [
                'sno' => $startIndex + $index + 1,
                'vehicle' => $voucher->reg_no ?? 'NULL',
                'owner_name' => $transferOwner->name ?? $voucher->registration->name_ ?? 'NULL',
                'cnic' => $transferOwner->new_cnic_no ?? $transferOwner->old_cnic_no ?? $voucher->registration->new_cnic_no ?? $voucher->registration->old_cnic_no ?? 'NULL',
                'district' => $vehicleDistrict = $voucher->registration->eto_location_id ?? 'NULL',
                'computerized_plate_fee' => 0,
                'personalize_book_fee' => 0,
                'computerized_book_fee' => 0,
                'security_feature_no._plate_fee' => 0,
                'transfer_fee' => 0,
                'duplicate_book_fee' => 0,
                'arrival_fee' => 0,
                'no_objection_certificate_fee' => 0,
                'file_return_fee' => 0,
                'alteration_fee' => 0,
                'hire_purchase_deletion_fee' => 0,
                'surcharge' => 0,
                'late_payment_surcharge' => 0,
                'registration_fee' => 0,
                'token_tax' => 0,
                'professional_tax' => 0,
                'late_registration_fee' => 0,
                'smartcard_fee' => 0,
                'fedral_tax_231b(1)' => 0,
                'fedral_tax_231b(3)' => 0,
                'fedral_tax_231_2A' => 0,
                'fedral_tax_231b(2)' => 0,
                'fedral_tax_234' => 0,
                'capital_value_tax' => 0,
                'total' => 0
            ];

            // Process voucher_ids (fees)
            if ($voucher->voucher_ids) {
                foreach ($voucher->voucher_ids as $fee) {
                    $amount = $fee->amount ?? 0;

                    // Map fees_id to report columns
                    switch ($fee->fees_id) {
                        case 1: $row['computerized_plate_fee'] += $amount; break;
                        case 2: $row['personalize_book_fee'] += $amount; break;
                        case 3: $row['computerized_book_fee'] += $amount; break;
                        case 4: $row['security_feature_no._plate_fee'] += $amount; break;
                        case 6: $row['transfer_fee'] += $amount; break;
                        case 7: $row['duplicate_book_fee'] += $amount; break;
                        case 8: $row['arrival_fee'] += $amount; break;
                        case 9: $row['no_objection_certificate_fee'] += $amount; break;
                        case 10: $row['file_return_fee'] += $amount; break;
                        case 11: $row['alteration_fee'] += $amount; break;
                        case 12: $row['hire_purchase_deletion_fee'] += $amount; break;
                        case 13: $row['surcharge'] += $amount; break;
                        case 14: $row['late_payment_surcharge'] += $amount; break;
                        case 15: $row['registration_fee'] += $amount; break;
                        case 16: $row['token_tax'] += $amount; break;
                        case 25: $row['professional_tax'] += $amount; break;
                        case 26: $row['late_registration_fee'] += $amount; break;
                        case 27: $row['smartcard_fee'] += $amount; break;
                        case 17: $row['fedral_tax_231b(1)'] += $amount; break;
                        case 18: $row['fedral_tax_231b(3)'] += $amount; break;
                        case 22: $row['fedral_tax_231_2A'] += $amount; break;
                        case 21: $row['fedral_tax_231b(2)'] += $amount; break;
                        case 23: $row['fedral_tax_234'] += $amount; break;
                        case 24: $row['capital_value_tax'] += $amount; break;
                    }
                }
            }

            // Process voucher_arrears
            if ($voucher->voucher_arrears) {
                foreach ($voucher->voucher_arrears as $arrear) {
                    $title = strtolower($arrear->title ?? '');
                    $amount = $arrear->amount ?? 0;

                    if (str_contains($title, 'computerized_plate_fee')) $row['computerized_plate_fee'] += $amount;
                    elseif (str_contains($title, 'personalize_book_fee')) $row['personalize_book_fee'] += $amount;
                    elseif (str_contains($title, 'computerized_book_fee')) $row['computerized_book_fee'] += $amount;
                    elseif (str_contains($title, 'security_feature_no._plate_fee')) $row['security_feature_no._plate_fee'] += $amount;
                    elseif (str_contains($title, 'transfer_fee')) $row['transfer_fee'] += $amount;
                    elseif (str_contains($title, 'duplicate_book_fee')) $row['duplicate_book_fee'] += $amount;
                    elseif (str_contains($title, 'arrival_fee')) $row['arrival_fee'] += $amount;
                    elseif (str_contains($title, 'no_objection_certificate_fee')) $row['no_objection_certificate_fee'] += $amount;
                    elseif (str_contains($title, 'file_return_fee')) $row['file_return_fee'] += $amount;
                    elseif (str_contains($title, 'alteration_fee')) $row['alteration_fee'] += $amount;
                    elseif (str_contains($title, 'hire_purchase_deletion_fee')) $row['hire_purchase_deletion_fee'] += $amount;
                    elseif (str_contains($title, 'surcharge')) $row['surcharge'] += $amount;
                    elseif (str_contains($title, 'late_payment_surcharge')) $row['late_payment_surcharge'] += $amount;
                    elseif (str_contains($title, 'registration_fee')) $row['registration_fee'] += $amount;
                    elseif (str_contains($title, 'token_tax')) $row['token_tax'] += $amount;
                    elseif (str_contains($title, 'professional_tax')) $row['professional_tax'] += $amount;
                    elseif (str_contains($title, 'late_registration_fee')) $row['late_registration_fee'] += $amount;
                    elseif (str_contains($title, 'smartcard_fee')) $row['smartcard_fee'] += $amount;
                    elseif (str_contains($title, 'fedral_tax_231b(1)')) $row['fedral_tax_231b(1)'] += $amount;
                    elseif (str_contains($title, 'fedral_tax_231b(3)')) $row['fedral_tax_231b(3)'] += $amount;
                    elseif (str_contains($title, 'fedral_tax_231_2A')) $row['fedral_tax_231_2A'] += $amount;
                    elseif (str_contains($title, 'fedral_tax_231b(2)')) $row['fedral_tax_231b(2)'] += $amount;
                    elseif (str_contains($title, 'fedral_tax_234')) $row['fedral_tax_234'] += $amount;
                    elseif (str_contains($title, 'capital_value_tax')) $row['capital_value_tax'] += $amount;
                }
            }

            // Calculate total
            $row['total'] = $row['computerized_plate_fee'] + $row['personalize_book_fee'] + $row['computerized_book_fee'] +
            $row['security_feature_no._plate_fee'] + $row['transfer_fee'] + $row['duplicate_book_fee'] + $row['arrival_fee'] +
            $row['no_objection_certificate_fee'] + $row['file_return_fee'] + $row['alteration_fee'] + $row['hire_purchase_deletion_fee'] +
            $row['surcharge'] + $row['late_payment_surcharge'] + $row['registration_fee'] + $row['token_tax'] + $row['professional_tax'] +
            $row['late_registration_fee'] + $row['smartcard_fee'] + $row['fedral_tax_231b(1)'] + $row['fedral_tax_231b(3)'] +
            $row['fedral_tax_231_2A'] + $row['fedral_tax_231b(2)'] + $row['fedral_tax_234'] + $row['capital_value_tax'];

            // Update totals
            foreach (['computerized_plate_fee','personalize_book_fee','computerized_book_fee','security_feature_no._plate_fee','transfer_fee','duplicate_book_fee','arrival_fee',
                'no_objection_certificate_fee','file_return_fee','alteration_fee','hire_purchase_deletion_fee','surcharge','late_payment_surcharge','registration_fee',
                'token_tax','professional_tax','late_registration_fee','smartcard_fee','fedral_tax_231b(1)','fedral_tax_231b(3)','fedral_tax_231_2A','fedral_tax_231b(2)',
                'fedral_tax_234','capital_value_tax', 'total'] as $field) {
                $totals[$field] += $row[$field];
            }

            $reportData[] = $row;
        }

        //Calculate P1
        $totals['p1'] = $totals['computerized_plate_fee'] + $totals['personalize_book_fee'] + $totals['computerized_book_fee'] +
        $totals['security_feature_no._plate_fee'] + $totals['transfer_fee'] + $totals['duplicate_book_fee'] + $totals['arrival_fee'] +
        $totals['no_objection_certificate_fee'] + $totals['file_return_fee'] + $totals['alteration_fee'] + $totals['hire_purchase_deletion_fee'] +
        $totals['surcharge'] + $totals['late_payment_surcharge'] + $totals['registration_fee'] + $totals['token_tax'] + $totals['professional_tax'] +
        $totals['late_registration_fee'] + $totals['smartcard_fee'];

        //Calculate F1
        $totals['f1'] = $totals['fedral_tax_231b(1)'] + $totals['fedral_tax_231b(3)'] +
        $totals['fedral_tax_231_2A'] + $totals['fedral_tax_231b(2)'] + $totals['fedral_tax_234'] + $totals['capital_value_tax'];

        //Calculate grand total
        $totals['gt'] = $totals['p1'] + $totals['f1'];

        return [
            'data' => $reportData,
            'totals' => $totals
        ];
    }
}
