@extends('layouts.dash')



@section('content')



    <!-- page content -->

    <div class="right_col" role="main">

        <div class="">

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">


                    <div class="topTabsSection">

                        <div class="headingDiv">

                            <h2>Add New Voucher</h2>

                        </div>

                    </div>

                    <div class="panel panel-default mb-50">

                        <!--<div class="panel-heading NewVoucher_panelHeading">-->


                        <!--</div>-->

                        <div class="panel-body">

                            @php($tax=App\Models\fees::all())


                            <div class="row form-group">

                                <div class="row form-group">

                                    <div class="col-md-4">

                                    </div>

                                    <div class="col-md-8">

                                        <span id="DivisionRegion" style="color:red;display:none"></span>

                                    </div>

                                </div>

                                <div class="col-md-5">

                                    <div class="row">

                                        <div class="col-md-5"><label>District</label></div>

                                        <div class="col-md-7">

                                            <select class="form-control" id="DistrictID" name="DistrictID">

                                            </select>

                                            <input type="hidden" name="District" id="District" value=""/>

                                        </div>


                                    </div>

                                </div>
                                <div class="col-md-5">

                                    <div class="row">

                                        <div class="col-md-5"><label>Registration No</label></div>

                                        <div class="col-md-7"><input type="text" id="RegistrationNo"
                                                                     class="form-control"/></div>

                                    </div>

                                </div>
                                <div class="col-md-2">

                                    <input type="button" class="btn btnSearch" id="Search" value="Search"
                                           onclick="SearchFor()"/>

                                    <input type="button" class="btn btnSearch" id="Clear" value="Clear"/>

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-5"><label> Date of Registration </label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="date_of_registration" class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-5"><label> Second Date of Registration </label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="second_date_of_registration" class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-5"><label>Category</label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="Category" class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-5"><label>Last Paid Tax Amount</label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="LastPaidAmount" class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                            </div>

                            <input type="hidden" id="FeeAmountHI"/>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <div class="row">

                                        <div class="col-md-5"><label>Body Type</label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="BodyType" class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-5"><label>Renewed Upto</label></div>

                                        <div class="col-md-7"><input type="text" id="RenewUpto" class="form-control"/>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-5"><label>Owner Name</label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="OwnerName" class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-5"><label>CNIC</label></div>

                                        <div class="col-md-7"><input type="text" id="CNIC" class="form-control"/></div>

                                    </div>

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-5"><label>Mobile Number</label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="MobileNumber" class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-5"><label>Last Tax Paid Upto</label></div>

                                        <div class="col-md-7"><input type="text" id="LastPaidYear"
                                                                     class="form-control"/></div>

                                    </div>

                                </div>
                            </div>

                            <hr/>

                            <div class="row form-group">
                                <div class="col-md-4">

                                    <div class="row">

                                        <div class="col-md-5"><label>Engine CC</label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="EngineNo" class="form-control"/>
                                            <input type="hidden" id="EngineNo_" class="form-control" name="EngineNo_"/>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="row">

                                        <div class="col-md-5"><label>
                                                Max Laden Weight</label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="UnladenWeight" name="UnladenWeight"
                                                   class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="row">

                                        <div class="col-md-5"><label>Seating Capacity </label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="SeatingCapacity" class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-4">

                                    <div class="row">

                                        <div class="col-md-5"><label>Class of Vehicle</label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="Class" class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="row">

                                        <div class="col-md-5"><label>Cost</label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="Cost" class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="row">

                                        <div class="col-md-5"><label>Wheel Base </label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="WheelBox" class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-4">

                                    <div class="row">

                                        <div class="col-md-5"><label>Book Serial No</label></div>

                                        <div class="col-md-7">

                                            <input type="text" id="BookSerialNo" class="form-control"/>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="row">

                                        <div class="col-md-5"><label>Chassis No</label></div>

                                        <div class="col-md-7"><input type="text" id="ChassisNo" class="form-control"/>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="row">

                                        <div class="col-md-5"><label>Model </label></div>

                                        <div class="col-md-7"><input type="text" id="model" class="form-control"/></div>

                                    </div>

                                </div>
                            </div>



                                <form action="{{route('old_record')}}" method="post">


                                    @csrf
                                    <input type="hidden" name="Reg_id" id="Reg_id"/>


                                    <h4 class="h4Vouchr">Motor MV / Road Tax </h4>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table tbl" id="maintabl1">
                                                <thead>
                                                <tr>
                                                    <th>Tax</th>
                                                    <th></th>
                                                    <th class="wdth20"> From</th>
                                                    <th class="wdth20"> T0</th>
                                                    <th class="wdth20">Duration</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><label id="TAX_NAME">Amount</label></td>
                                                    <td>
                                                        <input type="number" class="form-control wdth60 FeeType16"
                                                               name="FeeType16" id="FeeType16" value=""
                                                               style="width: 250px;"/>
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control wdth60" id="YearsFrom"
                                                               name="TaxApplicableYearsFrom" style="width: auto;"
                                                               onblur="ValidateDateFormat()"/>
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control wdth60" id="YearsTo"
                                                               name="TaxApplicableYearsTo" style="width: auto;"
                                                               onblur="ValidateDateFormatFrom()"/>
                                                    </td>
                                                    <td>
                                                        <select Id="DurationID" class="form-control" id="CollectionType"
                                                                name="CollectionType" style="width: 100%;">
                                                            <option value="">Select Duration</option>
                                                            <option value="10">Per Year</option>
                                                            <option value="11">Per Quarter</option>
                                                            <option value="13">Semi Annual</option>
                                                            <option value="16">Life Time</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-offset-6 col-md-6" id="divNextDateForTax">
                                            <div class="row form-group">
                                                <div class="col-md-5"></div>
                                                <div class="col-md-7">
                                                    <label class="wdth40">Next Date For Tax</label>
                                                    <input type="date" class="form-control wdth60" id="NextDateForTax"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- <h4 class="h4Vouchr">Last Tax Paid</h4> -->
                                    <br>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-5"><label>Challan no</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" id="challan" name="challan"
                                                           class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-5"><label>Last Tax Paid Upto</label></div>
                                                <div class="col-md-7"><input type="date" id="LastPaidYear_"
                                                                             name="LastPaidYear_" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-5"><label>Filer / Non Filer</label></div>
                                                <div class="col-md-7">
                                                    <select class="form-control" id="filer" name="filer">
                                                        <option value="">--Select Filer / Non Filer--</option>
                                                        <option value="Filer">yes</option>
                                                        <option value="Non Filer">no</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="h4Vouchr">Bank Details</h4>
                                    <br>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-5"><label>Bank Name</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" id="bank_name" name="bank_name"
                                                           class="form-control" placeholder="Enter Bank Name"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-5"><label>Branch Name</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" id="branch_name" name="branch_name" class="form-control" placeholder="Enter Bank Branch"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-5"><label>Payment Date</label></div>
                                                <div class="col-md-7">
                                                    <input type="date" id="payment_date" name="payment_date" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="h4Vouchr">Fees Details</h4>

                                    <div class="container">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a href="#info" role="tab" data-toggle="tab"
                                                   class="nav-link active"> Provincial </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#ratings" role="tab" data-toggle="tab"
                                                   class="nav-link"> Federal </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" role="tabpanel" id="info">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table tbl" id="feeTable">
                                                            <thead>
                                                            <tr>
                                                                <th class="wdth30 text-center">No</th>
                                                                <th class="wdth20 text-center">Fees Type</th>
                                                                <th class="wdth30 text-center">Amount</th>
                                                                <th></th>
                                                            </thead>
                                                            <tbody id="adddown">
                                                            @php($i=1)
                                                            @foreach($tax as $t)
                                                                @unless(in_array($t->id, [16, 17, 18, 21, 22, 23, 24]))
                                                                    <tr class="Fees">
                                                                        <td class="text-center">
                                                                            <label>{{$i++}}</label>
                                                                        </td>
                                                                        <td><label>{{$t->title}}</label></td>
                                                                        <td class="text-center">
                                                                            <input type="number"
                                                                                   class="form-control wdth60 FeeType{{$t->id}}"
                                                                                   name="FeeType{{$t->id}}"
                                                                                   id="FeeType{{$t->id}}"
                                                                                   value="" style="width: 250px;"/>
                                                                        </td>
                                                                    </tr>
                                                                @endunless
                                                            @endforeach

                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="ratings">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table tbl" id="feeTable">
                                                            <thead>
                                                            <tr>
                                                                <th class="wdth30 text-center">No</th>
                                                                <th class="wdth20 text-center">Fees Type</th>
                                                                <th class="wdth30 text-center">Amount</th>
                                                                <th></th>
                                                            </thead>
                                                            <tbody id="adddown">
                                                            @php($i=1)
                                                            @foreach($tax as $t)
                                                                @if(in_array($t->id, [17, 18, 21, 22, 23, 24]))
                                                                    <tr class="Fees">
                                                                        <td class="text-center">
                                                                            <label>{{$i++}}</label>
                                                                        </td>
                                                                        <td><label>{{$t->title}}</label></td>
                                                                        <td class="text-center">
                                                                            <input type="number"
                                                                                   class="form-control wdth60 FeeType{{$t->id}}"
                                                                                   name="FeeType{{$t->id}}"
                                                                                   id="FeeType{{$t->id}}"
                                                                                   value="" style="width: 250px;"/>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach


                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>
                                            </div>

                                            <h4 class="h4Vouchr">Arrears</h4>

                                            {{--arrears--}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table tbl" id="maintabl">
                                                        <thead>
                                                        <tr>
                                                            <th class="wdth20">No</th>
                                                            <th class="wdth20">Arrear GovType</th>
                                                            <th class="wdth20">Arrear Type</th>
                                                            <th class="wdth20"> From</th>
                                                            <th class="wdth20"> T0</th>
                                                            <th class="wdth20">Arrear Amount </th>
                                                            <th class="wdth20">Duration</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr class="iterate0">
                                                            <td><label>1</label></td>
                                                            <td>
                                                                <select Id="Gov" class="form-control Gov" id="ID" name="arrears_govt_type[]" style="width: 100%;" onchange="GovSelect(0 , 'arrear')"><option value='0'>Select Gov</option>
                                                                    <option value="1">Provincial</option>
                                                                    <option value="2">Federal</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control TaxType" id="TaxType" name="arrears_type[]"><option value='0' >--Select TaxType--</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="date" class="form-control wdth60 ArrearYearsFrom" id="ArrearYearsFrom" name="arrears_from[]" style="width: auto;" onblur="ValidateDateFormat()" />
                                                            </td>
                                                            <td>
                                                                <input type="date" class="form-control wdth60 ArrearYearsTo" id="ArrearYearsTo" name="arrears_to[]" style="width: auto;" onblur="ValidateDateFormatFrom()" />
                                                            </td>
                                                            <td>
                                                                <input type="Number" id="Charges"  class="form-control Charges" name="arrears_amount[]" min="0"/>
                                                            </td>
                                                            <td>
                                                                <select Id="ArrearDurationID" class="form-control ArrearDurationID"  name="arrears_duration[]" style="width: 100%;" onchange="ArrearDuration(0)"><option value="">Select Duration</option>
                                                                    <option value="10">Per Year</option>
                                                                    <option value="11">Per Quarter</option>
                                                                    <option value="13">Semi Annual</option>
                                                                    <option value="16">Life Time</option>
                                                                </select>
                                                            </td>
                                                            <!--<td>-->
                                                            <!--</td>-->
                                                            <td>
                                                                <button id="addmore"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6 text-center">
                                            <input type="button" class="btn btnCancel" value="CANCEL"
                                                   onclick="clearFields('Cancel')"/>
                                            <button type="submit" class="btn btnCustom" id="btnCustom">SAVE</button>
                                        </div>

                                    </div>
                                </form>


                            </div>

                        </div>


                        @php($dis= App\Models\tax_disable::all() )
                        @foreach($dis as $d)
                            <script>
                                $(document).ready(function () {

                                    $("#tax{{$d->oncheck_tax}}").change(function () {
                                        var $input = $(this);

                                        if ($input.is(":checked")) {
                                            $("#tax{{$d->disabled_tax}}").attr("disabled", true);
                                            $("#tax{{$d->disabled_tax}}").prop("checked", false);
                                        } else {
                                            $("#tax{{$d->disabled_tax}}").attr("disabled", false);
                                        }

                                    }).change();


                                });
                            </script>

                        @endforeach


                        <script>

                            function RedirecttoIndex() {

                                window.location.href = "/DEO/Voucher"

                            }

                            $("input[type='radio'][name='optradio']").click(function () {
                                var value = $(this).val();
                                if (value == 'cc_lifetime') {
                                    $('#tax_dur23').val(16);
                                } else {
                                    $('#tax_dur23').val(0);
                                }
                            });

                            $("#tax_dur23").change(function () {
                                var value = $(this).val();

                                if (value == 16) {
                                    $("input[type='radio'][name='optradio']").filter('[value=cc_lifetime]').prop('checked', true);
                                } else {
                                    $("input[type='radio'][name='optradio']").filter('[value=cc_lifetime]').prop('checked', false);
                                }
                            });

                            function GovSelect(id, type) {


                                if (type == "arrear") {
                                    var govID = $(".iterate" + id).find('.Gov', this).val();

                                    $.ajax({

                                        url: '/DEO/GetTaxTypeName',

                                        type: "GET",

                                        dataType: "JSON",

                                        data: {ID: govID},

                                        success: function (response) {

                                            if (response.Status) {

                                                if (typeof response.Data != 'undefined' && response.Data != null && response.Data != 0) {

                                                    $(".iterate" + id).find('.TaxType', this).empty();

                                                    $(".iterate" + id).find('.TaxType', this).append("<option value='0'>--Select TaxFeeType--</option>");

                                                    $.each(response.Data, function (index, value) {

                                                        $(".iterate" + id).find('.TaxType', this).append('<option value="' + value.title + '">' + value.title + '</option>');

                                                    });

                                                } else {

                                                }

                                            }

                                        },

                                    });
                                } else if (type == "adjustment") {
                                    var govID = $(".Adjustmentiterate" + id).find('.AdjustmentGov', this).val();

                                    $.ajax({

                                        url: '/DEO/GetTaxTypeName',

                                        type: "GET",

                                        dataType: "JSON",

                                        data: {ID: govID},

                                        success: function (response) {

                                            if (response.Status) {

                                                if (typeof response.Data != 'undefined' && response.Data != null && response.Data != 0) {

                                                    $(".Adjustmentiterate" + id).find('.AdjustmentTaxType', this).empty();

                                                    $(".Adjustmentiterate" + id).find('.AdjustmentTaxType', this).append("<option value='0'>--Select TaxFeeType--</option>");

                                                    $.each(response.Data, function (index, value) {

                                                        $(".Adjustmentiterate" + id).find('.AdjustmentTaxType', this).append('<option value="' + value.id + '">' + value.title + '</option>');

                                                    });

                                                } else {

                                                }

                                            }

                                        },

                                    });
                                }
                            };


                            $(document).ready(function () {


                                $("#District").prop("disabled", true)

                                $("#VehicleName").prop("disabled", true)

                                $("#Category").prop("disabled", true)

                                $("#Class").prop("disabled", true)

                                $("#BodyType").prop("disabled", true)

                                $("#OwnerName").prop("disabled", true)

                                $("#CNIC").prop("disabled", true)

                                $("#MobileNumber").prop("disabled", true)

                                $("#LastPaidYear").prop("disabled", true)

                                $("#LastPaidAmount").prop("disabled", true)

                                $("#LastPaidYear").prop("disabled", true)

                                $("#RenewUpto").prop("disabled", true)

                                //$("#DurationID").prop("disabled",true)

                                $('#filler').attr('checked', true);

                                $('#company').attr('checked', true);

                                $('#ac').attr('checked', true);

                                $("#TaxAmount").prop("disabled", true)

                                $("#TotalAmount").prop("disabled", true)

                                $("#ChassisNo").prop("disabled", true)

                                $("#model").prop("disabled", true)

                                $("#EngineNo").prop("disabled", true)

                                $("#removeFee").prop("disabled", true)

                                $("#btnCustom").prop("disabled", true)

                                $('#date_of_registration').prop("disabled", true);
                                $('#second_date_of_registration').prop("disabled", true);
                                $('#BookSerialNo').prop("disabled", true);
                                $('#WheelBox').prop("disabled", true);
                                $('#Cost').prop("disabled", true);
                                $('#Class').prop("disabled", true);
                                $('#SeatingCapacity').prop("disabled", true);
                                $('#UnladenWeight').prop("disabled", true);


                                $('#divNextDateForTax').css('display', 'none');

                                //LoadYears();

                                LoadDivisions();

                                //LoadSlabs();

                                // LoadGov();

                                var value = $('#RecordId').val();

                                if (value != "") {

                                    // GetData(value);

                                    //GetDocumentData(value);

                                    //$("#Operation").attr("onclick", "SaveTaxInfo()").unbind("click");

                                    //$("#Operation").attr("onclick", "UpdateTaxInfo()").bind("click");

                                    //$("#Operation").text('Update');

                                }

                            });

                            $("#CategoryID").change(function () {

                                var CategoryID = $("#CategoryID").val();

                                if (CategoryID == "10") {

                                    $("#VehicleType").css("display", "block");

                                    $("#LeadenWeight").css("display", "block");

                                } else {

                                    $("#VehicleType").css("display", "none");

                                    $("#LeadenWeight").css("display", "none");

                                }

                                if (CategoryID == "11") {

                                    $("#SubType").css("display", "block");

                                    $("#SeatingCapacity").css("display", "none");

                                    $("#LeadenWeight").css("display", "none");

                                } else {

                                    $("#SubType").css("display", "none");

                                }

                                $("#SelectVehicleType").change(function () {

                                    $('#VehicleName option').remove();

                                    var VehicleType = $("#SelectVehicleType").val();

                                    if (VehicleType == 'Trailer') {

                                        $("#LeadenWeight").css("display", "block");

                                    } else {

                                        $("#LeadenWeight").css("display", "none");

                                    }

                                    if (VehicleType == 'Public Transport') {

                                        $("#SeatingCapacity").css("display", "block");

                                    } else {

                                        $("#SeatingCapacity").css("display", "none");

                                    }

                                    var VehicleType = $("#SelectVehicleType").val();

                                    var categoryID = $("#CategoryID").val();

                                    $.ajax({

                                        url: "/DEO/LoadVehicle",

                                        type: "GET",

                                        dataType: "JSON",

                                        data: {categoryID: categoryID, VehicleType: VehicleType},

                                        success: function (response) {

                                            if (response.Status == true) {

                                                if (typeof response != 'undefined' && response != null && response != 0) {

                                                    $('#VehicleName').empty();

                                                    $('#VehicleName').append("<option value='0'>--Select Vehicle--</option>");

                                                    $.each(response.Data, function (index, value) {

                                                        $('<option value="' + value.ID + '">' + value.Name + '</option>').appendTo('#VehicleName');

                                                    });

                                                } else {

                                                    $('#VehicleName option').remove();

                                                }

                                            }

                                        },

                                        error: function (response) {

                                        }

                                    });

                                });

                            });

                            function LoadYears() {

                                //Reference the DropDownList.

                                var YearsFrom = document.getElementById("YearsFrom");

                                var YearsTo = document.getElementById("YearsTo");

                                //Determine the Current Year.

                                var currentYear = (new Date()).getFullYear();

                                var starting = 1950;

                                //Loop and add the Year values to DropDownList.

                                for (var i = starting; i <= currentYear + 1; i++) {

                                    var option = document.createElement("OPTION");

                                    option.innerHTML = i;

                                    option.value = i;

                                    YearsFrom.appendChild(option);

                                }

                                var currentYear = (new Date()).getFullYear();

                                var starting = 1950;

                                //Loop and add the Year values to DropDownList.

                                for (var i = starting; i <= currentYear + 1; i++) {

                                    var option = document.createElement("OPTION");

                                    option.innerHTML = i;

                                    option.value = i;

                                    YearsTo.appendChild(option);

                                }

                            }

                            $("#Clear").click(function () {

                                $('#tax231b').prop('checked', false);

                                $('#tax231').prop('checked', false);

                                $('#tax231b').prop('disabled', false);

                                $('#tax231').prop('disabled', false);

                                $('#tax2312A').prop('disabled', false);

                                $('#comnumberplate').prop('checked', false);

                                $('#numberplate').prop('checked', false);

                                $('#combookfee').prop('checked', false);

                                $('#bookFees').prop('checked', false);

                                $('#comnumberplate').prop('disabled', false);

                                $('#numberplate').prop('disabled', false);

                                $('#combookfee').prop('disabled', false);

                                $('#bookFees').prop('disabled', false);

                                $(".pyear").prop('disabled', false);

                                $(".pselect").prop('disabled', false);

                                // $("#feeTable tbody").find("tr:gt(0)").remove();

                                $("#maintabl tbody").find("tr:gt(0)").remove();

                                $("#Search").prop('disabled', false);

                                $('#DistrictID').removeClass('error');

                                $('#RegistrationNo').removeClass('error');

                                // $("#DistrictID").val('0');

                                // $("#RegistrationNo").val('');

                                $("#District").val('');

                                $("#VehicleName").val('');

                                $("#Category").val('');

                                $("#Class").val('');

                                $("#Status").text('Status');

                                $("#BodyType").val('');

                                $("#OwnerName").val('');

                                $("#CNIC").val('');

                                $("#MobileNumber").val('');

                                $("#LastPaidYear").val('');

                                $("#RenewUpto").val('');

                                $("#LastPaidAmount").val('');

                                $("#DurationID").val('');

                                $("#TaxAmount").val('');

                                $(".FeeType4").val('');

                                $('#YearsFrom').val('');

                                $('#ChassisNo').val('');

                                $('#EngineNo').val('');

                                $('#YearsTo').val('');

                                $(".ProvincialFeeAmount").val('');

                                $("#ProvincialAmount").html('');

                                $("#ProfessionalAmount2").html('');

                                $("#FederalAmount").html('');

                                $("#FeeAmount").html('');

                                $("#TaxAmount").val(0);

                                $("#TotalAmount").val(0);

                                $("#SeatingCapacity").val('');

                                $("#UnladenWeight").val('');

                                $("#BookSerialNo").val('');

                                $("#date_of_registration").val('');


                                totalAmount = 0;

                                TaxAmount = 0;

                            });


                        </script>


                        <script>

                            function LoadDivisions() {

                                $.ajax({

                                    type: "Get",

                                    contentType: 'application/json; charset=utf-8',

                                    url: "/DEO/LoadETOLoction",

                                    dataType: 'json',

                                    success: function (response) {

                                        //removeOptions(document.getElementById("slabID"));

                                        if (response.Status == true) {

                                            if (typeof response != 'undefined' && response != null && response != 0) {

                                                $('#DistrictID').empty();

                                                $('#DistrictID').append("<option value='0'>--Select Division--</option>");

                                                $.each(response.Data, function (index, value) {

                                                    $('<option value="' + value.id + '">' + value.eto_location + '</option>').appendTo('#DistrictID');

                                                });

                                            } else {

                                            }

                                        } else {

                                        }

                                    },

                                    error: function (response) {

                                        console.log(response.msg);

                                        swal("Something went wrong");

                                    }

                                });

                            }

                        </script>


                        <script>

                            var ProvincialList;

                            var FederalList;

                            var FeeList;

                            var temp1;

                            var temp2;

                            var temp1;

                            var totalAmount = 0;

                            var TaxAmount = 0;

                            function SearchFor() {

                                //       debugger


                                $("#TaxAmount").val('');

                                $("#Charges").val('');

                                var District = $('#DistrictID ').val();

                                var Regno = $('#RegistrationNo').val();


                                var check = true;

                                if (District == null || District == "") {

                                    $('#DistrictID').addClass('error');

                                    check = false;

                                }

                                if (Regno == null || Regno == "") {

                                    $('#RegistrationNo').addClass('error');

                                    check = false;

                                }

                                if (check == false) {

                                    swal("Please fill the search criteria.");

                                    $("#DistrictID").val('');

                                    $("#RegistrationNo").val('');

                                    $("#District").val('');

                                    $("#VehicleName").val('');

                                    $("#Category").val('');

                                    $("#Class").val('');

                                    $("#BodyType").val('');

                                    $("#OwnerName").val('');

                                    $("#CNIC").val('');

                                    $("#MobileNumber").val('');

                                    $("#LastPaidYear").val('');

                                    $("#RenewUpto").val('');

                                    $("#LastPaidAmount").val('');

                                    $("#DurationID").val('');

                                    $("#TaxAmount").val('');

                                    $('#date_of_registration').val('');
                                    $('#second_date_of_registration').val('');

                                    $('#BookSerialNo').val('');
                                    $('#WheelBox').val('');
                                    $('#Cost').val('');
                                    $('#Class').val('');
                                    $('#SeatingCapacity').val('');
                                    $('#UnladenWeight').val('');

                                    //    $("#DivisionRegion").css("display", "block");

                                    //    $("#DivisionRegion").html("Please fill the required field(s)").css("font-size","large");

                                    return false;

                                } else {

                                    //$("#DivisionRegion").css("display", "None");

                                    $('#DistrictID').removeClass('error');

                                    $('#RegistrationNo').removeClass('error');


                                    $.ajax({

                                        type: "Get",

                                        contentType: 'application/json; charset=utf-8',

                                        url: "/DEO/getVehicleInfo",

                                        dataType: 'json',

                                        data: {RegNo: Regno, DistrictID: District},

                                        success: function (response) {

                                            // if (response.Status == true && response.VehicleInfo == null) {

                                            //     swal("Data Not Found");

                                            // }

                                            if (response.Status == true) {

                                                $('#District').val(response.Data.eto_location);

                                                $('#VehicleName').val(response.Data.class_of_vehicle);

                                                $('#Category').val(response.Data.category_of_vehicle);

                                                $('#Reg_id').val(response.Data.id);

                                                // $("#SlabID").val(response.VehicleInfo.SlabID);

                                                $('#Class').val(response.Data.class_of_vehicle);

                                                $('#BodyType').val(response.Data.tbo);

                                                $('#model').val(response.Data.year_of_manufacture);

                                                $('#Status').html(response.Data.status);

                                                if (response.Pdata == null) {
                                                    $('#OwnerName').val(response.Data.name_);
                                                    if (response.Data.new_cnic_no != null) {
                                                        $('#CNIC').val(response.Data.new_cnic_no);
                                                    } else {
                                                        $('#CNIC').val(response.Data.old_cnic_no);

                                                    }

                                                } else {
                                                    $('#OwnerName').val(response.Pdata.name);
                                                    if (response.Data.new_cnic_no != null) {
                                                        $('#CNIC').val(response.Data.new_cnic_no);
                                                    } else {
                                                        $('#CNIC').val(response.Data.old_cnic_no);

                                                    }
                                                }


                                                $('#MobileNumber').val(response.Data.mobile_no);

                                                $('#ChassisNo').val(response.Data.chassis_no);

                                                $('#EngineNo').val(response.Data.engine_capacity);

                                                $('#EngineNo_').val(response.Data.engine_no);


                                                $('#date_of_registration').val(response.Data.registration_date);
                                                $('#second_date_of_registration').val(response.Data.secondregistration_date);

                                                $('#BookSerialNo').val(response.Data.book_serialNo);
                                                $('#WheelBox').val(response.Data.wheelbox);
                                                $('#Cost').val(response.Data.vehicle_price);
                                                $('#Class').val(response.Data.class_of_vehicle);
                                                $('#SeatingCapacity').val(response.Data.seating_capacity);
                                                $('#UnladenWeight').val(response.Data.unladen_weight);
                                                $('#LastPaidAmount').val(response.Data.last_tax_paid);
                                                // $('#LastPaidYear').val(response.Data.last_tax_date);

                                                if (response?.VehicleInfo?.last_paid_year !== undefined && response.VehicleInfo.last_paid_year !== "") {
                                                    $('#LastPaidYear').val(response.VehicleInfo.last_paid_year);
                                                }


                                                $('#RenewUpto').val(response.Data.renew_date);
                                                $('#challan').val(response.challan);


                                                $("#Search").prop('disabled', true)

                                                $('#tax231b').prop('disabled', true)

                                                $('#tax231').prop('disabled', true)

                                                $('#comnumberplate').prop('disabled', true);

                                                $('#numberplate').prop('disabled', true);

                                                $('#combookfee').prop('disabled', true);

                                                $('#bookFees').prop('disabled', true);

                                                $('#tax2312A').prop('disabled', true);

                                                $(".pyear").prop('disabled', true);

                                                $(".pselect").prop('disabled', true);

                                                $("#removeFee").prop("disabled", false);

                                                $("#btnCustom").prop("disabled", false);

                                            } else {

                                                console.log(response.msg);

                                                swal(response.msg);

                                            }

                                        },

                                        error: function (response) {

                                            swal("Something went wrong");

                                        }

                                    });

                                }

                            }

                        </script>


                    </div>

                </div>

            </div>

        </div>


        <!-- /page content -->

        <!-- footer content -->


        <!-- /footer content -->

    </div>

    </div>




{{--    arrears script--}}
    <script>
        var RowCounter;

        $('#addmore').click(function (e) {
            e.preventDefault()

            $("#maintabl").each(function () {

                var rowCount = $('#maintabl tbody tr').length;

                var tds = '<tr class="iterate'+rowCount+'" >';

                jQuery.each($('tr:last td', this), function () {

                    tds += '<td>' + $(this).html() + '</td>';

                });

                tds += '</tr>';

                if ($('tbody', this).length > 0) {

                    $('tbody', this).append(tds);

                    var rowCount = $('#maintabl tbody tr').length;

                    RowCounter = rowCount;

                    $("#maintabl tr:last-child td:first-child").replaceWith("<td><label>" + rowCount + "</label></td>");
                    $("#maintabl tr:last-child td:nth-child(2)").replaceWith(`<td>

                        <select Id="Gov" class="form-control Gov" id="ID" name="arrears_govt_type[]" style="width: 100%;" onchange="GovSelect(`+ (rowCount-1) +` , 'arrear')"><option value='0'>Select Gov</option>

                            <option value="1">Provincial</option>

                            <option value="2">Federal</option>

                            </select>



                        </td>`);


                    $("#maintabl tr:last-child td:last-child").replaceWith("<td></td>");

                    $("#maintabl tr:last-child td:nth-child(7)").replaceWith(`<td><select Id="ArrearDurationID" class="form-control ArrearDurationID"  name="arrears_duration[]" style="width: 100%;" onchange="ArrearDuration(`+ (rowCount-1) +`)"><option value="">Select Duration</option>

                        <option value="10">Per Year</option>

                        <option value="11">Per Quarter</option>

                        <option value="13">Semi Annual</option>

                        <option value="16">Life Time</option>

                        </select></td>`);
                    $("#maintabl tr:last-child td:nth-child(6)").replaceWith(`<td>

                    <input type="Number" id="Charges"  class="form-control Charges" min="0" name="arrears_amount[]" onkeyup= "SaveVal(`+ (rowCount-1) +`)"/>

                    </td>`);


                } else {

                    $(this).append(tds);

                }

            });

        });
    </script>









    </body>

    </html>



@endsection
