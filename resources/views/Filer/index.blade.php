@extends('layouts.dash')

@section('content')
<div class="right_col" role="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h3 class="strong">Filer/Non-Filer Reports</h3>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('filer.generate') }}" method="Get" id="commercialForm">
                            <!-- @csrf -->
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="date_from">Date From</label>
                                        <input type="date" name="date_from" class="form-control"
                                        value="{{ old('date_from', $selectedDateFrom ?? '') }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="date_to">Date To</label>
                                        <input type="date" name="date_to" class="form-control"
                                        value="{{ old('date_to', $selectedDateTo ?? '') }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="district_id">District</label>
                                        <select class="form-control" id="district_id" name="district_id">
                                            <option value=""> All Districts </option>
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}" 
                                                    {{ (old('district_id', $selectedDistrictId ?? '') == $district->id) ? 'selected' : '' }}>
                                                    {{ $district->eto_location }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="registration_no">Registration No</label>
                                        <input type="text" class="form-control" id="registration_no" 
                                        name="registration_no" placeholder="e.g., TAP530"
                                        value="{{ old('registration_no', $selectedRegNo ?? '') }}"
                                        style="text-transform: uppercase;">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="type_of_body_id">Type of Body</label>
                                        <select class="form-control" id="type_of_body_id" name="type_of_body_id">
                                            <option value=""> All Body Types </option>
                                            @foreach($bodyTypes as $body)
                                                <option value="{{ $body->tob_code }}" 
                                                    data-district="{{ $body->eto_location_id }}"
                                                    {{ (old('type_of_body_id', $selectedBodyId ?? '') == $body->tob_code) ? 'selected' : '' }}>
                                                    {{ $body->type_of_body }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <div class="btn-group btn-block">
                                            <button type="submit" class="btn btn-primary" style="width: 70%;">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                            <a href="{{ route('filer.index') }}" class="btn btn-default" style="width: 30%;">
                                                <i class="fa fa-refresh"></i> Clear
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if(isset($selectedFrom) || isset($selectedTo) || isset($selectedDistrictId) || isset($selectedRegNo))
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: linear-gradient(to bottom, #f8f9fa 0%, #e9ecef 100%); border-bottom: 3px solid #999;">
                        <div class="row">
                            <div class="col-md-4 text-left">
                                @if(count($reportData) > 0)
                                <form action="{{ route('filer.export') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="date_from" value="{{ $selectedDateFrom ?? '' }}">
                                    <input type="hidden" name="date_to" value="{{ $selectedDateTo ?? '' }}">
                                    <input type="hidden" name="district_id" value="{{ $selectedDistrictId ?? '' }}">
                                    <input type="hidden" name="registration_no" value="{{ $selectedRegNo ?? '' }}">
                                    <input type="hidden" name="type_of_body_id" value="{{ $selectedBodyId ?? '' }}">
    
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-file-excel"></i> Export to Excel
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Report Table  -->
                    <div class="panel-body" style="padding: 0; overflow-x: auto;">
                        <table class="table table-bordered table-hover" style="margin-bottom: 0; font-size: 13px;">
                            <thead style="background-color: #343a40; color: white;">
                                <tr>
                                    <!-- Columns before the grouped sections -->
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 60px;">S.NO</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Vehicle</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Type of Body</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Owner Name</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">CNIC No.</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Address</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Status</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">District</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Reg Cert No.</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Bank Branch</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Date</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Challan No.</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">From</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">To</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">D-o-R</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Engine Capacity</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Seating Capacity</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Weight</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Reg. Fee</th>
                                    <!-- Misc. Fee group -->
                                    <th colspan="5" class="text-center" style="vertical-align: middle;">Misc. Fee</th>

                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">MVT</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Surcharge</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Penalty</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Professional Tax</th>

                                    <!-- Income Tax group -->
                                    <th colspan="4" class="text-center" style="vertical-align: middle;">Income Tax</th>

                                    <!-- Total -->
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">TOTAL</th>
                                </tr>

                                <tr>
                                    <!-- Misc. Fee columns -->
                                    <th class="text-center" style="min-width: 120px;">Late Fee</th>
                                    <th class="text-center" style="min-width: 100px;">Transfer</th>
                                    <th class="text-center" style="min-width: 100px;">Alteration</th>
                                    <th class="text-center" style="min-width: 100px;">NP</th>
                                    <th class="text-center" style="min-width: 100px;">Book</th>

                                    <!-- Income Tax columns -->
                                    <th class="text-center" style="min-width: 100px;">Fedral Tax 231b(1)</th>
                                    <th class="text-center" style="min-width: 100px;">Fedral Tax 231b(3)</th>
                                    <th class="text-center" style="min-width: 100px;">Capital Value Tax</th>
                                    <th class="text-center" style="min-width: 100px;">Income Tax Arrears</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(isset($reportData) && count($reportData) > 0)
                                    @foreach($reportData as $row)
                                    <tr style="{{ $loop->iteration % 2 == 0 ? 'background-color: #f8f9fa;' : '' }}">
                                        <td class="text-center" style="vertical-align: middle; font-weight: 500;">
                                            {{ $row['sno'] }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <strong style="color: #007bff; font-size: 14px;">{{ $row['vehicle'] ?? 'NULL' }}</strong>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <strong style="color: #007bff; font-size: 14px;">{{ $row['type_of_body'] ?? 'NULL' }}</strong>
                                        </td>
                                        <td style="vertical-align: middle; padding-left: 8px;">
                                            {{ $row['owner_name'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['cnic'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['address'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['status'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['district'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['book_serialNo'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['bank_branch'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['date'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['challan_no'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['tax_app_year_from'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['tax_app_year_to'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['registration_date'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['engine_capacity'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['seating_capacity'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['laden_weight'] ?? 'N/A' }}
                                        </td>
                                       <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['registration_fee']) && $row['registration_fee'] > 0)
                                                {{ number_format($row['registration_fee'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['late_payment_surcharge']) && $row['late_payment_surcharge'] > 0)
                                                {{ number_format($row['late_payment_surcharge'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['transfer_fee']) && $row['transfer_fee'] > 0)
                                                {{ number_format($row['transfer_fee'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['alteration_fee']) && $row['alteration_fee'] > 0)
                                                {{ number_format($row['alteration_fee'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['computerized_plate_fee']) && $row['computerized_plate_fee'] > 0)
                                                {{ number_format($row['computerized_plate_fee'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                         <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['duplicate_book_fee']) && $row['duplicate_book_fee'] > 0)
                                                {{ number_format($row['duplicate_book_fee'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                         <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['token_tax']) && $row['token_tax'] > 0)
                                                {{ number_format($row['token_tax'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['surcharge']) && $row['surcharge'] > 0)
                                                {{ number_format($row['surcharge'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['late_registration_fee']) && $row['late_registration_fee'] > 0)
                                                {{ number_format($row['late_registration_fee'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['professional_tax']) && $row['professional_tax'] > 0)
                                                {{ number_format($row['professional_tax'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['fedral_tax_231b(1)']) && $row['fedral_tax_231b(1)'] > 0)
                                                {{ number_format($row['fedral_tax_231b(1)'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['fedral_tax_231b(3)']) && $row['fedral_tax_231b(3)'] > 0)
                                                {{ number_format($row['fedral_tax_231b(3)'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['capital_value_tax']) && $row['capital_value_tax'] > 0)
                                                {{ number_format($row['capital_value_tax'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['fedral_arrears']) && $row['fedral_arrears'] > 0)
                                                {{ number_format($row['fedral_arrears'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace; font-weight: bold; background-color: #e8f5e9;">
                                            {{ isset($row['total']) ? number_format($row['total'], 0) : '0' }}
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="15" class="text-center" style="padding: 40px; color: #999;">
                                            <i class="fa fa-inbox" style="font-size: 48px; display: block; margin-bottom: 15px;"></i>
                                            <h4>No records found</h4>
                                            <p>No voucher records match your search criteria.</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                    @if(count($reportData ?? []) > 0)
                    <div class="panel-footer" style="background-color: #f8f9fa; padding: 20px;">
                        <div class="row">
                            <div class="col-md-3">
                                <div style="border: 2px solid #090a09ff; padding: 15px; border-radius: 5px; background-color: white;">
                                    <p style="margin: 15px 0 5px 0; font-size: 18px; color: #090a09ff;">
                                        <strong>GRAND TOTAL:</strong> 
                                        <span style="font-family: monospace; font-size: 22px; font-weight: bold;">
                                            {{ isset($totals) ? number_format($totals['total'] ?? 0, 0) : '0' }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- Pagination -->
                    @if(isset($vouchers) && $vouchers->hasPages())
                        <div style="padding: 15px; background-color: #f8f9fa; border-top: 1px solid #dee2e6;">
                            <div class="row">
                                <div class="col-md-6">
                                    <p style="margin: 10px 0; color: #666;">
                                        Showing {{ $vouchers->firstItem() }} to {{ $vouchers->lastItem() }} of {{ $vouchers->total() }} entries
                                    </p>
                                </div>
                                <div class="col-md-6 text-right">
                                    {{ $vouchers->appends(request()->except('page'))->links() }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @else
                <!-- Show message when no filters applied -->
                <div class="panel panel-default">
                    <div class="panel-body text-center" style="padding: 60px 20px;">
                        <i class="fa fa-filter" style="font-size: 64px; color: #090a09ff; margin-bottom: 20px;"></i>
                        <h3 style="color: #333; margin-bottom: 15px;">Select Filter Criteria</h3>
                        <p style="font-size: 16px; color: #666; margin-bottom: 0;">
                            Please select at least one filter option (Date, District, or Registration Number) and click <strong>Search</strong> to view the voucher report.
                        </p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<style>
    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        border: 1px solid #dee2e6 !important;
    }
    
    .table-hover tbody tr:hover {
        background-color: #e3f2fd !important;
        cursor: pointer;
    }
    
    @media print {
        .panel-heading form,
        .btn,
        .panel:first-child {
            display: none !important;
        }
        
        body * {
            visibility: hidden;
        }
        
        .panel-default, .panel-default * {
            visibility: visible;
        }
        
        .panel-default {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        
        .table {
            font-size: 11px;
        }
    }
    
    .form-control:focus {
        border-color: #999;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

    .pagination {
        margin: 0;
    }
    
    .pagination > li > a,
    .pagination > li > span {
        color: #337ab7;
    }
    
    .pagination > .active > a,
    .pagination > .active > span {
        background-color: #337ab7;
        border-color: #337ab7;
        color: white;
    }
    
    @media (max-width: 768px) {
        .table {
            font-size: 11px;
        }
        
        th, td {
            padding: 5px !important;
        }
    }
</style>

<script>
    // Convert registration number to uppercase
    document.getElementById('registration_no').addEventListener('input', function(e) {
        e.target.value = e.target.value.toUpperCase();
    });
    
    // Confirm export
    document.querySelector('form[action="{{ route('filer.export') }}"]')?.addEventListener('submit', function(e) {
        if (!confirm('Are you sure you want to export this report to Excel?')) {
            e.preventDefault();
        }
    });
    
    // Dynamic Type of Body filtering based on District selection
    document.getElementById('district_id').addEventListener('change', function() {
        const districtId = this.value;
        const bodyTypeSelect = document.getElementById('type_of_body_id');
        const selectedBodyId = bodyTypeSelect.value; // Remember current selection
        
        if (!districtId) {
            // Show all body types if no district selected
            Array.from(bodyTypeSelect.options).forEach(option => {
                if (option.value !== '') {
                    option.style.display = 'block';
                }
            });
        } else {
            // Filter body types by district
            Array.from(bodyTypeSelect.options).forEach(option => {
                if (option.value === '') {
                    option.style.display = 'block';
                } else {
                    const optionDistrict = option.getAttribute('data-district');
                    if (optionDistrict === districtId) {
                        option.style.display = 'block';
                    } else {
                        option.style.display = 'none';
                        // Deselect if hidden
                        if (option.value === selectedBodyId) {
                            bodyTypeSelect.value = '';
                        }
                    }
                }
            });
        }
    });
    
    // Trigger on page load to ensure proper filtering if district is pre-selected
    document.addEventListener('DOMContentLoaded', function() {
        const districtSelect = document.getElementById('district_id');
        if (districtSelect.value) {
            districtSelect.dispatchEvent(new Event('change'));
        }
    });
</script>
@endsection