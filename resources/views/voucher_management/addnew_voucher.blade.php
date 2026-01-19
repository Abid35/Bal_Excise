@extends('layouts.dash')



@section('content')



    <!-- page content -->

    <div class="right_col" role="main">

        <div class="">

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">


                    <style>

                        label {

                            margin: 7px 0px

                        }

                        .lblfrom, .lblto {

                            width: 30%;

                            float: left;

                        }

                        .wdth76 {

                            width: 70% !important;

                        }

                        District
                        .error {

                            border: 2px solid red !important;

                        }

                        .input-group-addon, .Remove {

                            border: none !important;

                            background-color: white !important;

                        }

                    </style>

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

                                <div class="col-md">

                                    <div class="col-md-12">
                                        <h5>Token Tax : </h5>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-12">

                                            <table class="table tbl" id="maintabl1">

                                                <thead>

                                                <tr>

                                                    <th>No</th>

                                                    <th>Tax</th>

                                                    <th class="wdth20"> From</th>

                                                    <th class="wdth20"> T0</th>

                                                    <th class="wdth20">Duration</th>


                                                </tr>

                                                </thead>

                                                <tbody>


                                                <tr>

                                                    <td>
                                                        @foreach($tax as $t)
                                                            @if($t->id==16)
                                                                <div class="col-md-6">
                                                                <!-- <div class="col-md-3 border border-secondary"> <label for="tax{{$t->id}}"> {{$t->title}}</label></div> -->
                                                                    <div class="col-md-3 border border-secondary"><input
                                                                                type="checkbox" id="tax{{$t->id}}"
                                                                                class="pselect" name="taxes[]"
                                                                                value="{{$t->id}}"></div>

                                                                </div>
                                                            @endif

                                                        @endforeach</td>

                                                    <td><label id="TAX_NAME">Token Tax</label></td>

                                                    <td>


                                                        <input type="date" class="form-control wdth60" id="YearsFrom"
                                                               style="width: auto;" onblur="ValidateDateFormat()"/>

                                                    </td>

                                                    <td>


                                                        <input type="date" class="form-control wdth60" id="YearsTo"
                                                               style="width: auto;" onblur="ValidateDateFormatFrom() "/>

                                                    </td>

                                                    <td>

                                                        <select Id="DurationID" class="form-control" id="CollectionType"
                                                                name="CollectionType" style="width: 100%;">
                                                            <option value="0">Select Duration</option>

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


                                    <div class="col-md-12">
                                        <h5>Select Taxes : </h5>
                                    </div>


                                    @foreach($tax as $t)

                                        @if($t->id==6)
                                            <div class="col-md-6">
                                                <div class="col-md-4 border border-secondary">
                                                    <label for="tax{{$t->id}}"> {{$t->title}}</label>
                                                </div>
                                                <div class="col-md-6 border border-secondary">
                                                    <select class="form-control pyear" name="tax_dur{{$t->id}}" id="tax_dur{{$t->id}}" style="width: 100%;">
                                                        <option value="0">Select Duration</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 border border-secondary">
                                                    <input type="checkbox" class="pselect" id="tax{{$t->id}}" name="taxes[]" value="{{$t->id}}">
                                                </div>
                                            </div>
                                        @endif
                                        @if($t->id==14)
                                            {{--                                        @if($t->id==23)--}}

                                            <div class="col-md-6">
                                                <div class="col-md-4 border border-secondary">
                                                    <label for="tax{{$t->id}}"> {{$t->title}}</label>
                                                </div>
                                                <div class="col-md-6 border border-secondary">
                                                    <select class="form-control pyear" name="tax_dur{{$t->id}}" id="tax_dur{{$t->id}}" style="width: 100%;">

                                                        @elseif($t->id==23)
                                                            <div class="col-md-12">
                                                                <div class="col-md-2 border border-secondary">
                                                                    <label for="tax{{$t->id}}"> {{$t->title}}</label>
                                                                </div>
                                                                <div class="col-md-4 border border-secondary">
                                                                    <select class="form-control pyear" name="tax_dur{{$t->id}}" id="tax_dur{{$t->id}}" style="width: 100%;">
                                                                        @endif

                                                                        @if($t->id==23 ||  $t->id==14 )
                                                                            <option value="0">Select Duration</option>
                                                                            <option value="10">One Quarter</option>
                                                                            <option value="13">Two Quarter</option>
                                                                            <option value="12">Three Quarter</option>
                                                                            <option value="11">One Year</option>
                                                                            @if($t->id==23)
                                                                                <option value="17">Fixed</option>
                                                                            @endif

                                                                            @if($t->id!=14)
                                                                                <option value="16">Life Time</option>
                                                                            @endif
                                                                    </select>
                                                                </div>

                                                                @if($t->id==23)

                                                                    <div class="col-md-5 border border-secondary">
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="optradio"
                                                                                   value="seat_cap" checked>Seat Cap
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="optradio"
                                                                                   value="max_lad">Max Lad
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="optradio"
                                                                                   value="cc_annual">CC annual
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="optradio"
                                                                                   value="cc_lifetime">CC Lifetime
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                                <div class="col-md-1 border border-secondary">
                                                                    <input type="checkbox" class="pselect" id="tax{{$t->id}}" name="taxes[]" value="{{$t->id}}">
                                                                </div>
                                                            </div>
                                                        @else

                                                        @if($t->id!=16 && $t->id!=6)
                                                            <div class="col-md-6">
                                                                <div class="col-md-10 border border-secondary">
                                                                    <label for="tax{{$t->id}}"> {{$t->title}}</label>
                                                                </div>
                                                                <div class="col-md-2 border border-secondary">
                                                                    <input type="checkbox" class="pselect"  {{ $t->id == 26 ? 'disabled' : '' }}
                                                                    id="tax{{$t->id}}" name="taxes[]" value="{{$t->id}}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    @endforeach
                                                </div>


                                            </div>

                                            <hr>

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

                                                            <select class="form-control" id="DistrictID"
                                                                    name="DistrictID">

                                                            </select>

                                                            <input type="hidden" name="District" id="District"
                                                                   value=""/>

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

                                                    <input type="button" class="btn btnSearch" id="Search"
                                                           value="Search" onclick="SearchFor()"/>

                                                    <input type="button" class="btn btnSearch" id="Clear"
                                                           value="Clear"/>

                                                </div>

                                            </div>

                                            <div class="row form-group">


                                                <div class="col-md-6">

                                                    <div class="row">

                                                        <div class="col-md-5"><label> Date of Registration </label>
                                                        </div>

                                                        <div class="col-md-7">

                                                            <input type="text" id="date_of_registration"
                                                                   class="form-control"/>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="row">

                                                        <div class="col-md-5"><label> Second Date of
                                                                Registration </label></div>

                                                        <div class="col-md-7">

                                                            <input type="text" id="second_date_of_registration"
                                                                   class="form-control"/>

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

                                                        <div class="col-md-5"><label>Last Tax Paid Upto</label></div>

                                                        <div class="col-md-7">

                                                            <input type="text" id="LastPaidAmount"
                                                                   class="form-control"/>

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
                                                        <div class="col-md-4">
                                                            <label>Status</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Filer</label>
                                                            <div class="col-md-2 border border-secondary"><input
                                                                        type="radio" id="filler" name="status"
                                                                        value="F"></div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Non Filer</label>
                                                            <div class="col-md-2 border border-secondary"><input
                                                                        type="radio" id="nonfiller" name="status"
                                                                        value="NF" checked></div>
                                                        </div>

                                                        <div class="col-md-4">
                                                        </div>

                                                        <div class="col-md-4 ">
                                                            <label>AC</label>
                                                            <div class="col-md-2 border border-secondary"><input
                                                                        type="radio" id="ac" name="ac_status"
                                                                        value="AC"></div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Non AC</label>
                                                            <div class="col-md-2 border border-secondary"><input
                                                                        type="radio" id="nonac" name="ac_status"
                                                                        value="NAC"></div>
                                                        </div>

                                                        <div class="col-md-4">
                                                        </div>

                                                        <div class="col-md-4 ">
                                                            <label>Taken By Company </label>
                                                            <div class="col-md-2 border border-secondary"><input
                                                                        type="radio" id="company" name="c_status"
                                                                        value="company"></div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Capital Value Tax</label>
                                                            <div class="col-md-2 border border-secondary"><input
                                                                        type="radio" id="capital" name="c_status"
                                                                        value="capital"></div>
                                                        </div>

                                                    </div>
                                                    <input type="hidden" name="Status" id="Status" value=""/>
                                                    <input type="hidden" name="acStatus" id="acStatus" value=""/>
                                                    <input type="hidden" name="cStatus" id="cStatus" value=""/>

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

                                                <div class="col-md-4">

                                                    <div class="row">

                                                        <div class="col-md-5"><label>CNIC</label></div>

                                                        <div class="col-md-7"><input type="text" id="CNIC"
                                                                                     class="form-control"/></div>

                                                    </div>

                                                </div>

                                                <div class="col-md-2">

                                                    <div class="row">

                                                        <div class="col-md-5"><label>NTN</label></div>

                                                        <div class="col-md-7"><input type="text" id="ntn_no"
                                                                                     class="form-control"/></div>

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

                                                        <div class="col-md-5"><label>Last Paid Tax Year</label></div>

                                                        <div class="col-md-7"><input type="text" id="LastPaidYear"
                                                                                     class="form-control"/>
                                                            <input type="hidden" id="LastPaidYear_" name="LastPaidYear_"
                                                                   class="form-control" value="false"/>
                                                        </div>

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
                                                            <input type="hidden" id="EngineNo_" class="form-control"
                                                                   name="EngineNo_"/>

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

                                                            <input type="text" id="SeatingCapacity"
                                                                   class="form-control"/>

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

                                                        <div class="col-md-7"><input type="text" id="ChassisNo"
                                                                                     class="form-control"/></div>

                                                    </div>

                                                </div>

                                                <div class="col-md-4">

                                                    <div class="row">

                                                        <div class="col-md-5"><label>Model </label></div>

                                                        <div class="col-md-7"><input type="text" id="model"
                                                                                     class="form-control"/></div>

                                                    </div>

                                                </div>


                                                <div class="col-md-1">


                                                </div>

                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <div id="ProvincialAmount">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div id="ProfessionalAmount2">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div id="FederalAmount">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <div id="FeeAmount">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                    </div>
                                                </div>


                                            </div>
                                            <!-- <td>


                                <div class="row">

                                    <div class="col-md-2"> <label>From</label></div>

                                    <div class="col-md-10"><input type="date" class="form-control wdth60" id="YearsFrom" style="width: auto;" onblur="ValidateDateFormat()" /> </div>

                                </div>



                            </td>

                            <td>
                                <div class="row">

                                    <div class="col-md-2"> <label>To</label></div>

                                    <div class="col-md-10"><input type="date" class="form-control wdth60" id="YearsTo" style="width: auto;" onblur="ValidateDateFormatFrom()" /></div>

                                </div>



                            </td> -->


                                </div>

                            </div>

                            <input type="hidden" id="Reg_id"/>
                            <input type="hidden" id="SlabID"/>

                            <input type="hidden" id="txtTotalAmount"/>

                            <input type="hidden" id="TotalPaidAmount"/>

                            @csrf

                            <h4 class="h4Vouchr">Fees CALCULATION</h4>

                            <div class="row">

                                <div class="col-md-12">

                                    <table class="table tbl" id="feeTable">

                                        <thead>

                                        <tr>

                                            <th>No</th>


                                            <th class="wdth20">Fees Type</th>

                                            <th class="wdth20"></th>

                                            <th class="wdth30">Amount</th>

                                            <th></th>

                                        </thead>

                                        <tbody id="adddown">

                                        <tr class="Fees">

                                            <td><label>1</label></td>

                                            <!--<td>-->


                                            <!--</td>-->

                                            <td>


                                                <input type="text" class="form-control wdth60 FeeType4" id="FeeType4"
                                                       style="width: 250px;" disabled/>
                                                <input type="hidden" class="form-control wdth60 FeeType5" id="FeeType5"
                                                       style="width: auto;" disabled/>

                                            </td>

                                            <td>


                                            </td>

                                            <!--<td>-->


                                            <!--</td>-->

                                            <td>

                                                <input type="number" class="form-control ProvincialFeeAmount"
                                                       id="ProvincialFeeAmount" disabled/>

                                            </td>

                                            <td>

                                                <button id="addmore1" hidden><i class="fa fa-plus"
                                                                                aria-hidden="true"></i></button>

                                            </td>

                                            <td>

                                                <button id="removeFee"><i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>

                                            </td>

                                        </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                            <h4 class="h4Vouchr">TAX CALCULATION</h4>


                            <div class="row">

                                <div class="col-md-12">

                                    <table class="table tbl" id="maintabl1">

                                        <thead>

                                        <tr>

                                            <th>No</th>


                                            <th class="wdth20">Token Tax Amount</th>

                                            <th class="wdth20">Total Amount</th>

                                        </tr>

                                        </thead>

                                        <tbody>


                                        <tr>

                                            <td><label id="No">1</label></td>


                                            <td>

                                                <input type="number" class="form-control" id="TaxAmount"/>

                                            </td>

                                            <td><input type="number" class="form-control" id="TotalAmount"/></td>

                                            <td>


                                            </td>

                                        </tr>

                                        </tbody>

                                    </table>

                                </div>


                            </div>

                            <h4 class="h4Vouchr">Arrears</h4>

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

                                            <th class="wdth20">Arrear Amount</th>

                                            <th class="wdth20">Duration</th>

                                            <th></th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                        <tr class="iterate0">

                                            <td><label>1</label></td>

                                            <td>

                                                <select Id="Gov" class="form-control Gov" id="ID" name="ID"
                                                        style="width: 100%;" onchange="GovSelect(0 , 'arrear')">
                                                    <option value='0'>Select Gov</option>

                                                    <option value="1">Provincial</option>

                                                    <option value="2">Federal</option>

                                                </select>


                                            </td>

                                            <td>

                                                <select class="form-control TaxType" id="TaxType" name="TaxType">
                                                    <option value='0'>--Select TaxType--</option>
                                                </select>


                                            </td>

                                            <td>


                                                <input type="date" class="form-control wdth60 ArrearYearsFrom"
                                                       id="ArrearYearsFrom" style="width: auto;"
                                                       onblur="ValidateDateFormat()"/>

                                            </td>

                                            <td>


                                                <input type="date" class="form-control wdth60 ArrearYearsTo"
                                                       id="ArrearYearsTo" style="width: auto;"
                                                       onblur="ValidateDateFormatFrom()"/>

                                            </td>


                                            <td>

                                                <input type="Number" id="Charges" class="form-control Charges" min="0"
                                                       onkeyup="SaveVal(0)"/>
                                                <input type="hidden" id="ChargeV" class="form-control ChargeV" min="0"/>

                                            </td>

                                            <td>

                                                <select Id="ArrearDurationID" class="form-control ArrearDurationID"
                                                        name="ArrearDurationID" style="width: 100%;"
                                                        onchange="ArrearDuration(0)">
                                                    <option value="">Select Duration</option>

                                                    <option value="10">Per Year</option>

                                                    <option value="11">Per Quarter</option>

                                                    <option value="13">Semi Annual</option>

                                                    <option value="16">Life Time</option>

                                                </select>


                                            </td>

                                            <!--<td>-->


                                            <!--</td>-->

                                            <td>

                                                <button id="addmore"><i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>

                                            </td>

                                        </tr>

                                        </tbody>

                                    </table>

                                </div>


                            </div>


                        </div>

                        <h4 class="h4Vouchr">Adjustment</h4>

                        <div class="row">

                            <div class="col-md-12">

                                <table class="table tbl" id="Adjustmentmaintabl">

                                    <thead>

                                    <tr>

                                        <th class="wdth20">No</th>

                                        <th class="wdth20">Adjustment GovType</th>

                                        <th class="wdth20">Adjustment Type</th>

                                        <th class="wdth20 ">Duration Apply</th>

                                        <th class="wdth20 allowdurt"> From</th>

                                        <th class="wdth20 allowdurt"> T0</th>

                                        <th class="wdth20 ">Adjustment Amount</th>

                                        <th class="wdth20 allowdurt">Duration</th>

                                        <th></th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    <tr class="Adjustmentiterate0">

                                        <td><label>1</label></td>

                                        <td>

                                            <select Id="AdjustmentGov" class="form-control AdjustmentGov" id="ID"
                                                    name="ID" style="width: 100%;"
                                                    onchange="GovSelect(0 , 'adjustment')">
                                                <option value='0'>Select Gov</option>

                                                <option value="1">Provincial</option>

                                                <option value="2">Federal</option>

                                            </select>


                                        </td>

                                        <td>

                                            <select class="form-control AdjustmentTaxType" id="AdjustmentTaxType"
                                                    name="AdjustmentTaxType">
                                                <option value='0'>--Select TaxType--</option>
                                            </select>


                                        </td>
                                        <td><input type="checkbox" name="allowdur0" id="allowdur0"></td>
                                        <td class="allowdur0">


                                            <input type="date" class="form-control wdth60 AdjustmentYearsFrom"
                                                   id="AdjustmentYearsFrom" style="width: auto;"
                                                   onblur="ValidateDateFormat()"/>

                                        </td>

                                        <td class="allowdur0">


                                            <input type="date" class="form-control wdth60 AdjustmentYearsTo"
                                                   id="AdjustmentYearsTo" style="width: auto;"
                                                   onblur="ValidateDateFormatFrom()"/>

                                        </td>


                                        <td>

                                            <input type="Number" id="AdjustmentCharges"
                                                   class="form-control AdjustmentCharges" min="0"
                                                   placeholder="Enter Adjustment Amount"/>
                                            <!-- <input type="hidden" id="ChargeV"  class="form-control ChargeV" min="0" /> onkeyup= "AdjustmentSaveVal(0)"-->

                                        </td>

                                        <td class="allowdur0">

                                            <select Id="AdjustmentDurationID" class="form-control AdjustmentDurationID"
                                                    name="AdjustmentDurationID" style="width: 100%;"
                                                    onchange="AdjustmentDuration(0)">
                                                <option value="">Select Duration</option>

                                                <option value="10">Per Year</option>

                                                <option value="11">Per Quarter</option>

                                                <option value="13">Semi Annual</option>

                                                <option value="16">Life Time</option>

                                            </select>


                                        </td>

                                        <!--<td>-->


                                        <!--</td>-->

                                        <td>

                                            <button id="Adjustmentaddmore"><i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>

                                        </td>

                                    </tr>

                                    </tbody>

                                </table>

                            </div>


                        </div>

                        <div class="col-md-offset-6 col-md-6 text-right">

                            <input type="button" class="btn btnCancel" onclick="RedirecttoIndex()" value="CANCEL"/>

                            <input type="button" class="btn btnCustom" id="Operation" value="CHALLAN"
                                   onclick="SaveTaxInfo()"/>

                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                    </div>


                    <input type="hidden" id="RecordId"/>
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


                        var FedTotal = 0;

                        var ProTotAL = 0;

                        var FedTotals = 0;

                        var ProTotALs = 0;


                        var d = (new Date()).toISOString().split('T')[0];
                        d = moment(d).format('DD/MM/YYYY');


                        // $( "#YearsFrom" ).change(function() {
                        //     $( "#DurationID" ).val(0);
                        //     $("#YearsTo").val(0);
                        //
                        // });
                        $("#allowdur0").change(function () {
                            var $input = $(this);

                            if ($input.is(":checked")) {
                                $(".allowdur0").show();
                                $(".allowdurt").show();
                            } else {
                                $(".allowdur0").hide();
                                $(".allowdurt").hide();
                            }

                        }).change();

                        function PrintChallan(Data, FeesList) {


                            len = $('#maintabl tr').length;

                            ArrearList = [];
                            ProTotAL = 0;
                            var renewed = "";
                            for (var i = 0; i <= len; i++) {
                                $('.iterate' + i).each(function () {

                                    //$("", this).val();

                                    var ArrearType = $('.Gov option:selected', this).text();

                                    var Charges = $('.Charges', this).val();

                                    var ArrearName = $('.TaxType option:selected', this).text();

                                    if ($('.Gov option:selected', this).val() != 0 && $('.Gov option:selected', this).val() != "") {
                                        if ($('.TaxType option:selected', this).val() != 0 && $('.TaxType option:selected', this).val() != "") {

                                            ArrearList.push({
                                                Name: ArrearName.toUpperCase() + ' Arrears',
                                                Amount: Charges,
                                                Type: ArrearType.toUpperCase()
                                            });

                                            ProTotAL += parseInt($('.Charges', this).val());
                                        }
                                    }


                                });

                            }


                            if ($("#Provincial0").val() != undefined && $("#Provincial0").val() != null) {

                                var provincialamount = $("#Provincial0").val();

                            } else {

                                var provincialamount = 0;

                            }

                            if ($("#FederalFilerAmount0").val() != undefined && $("#FederalFilerAmount0").val() != null) {

                                var federalamount = $("#FederalFilerAmount0").val();

                            } else {

                                var federalamount = 0;

                            }
                            if ($("#TaxAmount").val() != undefined && $("#TaxAmount").val() != null) {

                                var TaxAmount = $("#TaxAmount").val();

                            } else {

                                var TaxAmount = 0;

                            }


                            // if ($("#Charges").val() != undefined && $("#Charges").val() != null && $("#Charges").val() != '') {

                            var TotalAmount = parseInt(parseFloat($("#TotalAmount").val()) + parseFloat(ProTotAL))

                            var inwords = inWords(TotalAmount);
                            // }

                            // else {

                            //     var TotalAmount = parseInt(Math.round($("#TotalAmount").val()));

                            // }


                            if ($('#DurationID').val() == 16) {
                                ren = "LIFE TIME";
                                lpy = "LIFE TIME";
                            } else {


                                if ($('#LastPaidYear_').val() == "true") {

                                    // ren=  moment($('#LastPaidYear').val()).add(1, 'years').subtract(1, "days").format("DD-MM-YYYY");
                                    lpy = $('#LastPaidYear').val();
                                } else {
                                    // ren=  moment().add(1, 'years').subtract(1, "days").format("DD-MM-YYYY");
                                    lpy = "N/A";

                                }


                                if ($("#tax16").is(':checked')) {
                                    ren = $('#YearsTo').val();
                                } else {
                                    ren = "N/A";
                                    var fYearTO = $('#YearsTo').val();
                                    if (fYearTO != "") {
                                        ren = moment(fYearTO).format("DD-MM-YYYY");
                                    }

                                }

                                //hassan
                                if ($("#tax13").is(':checked')) {

                                }


                            }

                            var oneDayBeforeYearsFrom = ''
                            var dayBeforeYearFrom = $('#YearsFrom').val();
                            console.log(dayBeforeYearFrom)
                            if (dayBeforeYearFrom != "") {
                                var date = new Date(dayBeforeYearFrom);
                                date.setDate(date.getDate() - 1);
                                oneDayBeforeYearsFrom = date.toISOString().slice(0, 10);

                                // if (fYearTO != ""){
                                //     ren = moment(fYearTO).format("DD-MM-YYYY");
                                // }
                            }
                            console.log(oneDayBeforeYearsFrom)


                            //var total = FedTotal + ProTotAL + parseInt($('#TaxAmount').val());

                            var printn = '<html>                                                                                                                         '

                                + '    <head>                                                                                                                                                                       '

                                + '        <title>Voucher</title>                                                                                                                                                   '

                                + '        <style>                                                                                                                                                                  '

                                + '            table{                                                                                                                                                               '

                                + '                width: 100%;                                                                                                                                                     '

                                + '                border:1px solid #000;                                                                                                                                           '

                                + '                border-collapse: collapse;                                                                                                                                       '

                                + '                border-left: 0px;                                                                                                                                                '

                                + '                border-right: 0px;                                                                                                                                               '

                                + '                                                                                                                                                                                 '

                                + '                                                                                                                                                                                 '

                                + '            }                                                                                                                                                                    '

                                + '            table>tbody>tr>td{                                                                                                                                                   '

                                + '                border-right: 1px solid;                                                                                                                                         '

                                + '                                                                                                                                                                                 '

                                + '                border-collapse: collapse;                                                                                                                                       '

                                + '            }                                                                                                                                                                    '

                                + '            .a{                                                                                                                                                                  '

                                + '                border-right: 0px;                                                                                                                                               '

                                + '               text-align: right;                                                                                                                                                '

                                + '                border-collapse: collapse;                                                                                                                                       '
                                + '                 padding-right: 10px;'
                                + '                                                                                                                                                                                 '

                                + '            }                                                                                                                                                                    '

                                + '             h3,h4,h2{font-size:10px !important;}                                                                                                                                                                    '

                                + '            .M{                                                                                                                                                                  '

                                + '                 margin: 5px -34px 0px 8px;'

                                + '                  width: 20%  ;'

                                + '              }                                                                                                                                                                  '

                                + '        </style>                                                                                                                                                                 '

                                + '    </head>                                                                                                                                                                      '

                                + '    <body >                                                                                                                                                                      '

                                + '        <div style="width: 100%; ">                                                                                                                                               '

                                + '            <div style="width: 33%;float: left;border: 1px solid;">                                                                                                              '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <div class="table_header">                                                                                                                                   '

                                + '                        <h3 style="text-align: center;margin: 20px auto;border-bottom: 1px solid;">OWNER`S COPY</h3>                                                                '

                                + '                    </div>                                                                                                                                                       '

                                + '                    <div style="width: 100%;margin: 25px auto;">                                                                                                                 '

                                + '                        <div style="width: 100%">                                                                                                                                '

                                + '                            <h2 style="font-size: 15px;text-align: center;margin-bottom: 10px;">BALOCHISTAN EXCISE AND TAXATION</h2>                                            '

                                + '                        </div>                                                                                                                                                   '

                                + '                    </div>                                                                                                                                                       '

                                + '                    <div style="width: 100%;margin: 10px auto;">                                                                                                                 '

                                + '                        <div style="width: 50%;float: left">                                                                                                                     '

                                + '                            <div style="width: 100%">                                                                                                                            '

                                + '                                <h4 style="width: 40%;float: left;margin: 7px -30px 0px 2px;text-align: center;font-size: 12px;">DISTRICT</h4>                                                                                        '

                                + '                                <input type="text" value="' + $("#District").val() + '" style="width:45%;float: left;margin: 3px 0px 0px 40px;border-top: none;border-left: none;border-right: none;" disabled>        '

                                + '                            </div>                                                                                                                                               '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 50%;float: left">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 63%;float: left;margin: 7px -30px 0px -7px;text-align: center;font-size: 12px;">STATUS</h4>                                                                           '

                                + '                    <input type="text" value="' + $("#Status").val() + '"  style="width: 40%;float: left;margin: 3px 0px 0px 24px;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                + '                    <input type="text" value="' + $("#acStatus").val() + '"  style="width: 40%;float: left;margin: 3px 0px 0px 24px;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                // + '                    <textarea type="text" value="' + $("#cStatus").val() + '"  style="width: 60%;float: left;margin: 3px 0px 0px 24px;border-top: none;border-left: none;border-right: none;" disabled>' + $("#cStatus").val() + '</textarea>                    '


                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '


                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">REGISTERATION DATE</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#date_of_registration').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '


                                + '            <div style="width: 50%;float: left">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 20%;float: left;margin: 7px -30px 0px 5px;text-align: center;font-size: 12px;">DATE</h4>                                                                                                '

                                + '                    <input type="text" value="' + d + '" style="width: 70%;float: left;margin: 3px 0px 0px 40px;border-top: none;border-left: none;border-right: none;" disabled>                    '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '


                                + '            <div style="width: 100%;float: left">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 30%;float: left;margin: 10px -30px 0px 5px;font-size: 12px;">BOOK SERIAL NO.</h4>                                                       '

                                + '                    <input type="text" value="' + Data.book_serialNo + '" placeholder=""  style="width: 40%;float: left;margin: 3px 0px 0px 40px;border-top: none;border-left: none;border-right: none;" disabled>                    '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">GENERATED BY </h4>                                                                                 '

                                + '                    <input type="text" value=" {{ auth()->user()->name }}"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">CHALLAN NO </h4>                                                                                 '

                                + '                    <input type="text" value="' + Data.challan_no + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">REGISTRATION NUMBER</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#RegistrationNo').val().toUpperCase() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">ENGINE CC</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#EngineNo').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">CHASSIS NO</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#ChassisNo').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">LADEN WEIGHT</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#UnladenWeight').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">SEATING CAPACITY</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#SeatingCapacity').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 45%;float: left;margin-left: 2%;">OWNER </h4>                                                                                 '

                                + '                    <textarea type="text" value="' + Data.name_ + '"  style="width: 45%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;height: 65px;" disabled>' + $('#OwnerName').val() + '</textarea> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 35%;float: left;margin-left: 2%;">ADDRESS</h4>                                                                                 '

                                + '                    <textarea type="text" value="' + Data.address + '"  style="width: 55%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none; height:65px;" disabled>' + Data.address + '</textarea> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '
                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">CATEGORY</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#Category').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '


                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 45%;float: left;margin-left: 2%;">CNIC</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#CNIC').val() + '"  style="width: 50%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 45%;float: left;margin-left: 2%;">NTN</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#ntn_no').val() + '"  style="width: 50%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="margin-top: 1%;width: 50%;float: left;margin-left: 9px;">LAST TAX PAID UPTO</h4>                                                                                  '

                                + '                    <input type="text" value="' + oneDayBeforeYearsFrom + '"  style="width: 40%;float: left;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                // + '                    <input type="text" value="' +lpy + '"  style="width: 40%;float: left;border-top: none;border-left: none;border-right: none;" disabled>                    '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 50%;float: left;margin: 3px 0px;margin-left: 5%;">RENEWED UPTO</h4>                                                                     '

                                + '                    <input type="text" value="' + ren + '"  style="width: 40%;float: left;border-top: none;border-left: none;border-right: none;" disabled>                    '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '                                                                                                                                                                                 '

                                + '                                                                                                                                                                                 '

                                + '        </div>                                                                                                                                                                   '

                                + '                    <div class="table">                                                                                                                                          '

                                + '            <table>                                                                                                                                                              '

                                + '            <tbody>                                                                                                                                                              '

                                + '                <tr>                                                                                                                                                             '

                                + '                    <td style="border-bottom: 1px solid;text-align: center;">S.#</td>                                                                                            '

                                + '                    <td style="border-bottom: 1px solid;text-align: center;">DESCRIPTION OF TAX</td>                                                                             '

                                + '                    <td style="border-bottom: 1px solid;text-align: center;border-right: 0px">AMOUNT</td>                                                                        '

                                + '                                                                                                                                                                                 '

                                + '                </tr>                                                                                                                                                            '

                            if (($('#Professional').val() != null) && ($('#Professional').val() != '') && ($('#Professional').val() != 'undefined') && ($('#Professional').val() != 0)) {

                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;">0.0</td>                                                                                                                       '

                                    + '                    <td style="text-align: left;">' + $('#ProfessionalLabel').text().trim() + '</td>                                                                                                      '

                                    + '                    <td class="a">' + addCommas($('#Professional').val()) + '</td>                                                                                                                                      '

                                    + '                                                                                                                                                                                 '

                                    + '                </tr>                                                                                                                       ';

                            }

                            if ($("#tax18").is(":checked")) {


                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;">-</td>                                                                                                                        '

                                    + '                    <td style="text-align: left;">FEDRAL TAX 231B(1)</td>                                                                                                                        '

                                    + '                    <td class="a">PAID</td>                                                                                                                                          '

                                    + '                </tr>                                                                                                                                                            '

                            }


                            var cou = 0;
                            $(".Fees").each(function (index) {

                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;"> 1.' + index + '</td>                                                                                                                       '

                                    + '                    <td style="text-align: left;">' + FeesList[index]['Name'] + '</td>                                                                                                         '

                                    + '                    <td class="a">' + addCommas(FeesList[index]['Amount']) + '</td>                                                                                                                                      '

                                    + '                                                                                                                                                                                 '

                                    + '                </tr>                                                                                                    ';
                                cou = index++;
                            });

                            if (TaxAmount != 0) {

                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;">1.' + cou + '</td>                                                                                                                        '

                                    + '                    <td style="text-align: left;">TOKEN TAX </td>                                                                                                                        '

                                    + '                    <td class="a">' + addCommas(TaxAmount) + '</td>                                                                                                                                          '

                                    + '                </tr>  ';

                            }


                            $.each(ArrearList, function (index, value) {

                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;"> 2.' + (index + 1) + '</td>                                                                                                                       '

                                    + '                    <td style="text-align: left;">' + ArrearList[index]['Name'] + ' (' + ArrearList[index]['Type'] + ')' + '</td>                                                                                                         '

                                    + '                    <td class="a">' + addCommas(ArrearList[index]['Amount']) + '</td>                                                                                                                                      '

                                    + '                                                                                                                                                                                 '

                                    + '                </tr>                                                                                                    ';

                            });


                            //+ '                <tr>                                                                                                                                                             '

                            //+ '                    <td style="text-align: center;">5</td>                                                                                                                        '

                            //+ '                    <td style="text-align: center;">Transfer Fee</td>                                                                                                                        '

                            //+ '                    <td class="a">' + 56 + '</td>                                                                                                                                          '

                            //+ '                </tr>                                                                                                                                                            '

                            //+ '                <tr>                                                                                                                                                             '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td class="a"></td>                                                                                                                                          '

                            //+ '                </tr>                                                                                                                                                            '

                            //+ '                <tr>                                                                                                                                                             '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td class="a"></td>                                                                                                                                          '

                            //+ '                </tr>                                                                                                                                                            '

                            printn += '                <tr>                                                                                                                                                             '

                                + '                    <td style="text-align: center;"></td>                                                                                                                        '

                                + '                    <td style="text-align: right;">TOTAL AMOUNT</td>                                                                                                             '

                                + '                    <td class="a">Rs ' + addCommas(TotalAmount) + '</td>                                                                                                                                  '

                                + '                </tr>                                                                                                                                                            '

                                + '            </tbody>                                                                                                                                                             '

                                + '        </table>                                                                                                                                                                 '

                                + '                                                                                                                                                                                 '

                                + '        </div>                                                                                                                                                                   '

                                + '                 <br />   <div style="width: 100%;float: left;">                                                                                                                        '

                                + '                     <div style="width: 30%;float: left;">   <h4 style="font-size: 12px;margin: 3px 0px 0px 5px">Amount In Words</h4>     </div>                                                                       '
                                + '                     <div style="width: 70%;float: left;">   <p style="font-size: 12px;margin: 3px 0px 0px 5px">' + inwords + '</p>          </div>                                                                  '

                                + '                    </div>    <br />                                                                                                                                                   '

                                + '                   <div style="width:100%;">                                                                                                                                    '


                                + '                    <div style="width: 70%;float: left;">                                                                                                                        '

                                + '                        <h2 style="font-size: 12px;margin: 3px 0px 0px 5px">BANK OFFICER STAMP SIGNATURE</h2>                                                                            '

                                + '                    </div>                                                                                                                                                       '

                                + '                    <div style="width:30%;float: left;"><h2 style="font-size: 12px;margin: 3px 0px">DEO NAME</h2></div>                                                          '

                                + '                    <hr><div style="width: 100%;text-align:center;">                                                                                                                        '

                                + '                        <h2 style="font-size: 12px;margin: 3px 0px 0px 5px">APPLICANT SIGNATURE</h2>                                                                            '

                                + '                    </div>                                                                                                                                                       '

                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'

                                + '                    <hr><div style="width: 100%;text-align:center;">                                                                                                                        '

                                + '                        <h2 style="font-size: 12px;margin: 3px 0px 0px 5px">ETO SIGNATURE/STAMP</h2>                                                                            '

                                + '                    </div>                                                                                                                                                       '


                                + '                   </div>                                                                                                                                                       '
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '<!-------------------------------<1st copy ended--------------------------------------------------->                                                                             '

                                + '            <div style="width: 33%;float: left;border: 1px solid;">                                                                                                              '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <div class="table_header">                                                                                                                                   '

                                + '                        <h3 style="text-align: center;margin: 20px auto;border-bottom: 1px solid;">EXCISE COPY</h3>                                                                '

                                + '                    </div>                                                                                                                                                       '

                                + '                    <div style="width: 100%;margin: 25px auto;">                                                                                                                 '

                                + '                        <div style="width: 100%">                                                                                                                                '

                                + '                            <h2 style="font-size: 15px;text-align: center;margin-bottom: 10px;">BALOCHISTAN EXCISE AND TAXATION</h2>                                            '

                                + '                        </div>                                                                                                                                                   '

                                + '                    </div>                                                                                                                                                       '

                                + '                    <div style="width: 100%;margin: 10px auto;">                                                                                                                 '

                                + '                        <div style="width: 50%;float: left">                                                                                                                     '

                                + '                            <div style="width: 100%">                                                                                                                            '

                                + '                                <h4 style="width: 40%;float: left;margin: 7px -30px 0px 2px;text-align: center;font-size: 12px;">DISTRICT</h4>                                                                                        '

                                + '                                <input type="text" value="' + $("#District").val() + '" style="width:45%;float: left;margin: 3px 0px 0px 40px;border-top: none;border-left: none;border-right: none;" disabled>        '

                                + '                            </div>                                                                                                                                               '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 50%;float: left">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 63%;float: left;margin: 7px -30px 0px -7px;text-align: center;font-size: 12px;">STATUS</h4>                                                                           '

                                + '                    <input type="text" value="' + $("#Status").val() + '"  style="width: 40%;float: left;margin: 3px 0px 0px 24px;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                + '                    <input type="text" value="' + $("#acStatus").val() + '"  style="width: 40%;float: left;margin: 3px 0px 0px 24px;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                // + '                    <textarea type="text" value="' + $("#cStatus").val() + '"  style="width: 60%;float: left;margin: 3px 0px 0px 24px;border-top: none;border-left: none;border-right: none;" disabled>' + $("#cStatus").val() + '</textarea>                    '
                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '


                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">REGISTERATION DATE</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#date_of_registration').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '


                                + '            <div style="width: 50%;float: left">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 20%;float: left;margin: 7px -30px 0px 5px;text-align: center;font-size: 12px;">DATE</h4>                                                                                                '

                                + '                    <input type="text" value="' + d + '" style="width: 70%;float: left;margin: 3px 0px 0px 40px;border-top: none;border-left: none;border-right: none;" disabled>                    '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 30%;float: left;margin: 10px -30px 0px 5px;font-size: 12px;">BOOK SERIAL NO.</h4>                                                       '

                                + '                    <input type="text" value="' + Data.book_serialNo + '" placeholder=""  style="width: 40%;float: left;margin: 3px 0px 0px 40px;border-top: none;border-left: none;border-right: none;" disabled>                    '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">GENERATED BY </h4>                                                                                 '

                                + '                    <input type="text" value=" {{ auth()->user()->name }}"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">CHALLAN NO</h4>                                                                                 '

                                + '                    <input type="text" value="' + Data.challan_no + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">REGISTRATION NUMBER</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#RegistrationNo').val().toUpperCase() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '


                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">ENGINE CC</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#EngineNo').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">CHASSIS NO</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#ChassisNo').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">LADEN WEIGHT</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#UnladenWeight').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">SEATING CAPACITY</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#SeatingCapacity').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            </div>                                                                                                                                                               '
                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 45%;float: left;margin-left: 2%;">OWNER </h4>                                                                                 '

                                + '                    <textarea type="text" value="' + Data.name_ + '"  style="width: 45%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;height: 65px;" disabled>' + $('#OwnerName').val() + '</textarea> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 35%;float: left;margin-left: 2%;">ADDRESS</h4>                                                                                 '

                                + '                    <textarea type="text" value="' + Data.address + '"  style="width: 55%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;height:65px;" disabled>' + Data.address + '</textarea> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '
                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">CATEGORY</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#Category').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '


                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 45%;float: left;margin-left: 2%;">CNIC/NTN</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#CNIC').val() + '"  style="width: 50%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 45%;float: left;margin-left: 2%;">NTN</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#ntn_no').val() + '"  style="width: 50%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '
                                + '            <div style="width: 100%;">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="margin-top: 1%;width: 50%;float: left;margin-left: 9px;">LAST TAX PAID UPTO</h4>                                                                                  '

                                + '                    <input type="text" value="' + oneDayBeforeYearsFrom + '"  style="width: 40%;float: left;border-top: none;border-left: none;border-right: none;" disabled>                    '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 50%;float: left;margin: 3px 0px;margin-left: 5%;">RENEWED UPTO</h4>                                                                     '

                                + '                    <input type="text" value="' + ren + '"  style="width: 40%;float: left;border-top: none;border-left: none;border-right: none;" disabled>                    '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '                                                                                                                                                                                 '

                                + '                                                                                                                                                                                 '

                                + '        </div>                                                                                                                                                                   '

                                + '                    <div class="table">                                                                                                                                          '

                                + '            <table>                                                                                                                                                              '

                                + '            <tbody>                                                                                                                                                              '

                                + '                <tr>                                                                                                                                                             '

                                + '                    <td style="border-bottom: 1px solid;text-align: center;">S.#</td>                                                                                            '

                                + '                    <td style="border-bottom: 1px solid;text-align: center;">DESCRIPTION OF TAX</td>                                                                             '

                                + '                    <td style="border-bottom: 1px solid;text-align: center;border-right: 0px">AMOUNT</td>                                                                        '

                                + '                                                                                                                                                                                 '

                                + '                </tr>                                                                                                                                                            '

                            if (($('#Professional').val() != null) && ($('#Professional').val() != '') && ($('#Professional').val() != 'undefined') && ($('#Professional').val() != 0)) {

                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;">0.0</td>                                                                                                                       '

                                    + '                    <td style="text-align: left;">' + $('#ProfessionalLabel').text().trim() + '</td>                                                                                                      '

                                    + '                    <td class="a">' + addCommas($('#Professional').val()) + '</td>                                                                                                                                      '

                                    + '                                                                                                                                                                                 '

                                    + '                </tr>                                                                                                                       ';

                            }

                            if ($("#tax18").is(":checked")) {


                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;">-</td>                                                                                                                        '

                                    + '                    <td style="text-align: left;">FEDRAL TAX 231B(1)</td>                                                                                                                        '

                                    + '                    <td class="a">PAID</td>                                                                                                                                          '

                                    + '                </tr>                                                                                                                                                            '

                            }


                            cou = 0;

                            $(".Fees").each(function (index) {

                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;"> 1.' + index + '</td>                                                                                                                       '

                                    + '                    <td style="text-align: left;">' + FeesList[index]['Name'] + '</td>                                                                                                         '

                                    + '                    <td class="a">' + addCommas(FeesList[index]['Amount']) + '</td>                                                                                                                                      '

                                    + '                                                                                                                                                                                 '

                                    + '                </tr>                                                                                                    ';
                                cou = index++;
                            });

                            if (TaxAmount != 0) {

                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;">1.' + cou + '</td>                                                                                                                        '

                                    + '                    <td style="text-align: left;">TOKEN TAX </td>                                                                                                                        '

                                    + '                    <td class="a">' + addCommas(TaxAmount) + '</td>                                                                                                                                          '

                                    + '                </tr>  ';

                            }


                            $.each(ArrearList, function (index, value) {

                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;"> 2.' + (index + 1) + '</td>                                                                                                                       '

                                    + '                    <td style="text-align: left;">' + ArrearList[index]['Name'] + ' (' + ArrearList[index]['Type'] + ')' + '</td>                                                                                                         '

                                    + '                    <td class="a">' + addCommas(ArrearList[index]['Amount']) + '</td>                                                                                                                                      '

                                    + '                                                                                                                                                                                 '

                                    + '                </tr>                                                                                                    ';

                            });

                            //+ '                <tr>                                                                                                                                                             '

                            //+ '                    <td style="text-align: center;">5</td>                                                                                                                        '

                            //+ '                    <td style="text-align: center;">Transfer Fee</td>                                                                                                                        '

                            //+ '                    <td class="a">' + 56 + '</td>                                                                                                                                          '

                            //+ '                </tr>                                                                                                                                                            '

                            //+ '                <tr>                                                                                                                                                             '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td class="a"></td>                                                                                                                                          '

                            //+ '                </tr>                                                                                                                                                            '

                            //+ '                <tr>                                                                                                                                                             '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td class="a"></td>                                                                                                                                          '

                            //+ '                </tr>                                                                                                                                                            '

                            printn += '                <tr>                                                                                                                                                             '

                                + '                    <td style="text-align: center;"></td>                                                                                                                        '

                                + '                    <td style="text-align: right;">TOTAL AMOUNT</td>                                                                                                             '

                                + '                    <td class="a">Rs ' + addCommas(TotalAmount) + '</td>                                                                                                                                  '

                                + '                </tr>                                                                                                                                                            '

                                + '            </tbody>                                                                                                                                                             '

                                + '        </table>                                                                                                                                                                 '

                                + '                                                                                                                                                                                 '

                                + '        </div>                                                                                                                                                                   '

                                + '       <br />        <div style="width: 100%;float: left;">                                                                                                                        '

                                + '                     <div style="width: 30%;float: left;">   <h4 style="font-size: 12px;margin: 3px 0px 0px 5px">Amount In Words</h4>     </div>                                                                       '
                                + '                     <div style="width: 70%;float: left;">   <p style="font-size: 12px;margin: 3px 0px 0px 5px">' + inwords + '</p>          </div>                                                                  '

                                + '                    </div>           <br />                                                                                                                                            '

                                + '                   <div style="width:100%;">                                                                                                                                    '

                                + '                    <div style="width: 70%;float: left;">                                                                                                                        '

                                + '                        <h2 style="font-size: 12px;margin: 3px 0px 0px 5px">BANK OFFICER STAMP SIGNATURE</h2>                                                                            '

                                + '                    </div>                                                                                                                                                       '

                                + '                    <div style="width:30%;float: left;"><h2 style="font-size: 12px;margin: 3px 0px">DEO NAME</h2></div>                                                          '

                                + '                    <hr><div style="width: 100%;text-align:center;">                                                                                                                        '

                                + '                        <h2 style="font-size: 12px;margin: 3px 0px 0px 5px">APPLICANT SIGNATURE</h2>                                                                            '

                                + '                    </div>                                                                                                                                                       '

                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'

                                + '                    <hr><div style="width: 100%;text-align:center;">                                                                                                                        '

                                + '                        <h2 style="font-size: 12px;margin: 3px 0px 0px 5px">ETO SIGNATURE/STAMP</h2>                                                                            '

                                + '                    </div>                                                                                                                                                       '


                                + '                   </div>                                                                                                                                                       '

                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '<!-------------------------------<1st copy ended--------------------------------------------------->                                                                             '

                                + '            <div style="width: 33%;float: left; border: 1px solid;">                                                                                                             '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <div class="table_header">                                                                                                                                   '

                                + '                        <h3 style="text-align: center;margin: 20px auto;border-bottom: 1px solid;">BANK COPY</h3>                                                                '

                                + '                    </div>                                                                                                                                                       '

                                + '                    <div style="width: 100%;margin: 25px auto;">                                                                                                                 '

                                + '                        <div style="width: 100%">                                                                                                                                '

                                + '                            <h2 style="font-size: 15px;text-align: center;margin-bottom: 10px;">BALOCHISTAN EXCISE AND TAXATION</h2>                                            '

                                + '                        </div>                                                                                                                                                   '

                                + '                    </div>                                                                                                                                                       '

                                + '                    <div style="width: 100%;margin: 10px auto;">                                                                                                                 '

                                + '                        <div style="width: 50%;float: left">                                                                                                                     '

                                + '                            <div style="width: 100%">                                                                                                                            '

                                + '                                <h4 style="width: 40%;float: left;margin: 7px -30px 0px 2px;text-align: center;font-size: 12px;">DISTRICT</h4>                                                                                        '

                                + '                                <input type="text" value="' + $("#District").val() + '" style="width:45%;float: left;margin: 3px 0px 0px 40px;border-top: none;border-left: none;border-right: none;" disabled>        '

                                + '                            </div>                                                                                                                                               '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 50%;float: left">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 57%;float: left;margin: 7px -30px 0px -7px;text-align: center;font-size: 12px;">STATUS</h4>                                                                           '

                                + '                    <input type="text" value="' + $("#Status").val() + '"  style="width: 40%;float: left;margin: 3px 0px 0px 24px;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                + '                    <input type="text" value="' + $("#acStatus").val() + '"  style="width: 40%;float: left;margin: 3px 0px 0px 24px;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                // + '                    <textarea type="text" value="' + $("#cStatus").val() + '"  style="width: 60%;float: left;margin: 3px 0px 0px 24px;border-top: none;border-left: none;border-right: none;" disabled>' + $("#cStatus").val() + '</textarea>                    '


                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '


                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">REGISTERATION DATE</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#date_of_registration').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '


                                + '            <div style="width: 50%;float: left">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 20%;float: left;margin: 7px -30px 0px 5px;text-align: center;font-size: 12px;">DATE</h4>                                                                                                '

                                + '                    <input type="text" value="' + d + '" style="width: 70%;float: left;margin: 3px 0px 0px 40px;border-top: none;border-left: none;border-right: none;" disabled>                    '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 30%;float: left;margin: 10px -30px 0px 5px;font-size: 12px;">BOOK SERIAL NO.</h4>                                                       '

                                + '                    <input type="text" value="' + Data.book_serialNo + '" placeholder=""  style="width: 40%;float: left;margin: 3px 0px 0px 40px;border-top: none;border-left: none;border-right: none;" disabled>                    '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">GENERATED BY </h4>                                                                                 '

                                + '                    <input type="text" value=" {{ auth()->user()->name }}"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">CHALLAN NO</h4>                                                                                 '

                                + '                    <input type="text" value="' + Data.challan_no + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">REGISTRATION  NUMBER</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#RegistrationNo').val().toUpperCase() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">ENGINE CC</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#EngineNo').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">CHASSIS NO</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#ChassisNo').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">LADEN WEIGHT</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#UnladenWeight').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">SEATING CAPACITY</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#SeatingCapacity').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '


                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 45%;float: left;margin-left: 2%;">OWNER </h4>                                                                                 '

                                + '                    <textarea type="text" value="' + Data.name_ + '"  style="width: 45%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;height: 65px;" disabled>' + $('#OwnerName').val() + '</textarea> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 35%;float: left;margin-left: 2%;">ADDRESS</h4>                                                                                 '

                                + '                    <textarea type="text" value="' + Data.address + '"  style="width: 55%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;height:65px;" disabled>' + Data.address + '</textarea> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '
                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">CATEGORY</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#Category').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '


                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 45%;float: left;margin-left: 2%;">CNIC/NTN</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#CNIC').val() + '"  style="width: 50%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 45%;float: left;margin-left: 2%;">NTN</h4>                                                                                 '

                                + '                    <input type="text" value="' + $('#ntn_no').val() + '"  style="width: 50%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '
                                + '            <div style="width: 100%;">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="margin-top: 1%;width: 50%;float: left;margin-left: 9px;">LAST TAX PAID UPTO</h4>                                                                                  '

                                + '                    <input type="text" value="' + oneDayBeforeYearsFrom + '"  style="width: 40%;float: left;border-top: none;border-left: none;border-right: none;" disabled>                    '

                                + '                </div>                                                                                                                                                           '

                                + '                                                                                                                                                                                 '

                                + '            </div>                                                                                                                                                               '

                                + '            <div style="width: 100%;float: left">                                                                                                                                 '

                                + '                <div style="width: 100%">                                                                                                                                        '

                                + '                    <h4 style="width: 50%;float: left;margin: 3px 0px;margin-left: 5%;">RENEWED UPTO</h4>                                                                     '

                                + '                    <input type="text" value="' + ren + '"  style="width: 40%;float: left;border-top: none;border-left: none;border-right: none;" disabled>                    '

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '                                                                                                                                                                                 '

                                + '                                                                                                                                                                                 '

                                + '        </div>                                                                                                                                                                   '

                                + '                    <div class="table">                                                                                                                                          '

                                + '            <table>                                                                                                                                                              '

                                + '            <tbody>                                                                                                                                                              '

                                + '                <tr>                                                                                                                                                             '

                                + '                    <td style="border-bottom: 1px solid;text-align: center;">S.#</td>                                                                                            '

                                + '                    <td style="border-bottom: 1px solid;text-align: center;">DESCRIPTION OF TAX</td>                                                                             '

                                + '                    <td style="border-bottom: 1px solid;text-align: center;border-right: 0px">AMOUNT</td>                                                                        '

                                + '                                                                                                                                                                                 '

                                + '                </tr>                                                                                                                                                            '

                            if (($('#Professional').val() != null) && ($('#Professional').val() != '') && ($('#Professional').val() != 'undefined') && ($('#Professional').val() != 0)) {

                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;">0.0</td>                                                                                                                       '

                                    + '                    <td style="text-align: left;">' + $('#ProfessionalLabel').text().trim() + '</td>                                                                                                      '

                                    + '                    <td class="a">' + addCommas($('#Professional').val()) + '</td>                                                                                                                                      '

                                    + '                                                                                                                                                                                 '

                                    + '                </tr>                                                                                                                       ';

                            }

                            if ($("#tax18").is(":checked")) {


                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;">-</td>                                                                                                                        '

                                    + '                    <td style="text-align: left;">FEDRAL TAX 231B(1)</td>                                                                                                                        '

                                    + '                    <td class="a">PAID</td>                                                                                                                                          '

                                    + '                </tr>                                                                                                                                                            '

                            }


                            cou = 0;
                            $(".Fees").each(function (index) {

                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;"> 1.' + index + '</td>                                                                                                                       '

                                    + '                    <td style="text-align: left;">' + FeesList[index]['Name'] + '</td>                                                                                                         '

                                    + '                    <td class="a">' + addCommas(FeesList[index]['Amount']) + '</td>                                                                                                                                      '

                                    + '                                                                                                                                                                                 '

                                    + '                </tr>                                                                                                    ';
                                cou = index++;
                            });


                            if (TaxAmount != 0) {

                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;">1.' + cou + '</td>                                                                                                                        '

                                    + '                    <td style="text-align: left;">TOKEN TAX </td>                                                                                                                        '

                                    + '                    <td class="a">' + addCommas(TaxAmount) + '</td>                                                                                                                                          '

                                    + '                </tr>  ';

                            }


                            $.each(ArrearList, function (index, value) {

                                printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '

                                    + '                    <td style="text-align: center;"> 2.' + (index + 1) + '</td>                                                                                                                       '

                                    + '                    <td style="text-align: left;">' + ArrearList[index]['Name'] + ' (' + ArrearList[index]['Type'] + ')' + '</td>                                                                                                         '

                                    + '                    <td class="a">' + addCommas(ArrearList[index]['Amount']) + '</td>                                                                                                                                      '

                                    + '                                                                                                                                                                                 '

                                    + '                </tr>                                                                                                    ';

                            });

                            //+ '                <tr>                                                                                                                                                             '

                            //+ '                </tr>                                                                                                                                                            '

                            //+ '                    <td style="text-align: center;">5</td>                                                                                                                        '

                            //+ '                    <td style="text-align: center;">Transfer Fee</td>                                                                                                                        '

                            //+ '                    <td class="a">' + 56 + '</td>                                                                                                                                          '

                            //+ '                <tr>                                                                                                                                                             '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td class="a"></td>                                                                                                                                          '

                            //+ '                </tr>                                                                                                                                                            '

                            //+ '                <tr>                                                                                                                                                             '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td class="a"></td>                                                                                                                                          '

                            //+ '                </tr>                                                                                                                                                            '

                            //+ '                <tr>                                                                                                                                                             '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                            //+ '                    <td class="a"></td>                                                                                                                                          '

                            //+ '                </tr>                                                                                                                                                            '

                            printn += '                <tr>                                                                                                                                                             '

                                + '                    <td style="text-align: center;"></td>                                                                                                                        '

                                + '                    <td style="text-align: right;">TOTAL AMOUNT</td>                                                                                                             '

                                + '                    <td class="a">Rs ' + addCommas(TotalAmount) + '</td>                                                                                                                                 '

                                + '                </tr>                                                                                                                                                            '

                                + '            </tbody>                                                                                                                                                             '

                                + '        </table>                                                                                                                                                                 '

                                + '                                                                                                                                                                                 '

                                + '        </div>                                                                                                                                                                   '

                                + '      <br />              <div style="width: 100%;float: left;">                                                                                                                        '

                                + '                     <div style="width: 30%;float: left;">   <h4 style="font-size: 12px;margin: 3px 0px 0px 5px">Amount In Words</h4>     </div>                                                                       '
                                + '                     <div style="width: 70%;float: left;">   <p style="font-size: 12px;margin: 3px 0px 0px 5px">' + inwords + '</p>          </div>                                                                  '

                                + '                    </div>        <br />                                                                                                                                               '

                                + '                   <div style="width:100%;">                                                                                                                                    '

                                + '                    <div style="width: 70%;float: left;">                                                                                                                        '

                                + '                        <h2 style="font-size: 12px;margin: 3px 0px 0px 5px">BANK OFFICER STAMP SIGNATURE</h2>                                                                            '

                                + '                    </div>                                                                                                                                                       '

                                + '                    <div style="width:30%;float: left;"><h2 style="font-size: 12px;margin: 3px 0px">DEO NAME</h2></div>                                                          '

                                + '                    <hr><div style="width: 100%;text-align:center;">                                                                                                                        '

                                + '                        <h2 style="font-size: 12px;margin: 3px 0px 0px 5px">APPLICANT SIGNATURE</h2>                                                                            '

                                + '                    </div>                                                                                                                                                       '

                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'

                                + '                    <hr><div style="width: 100%;text-align:center;">                                                                                                                        '

                                + '                        <h2 style="font-size: 12px;margin: 3px 0px 0px 5px">ETO SIGNATURE/STAMP</h2>                                                                            '

                                + '                    </div>                                                                                                                                                       '


                                + '                   </div>                                                                                                                                                       '

                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'

                                + '                </div>                                                                                                                                                           '

                                + '            </div>                                                                                                                                                               '

                                + '<!-------------------------------<1st copy ended--------------------------------------------------->                                                                             '

                                // + '            <div style="width: 33%;float: left; border: 1px solid;">                                                                                                             '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <div class="table_header">                                                                                                                                   '
                                //
                                // + '                        <h3 style="text-align: center;margin: 20px auto;border-bottom: 1px solid;">TREASURY`s COPY</h3>                                                                '
                                //
                                // + '                    </div>                                                                                                                                                       '
                                //
                                // + '                    <div style="width: 100%;margin: 25px auto;">                                                                                                                 '
                                //
                                // + '                        <div style="width: 100%">                                                                                                                                '
                                //
                                // + '                            <h2 style="font-size: 15px;text-align: center;margin-bottom: 10px;">BALOCHISTAN EXCISE AND TAXATION</h2>                                            '
                                //
                                // + '                        </div>                                                                                                                                                   '
                                //
                                // + '                    </div>                                                                                                                                                       '
                                //
                                // + '                    <div style="width: 100%;margin: 10px auto;">                                                                                                                 '
                                //
                                // + '                        <div style="width: 50%;float: left">                                                                                                                     '
                                //
                                // + '                            <div style="width: 100%">                                                                                                                            '
                                //
                                // + '                                <h4 style="width: 40%;float: left;margin: 7px -30px 0px 2px;text-align: center;font-size: 12px;">DISTRICT</h4>                                                                                        '
                                //
                                // + '                                <input type="text" value="' + $("#District").val() + '" style="width:45%;float: left;margin: 3px 0px 0px 40px;border-top: none;border-left: none;border-right: none;" disabled>        '
                                //
                                // + '                            </div>                                                                                                                                               '
                                //
                                // + '                                                                                                                                                                                 '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                // + '            <div style="width: 50%;float: left">                                                                                                                                 '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 57%;float: left;margin: 7px -30px 0px -7px;text-align: center;font-size: 12px;">STATUS</h4>                                                                           '
                                //
                                // + '                    <input type="text" value="' + $("#Status").val() + '"  style="width: 40%;float: left;margin: 3px 0px 0px 24px;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                // + '                    <input type="text" value="' + $("#acStatus").val() + '"  style="width: 40%;float: left;margin: 3px 0px 0px 24px;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                // // + '                    <textarea type="text" value="' + $("#cStatus").val() + '"  style="width: 60%;float: left;margin: 3px 0px 0px 24px;border-top: none;border-left: none;border-right: none;" disabled>' + $("#cStatus").val() + '</textarea>                    '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                //
                                // + '            <div style="width: 100%;float: left">                                                                                                                                '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">REGISTERATION DATE</h4>                                                                                 '
                                //
                                // + '                    <input type="text" value="' + $('#date_of_registration').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                //
                                // + '            <div style="width: 50%;float: left">                                                                                                                                 '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 20%;float: left;margin: 7px -30px 0px 5px;text-align: center;font-size: 12px;">DATE</h4>                                                                                                '
                                //
                                // + '                    <input type="text" value="' + d + '" style="width: 70%;float: left;margin: 3px 0px 0px 40px;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '                                                                                                                                                                                 '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                // + '            <div style="width: 100%;float: left">                                                                                                                                 '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 30%;float: left;margin: 10px -30px 0px 5px;font-size: 12px;">BOOK SERIAL NO.</h4>                                                       '
                                //
                                // + '                    <input type="text" value="' + Data.book_serialNo + '" placeholder=""  style="width: 40%;float: left;margin: 3px 0px 0px 40px;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                // + '            <div style="width: 100%;float: left">                                                                                                                                '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">CHALLAN NO</h4>                                                                                 '
                                //
                                // + '                    <input type="text" value="' + Data.challan_no + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '                                                                                                                                                                                 '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                // + '            <div style="width: 100%;float: left">                                                                                                                                '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">REGISTRATION NUMBER</h4>                                                                                 '
                                //
                                // + '                    <input type="text" value="' + $('#RegistrationNo').val().toUpperCase() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '                                                                                                                                                                                 '
                                //
                                //
                                // + '            <div style="width: 100%;float: left">                                                                                                                                '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">ENGINE CC</h4>                                                                                 '
                                //
                                // + '                    <input type="text" value="' + $('#EngineNo').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                // + '            <div style="width: 100%;float: left">                                                                                                                                '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">ENGINE NO</h4>                                                                                 '
                                //
                                // + '                    <input type="text" value="' + $('#ChassisNo').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                // + '            <div style="width: 100%;float: left">                                                                                                                                '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">LADEN WEIGHT</h4>                                                                                 '
                                //
                                // + '                    <input type="text" value="' + $('#UnladenWeight').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                // + '            <div style="width: 100%;float: left">                                                                                                                                '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">SEATING CAPACITY</h4>                                                                                 '
                                //
                                // + '                    <input type="text" value="' + $('#SeatingCapacity').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                // + '            </div>                                                                                                                                                               '
                                // + '            <div style="width: 100%;float: left">                                                                                                                                '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 45%;float: left;margin-left: 2%;">OWNER </h4>                                                                                 '
                                //
                                // + '                    <textarea type="text" value="' + $('#OwnerName').val() + '"  style="width: 45%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;height: 65px;" disabled>' + $('#OwnerName').val() + '</textarea> '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '                                                                                                                                                                                 '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                // + '            <div style="width: 100%;float: left">                                                                                                                                '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 35%;float: left;margin-left: 2%;">ADDRESS</h4>                                                                                 '
                                //
                                // + '                    <textarea type="text" value="' + Data.address+ '"  style="width: 55%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;height:65px;" disabled>' + Data.address+ '</textarea> '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '                                                                                                                                                                                 '
                                //
                                // + '            </div>                                                                                                                                                               '
                                // + '            <div style="width: 100%;float: left">                                                                                                                                '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 55%;float: left;margin-left: 2%;">CATEGORY</h4>                                                                                 '
                                //
                                // + '                    <input type="text" value="' + $('#Category').val() + '"  style="width: 40%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '                                                                                                                                                                                 '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                //
                                // + '            <div style="width: 100%;float: left">                                                                                                                                '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 45%;float: left;margin-left: 2%;">CNIC/NTN</h4>                                                                                 '
                                //
                                // + '                    <input type="text" value="' + $('#CNIC').val() + '"  style="width: 50%;float: left;margin: 12px 0px 0px 0px;border-top: none;border-left: none;border-right: none;" disabled> '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '                                                                                                                                                                                 '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                // + '            <div style="width: 100%;">                                                                                                                                 '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="margin-top: 1%;width: 50%;float: left;margin-left: 9px;">LAST TAX PAID UPTO</h4>                                                                                  '
                                //
                                // + '                    <input type="text" value="' + oneDayBeforeYearsFrom + '"  style="width: 40%;float: left;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '                                                                                                                                                                                 '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                // + '            <div style="width: 100%;float: left">                                                                                                                                 '
                                //
                                // + '                <div style="width: 100%">                                                                                                                                        '
                                //
                                // + '                    <h4 style="width: 50%;float: left;margin: 3px 0px;margin-left: 5%;">RENEWED UPTO</h4>                                                                     '
                                //
                                // + '                    <input type="text" value="' + ren + '"  style="width: 40%;float: left;border-top: none;border-left: none;border-right: none;" disabled>                    '
                                //
                                // + '                </div>                                                                                                                                                           '
                                //
                                // + '            </div>                                                                                                                                                               '
                                //
                                // + '                                                                                                                                                                                 '
                                //
                                // + '                                                                                                                                                                                 '
                                //
                                // + '        </div>                                                                                                                                                                   '
                                //
                                // + '                    <div class="table">                                                                                                                                          '
                                //
                                // + '            <table>                                                                                                                                                              '
                                //
                                // + '            <tbody>                                                                                                                                                              '
                                //
                                // + '                <tr>                                                                                                                                                             '
                                //
                                // + '                    <td style="border-bottom: 1px solid;text-align: center;">S.#</td>                                                                                            '
                                //
                                // + '                    <td style="border-bottom: 1px solid;text-align: center;">DESCRIPTION OF TAX</td>                                                                             '
                                //
                                // + '                    <td style="border-bottom: 1px solid;text-align: center;border-right: 0px">AMOUNT</td>                                                                        '
                                //
                                // + '                                                                                                                                                                                 '
                                //
                                // + '                </tr>                                                                                                                                                            '

                                // if (($('#Professional').val() != null) && ($('#Professional').val() != '') && ($('#Professional').val() != 'undefined') && ($('#Professional').val() != 0)) {
                                //
                                //     printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '
                                //
                                //         + '                    <td style="text-align: center;">0.0</td>                                                                                                                       '
                                //
                                //         + '                    <td style="text-align: left;">' + $('#ProfessionalLabel').text().trim() + '</td>                                                                                                      '
                                //
                                //         + '                    <td class="a">' + addCommas($('#Professional').val()) + '</td>                                                                                                                                      '
                                //
                                //         + '                                                                                                                                                                                 '
                                //
                                //         + '                </tr>                                                                                                                       ';
                                //
                                // }
                                //
                                // if ($("#tax18").is(":checked")) {
                                //
                                //
                                //
                                //     printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '
                                //
                                //         + '                    <td style="text-align: center;">-</td>                                                                                                                        '
                                //
                                //         + '                    <td style="text-align: left;">FEDRAL TAX 231B(1)</td>                                                                                                                        '
                                //
                                //         + '                    <td class="a">Paid</td>                                                                                                                                          '
                                //
                                //         + '                </tr>                                                                                                                                                            '
                                //
                                // }
                                //
                                //
                                // cou=0;
                                // $(".Fees").each(function (index) {
                                //
                                //     printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '
                                //
                                //         + '                    <td style="text-align: center;"> 1.' + index + '</td>                                                                                                                       '
                                //
                                //         + '                    <td style="text-align: left;">' + FeesList[index]['Name'] + '</td>                                                                                                         '
                                //
                                //         + '                    <td class="a">' + addCommas(FeesList[index]['Amount']) + '</td>                                                                                                                                      '
                                //
                                //         + '                                                                                                                                                                                 '
                                //
                                //         + '                </tr>                                                                                                    ';
                                //     cou=index++;
                                // });
                                //
                                //
                                //
                                // if (TaxAmount != 0) {
                                //
                                //     printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '
                                //
                                //         + '                    <td style="text-align: center;">1.' + cou + '</td>                                                                                                                        '
                                //
                                //         + '                    <td style="text-align: left;">TOKEN TAX </td>                                                                                                                        '
                                //
                                //         + '                    <td class="a">' + addCommas(TaxAmount) + '</td>                                                                                                                                          '
                                //
                                //         + '                </tr>  ';
                                //
                                // }
                                //
                                //
                                // $.each(ArrearList, function(index, value) {
                                //
                                //     printn += '                <tr style="border-bottom: 0.5px solid;">                                                                                                                                                             '
                                //
                                //         + '                    <td style="text-align: center;"> 2.' + (index+1) + '</td>                                                                                                                       '
                                //
                                //         + '                    <td style="text-align: left;">' + ArrearList[index]['Name'] + ' ('+ArrearList[index]['Type']+')'+ '</td>                                                                                                         '
                                //
                                //         + '                    <td class="a">' + addCommas(ArrearList[index]['Amount']) + '</td>                                                                                                                                      '
                                //
                                //         + '                                                                                                                                                                                 '
                                //
                                //         + '                </tr>                                                                                                    ';
                                //
                                // });

                                //+ '                <tr>                                                                                                                                                             '

                                //+ '                </tr>                                                                                                                                                            '

                                //+ '                    <td style="text-align: center;">5</td>                                                                                                                        '

                                //+ '                    <td style="text-align: center;">Transfer Fee</td>                                                                                                                        '

                                //+ '                    <td class="a">' + 56 + '</td>                                                                                                                                          '

                                //+ '                <tr>                                                                                                                                                             '

                                //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                                //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                                //+ '                    <td class="a"></td>                                                                                                                                          '

                                //+ '                </tr>                                                                                                                                                            '

                                //+ '                <tr>                                                                                                                                                             '

                                //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                                //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                                //+ '                    <td class="a"></td>                                                                                                                                          '

                                //+ '                </tr>                                                                                                                                                            '

                                //+ '                <tr>                                                                                                                                                             '

                                //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                                //+ '                    <td style="text-align: center;"></td>                                                                                                                        '

                                //+ '                    <td class="a"></td>                                                                                                                                          '

                                //+ '                </tr>                                                                                                                                                            '

                                // printn += '                <tr>                                                                                                                                                             '
                                //
                                //     + '                    <td style="text-align: center;"></td>                                                                                                                        '
                                //
                                //     + '                    <td style="text-align: right;">TOTAL AMOUNT</td>                                                                                                             '
                                //
                                //     + '                    <td class="a">Rs ' + addCommas(TotalAmount) + '</td>                                                                                                                                 '
                                //
                                //     + '                </tr>                                                                                                                                                            '
                                //
                                //     + '            </tbody>                                                                                                                                                             '
                                //
                                //     + '        </table>                                                                                                                                                                 '
                                //
                                //     + '                                                                                                                                                                                 '
                                //
                                //     + '        </div>                                                                                                                                                                   '
                                //     + '            <br />        <div style="width: 100%;float: left;">                                                                                                                        '
                                //
                                //     + '                     <div style="width: 30%;float: left;">   <h4 style="font-size: 12px;margin: 3px 0px 0px 5px">Amount In Words</h4>     </div>                                                                       '
                                //     + '                     <div style="width: 70%;float: left;">   <p style="font-size: 12px;margin: 3px 0px 0px 5px">'+inwords+'</p>          </div>                                                                  '
                                //
                                //     + '                    </div>              <br />                                                                                                                                         '
                                //
                                //
                                //     + '                   <div style="width:100%;">                                                                                                                                    '
                                //
                                //     + '                    <div style="width: 70%;float: left;">                                                                                                                        '
                                //
                                //     + '                        <h2 style="font-size: 12px;margin: 3px 0px 0px 5px">BANK OFFICER STAMP SIGNATURE</h2>                                                                            '
                                //
                                //     + '                    </div>                                                                                                                                                       '
                                //
                                //     + '                    <div style="width:30%;float: left;"><h2 style="font-size: 12px;margin: 3px 0px">DEO NAME</h2></div>                                                          '
                                //
                                //     + '                    <hr><div style="width: 100%;text-align:center;">                                                                                                                        '
                                //
                                //     + '                        <h2 style="font-size: 12px;margin: 3px 0px 0px 5px">APPLICANT SIGNATURE</h2>                                                                            '
                                //
                                //     + '                    </div>                                                                                                                                                       '
                                //
                                //     + '<br>'
                                //     + '<br>'
                                //     + '<br>'
                                //
                                //     + '                    <hr><div style="width: 100%;text-align:center;">                                                                                                                        '
                                //
                                //     + '                        <h2 style="font-size: 12px;margin: 3px 0px 0px 5px">ETO SIGNATURE/STAMP</h2>                                                                            '
                                //
                                //     + '                    </div>                                                                                                                                                       '
                                //
                                //
                                //     + '                   </div>                                                                                                                                                       '
                                //
                                //     + '                </div>                                                                                                                                                           '

                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'
                                + '<br>'

                                + '            </div>                                                                                                                                                               '


                                + '        </div>                                                                                                                                                                   '

                                + '                                                                                                                                                                                 '

                                + '                                                                                                                                                                                 '

                                + '    </body>                                                                                                                                                                      '

                                + '</html>                                                                                                                                   ';

                            printDiv(printn);

                        }

                        function printDiv(printSection) {

                            var returnList = [];

                            $('.iterate').each(function () {

                                //$("", this).val();

                                var ArrearType = $('.Gov option:selected', this).val();

                                //console.log(ArrearType);

                                var ArrearName = $('.ArrearName', this).val();

                                var Charges = $('.Charges', this).val();

                                returnList.push({
                                    'ArrearType': ArrearType,
                                    'ArrearName': ArrearName,
                                    'Charges': Charges
                                });

                            });

                            var w = window.open();

                            $(w.document.body).html(printSection);

                            w.print();

                            /* printSection.replace('NaN', '');*/

                            setTimeout(function () {

                            }, 2000);

                            //Reset the page's HTML with div's HTML only

                            document.body.innerHTML = printSection;

                            document.head.innerHTML = "";

                            //Print Page

                            //window.print();

                            location.reload();

                        }


                        var a = ['', 'one ', 'two ', 'three ', 'four ', 'five ', 'six ', 'seven ', 'eight ', 'nine ', 'ten ', 'eleven ', 'twelve ', 'thirteen ', 'fourteen ', 'fifteen ', 'sixteen ', 'seventeen ', 'eighteen ', 'nineteen '];
                        var b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

                        function inWords(num) {
                            // var num= document.getElementById('digit').value;
                            if ((num = num.toString()).length > 9) return 'overflow';
                            n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
                            if (!n) return;
                            var str = '';
                            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
                            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
                            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
                            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
                            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
                            return str;
                        }


                    </script>

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

                                                    $(".iterate" + id).find('.TaxType', this).append('<option value="' + value.id + '">' + value.title + '</option>');

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
                            $("#ntn_no").prop("disabled", true)

                            $("#MobileNumber").prop("disabled", true)

                            $("#LastPaidYear").prop("disabled", true)

                            $("#LastPaidAmount").prop("disabled", true)

                            //$("#YearsFrom").prop("disabled",true)

                            //$("#YearsTo").prop("disabled",true)

                            //$("#DurationID").prop("disabled",true)

                            // $('#filler').attr('checked', true);

                            $('#company').attr('checked', true);

                            $('#ac').attr('checked', true);

                            $("#TaxAmount").prop("disabled", true)

                            $("#TotalAmount").prop("disabled", true)

                            $("#ChassisNo").prop("disabled", true)

                            $("#model").prop("disabled", true)

                            $("#EngineNo").prop("disabled", true)

                            $("#removeFee").prop("disabled", true)

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

                            LoadGov();

                            var value = $('#RecordId').val();

                            if (value != "") {

                                GetData(value);

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

                            $("#feeTable tbody").find("tr:gt(0)").remove();

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
                            $("#ntn_no").val('');

                            $("#MobileNumber").val('');

                            $("#LastPaidYear").val('');

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

                        function SaveTaxInfo() {

                            $("#Search").prop('disabled', false)

                            var check = true;

                            if ($('#DurationID').val() != 16) {

                                // if ($("#YearsFrom").val() == null || $("#YearsFrom").val() == "") {

                                //     $('#YearsFrom').addClass('error');

                                //     check = false;

                                // }

                                // if ($("#YearsTo").val() == null || $("#YearsTo").val() == "") {

                                //     $('#YearsTo').addClass('error');

                                //     check = false;

                                // }

                                // if ($("#ArrearYearFrom").val() == null || $("#ArrearYearFrom").val() == "") {

                                //    $('#ArrearYearFrom').addClass('error');

                                //    check = false;

                                // }

                                // if ($("#ArrearYearTo").val() == null || $("#ArrearYearTo").val() == "") {

                                //    $('#ArrearYearTo').addClass('error');

                                //    check = false;

                                // }
                            }

                            if (check == false) {

                                swal("Please fill the Required Field.");

                                //    $("#DivisionRegion").css("display", "block");

                                //    $("#DivisionRegion").html("Please fill the required field(s)").css("font-size","large");

                                return false;

                            } else {


                                var TotalTaxAmount = 0;


                                if ($("#tax16").is(':checked')) {
                                    if ($('#DurationID').val() != 16) {
                                        if ($('#LastPaidYear').val() == $('#YearsTo').val()) {
                                            swal("Last Paid And Renewupto Date should not be same! ");
                                            return false;
                                        }
                                    }
                                }


                                var District = $("#District").val();

                                // var category = $("#Category").val();

                                // var Class = $("#Class").val();

                                // var BodyTpe = $("#BodyType").val();

                                var DistrictID = $("#DistrictID").val();

                                // var OwnerName = $("#OwnerName").val();

                                var RegistrationNo = $("#RegistrationNo").val();

                                // var CNIC = $("#CNIC").val();

                                // var MobileNumber = $("#MobileNumber").val();

                                var LastPaidYear = $("#YearsTo").val();

                                var LastPaidAmount = $("#LastPaidAmount").val();


                                var TaxApplicableYearsFrom = $("#YearsFrom").val();

                                // if($("#tax16").is(':checked'))
                                // {
                                //     var TaxApplicableYearsTo = $("#YearsTo").val();
                                //
                                // }
                                // else
                                // {
                                //     var TaxApplicableYearsTo=0;
                                // }

                                //hassan
                                // var oneDayBeforeYearsFrom = ''
                                // if(TaxApplicableYearsFrom != ""){
                                //     var parts = TaxApplicableYearsFrom.split('-');
                                //     var year = parseInt(parts[0]);
                                //     var month = parseInt(parts[1]);
                                //     var day = parseInt(parts[1]);
                                //     var date = new Date(year, month - 1, day);
                                //
                                //     date.setDate(date.getDate() - 1);
                                //
                                //     oneDayBeforeYearsFrom = date.toISOString().slice(0, 10);
                                // }

                                var TaxApplicableYearsTo = $("#YearsTo").val();


                                var Reg_id = $("#Reg_id").val();
                                // var ChassisNo = $("#ChassisNo").val();

                                // var EngineNo = $("#EngineNo").val();

                                var Duration = $("#DurationID option:selected").text();

                                var TokenYearsFrom = $('#YearsFrom').val();

                                var TokenYearsTo = $('#YearsTo').val();

                                var TotalAmount = parseInt($("#TotalAmount").val());


                                var opt = $('input[name="optradio"]:checked').val();

                                var status = $('input[name="status"]:checked').val();

                                var acstatus = $('input[name="ac_status"]:checked').val();

                                var cstatus = $('input[name="c_status"]:checked').val();


                                if (status == "F") {
                                    status = "Filer";
                                } else if (status == "NF") {
                                    status = "Non Filer";
                                }

                                if (acstatus == "AC") {
                                    acstatus = "AC";
                                } else if (acstatus == "NAC") {
                                    acstatus = "Non AC";
                                }

                                var _token = $("input[name='_token']").val();

                                var NextDateForTax = $("#NextDateForTax").val();

                                var TaxAmount1 = $("#TaxAmount").val();

                                ArrearList = [];

                                len = $('#maintabl tr').length;

                                for (var i = 0; i <= len; i++) {
                                    $('.iterate' + i).each(function () {

                                        //$("", this).val();

                                        var ArrearType = $('.Gov option:selected', this).text();

                                        var Charges = $('.Charges', this).val();

                                        var ArrearYearsFrom = $('.ArrearYearsFrom', this).val();

                                        var ArrearYearsTo = $('.ArrearYearsTo', this).val();

                                        var ArrearDurationID = $('.ArrearDurationID option:selected', this).text();

                                        var ArrearName = $('.TaxType option:selected', this).text();

                                        if ($('.Gov option:selected', this).val() != 0 && $('.Gov option:selected', this).val() != "") {
                                            ArrearList.push({
                                                Name: ArrearName,
                                                Amount: Charges,
                                                Type: ArrearType,
                                                From: ArrearYearsFrom,
                                                To: ArrearYearsTo,
                                                Duration: ArrearDurationID
                                            });

                                            ProTotAL += parseInt($('.Charges', this).val());
                                        }


                                    });

                                }

                                var FeesList = [];
                                var Feediff = [];

                                $(".Fees").each(function () {

                                    var FeeType = $(".FeeType4", this).val();

                                    var Feeid = $(".FeeType5", this).val();

                                    var Feeamount = $(".ProvincialFeeAmount", this).val();

                                    if (Feeid == 14 || Feeid == 23 || Feeid == 6) {
                                        Dur = $("#tax_dur" + Feeid + " option:selected").text();
                                        if (Feeid == 23) {
                                            FeesList.push({
                                                ID: Feeid,
                                                Name: FeeType,
                                                Amount: Feeamount,
                                                Duration: Dur,
                                                opt: opt
                                            });
                                        } else {
                                            FeesList.push({ID: Feeid, Name: FeeType, Amount: Feeamount, Duration: Dur});
                                        }

                                    } else {
                                        FeesList.push({ID: Feeid, Name: FeeType, Amount: Feeamount});

                                    }


                                });


                                len = $('#Adjustmentmaintabl tr').length;

                                lenf = $('#feeTable tr').length;

                                var tok = $('#tax16').val();

                                if (tok == 16) {
                                    FeesList.push({
                                        ID: "16",
                                        Name: "Token Tax",
                                        Amount: TaxAmount1,
                                        From: TokenYearsFrom,
                                        To: TokenYearsTo,
                                        Duration: Duration
                                    });
                                    lenf = lenf + 1;
                                }

                                var id = 0;
                                for (var i = 0; i <= len; i++) {
                                    $('.Adjustmentiterate' + i).each(function () {

                                        //$("", this).val();
                                        var check = 0;
                                        var AdjustmentType = $('.AdjustmentGov option:selected', this).val();
                                        var AdjustmentName = $('.AdjustmentTaxType option:selected', this).text();
                                        var Charges = $('.AdjustmentCharges', this).val();

                                        var AdjustmentID = $('.AdjustmentTaxType', this).val();


                                        for (var j = 0; j < (lenf - 1); j++) {


                                            if (FeesList[j]['ID'] == AdjustmentID) {

                                                if (FeesList[j]['Amount'] > Charges) {
                                                    $('#TotalAmount').val(parseInt($('#TotalAmount').val()) - (parseFloat(FeesList[j]['Amount']) - parseFloat(Charges)));
                                                } else if (FeesList[j]['Amount'] < Charges) {
                                                    $('#TotalAmount').val(parseInt($('#TotalAmount').val()) + (parseFloat(Charges) - parseFloat(FeesList[j]['Amount'])));
                                                }

                                                FeesList[j]['ID'] = AdjustmentID;
                                                FeesList[j]['Amount'] = Charges;

                                                if (AdjustmentID == 16) {
                                                    $("#TaxAmount").val(Charges);
                                                    pop = j;
                                                }
                                                check = 1;

                                            }


                                        }

                                        if (check == 0) {
                                            if (AdjustmentID != 0) {
                                                lcon = ($('#feeTable tr').length);

                                                FeesList.push({
                                                    ID: AdjustmentID,
                                                    Name: AdjustmentName,
                                                    Amount: Charges
                                                });
                                                $('#TotalAmount').val(parseInt($('#TotalAmount').val()) + (parseFloat(Charges)))
                                                $('#adddown').append(`<tr class="Fees">

                                        <td><label>` + lcon + `</label></td>

                                        <!--<td>-->





                                                <!--</td>-->

                                                <td>



                                                <input type="text" class="form-control wdth60 FeeType4" name="FeeType4" id="FeeType4" style="width: 250px;" value="` + AdjustmentName + `" disabled="">
                                                <input type="hidden" class="form-control wdth60 FeeType5" name="FeeType5" id="FeeType5" style="width: auto;" disabled="" value="` + AdjustmentID + `">

                                                </td>

                                                <td>





                                                </td>

                                                    <!--<td>-->





                                                <!--</td>-->

                                                <td>

                                                <input type="number" class="form-control ProvincialFeeAmount" name="ProvincialFeeAmount" id="ProvincialFeeAmount" value="` + Charges + `" disabled="">

                                                </td>

                                                <td>

                                                <button id="addmore1" hidden=""><i class="fa fa-plus" aria-hidden="true"></i></button>

                                                </td>

                                                <td>

                                                <button id="removeFee"><i class="fa fa-minus" aria-hidden="true"></i></button>

                                                </td>

                                                </tr>`
                                                );
                                            }


                                        }


                                    });


                                }


                                console.log(FeesList);
                                TotalAmount = parseInt($("#TotalAmount").val());

                                //UpdateRecordVochar(DistrictID, RegistrationNo);

                                $.ajax({

                                    url: "/voucher",

                                    type: "POST",

                                    dataType: "JSON",

                                    contentType: "application/json",

                                    data: JSON.stringify({

                                        _token: _token,

                                        District: District,

                                        RegistrationNo: RegistrationNo,

                                        TaxApplicableYearsFrom: TaxApplicableYearsFrom,

                                        TaxApplicableYearsTo: TaxApplicableYearsTo,

                                        LastPaidYear: LastPaidYear,

                                        LastPaidAmount: LastPaidAmount,

                                        TotalAmount: TotalAmount,

                                        Fees: FeesList,

                                        DistrictID: DistrictID,

                                        status: status,

                                        Reg_id: Reg_id,

                                        Arrears: ArrearList,


                                    }),

                                    success: function (response) {
                                        console.log("response-response",response)

                                        if (response.Data != null) {

                                            // saveExcludeTaxes(response.Data);

                                            for (var j = 0; j < FeesList.length; j++) {


                                                if (FeesList[j]['ID'] == "16") {

                                                    FeesList.splice(j, 1);

                                                }


                                            }
                                            PrintChallan(response.Data, FeesList);

                                        } else {

                                        }

                                    },

                                    error: function (response) {

                                    }

                                });

                            }

                        }


                        var RowCounter;

                        $('#addmore').click(function () {

                            //var CloneVar = $(this).parent("tr").clone();

                            //$('#maintabl').appendTo(CloneVar);

                            $("#maintabl").each(function () {

                                var rowCount = $('#maintabl tbody tr').length;

                                var tds = '<tr class="iterate' + rowCount + '" >';

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

                        <select Id="Gov" class="form-control Gov" id="ID" name="ID" style="width: 100%;" onchange="GovSelect(` + (rowCount - 1) + ` , 'arrear')"><option value='0'>Select Gov</option>

                            <option value="1">Provincial</option>

                            <option value="2">Federal</option>

                            </select>



                        </td>`);


                                    $("#maintabl tr:last-child td:last-child").replaceWith("<td></td>");

                                    $("#maintabl tr:last-child td:nth-child(7)").replaceWith(`<td><select Id="ArrearDurationID" class="form-control ArrearDurationID"  name="ArrearDurationID" style="width: 100%;" onchange="ArrearDuration(` + (rowCount - 1) + `)"><option value="">Select Duration</option>

                        <option value="10">Per Year</option>

                        <option value="11">Per Quarter</option>

                        <option value="13">Semi Annual</option>

                        <option value="16">Life Time</option>

                        </select></td>`);
                                    $("#maintabl tr:last-child td:nth-child(6)").replaceWith(`<td>

                    <input type="Number" id="Charges"  class="form-control Charges" min="0" onkeyup= "SaveVal(` + (rowCount - 1) + `)"/>
                    <input type="hidden" id="ChargeV"  class="form-control ChargeV" min="0" />

                    </td>`);


                                } else {

                                    $(this).append(tds);

                                }

                            });

                        });

                        $('#Adjustmentaddmore').click(function () {

                            //var CloneVar = $(this).parent("tr").clone();

                            //$('#maintabl').appendTo(CloneVar);

                            $("#Adjustmentmaintabl").each(function () {

                                var rowCount = $('#Adjustmentmaintabl tbody tr').length;

                                var tds = '<tr class="Adjustmentiterate' + rowCount + '" >';

                                jQuery.each($('tr:last td', this), function () {

                                    tds += '<td>' + $(this).html() + '</td>';

                                });

                                tds += '</tr>';

                                if ($('tbody', this).length > 0) {

                                    $('tbody', this).append(tds);

                                    var rowCount = $('#Adjustmentmaintabl tbody tr').length;

                                    RowCounter = rowCount;

                                    $("#Adjustmentmaintabl tr:last-child td:first-child").replaceWith("<td><label>" + rowCount + "</label></td>");
                                    $("#Adjustmentmaintabl tr:last-child td:nth-child(2)").replaceWith(`<td>

                        <select Id="AdjustmentGov" class="form-control AdjustmentGov" id="ID" name="ID" style="width: 100%;" onchange="GovSelect(` + (rowCount - 1) + `, 'adjustment')"><option value="">Select Gov</option>

                            <option value="1">Provincial</option>

                            <option value="2">Federal</option>

                            </select>



                        </td>`);


                                    $("#Adjustmentmaintabl tr:last-child td:last-child").replaceWith("<td></td>");

                                    $("#Adjustmentmaintabl tr:last-child td:nth-child(8)").replaceWith(`<td class="allowdur` + (rowCount - 1) + `"  ><select Id="AdjustmentDurationID" class="form-control AdjustmentDurationID"  name="AdjustmentDurationID" style="width: 100%;" onchange="AdjustmentDuration(` + (rowCount - 1) + `)"><option value="">Select Duration</option>

                        <option value="10">Per Year</option>

                        <option value="11">Per Quarter</option>

                        <option value="13">Semi Annual</option>

                        <option value="16">Life Time</option>

                        </select></td>`);
                                    $("#Adjustmentmaintabl tr:last-child td:nth-child(5)").replaceWith(`<td class="allowdur` + (rowCount - 1) + `" >

                        <input type="date" class="form-control wdth60 AdjustmentYearsFrom" id="AdjustmentYearsFrom" style="width: auto;" onblur="ValidateDateFormat()" />

                        </td>`);
                                    $("#Adjustmentmaintabl tr:last-child td:nth-child(6)").replaceWith(` <td class="allowdur` + (rowCount - 1) + `">



                        <input type="date" class="form-control wdth60 AdjustmentYearsTo" id="AdjustmentYearsTo" style="width: auto;" onblur="ValidateDateFormatFrom()" />

                    </td>`);
                                    $("#Adjustmentmaintabl tr:last-child td:nth-child(4)").replaceWith(`<td ><input type="checkbox" name="allowdur` + (rowCount - 1) + `" id="allowdur` + (rowCount - 1) + `"></td>`);
                                    $("#Adjustmentmaintabl tr:last-child td:nth-child(7)").replaceWith(`<td>

                    <input type="Number" id="AdjustmentCharges"  class="form-control AdjustmentCharges" min="0" ) placeholder="Enter Adjustment Amount"/>


                    </td>`);
                                    // <input type="hidden" id="ChargeV"  class="form-control ChargeV" min="0" />
                                    $("#allowdur" + (rowCount - 1)).change(function () {
                                        var $input = $(this);

                                        if ($input.is(":checked")) {
                                            $(".allowdur" + (rowCount - 1)).show();
                                            $(".allowdurt").show();
                                        } else {
                                            $(".allowdur" + (rowCount - 1)).hide();
                                            $(".allowdurt").hide();
                                        }

                                    }).change();

                                } else {

                                    $(this).append(tds);

                                }

                            });

                        });

                        function SaveVal(id) {
                            let Charges = $('.iterate' + id).find('.Charges', this).val();

                            $('.iterate' + id).find('.ChargeV', this).val(Charges);
                        }

                        function UpdateRecordVochar(DivisionID, Regno) {

                            var stat = null;

                            $.ajax({

                                url: '/DEO/UpdateRecordVochar',

                                type: "GET",

                                dataType: "JSON",

                                async: false, //int? DivisionID, string Regno

                                data: {DivisionID: DivisionID, Regno: Regno},

                                success: function (response) {

                                    if (response.Status) {

                                        //var msg = "";

                                        if (response.Status >= 0) {

                                            // $("#RegistrationNo").css("display", "block");

                                            //$("#chassisNo").html(" chassis number exist");

                                            // console.log(response.msg);

                                            //stat = response.TransferCode;

                                        } else {

                                            console.log(response.msg);

                                            //stat = 1;

                                        }

                                    }

                                }

                            });

                            return stat;

                        }

                        $('#addmore1').click(function () {

                            $("#feeTable").each(function () {

                                var tds = '<tr class="Fees">';

                                jQuery.each($('tr:last td', this), function () {

                                    tds += '<td>' + $(this).html() + '</td>';

                                });

                                tds += '</tr>';

                                if ($('tbody', this).length > 0) {

                                    $('tbody', this).append(tds);

                                    var rowCount = $('#feeTable tbody tr').length;

                                    $("#feeTable tr:last-child td:first-child").replaceWith("<td><label>" + rowCount + "</label></td>");

                                    $("#feeTable tr:last-child td:last-child").replaceWith("<td></td>");

                                    $("#feeTable tr:last-child td:last-child").replaceWith("<td><button id='removeFee'><i class='fa fa-minus' aria-hidden='true'></i></button></td>");

                                } else {

                                    $(this).append(tds);

                                }

                            });

                        });

                        $("#feeTable").on("click", "#removeFee", function () {

//        debugger

                            var Feeamount = $(this).closest("tr").find(".ProvincialFeeAmount").val();

                            var totalAmountprofess = $("#TotalAmount").val();

                            var price = parseInt(Feeamount);

                            var total = totalAmountprofess - price;

                            $("#TotalAmount").val(isNaN(total) ? "" : total);

                            $(this).closest("tr").remove();

                        });

                    </script>

                    <script>
                        function UpdateTaxInfo() {

                            var DistrictID = $("#DistrictID").val();

                            var VehicleType = $("#SelectVehicleType").val();

                            var categoryID = $("#CategoryID").val();

                            var LeadenWeight = $("#TrialerLeadenWeight").val();

                            var SeatingCapacity = $("#SeatingCapacity").val();

                            var VehicleID = $("#VehicleName").val();

                            var OwnerName = $("#OwnerName").val();

                            var RegistrationNo = $("#RegistrationNo").val();

                            var CNIC = $("#CNIC").val();
                            var ntn_no = $("#ntn_no").val();

                            var MobileNo = $("#MobileNo").val();

                            var District = $("#District").val();

                            var PeriodFrom = $("#PeriodFrom").val();

                            var PeriodTo = $("#PeriodTo").val();

                            var LastTaxPayYear = $("#LastTaxPayYear").val();

                            var LastTaxPayYearAmount = $("#LastTaxPayYearAmount").val();

                            var RegistrationMarkID = $("#RegistrationMarkID").val();

                            var TaxYear = $("#Years").val();

                            var TaxType = $("#FeeTypeID").val();

                            var Duration = $("#DurationID").val();

                            var TotalAmount = $("#TaxAmount").val();

                            var NextDateForTax = $("#NextDateForTax").val();

                            $.ajax({

                                url: "/DEO/UpdateVoucher",

                                type: "POST",

                                dataType: "JSON",

                                data: {

                                    VehicleType: VehicleType,

                                    categoryID: categoryID,

                                    LeadenWeight: LeadenWeight,

                                    SeatingCapacity: SeatingCapacity,

                                    VehicleID: VehicleID,

                                    OwnerName: OwnerName,

                                    RegistrationNo: RegistrationNo,

                                    CNIC: CNIC,

                                    MobileNo: MobileNo,

                                    District: DistrictID,

                                    PeriodFrom: PeriodFrom,

                                    PeriodTo: PeriodTo,

                                    LastTaxPayYear: LastTaxPayYear,

                                    LastTaxPayYearAmount: LastTaxPayYearAmount,

                                    RegistrationMarkID: RegistrationMarkID,

                                    TaxYear: TaxYear,

                                    TaxType: TaxType,

                                    Duration: Duration,

                                    TotalAmount: TotalAmount,

                                    NextDateForTax: NextDateForTax

                                },

                                success: function (response) {

                                },

                                error: function (response) {

                                }

                            });

                        }

                        function ValidateDateFormat() {

                            re = /^(\d{4})-(\d{1,2})-(\d{1,2})/

                            var s = document.getElementById("YearsFrom").value;

                            if (s != '') {

                                if (regs = s.match(re)) {

                                    // day value between 1 and 31

                                    if (regs[3] < 1 || regs[3] > 31) {

                                        $('#YearsFrom').addClass('error');

                                        $('#YearsFrom').val('');

                                        return false;

                                    }

                                    // month value between 1 and 12

                                    if (regs[2] < 1 || regs[2] > 12) {

                                        $('#YearsFrom').addClass('error');

                                        $('#YearsFrom').val('');

                                        return false;

                                    } else {

                                        var data = $('#DurationID :selected').val();

                                        if (data == 11) {

                                            if (regs[2] <= 3) {

                                                // var day = ("0" + now.getDate()).slice(-2);

                                                //var month = regs[2];

                                                //var tm = (+month) + (+3);

                                                var year = regs[1]

                                                var today = (year) + "-" + ("04") + "-" + ("01");

                                                $('#YearsTo').val(today);

                                            } else if (regs[2] <= 6) {

                                                ////var now = new Date();

                                                //  var day = ("0" + now.getDate()).slice(-2);

                                                // var month = ("0" + (now.getMonth() + 4)).slice(-2);

                                                var month = regs[2];

                                                var tm = (+month) + (+3);

                                                var year = regs[1]

                                                var today = (year) + "-" + ("07") + "-" + ("01");

                                                $('#YearsTo').val(today);

                                                //var today = moment().format('YYYY-MM-DD');

                                                //$('#YearsTo').val(today);

                                            } else if (regs[2] <= 9) {

                                                // var day = ("0" + now.getDate()).slice(-2);

                                                //var month = regs[2];

                                                //var tm = (+month) + (+3);

                                                var year = regs[1]

                                                var today = (year) + "-" + ("10") + "-" + ("01");

                                                $('#YearsTo').val(today);

                                            } else {

                                                //s var day = ("0" + now.getDate()).slice(-2);

                                                var month = regs[2];

                                                var tm = (+month) + (+3);

                                                if (tm <= 12) {

                                                    var year = regs[1]

                                                    var today = (year) + "-" + ("01") + "-" + ("01");

                                                    $('#YearsTo').val(today);

                                                } else {

                                                    var year = regs[1]

                                                    var ty = (+year) + (+1)

                                                    var today = (ty) + "-" + ("01") + "-" + ("01");

                                                    $('#YearsTo').val(today);

                                                }

                                            }

                                        } else {

                                            var now = new Date();

                                            var day = ("0" + now.getDate()).slice(-2);

                                            var month = ("0" + (now.getMonth() + 1)).slice(-2);

                                            var today = now.getFullYear() + "-" + (month) + "-" + (day);

                                            $('#YearsTo').val(today);

                                        }

                                    }

                                    // year value between 1902 and 2020

                                    if (regs[1] < 1902 || regs[1] > 2090) {

                                        $('#YearsFrom').addClass('error');

                                        $('#YearsFrom').val('');

                                        return false;

                                    }

                                }

                                $('#YearsFrom').removeClass('error');

                                return true;

                            }

                        } //edit by fadii

                        function ValidateDateFormatFrom() {

                            re = /^(\d{4})-(\d{1,2})-(\d{1,2})/

                            var s = document.getElementById("YearsTo").value;

                            if (s != '') {

                                if (regs = s.match(re)) {

                                    // day value between 1 and 31

                                    if (regs[3] < 1 || regs[3] > 31) {

                                        $('#YearsTo').addClass('error');

                                        $('#YearsTo').val('');

                                        return false;

                                    }

                                    // month value between 1 and 12

                                    if (regs[2] < 1 || regs[2] > 12) {

                                        $('#YearsTo').addClass('error');

                                        $('#YearsTo').val('');

                                        return false;

                                    }

                                    // year value between 1902 and 2020

                                    if (regs[1] < 1902 || regs[1] > 2090) {

                                        $('#YearsTo').addClass('error');

                                        $('#YearsTo').val('');

                                        return false;

                                    }

                                }

                                $('#YearsTo').removeClass('error');

                                return true;

                            }

                        } //edit by fadii

                        function ValidateDateFormatAYT() {

                            re = /^(\d{4})-(\d{1,2})-(\d{1,2})/

                            var s = document.getElementById("ArrearYearTo").value;

                            if (s != '') {

                                if (regs = s.match(re)) {

                                    // day value between 1 and 31

                                    if (regs[3] < 1 || regs[3] > 31) {

                                        $('#ArrearYearTo').addClass('error');

                                        $('#ArrearYearTo').val('');

                                        return false;

                                    }

                                    // month value between 1 and 12

                                    if (regs[2] < 1 || regs[2] > 12) {

                                        $('#ArrearYearTo').addClass('error');

                                        $('#ArrearYearTo').val('');

                                        return false;

                                    }

                                    // year value between 1902 and 2020

                                    if (regs[1] < 1902 || regs[1] > 2090) {

                                        $('#ArrearYearTo').addClass('error');

                                        $('#ArrearYearTo').val('');

                                        return false;

                                    }

                                }

                                $('#ArrearYearTo').removeClass('error');

                                return true;

                            }

                        } //edit by fadii

                        function ValidateDateFormatAYF() {

                            re = /^(\d{4})-(\d{1,2})-(\d{1,2})/

                            var s = document.getElementById("ArrearYearFrom").value;

                            if (s != '') {

                                if (regs = s.match(re)) {

                                    // day value between 1 and 31

                                    if (regs[3] < 1 || regs[3] > 31) {

                                        $('#ArrearYearFrom').addClass('error');

                                        $('#ArrearYearFrom').val('');

                                        return false;

                                    }

                                    // month value between 1 and 12

                                    if (regs[2] < 1 || regs[2] > 12) {

                                        $('#ArrearYearFrom').addClass('error');

                                        $('#ArrearYearFrom').val('');

                                        return false;

                                    }

                                    // year value between 1902 and 2020

                                    if (regs[1] < 1902 || regs[1] > 2090) {

                                        $('#ArrearYearFrom').addClass('error');

                                        $('#ArrearYearFrom').val('');

                                        return false;

                                    }

                                }

                                $('#ArrearYearFrom').removeClass('error');

                                return true;

                            }

                        } ////edit by fadii

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

                    <Script>

                        $("#vehicleClassID").change(function () {

                            var ID = $("#vehicleClassID").val();

                            var CategoryID = $("#CatagoryType").val();

                            $.ajax({

                                type: "GET",

                                url: "/Management/GetBodyType",

                                dataType: 'json',

                                data: {ID: ID, CategoryID: CategoryID},

                                success: function (response) {

                                    if (response.Status) {

                                        if (typeof response != 'undefined' && response != null && response != 0) {

                                            $('#bodytypeID').empty();

                                            $('#bodytypeID').append("<option value='0'>--Select BodyType--</option>");

                                            $.each(response.getBody, function (index, value) {

                                                $('<option value="' + value.ID + '">' + value.Name + '</option>').appendTo('#bodytypeID');

                                            });

                                        }

                                    }

                                }

                            });

                        });

                    </Script>

                    <script>

                        function LoadSlabs() {

                            $.ajax({

                                type: "Get",

                                contentType: 'application/json; charset=utf-8',

                                url: "/DEO/LoadSlabs",

                                dataType: 'json',

                                success: function (response) {

                                    //removeOptions(document.getElementById("slabID"));

                                    if (response.Status == true) {

                                        if (typeof response != 'undefined' && response != null && response != 0) {

                                            $('#SlabID').empty();

                                            $('#SlabID').append("<option value='0'>--Select Division--</option>");

                                            $.each(response.Data, function (index, value) {

                                                $('<option value="' + value.ID + '">' + value.Slab + '</option>').appendTo('#SlabID');

                                            });

                                        } else {

                                        }

                                    } else {

                                    }

                                },

                                error: function (response) {

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


                            var taxes = $('input[name^=taxes]').map(function (idx, elem) {
                                if (this.checked) {
                                    return $(elem).val();
                                }

                            }).get();

                            var fromdate = $('#YearsFrom').val();
                            var todate = $('#YearsTo').val();


                            var tax_dur14 = $('#tax_dur14').val();
                            var tax_dur23 = $('#tax_dur23').val();
                            var opt = $('input[name="optradio"]:checked').val();

                            var Regno = $('#RegistrationNo').val().trim();
                            if ($('#nonfiller').is(":checked")) {
                                var fillert = 'NF';
                            } else {
                                var fillert = 'F';
                            }

                            if ($('#nonac').is(":checked")) {
                                var act = 'NAC';
                            } else {
                                var act = 'AC';
                            }

                            if ($('#company').is(":checked")) {
                                var ct = 'company';
                            } else {
                                var ct = 'capital';

                                taxes[taxes.length] = 24;
                            }


                            console.log(ct);


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
                                $("#ntn_no").val('');

                                $("#MobileNumber").val('');

                                $("#LastPaidYear").val('');

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

                                    data: {
                                        fromdate: fromdate,
                                        todate: todate,
                                        RegNo: Regno,
                                        DistrictID: District,
                                        taxes: taxes,
                                        fillert: fillert,
                                        act: act,
                                        ct: ct,
                                        tax_dur14: tax_dur14,
                                        tax_dur23: tax_dur23,
                                        opt: opt
                                    },

                                    success: function (response) {
                                        console.log(response)

                                        // if (response.Status == true && response.VehicleInfo == null) {

                                        //     swal("Data Not Found");

                                        // }

                                        if (response.Status == true) {
                                            if (response.from_last_tax_date != "") {
                                                $('#YearsFrom').val(moment(response.from_last_tax_date, "DD/MM/YY").format("YYYY-MM-DD"));
                                            }

                                            $('#District').val(response.Data.eto_location);

                                            $('#VehicleName').val(response.Data.class_of_vehicle);

                                            $('#Category').val(response.Data.category_of_vehicle);

                                            $('#Reg_id').val(response.Data.id);

                                            // $("#SlabID").val(response.VehicleInfo.SlabID);

                                            $('#Class').val(response.Data.class_of_vehicle);

                                            $('#BodyType').val(response.Data.tbo);

                                            $('#model').val(response.Data.year_of_manufacture);

                                            $('#Status').html(response.Data.status);
                                            $('#ntn_no').val(response.Data.ntn_no);

                                            if (response.Pdata == null) {
                                                $('#OwnerName').val(response.Data.name_);

                                                if (response.Data.new_cnic_no == null || response.Data.new_cnic_no == "") {
                                                    $('#CNIC').val(response.Data.old_cnic_no);

                                                } else {

                                                    $('#CNIC').val(response.Data.new_cnic_no);
                                                }

                                            } else {
                                                $('#OwnerName').val(response.Pdata.name);
                                                if (response.Data.new_cnic_no != null || response.Data.new_cnic_no != "") {
                                                    $('#CNIC').val(response.Data.new_cnic_no);
                                                } else {
                                                    console.log(response.Data.old_cnic_no);
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

                                            // var
                                            // if(response.Data.unladen_weight == 0){
                                            //
                                            // }
                                            $('#UnladenWeight').val(response.Data.laden_weight);


                                            if (response.VehicleInfo != null) {
                                                if (response.VehicleInfo.tax_app_year_to != null && response.VehicleInfo.tax_app_year_to != undefined) {


                                                    $('#LastPaidYear').val(moment(response.VehicleInfo.tax_app_year_to, "DD/MM/YY").format("DD-MM-YYYY"));

                                                    $('#LastPaidYear_').val("true");


                                                    $('#LastPaidAmount').val(response.VehicleInfo.last_paid_amount);
                                                }

                                                // if (response.VehicleInfo.tax_app_year_from != null && response.VehicleInfo.tax_app_year_from != undefined) {

                                                //         $('#YearsFrom').val(moment(response.VehicleInfo.tax_app_year_from).format("DD-MM-YYYY"));

                                                //         $('#YearsTo').val(moment(response.VehicleInfo.tax_app_year_to).add(1, 'years').subtract(1, "days").format("DD-MM-YYYY"));

                                                // }

                                                //     else {

                                                //         $('#YearsFrom').val(moment(new Date()).format("DD-MM-YYYY"));

                                                //         $('#YearsTo').val(moment($('#YearsFrom').val()).add(1, 'years').subtract(1, "days").format("DD-MM-YYYY"));

                                                //     }
                                            }

                                            if (response.token_ch == true) {

                                                $('#TAX_NAME').html(response.token.Name);


                                                if (response.token.type == 'LT') {

                                                    $('#DurationID').val(16);


                                                    $('#YearsFrom').hide();

                                                    $('#YearsTo').hide();

                                                } else {
                                                    $('#DurationID').val(10);
                                                }
                                            } else {
                                                $('#DurationID').val(0);
                                            }


                                            if ($('#tax_dur14').val() == 0 && $('#tax14').is(":checked")) {
                                                $('#tax_dur14').val(10);

                                            }

                                            if ($('#tax_dur23').val() == 0 && $('#tax23').is(":checked")) {
                                                $('#tax_dur23').val(10);
                                            }


                                            var ProfessionalDev = '';

                                            //                       debugger

                                            temp1 = response.ProvincialAmount;

                                            var FeeAmount = 0;

                                            //aaaas
                                            // debugger
                                            if (response.FeeAmount.length) {
                                                if (response.FeeAmount != undefined && response.FeeAmount != null) {

                                                    FeeList = response.FeeAmount;

                                                    for (var f = 0; f < response.FeeAmount.length; f++) {


                                                        if (f > 0) {

                                                            $("#addmore1").trigger('click');

                                                        }
                                                        var amount = 0;

                                                        // Fees CALCULATION
                                                        if (response.FeeAmount != undefined) {

                                                            $('.Fees').each(function (index, value) {

                                                                $(".FeeType4", this).val(response.FeeAmount[index].Name);
                                                                $(".FeeType5", this).val(response.FeeAmount[index].id);
                                                                if (response.FeeAmount[index].id == 23) {
                                                                    if (typeof (response.FeeAmount[index].fix) != "undefined" && response.FeeAmount[index].fix !== null) {
                                                                        amount = parseFloat(response.FeeAmount[index].Amount);
                                                                        $('#tax_dur23').val(17);
                                                                    }
                                                                    switch ($('#tax_dur23').val()) {
                                                                        case "11":
                                                                            amount = parseFloat(response.FeeAmount[index].Amount);

                                                                            break;
                                                                        case "10":
                                                                            amount = (parseFloat(response.FeeAmount[index].Amount) / 4.0);

                                                                            break;
                                                                        case "13":
                                                                            amount = (parseFloat(response.FeeAmount[index].Amount) / 2.0);

                                                                            break;
                                                                        case "12":
                                                                            amount = (parseFloat(response.FeeAmount[index].Amount) * 3 / 4.0);

                                                                            break;

                                                                        /*case "6":
                                                                            amount = (parseFloat(response.FeeAmount[index].Amount) * 3 / 4.0);

                                                                            break;*/

                                                                        default:
                                                                            amount = parseFloat(response.FeeAmount[index].Amount);
                                                                            break;
                                                                    }


                                                                } else if (response.FeeAmount[index].id == 14) {
                                                                    switch ($('#tax_dur14').val()) {
                                                                        case "11":
                                                                            amount = parseFloat(response.FeeAmount[index].Amount);

                                                                            break;
                                                                        case "10":
                                                                            amount = (parseFloat(response.FeeAmount[index].Amount) / 4);
                                                                            break;
                                                                        case "13":
                                                                            amount = (parseFloat(response.FeeAmount[index].Amount) / 2);

                                                                            break;
                                                                        case "12":
                                                                            amount = (parseFloat(response.FeeAmount[index].Amount) * 3 / 4);

                                                                            break;

                                                                        default:
                                                                            amount = parseFloat(response.FeeAmount[index].Amount);
                                                                            break;
                                                                    }
                                                                }else if (response.FeeAmount[index].id == 6) {

                                                                    var tax_6 = parseFloat($('#tax_dur6').val());

                                                                    amount = parseFloat(response.FeeAmount[index].Amount) * tax_6;

                                                                } else {
                                                                    amount = parseFloat(response.FeeAmount[index].Amount);
                                                                }


                                                                if ($('#nonfiller').is(":checked")) {
                                                                    $('#Status').val("Non Filer");
                                                                    $(".ProvincialFeeAmount", this).val(amount);
                                                                    // if(response.FeeAmount[index].Name=="Fedral Tax 234")
                                                                    // {
                                                                    //     $(".ProvincialFeeAmount", this).val( amount * 3 );
                                                                    // }
                                                                    // if(response.FeeAmount[index].type=="Fedral")
                                                                    // {
                                                                    //     $(".ProvincialFeeAmount", this).val( amount * 2 );
                                                                    // }
                                                                    // else
                                                                    // {

                                                                    //     $(".ProvincialFeeAmount", this).val(amount);
                                                                    // }
                                                                } else {
                                                                    $('#Status').val("Filer");

                                                                    $(".ProvincialFeeAmount", this).val(amount);
                                                                }

                                                                if ($('#nonac').is(":checked")) {
                                                                    $('#acStatus').val("Non AC");
                                                                } else {
                                                                    $('#acStatus').val("AC");
                                                                }


                                                            });

                                                        }

                                                        //$("#FeeType4").val(response.FeeAmount.FeeName)

                                                        //$("#ProvincialFeeAmount").val(response.FeeAmount.FeeAmount)

                                                    }
                                                    $('.ProvincialFeeAmount').each(function () {

                                                        // console.log($(this).val());
                                                        FeeAmount += parseFloat($(this).val());
                                                    });
                                                }
                                            } else {
                                                FeeAmount = 0;
                                                if ($('#nonfiller').is(":checked")) {
                                                    $('#Status').val("Non Filer");
                                                } else {
                                                    $('#Status').val("Filer");
                                                }

                                                if ($('#nonac').is(":checked")) {
                                                    $('#acStatus').val("Non AC");
                                                } else {
                                                    $('#acStatus').val("AC");
                                                }

                                                if ($('#company').is(":checked")) {
                                                    $('#cStatus').val("Taken By Company");
                                                } else {
                                                    $('#cStatus').val("Capital Value Tax");
                                                }
                                            }


                                            if (response.token_ch == true) {
                                                TaxAmount = parseFloat(response.token.Amount);

                                                totalAmount = totalAmount + FeeAmount;

                                                totalAmount = TaxAmount + totalAmount;
                                            } else {

                                                TaxAmount = 0;
                                                totalAmount = totalAmount + FeeAmount;
                                            }


                                            //var regisrationFee = 0;

                                            //for (var a = 0; a < response.ProvincialAmount.length; a++) {

                                            //    if (response.ProvincialAmount.length > 0) {

                                            //        regisrationFee = response.ProvincialAmount[a].ProvincialAmount;

                                            //        if (regisrationFee > 0) {

                                            //            totalAmount = totalAmount + regisrationFee;

                                            //        }

                                            //    }

                                            //}

                                            totalAmount = Math.round(totalAmount);

                                            $('#TotalAmount').val(totalAmount);

                                            $('#TaxAmount').val(TaxAmount);

                                            $('#txtTotalAmount').val(TaxAmount);

                                            $('#TotalPaidAmount').val(totalAmount);


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


                                        } else {

                                            console.log(response.msg);
                                            if (response.msg == undefined) {
                                                swal("Record Not Found");
                                            } else {
                                                swal(response.msg);
                                            }


                                        }

                                    },

                                    error: function (response) {

                                        swal("Something went wrong");

                                    }

                                });

                            }

                        }

                    </script>

                    <script>

                        var hi;

                        $('#SlabID').change(function () {

                            ;

                            var Slab = $('#SlabID').val();

                            var Status = $('#Status').html();

                            $.ajax({

                                type: "Get",

                                contentType: 'application/json; charset=utf-8',

                                url: "/DEO/getTaxAmount",

                                dataType: 'json',

                                data: {Slab: Slab, Status: Status},

                                success: function (response) {

                                    if (response.Status == true) {

                                        hi = $('#TaxAmount').val();

                                    } else {

                                    }

                                },

                                error: function (response) {

                                    swal("Something went wrong");

                                }

                            });

                        });

                    </script>

                    <script>

                        $('#DurationID').change(function () {

                            //       debugger

                            var feeamount = 0;

                            var slab = $('#DurationID').val();

                            var totalAmt = $('#txtTotalAmount').val();

                            var totalpdamt = $('#TotalPaidAmount').val();


                            var professAmount = $("#Profes").val();

                            $("#Professional").val(professAmount);

                            $('#TaxAmount').val(totalAmt);

                            $('#TotalAmount').val(totalpdamt);

                            $('#YearsFrom').show();

                            $('#YearsTo').show();

                            if (slab == 11) {

                                $('#TotalAmount').val(0);

                                $('#YearsFrom').show();

                                $('#YearsTo').show();


                                var professAmount = $("#Professional").val();

                                var totalpro = totalAmt / 4;

                                $("#Professional").val(totalpro);


                                $(".Fees").each(function () {

                                    var FeeType = $(".FeeType4", this).val();

                                    var Feeamount = $(".ProvincialFeeAmount", this).val();

                                    var feespadamount = parseInt(Feeamount);

                                    feeamount = parseInt(feeamount + feespadamount);

                                });


                                var Amount = $('#txtTotalAmount').val();

                                var total = Amount / 4;

                                $('#TaxAmount').val(total);

                                if (isNaN(feeamount)) {

                                    var feeamount = 0;

                                }

                                if (feeamount != null && feeamount != undefined) {

                                    $('#TotalAmount').val(parseInt(total + feeamount));

                                } else {

                                    $('#TotalAmount').val(total);

                                }

                                ValidateDateFormat();

                                var date = $('#YearsFrom').val();

                                //$('#YearsTo').val(moment(date).quarter().endOf('quarter').format("DD-MM-YYYY"));

                                //$('#YearsTo').val(moment().quarter(moment(date).quarter()).);

                                $('#YearsTo').val(moment(date).add(3, 'months').subtract(1, "days").format("DD-MM-YYYY"));

                                getCurrentPreviousQuarter();

                            } else if (slab == 13) {

                                $('#divNextDateForTax').css('display', 'none');

                                $('#YearsFrom').show();

                                $('#YearsTo').show();

                                $('#TotalAmount').val(0);

                                var professAmount = $("#Professional").val();

                                var totalpro = totalAmt / 2;

                                $("#Professional").val(totalpro);


                                $(".Fees").each(function () {

                                    var FeeType = $(".FeeType4", this).val();

                                    var Feeamount = $(".ProvincialFeeAmount", this).val();

                                    var feespadamount = parseInt(Feeamount);

                                    feeamount = parseInt(feeamount + feespadamount);

                                });


                                var Amount = $('#txtTotalAmount').val();

                                var total = Amount / 2;

                                $('#TaxAmount').val(total);

                                if (isNaN(feeamount)) {

                                    var feeamount = 0;

                                }

                                if (feeamount != null && feeamount != undefined) {

                                    $('#TotalAmount').val(parseInt(total + feeamount));

                                } else {

                                    $('#TotalAmount').val(total);

                                }

                                var date = $('#YearsFrom').val();

                                $('#YearsTo').val(moment(date).add(6, 'months').subtract(1, "days").format("DD-MM-YYYY"));

                            } else if (slab == 16) {

                                $('#YearsFrom').hide().empty();

                                $('#YearsTo').hide().empty();


                                $('#TaxAmount').val(totalAmt);

                                $('#TotalAmount').val(totalpdamt);

                            } else if (slab == 10) {

                                var professAmount = $("#Profes").val();

                                $("#Professional").val(professAmount);


                                $('#YearsFrom').show();

                                $('#YearsTo').show();

                                var date = $('#YearsFrom').val();

                                $('#YearsTo').val(moment(date).add(1, 'years').subtract(1, "days").format("DD-MM-YYYY"));

                                $('#divNextDateForTax').css('display', 'none');

                                $('#TaxAmount').val(totalAmt);

                                $('#TotalAmount').val(totalpdamt);

                            } else {
                                var professAmount = $("#Profes").val();

                                $("#Professional").val(professAmount);


                                $('#YearsFrom').show();

                                $('#YearsTo').show();

                                var date = $('#YearsFrom').val();

                                $('#YearsTo').val(moment(date).add(1, 'years').subtract(1, "days").format("DD-MM-YYYY"));

                                $('#divNextDateForTax').css('display', 'none');

                                // $('#TaxAmount').val(totalAmt);

                                $('#TotalAmount').val(totalpdamt);
                            }

                        });

                    </script>

                    <script>

                        function ArrearDuration(id) {

                            //       debugger
                            var Charges_;


                            var ArrearType = $('.iterate' + id).find('.Gov option:selected', this).val();

                            let Charges = $('.iterate' + id).find('.ChargeV', this).val();

                            var ArrearName = $('.iterate' + id).find('.TaxType', this).val();

                            var slab = $('.iterate' + id).find('.ArrearDurationID', this).val();


                            if (slab == 11) {


                                ValidateDateFormat();

                                var date = $('.iterate' + id).find('.ArrearYearsFrom', this).val();


                                $('.iterate' + id).find('.ArrearYearsTo', this).val(moment(date).add(3, 'months').subtract(1, "days").format("DD-MM-YYYY"));

                                // getCurrentPreviousQuarter();

                                Charges_ = Charges / 4;

                                $('.iterate' + id).find('.Charges', this).val(Charges_);

                            } else if (slab == 13) {


                                var date = $('.iterate' + id).find('.ArrearYearsFrom', this).val();

                                $('.iterate' + id).find('.ArrearYearsTo', this).val(moment(date).add(6, 'months').subtract(1, "days").format("DD-MM-YYYY"));

                                Charges_ = Charges / 2;

                                $('.iterate' + id).find('.Charges', this).val(Charges_);

                            } else if (slab == 16) {

                                $('.iterate' + id).find('.ArrearYearsFrom', this).hide().empty();

                                $('.iterate' + id).find('.ArrearYearsTo', this).hide().empty();


                                $('.iterate' + id).find('.ArrearYearsTo', this).val(moment(date).add(6, 'months').subtract(1, "days").format("DD-MM-YYYY"));

                                $('.iterate' + id).find('.Charges', this).val(Charges);

                            } else if (slab == 10) {


                                var date = $('.iterate' + id).find('.ArrearYearsFrom', this).val();

                                $('.iterate' + id).find('.ArrearYearsTo', this).val(moment(date).add(1, 'years').subtract(1, "days").format("DD-MM-YYYY"));


                                $('.iterate' + id).find('.Charges', this).val(Charges);

                            } else {


                                var date = $('.iterate' + id).find('.ArrearYearsFrom', this).val();

                                $('.iterate' + id).find('.ArrearYearsTo', this).val(moment(date).add(1, 'years').subtract(1, "days").format("DD-MM-YYYY"));


                                $('.iterate' + id).find('.Charges', this).val(Charges);
                            }


                        };

                    </script>

                    <script>

                        function LoadGov() {

                            /*

        $.ajax({

            type: "Get",

            url: "/DEO/getTaxSubType",

            dataType: 'json',

            success: function (response) {

                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {

                        $('#Gov').empty();

                        $('#Gov').append("<option value='0'>--Select Gov--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.ID + '">' + value.Name + '</option>').appendTo('#Gov');

                        });

                    }

                    else {

                    }

                }

                else {

                }

            },

            error: function (response) {

                alert("Something Went Wrong Please Try Again Letter....!");

            }

        });

        */

                        }

                        function getCurrentPreviousQuarter() {

                            var sDate = $("#YearsFrom").val();
                            ; // string date(s) (may be separated by comma(s))

                            var startDate = moment().quarter(quarter).startOf('sDate')

                            var endDate = moment().quarter(quarter).endOf('startDate')

                            //var aDate = sDate.split('-');

                            //var today = new Date();

                            //var quarter = Math.floor((today.getMonth() / 3));

                            //var startDate = new Date(today.getFullYear(), quarter * 3, 1);

                            //var endDate = new Date(startDate.getFullYear(), startDate.getMonth() + 3, 0).toLocaleDateString();

                            var nxtQuarterDate = getDateString(endDate);

                            $('#NextDateForTax').val(nxtQuarterDate)

                        }

                        function getDateString(data) {

                            //

                            return moment(data).format('YYYY-MM-DD');

                        }

                        function RemoveTax(ID, Amount) {

                            $('#ProvincialAmount' + ID + '').html('');

                            var totalprotax = $("#TaxAmount").val();

                            var totaldif = totalprotax - Amount;

                            $("#TaxAmount").val(totaldif);

                            var totalAmountpr = $("#TotalAmount").val();

                            var totaldifr = totalAmountpr - Amount;

                            $("#TotalAmount").val(totaldifr);

                        }

                        function RemoveFederallTax(ID, Amount) {

                            $('#FederalTaxName' + ID + '').html('');

                            var totalFedtax = $("#TaxAmount").val();

                            var totalFedDif = totalFedtax - Amount;

                            $("#TaxAmount").val(totalFedDif);

                            var totalAmountfed = $("#TotalAmount").val();

                            var totalfeddiff = totalAmountfed - Amount;

                            $("#TotalAmount").val(totalfeddiff);

                        }

                        function RemoveProfessionalTax(ID, Amount) {

                            $('#ProfessionalAmount' + ID + '').html('');

                            var Totalprofetax = $("#TaxAmount").val();

                            var totalprofesdif = Totalprofetax - Amount;

                            $("#TaxAmount").val(totalprofesdif);

                            var totalAmountprofess = $("#TotalAmount").val();

                            var totalprofdif = totalAmountprofess - Amount;

                            $("#TotalAmount").val(totalprofdif);

                        }

                        function saveExcludeTaxes(VoucherID) {

                            //       debugger

                            var FeesList = [];

                            var _token = $("input[name='_token']").val();

                            $(".Fees").each(function () {

                                var FeeType = $(".FeeType4", this).val();

                                var Feeamount = $(".ProvincialFeeAmount", this).val();

                                //if (Feeamount != null && Feeamount != '')

                                //    TotalAmount += parseInt(Feeamount);

                                FeesList.push({Name: FeeType.toUpperCase(), Amount: Feeamount});

                            });

                            let pID = temp1.ID;

                            let TaxpName = temp1.ProvincialGovType + ' ' + temp1.ProvincialTaxName;

                            let TaxpAmount = temp1.ProvincialAmount;

                            var ProvincialList1 = [];

                            for (var aa = 0; aa < temp1.length; aa++) {

                                let ID = temp1[aa].ID;

                                let TaxName = temp1[aa].ProvincialGovType + ' ' + temp1[aa].ProvincialTaxName;

                                let TaxAmount = temp1[aa].ProvincialAmount;

                                ProvincialList1.push({ID: ID, TaxName: TaxName, TaxAmount: TaxAmount})

                            }

                            // var FederalList1 = [];

                            // for (var a = 0; a < temp2.length; a++) {

                            //     let ID = temp2[a].ID;

                            //     let TaxName = temp2[a].FederalGovType + ' ' + temp2[a].FederalTaxName;

                            //     let TaxAmount = temp2[a].FederalFilerAmount;

                            //     if (TaxAmount != null && TaxAmount != '')

                            //         TotalTaxAmount += parseInt(TaxAmount);

                            //     FederalList1.push({ ID: ID, TaxName: TaxName, TaxAmount: TaxAmount })

                            // }

                            $.ajax({

                                url: "/SaveExcludedTax",

                                type: "POST",

                                dataType: "JSON",

                                contentType: "application/json",

                                data: JSON.stringify({

                                    _token: _token,

                                    VoucherID: VoucherID.ID,

                                    ProID: pID,

                                    ProLabel: TaxpName,

                                    ProAmount: TaxpAmount,

                                    Fees: FeesList,

                                    ProvincialList1: ProvincialList1,

                                    //  FederalList1: FederalList1

                                }),

                                success: function (response) {

                                    if (response.Data != null) {

                                        Swal("Inserted Successfully!");

                                    } else {

                                    }

                                },

                                error: function (response) {

                                }

                            });

                        }

                        function addCommas(nStr) {

                            nStr += '';

                            x = nStr.split('.');

                            x1 = x[0];

                            x2 = x.length > 1 ? '.' + x[1] : '';

                            var rgx = /(\d+)(\d{3})/;

                            while (rgx.test(x1)) {

                                x1 = x1.replace(rgx, '$1' + ',' + '$2');

                            }

                            return x1 + x2;

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













    </body>

    </html>



@endsection
