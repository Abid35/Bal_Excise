@extends('layouts.dash')

@section('content')
<div class="right_col" role="main">
    <div class="container-fluid">
        <div class="row">
             <div class="col-md-4">
                <h3 class="strong">Voucher Reports</h3>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('reports.generate') }}" method="Get" id="reportForm">
                            <!-- @csrf -->
                            <div class="row">
                                <div class="col-md-12" style="margin-bottom: 15px;">
                                    <div class="form-group">
                                        <label style="display: block; margin-bottom: 10px; font-weight: bold;">Report Type:</label>
                                        <div class="radio-inline" style="margin-right: 30px;">
                                            <label style="font-weight: normal; cursor: pointer;">
                                                <input type="radio" name="report_type" value="vehicle" 
                                                    {{ old('report_type', $reportType ?? 'challan') == 'vehicle' ? 'checked' : '' }}>
                                                <span style="margin-left: 5px;">Vehicle Registration District</span>
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label style="font-weight: normal; cursor: pointer;">
                                                <input type="radio" name="report_type" value="challan" 
                                                    {{ old('report_type', $reportType ?? 'challan') == 'challan' ? 'checked' : '' }}>
                                                <span style="margin-left: 5px;">Challan Paid District</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date">Select Date</label>
                                        <input type="date" class="form-control" id="date" name="date" 
                                               value="{{ old('date', $selectedDate ?? '') }}">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="district_id">District</label>
                                        <select class="form-control" id="district_id" name="district_id">
                                            <option value="">-- All Districts --</option>
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}" 
                                                    {{ (old('district_id', $selectedDistrictId ?? '') == $district->id) ? 'selected' : '' }}>
                                                    {{ $district->eto_location }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="registration_no">Registration No</label>
                                        <input type="text" class="form-control" id="registration_no" 
                                               name="registration_no" placeholder="e.g., TAP530"
                                               value="{{ old('registration_no', $selectedRegNo ?? '') }}"
                                               style="text-transform: uppercase;">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <div class="btn-group btn-block">
                                            <button type="submit" class="btn btn-primary" style="width: 70%;">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                            <a href="{{ route('reports.index') }}" class="btn btn-default" style="width: 30%;">
                                                <i class="fa fa-refresh"></i> Clear
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if(isset($selectedDate) || isset($selectedDistrictId) || isset($selectedRegNo))
                <!-- Report Panel - Show only when filtered -->
                <div class="panel panel-default">
                    <!-- NBP Header -->
                    <div class="panel-heading" style="background: linear-gradient(to bottom, #f8f9fa 0%, #e9ecef 100%); border-bottom: 3px solid #999;">
                        <div class="row">
                            <div class="col-md-8">
                                <div style="display: flex; align-items: center;">
                                    <div>
                                        <h3 style="margin: 0; color: #060707ff; font-weight: bold;">NATIONAL BANK OF PAKISTAN</h3>
                                        <h4 style="margin: 5px 0 0 0; color: #333; font-style: italic;">
                                            {{ isset($selectedDistrict) ? strtoupper($selectedDistrict) : 'ALL DISTRICTS' }} BRANCH 
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-right">
                                <h4 style="margin: 10px 0; color: #333; font-weight: bold;">
                                    {{ isset($selectedDate) ? date('d/m/Y', strtotime($selectedDate)) : date('d/m/Y') }}
                                </h4>
                                <form action="{{ route('reports.export') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="date" value="{{ $selectedDate ?? '' }}">
                                    <input type="hidden" name="district_id" value="{{ $selectedDistrictId ?? '' }}">
                                    <input type="hidden" name="registration_no" value="{{ $selectedRegNo ?? '' }}">
                                    <input type="hidden" name="report_type" value="{{ $reportType ?? 'challan' }}">
                                    <button type="submit" class="btn btn-success btn-lg" {{ count($reportData ?? []) == 0 ? 'disabled' : '' }}>
                                        <i class="fa fa-file-excel-o"></i> Export to Excel
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="text-center" style="margin-top: 15px; padding: 10px; background-color: rgba(40, 167, 69, 0.1); border-radius: 5px;">
                            <h4 style="margin: 0; font-weight: bold; color: #333; text-transform: uppercase;">
                                EXCISE & TAXATION VEHICLES CHALLAN OF NBP {{ isset($selectedDistrict) ? strtoupper($selectedDistrict) : 'ALL DISTRICTS' }} BRANCH
                            </h4>
                            <br>
                                <small style="font-size: 14px; color: #666;">
                                    ({{ isset($reportType) && $reportType == 'vehicle' ? 'Vehicle Registration District' : 'Challan Paid District' }})
                                </small>
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
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">Owner Name</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">CNIC</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">District</th>
                                    <!-- Provincial Tax group -->
                                    <th colspan="18" class="text-center" style="vertical-align: middle;">Provincial Taxes</th>

                                    <!-- Federal Tax group -->
                                    <th colspan="6" class="text-center" style="vertical-align: middle;">Federal/CVT Tax</th>

                                    <!-- Total -->
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; min-width: 120px;">TOTAL</th>
                                </tr>

                                <tr>
                                    <!-- Provincial Tax columns -->
                                    <th class="text-center" style="min-width: 120px;">Computerized Plate Fee</th>
                                    <th class="text-center" style="min-width: 100px;">Personalize Book Fee</th>
                                    <th class="text-center" style="min-width: 100px;">Computerized Book Fee</th>
                                    <th class="text-center" style="min-width: 100px;">Security Feature No. Plate Fee</th>
                                    <th class="text-center" style="min-width: 100px;">Transfer Fee</th>
                                    <th class="text-center" style="min-width: 80px;">Duplicate Book Fee</th>
                                    <th class="text-center" style="min-width: 100px;">Arrival Fee</th>
                                    <th class="text-center" style="min-width: 100px;">No Objection Certificate Fee</th>
                                    <th class="text-center" style="min-width: 100px;">File Return Fee</th>
                                    <th class="text-center" style="min-width: 100px;">Alteration Fee</th>
                                    <th class="text-center" style="min-width: 100px;">Hire Purchase Deletion Fee</th>
                                    <th class="text-center" style="min-width: 100px;">Surcharge</th>
                                    <th class="text-center" style="min-width: 100px;">Late Payment Surcharge</th>
                                    <th class="text-center" style="min-width: 100px;">Registration Fee</th>
                                    <th class="text-center" style="min-width: 100px;">Token Tax</th>
                                    <th class="text-center" style="min-width: 100px;">Professional Tax</th>
                                    <th class="text-center" style="min-width: 100px;">Late Registration Fee</th>
                                    <th class="text-center" style="min-width: 100px;">Smartcard Fee</th>

                                    <!-- Federal Tax columns -->
                                    <th class="text-center" style="min-width: 100px;">Federal Tax 231b(1)</th>
                                    <th class="text-center" style="min-width: 100px;">Federal Tax 231b(3)</th>
                                    <th class="text-center" style="min-width: 100px;">Federal Tax 231 2A</th>
                                    <th class="text-center" style="min-width: 100px;">Federal Tax 231b(2)</th>
                                    <th class="text-center" style="min-width: 100px;">Federal Tax 234</th>
                                    <th class="text-center" style="min-width: 100px;">Capital Value Tax</th>
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
                                        <td style="vertical-align: middle; padding-left: 8px;">
                                            {{ $row['owner_name'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['cnic'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-family: monospace;">
                                            {{ $row['district'] ?? 'N/A' }}
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['computerized_plate_fee']) && $row['computerized_plate_fee'] > 0)
                                                {{ number_format($row['computerized_plate_fee'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['personalize_book_fee']) && $row['personalize_book_fee'] > 0)
                                                {{ number_format($row['personalize_book_fee'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['computerized_book_fee']) && $row['computerized_book_fee'] > 0)
                                                {{ number_format($row['computerized_book_fee'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['security_feature_no._plate_fee']) && $row['security_feature_no._plate_fee'] > 0)
                                                {{ number_format($row['security_feature_no._plate_fee'], 0) }}
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
                                            @if(isset($row['duplicate_book_fee']) && $row['duplicate_book_fee'] > 0)
                                                {{ number_format($row['duplicate_book_fee'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['arrival_fee']) && $row['arrival_fee'] > 0)
                                                {{ number_format($row['arrival_fee'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['no_objection_certificate_fee']) && $row['no_objection_certificate_fee'] > 0)
                                                {{ number_format($row['no_objection_certificate_fee'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['file_return_fee']) && $row['file_return_fee'] > 0)
                                                {{ number_format($row['file_return_fee'], 0) }}
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
                                            @if(isset($row['hire_purchase_deletion_fee']) && $row['hire_purchase_deletion_fee'] > 0)
                                                {{ number_format($row['hire_purchase_deletion_fee'], 0) }}
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
                                            @if(isset($row['late_payment_surcharge']) && $row['late_payment_surcharge'] > 0)
                                                {{ number_format($row['late_payment_surcharge'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['registration_fee']) && $row['registration_fee'] > 0)
                                                {{ number_format($row['registration_fee'], 0) }}
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
                                            @if(isset($row['professional_tax']) && $row['professional_tax'] > 0)
                                                {{ number_format($row['professional_tax'], 0) }}
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
                                            @if(isset($row['smartcard_fee']) && $row['smartcard_fee'] > 0)
                                                {{ number_format($row['smartcard_fee'], 0) }}
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
                                            @if(isset($row['fedral_tax_231_2A']) && $row['fedral_tax_231_2A'] > 0)
                                                {{ number_format($row['fedral_tax_231_2A'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['fedral_tax_231b(2)']) && $row['fedral_tax_231b(2)'] > 0)
                                                {{ number_format($row['fedral_tax_231b(2)'], 0) }}
                                            @else
                                                <span style="color: #999;">-</span>
                                            @endif
                                        </td>
                                        <td class="text-right" style="vertical-align: middle; font-family: monospace;">
                                            @if(isset($row['fedral_tax_234']) && $row['fedral_tax_234'] > 0)
                                                {{ number_format($row['fedral_tax_234'], 0) }}
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
                            <tfoot style="background-color: #999; color: white; font-weight: bold; font-size: 14px;">
                                <tr>
                                    <td colspan="5" class="text-right" style="vertical-align: middle; padding: 12px;">
                                        <strong>TOTAL</strong>
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['computerized_plate_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['personalize_book_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['computerized_book_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['security_feature_no._plate_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['transfer_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['duplicate_book_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['arrival_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['no_objection_certificate_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['file_return_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['alteration_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['hire_purchase_deletion_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['surcharge'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['late_payment_surcharge'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['registration_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['token_tax'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['professional_tax'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['late_registration_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['smartcard_fee'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['fedral_tax_231b(1)'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['fedral_tax_231b(3)'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['fedral_tax_231_2A'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['fedral_tax_231b(2)'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['fedral_tax_234'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace;">
                                        {{ isset($totals) ? number_format($totals['capital_value_tax'] ?? 0, 0) : '0' }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; padding: 12px; font-family: monospace; font-size: 16px; background-color: #999;">
                                        {{ isset($totals) ? number_format($totals['total'] ?? 0, 0) : '0' }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Footer with Bank Details - Show only when data exists -->
                    @if(count($reportData ?? []) > 0)
                    <div class="panel-footer" style="background-color: #f8f9fa; padding: 20px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div style="border: 2px solid #090a09ff; padding: 15px; border-radius: 5px; background-color: white;">
                                    <p style="margin: 5px 0; font-family: monospace;">
                                        <strong>P1:</strong>
                                        <span style="font-family: monospace; font-size: 22px; font-weight: bold;">
                                            <td>{{ isset($totals) ? number_format($totals['p1'] ?? 0, 0) : '0' }}</td>
                                        </span>
                                    </p>
                                    <p style="margin: 5px 0; font-family: monospace;">
                                        <strong>F1:</strong>
                                        <span style="font-family: monospace; font-size: 22px; font-weight: bold;">
                                            <td>{{ isset($totals) ? number_format($totals['f1'] ?? 0, 0) : '0' }}</td>
                                        </span>
                                    </p>
                                    <p style="margin: 15px 0 5px 0; font-size: 18px; color: #090a09ff;">
                                        <strong>GRAND TOTAL:</strong> 
                                        <span style="font-family: monospace; font-size: 22px; font-weight: bold;">
                                             {{ isset($totals) ? number_format($totals['gt'] ?? 0, 0) : '0' }}
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
    document.getElementById('registration_no').addEventListener('input', function(e) {
        e.target.value = e.target.value.toUpperCase();
    });
    
    document.querySelector('form[action="{{ route('reports.export') }}"]')?.addEventListener('submit', function(e) {
        if (!confirm('Are you sure you want to export this report to Excel?')) {
            e.preventDefault();
        }
    });
</script>
@endsection