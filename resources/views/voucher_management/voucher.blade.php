@extends('layouts.dash')



@section('content')







    <div id="maindiv" class="container main">


        <div class="row">

            <div class="col-md-4 ">

                <h2 class="strong"> Vouchers Management </h2>

            </div>


            <div class="col-md-5" style="margin-top: 1%">

                <form action="{{url('Search')}}" method="post">
                    @csrf
                    <div class="form-group has-search">

                        <span class="fa fa-search form-control-feedback"></span>

                        <input type="text" class="form-control" name="search" @if(isset($ser)) value="{{ $ser }}"
                               @endif placeholder="Search by Challan No OR Register Number">
                        <input type="hidden" name="table" value="voucher"/>

                    </div>
                </form>

            </div>


            <div class="col-md-3" style="margin-top: 1%">
                @if(auth()->user()->role_id == 7 || auth()->user()->role_id == 1 || auth()->user()->role_id == 6|| auth()->user()->role_id == 11)
                    <a href="{{url('/oldrecord_voucher')}}" type="button" class="btn  btn-dark">Old record</a>

                    <a href="{{url('/voucher/create')}}" type="button" class="btn  btn-dark">Add New</a>
                @elseif(auth()->user()->role_id==2)
                    <a href="{{url('/voucher/create')}}" type="button" class="btn  btn-dark">Add New</a>
                @endif
            </div>


        </div>
        <div class="row">

            <div class="col-md-12">

                @if(isset($message))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong class="text-center">{{ $message }}</strong>
                    </div>
                @endif
            </div>

        </div>

        <div style="width:  1270px; font-size:12px; margin-top:1%">

            <table class="table table-responsive" id="dtable">

                <thead class="thead-dark" style="border: 1px black; color:black; ">

                <tr class="headings">

                    <th scope="col">Challan No</th>

                    <th scope="col">District</th>

                    <!-- <th scope="col">Owner Name</th> -->

                    <th scope="col">Category Type</th>

                    <th scope="col">Vehicle Class</th>

                    <th scope="col">Registration Number</th>

                    <th scope="col">Body Type</th>

                    <th scope="col">Issue Date</th>

                    <th scope="col">Total Amount</th>

                    <th scope="col">Filler / Non Filler</th>

                    <th scope="col">Payment Date</th>

                    <th scope="col">Last Paid Amount</th>

                    <th scope="col">Renewed Upto</th>
                    <th scope="col">Type</th>

                    <th scope="col">Status</th>
                    @if(auth()->user()->role_id!= 7 && auth()->user()->role_id!=2)
                        <th scope="col">Actions</th>
                    @endif


                </tr>

                </thead>

                <tbody>

                @foreach($v as $x)
                    <tr>
                        <?php
                        $data = App\Models\register::find($x->registration_id);

                        if ($data != null) {
                            $data = $data->toArray();


                            $cov = App\Models\class_of_vehicle::where('cov_code', $data['class_of_vehicle_id'])->where('eto_location_id', $data['eto_location_id'])->first();
                            $tob = App\Models\type_of_body::where('tob_code', $data['type_of_body'])->where('eto_location_id', $data['eto_location_id'])->first();
                            $owner = App\Models\owner_type::where('id', $data['owner_type_id'])->first();
                            if ($tob != null) {
                                $cat = App\Models\category_of_vehicle::where('categ_code', $tob->category_of_vehicle_id)->first();

                            } else {
                                $cat = null;
                            }

                            if ($data['last_tax_date'] == null) {
                                $data['last_tax_date'] = "N/A";
                            }

                            if ($cov != null) {
                                $data['class_of_vehicle'] = $cov->class_of_vehicle;

                            } else {
                                $data['class_of_vehicle'] = "N/A";
                            }

                            if ($cat != null) {
                                $data['category_of_vehicle'] = $cat->category_of_vehicle;

                            } else {
                                $data['category_of_vehicle'] = "N/A";
                            }
                            if ($tob != null) {
                                $data['tbo'] = $tob->type_of_body;


                            } else {
                                $data['tbo'] = "N/A";
                            }
                            if ($owner != null) {
                                $data['owner_type'] = $owner->owner_type;

                            } else {
                                $data['owner_type'] = "N/A";
                            }

                        }

                        ?>

                        <th scope="row">{{$x->challan_no}}</th>


                        <td>{{$x->district}}</td>

                    <!-- @if($x->name_!=null)
                            @if($x->name_!='')

                            <td>{{$x->name_}}</td>
                @else
                                @php($n= App\Models\regowner::where('reg_id', $x->registration_id)->first() )
                                @if($n!=null)
                                <td>{{$n->name}}</td>
                    @else

                                <td>N/A</td>
@endif
                            @endif
                        @else
                        <td></td>
@endif -->

                        @if(isset($data))
                            <td>{{$data['category_of_vehicle']}}</td>
                            <td>{{$data['class_of_vehicle']}}</td>
                            <td>{{$data['registration_no']}}</td>
                            @if($tob!=null)

                                <td>{{$data['tbo']= $tob->type_of_body}}</td>

                            @else
                                <td>N/A</td>
                            @endif

                        @else
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                        @endif
                        <td> {{$x->issue_date}}</td>
                        <td>{{$x->total_amount}}</td>
                        <td>{{$x->status}}</td>


                        <td>
                            @if(!empty($x->bank_payment_date))
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $x->bank_payment_date)->format('d/m/Y') }}
                            @else
                                {{$x->last_paid_year}}
                            @endif
                        </td>

                        {{--                        @if($x->last_paid_year!=null)--}}
                        {{--                            <td>{{$x->last_paid_year}}</td>--}}
                        {{--                        @else--}}

                        {{--                            <td>N/A</td>--}}
                        {{--                        @endif--}}

                        @if($x->last_paid_amount!=null)
                            <td>{{$x->last_paid_amount}}</td>
                        @else

                            <td>N/A</td>
                        @endif

                        @if($x->tax_app_year_to !=null && $x->tax_app_year_to !=0 )

                            <td>{{$x->tax_app_year_to}}</td>
                        @else

                            <td>N/A</td>
                        @endif
                        <td>
                            @if($x->old_record_status == 1)
                                Old Tax
                            @endif
                        </td>

                        @if($x->old_record_status == 1)
                            <td>
                                <div style="color:white; background-color:deepskyblue; padding:5px "
                                     class="text-center">
                                    Scroll
                                </div>
                            </td>
                        @else
                            @if($x->status_voucher=="Paid")
                                <td>
                                    <div style="color:white; background-color:green; padding:5px "
                                         class="text-center">{{$x->status_voucher}}</div>
                                </td>
                            @else

                                <td>
                                    <div style="color:white; background-color:red; padding:5px ">{{$x->status_voucher}}</div>
                                </td>
                            @endif
                        @endif
                        @if(auth()->user()->role_id!= 7 && auth()->user()->role_id!=2)
                            <td>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <a href="#" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i
                                                    class="fas fa-edit"></i></a>

                                    </div>

                                    <div class="col-sm-6">

                                        <a href="#" class="btn btn-sm btn-clean btn-icon" title="Delete" id=""><i
                                                    class="fas fa-trash"></i></a>

                                    </div>

                                    <!-- ultrasoft changes add print button to print challan -->
                                    <div class="col-sm-4">
                                        <a href="javascript:void(0)"
                                           onclick="printExistingChallan({{ $x->id }})"
                                           class="btn btn-sm btn-clean btn-icon"
                                           title="Print Challan">
                                            <i class="fas fa-print"></i>
                                        </a>
                                    </div>

                                </div>

                            </td>
                        @endif

                    </tr>


                @endforeach


                </tbody>
            </table>

            @if(isset($v))
                <div style="float:right !important;">{{ $v->render() }}</div>
            @endif


        </div>

    </div>



    <!-- ultrasoft changes  -->
    <!-- Print Challan Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>

        //ultrasoft changes function to print existing challan fetches voucher data via ajax and json response return
        function printExistingChallan(voucherId) {
            $.ajax({
                url: '/voucher/challan/' + voucherId,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    // Optional: Show loading indicator
                    swal({
                        title: 'Loading...',
                        text: 'Preparing challan for print',
                        icon: 'info',
                        buttons: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    });
                },
                success: function(response) {
                    swal.close(); // Close loading

                    if (response.Status && response.Data) {
                        generateChallanHTML(response.Data);
                    } else {
                        swal('Error', response.msg || 'Failed to load voucher data', 'error');
                    }
                },
                error: function() {
                    swal.close();
                    swal('Error', 'Something went wrong while fetching voucher data', 'error');
                }
            });
        }

        //ultrasoft changes this function generate three prinnt copies
        function generateChallanHTML(data) {
            var totalFees = 0;
            var tokenTaxAmount = 0;
            var FeesList = [];

            if (data.fees && data.fees.length > 0) {
                data.fees.forEach(function(fee) {
                    if (fee.fees_id == 16) {
                        tokenTaxAmount = parseFloat(fee.amount);
                    } else {
                        FeesList.push({
                            Name: fee.title,
                            Amount: fee.amount
                        });
                        totalFees += parseFloat(fee.amount);
                    }
                });
            }

            var ArrearList = [];
            var arrearTotal = 0;
            if (data.arrears && data.arrears.length > 0) {
                data.arrears.forEach(function(arrear) {
                    ArrearList.push({
                        Name: arrear.title,
                        Amount: arrear.amount,
                        Type: arrear.tax_arrears_type
                    });
                    arrearTotal += parseFloat(arrear.amount);
                });
            }

            var TotalAmount = parseInt(data.total_amount);
            var inwords = inWords(TotalAmount);

            var issueDate = moment(data.issue_date).format('DD/MM/YYYY');
            var regDate = data.registration_date !== 'N/A' ? moment(data.registration_date).format('DD/MM/YYYY') : 'N/A';
            var renewedUpto = data.tax_app_year_to ? moment(data.tax_app_year_to).format('DD-MM-YYYY') : 'N/A';
            var lastPaidUpto = data.tax_app_year_from ? moment(data.tax_app_year_from).subtract(1, 'days').format('DD-MM-YYYY') : 'N/A';

            var printn = '<html><head><title>Voucher</title>';
            printn += '<style>';
            printn += '@page { size: landscape; margin: 10mm; -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important;}';
            printn += 'body { margin: 0; padding: 5px; }';
            printn += 'table { width: 100%; border:1px solid #000; border-collapse: collapse; border-left: 0px; border-right: 0px; }';
            printn += 'table>tbody>tr>td { border-right: 1px solid; border-collapse: collapse; }';
            printn += '.a { border-right: 0px; text-align: right; border-collapse: collapse; padding-right: 10px; }';
            printn += 'h3,h4,h2 { font-size:10px !important; margin: 2px 0px; }';
            printn += '.wrapper { display: flex; width: 100%; }';
            printn += '.copy-container { width: 33.33%; float: left; border-right: 1px dashed #000; box-sizing: border-box; position: relative;}';
            printn += '.wrapper .copy-container:last-child { width: 33.33%; float: left; border-right:none !important; box-sizing: border-box; position: relative;}';
            printn += '.watermark {color: red;}';
            printn += '.copy-container::before {content: "DUPLICATE";position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%) rotate(-30deg);font-size: 120px;font-weight: 900;color: rgba(0, 0, 0, 0.08);white-space: nowrap;z-index: 1;pointer-events: none;user-select: none;}';
            printn += '@media print { .copy-container::before {position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%) rotate(-60deg);font-size: 80px;font-weight: 900;color: rgba(0, 0, 0, 0.08);opacity: 1;z-index: 9999; }}';
            printn += '@media print { body { -webkit-print-color-adjust: exact; print-color-adjust: exact; } }';
            printn += '</style>';
            printn += '</head><body>';

            printn += '<div class="wrapper" style="border: 1px solid #000;">';
            printn += generateChallanCopy('OWNER\'S COPY', data, FeesList, ArrearList, tokenTaxAmount, TotalAmount, inwords, issueDate, regDate, renewedUpto, lastPaidUpto);
            printn += generateChallanCopy('EXCISE COPY', data, FeesList, ArrearList, tokenTaxAmount, TotalAmount, inwords, issueDate, regDate, renewedUpto, lastPaidUpto);
            printn += generateChallanCopy('BANK COPY', data, FeesList, ArrearList, tokenTaxAmount, TotalAmount, inwords, issueDate, regDate, renewedUpto, lastPaidUpto);
            printn += '</div>';

            printn += '</body></html>';

            printDiv(printn);
        }

        function generateChallanCopy(copyTitle, data, FeesList, ArrearList, tokenTaxAmount, TotalAmount, inwords, issueDate, regDate, renewedUpto, lastPaidUpto) {
            var html = '<div class="copy-container">';

            html += '<div class="watermark" style="padding-left: 10px;"> Duplicate </div>';
            html += '<div style="width: 100%;">';
            html += '<div class="table_header">';
            html += '<h3 style="text-align: center;margin: 10px auto;border-bottom: 1px solid; margin-bottom: 0px;">' + copyTitle + '</h3>';
            html += '</div>';

            html += '<div style="width: 100%;margin: 15px auto;">';
            html += '<div style="width: 100%">';
            html += '<h2 style="font-size: 13px;text-align: center;margin-bottom: 10px;">BALOCHISTAN EXCISE AND TAXATION</h2>';
            html += '</div></div>';

            html += '<div style="width: 100%;margin: 5px auto;">';
            html += '<div style="width: 50%;float: left"><div style="width: 100%">';
            html += '<h4 style="width: 30%;text-align: left;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">DISTRICT</h4>';
            html += '<input type="text" value="' + data.district + '" style="width: 60%;float: left;margin: 5px 0px 0px 0px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 50%;float: left"><div style="width: 100%">';
            html += '<h4 style="width: 30%;text-align: left;float: left;margin: 5px 0px 0px 5px;text-align: center;font-size: 10px;">STATUS</h4>';
            html += '<input type="text" value="' + data.status + '" style="width: 60%;float: left;margin: 5px 0px 0px 0px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 50%; float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 52%;text-align: left; float: left; margin: 5px 0px 0px 5px; font-size: 10px;">REGISTERATION DATE</h4>';
            html += '<input type="text" value="' + regDate + '" style="width: 42%;float: left;margin: 5px 0px 0px 0px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 50%;float: left"><div style="width: 100%">';
            html += '<h4 style="width: 30%;text-align: left;float: left;margin: 5px 0px 0px 5px;text-align: center;font-size: 10px;">DATE</h4>';
            html += '<input type="text" value="' + issueDate + '" style="width: 60%;float: left;margin: 5px 0px 0px 0px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">BOOK SERIAL NO.</h4>';
            html += '<input type="text" value="' + data.book_serialNo + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">GENERATED BY</h4>';
            html += '<input type="text" value="' + data.generated_by + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px; font-weight: bold;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">CHALLAN NO</h4>';
            html += '<input type="text" value="' + data.challan_no + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px; font-weight: bold;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">REGISTRATION NUMBER</h4>';
            html += '<input type="text" value="' + data.reg_no.toUpperCase() + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">ENGINE CC</h4>';
            html += '<input type="text" value="' + data.engine_cc + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">CHASSIS NO</h4>';
            html += '<input type="text" value="' + data.chassis_no + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">LADEN WEIGHT</h4>';
            html += '<input type="text" value="' + data.laden_weight + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">SEATING CAPACITY</h4>';
            html += '<input type="text" value="' + data.seating_capacity + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">OWNER</h4>';
            html += '<input type="text" value="' + data.owner_name + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">ADDRESS</h4>';
            html += '<input type="text" value="' + data.address  + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">CATEGORY</h4>';
            html += '<input type="text" value="' + (data.category || data.category_of_vehicle) + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">CNIC/NTN</h4>';
            html += '<input type="text" value="' + data.cnic + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">LAST TAX PAID UPTO</h4>';
            html += '<input type="text" value="' + lastPaidUpto + '" style="width: 40%;float: left;margin: 5px 0px 0px 5px;border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '<div style="width: 100%;float: left;clear: both;"><div style="width: 100%">';
            html += '<h4 style="width: 50%;float: left;margin: 5px 0px 0px 5px;font-size: 10px;">RENEWED UPTO</h4>';
            html += '<input type="text" value="' + renewedUpto + '" style="width: 40%;float: left; margin: 5px 0px 0px 5px; border-top: none;border-left: none;border-right: none;font-size: 9px;" disabled>';
            html += '</div></div>';

            html += '</div>';

            // Fee Table
            html += '<div class="table" style="margin-top: 10px;">';
            html += '<table style="font-size: 9px;">';
            html += '<tbody>';
            html += '<tr>';
            html += '<td style="border-bottom: 1px solid;text-align: center;padding: 3px;">S.#</td>';
            html += '<td style="border-bottom: 1px solid;text-align: center;padding: 3px;">DESCRIPTION OF TAX</td>';
            html += '<td style="border-bottom: 1px solid;text-align: center;border-right: 0px;padding: 3px;">AMOUNT</td>';
            html += '</tr>';

            // Fees
            var cou = 0;
            FeesList.forEach(function(fee, index) {
                html += '<tr style="border-bottom: 0.5px solid;">';
                html += '<td style="text-align: center;padding: 2px;">1.' + (index + 1) + '</td>';
                html += '<td style="text-align: left;padding: 2px;">' + fee.Name + '</td>';
                html += '<td class="a" style="padding: 7px;">' + addCommas(fee.Amount) + '</td>';
                html += '</tr>';
                cou = index + 1;
            });

            // Token Tax
            if (tokenTaxAmount != 0) {
                cou++;
                html += '<tr style="border-bottom: 0.5px solid;">';
                html += '<td style="text-align: center;padding: 7px;">1.' + cou + '</td>';
                html += '<td style="text-align: left;padding: 2px;">TOKEN TAX</td>';
                html += '<td class="a" style="padding: 7px;">' + addCommas(tokenTaxAmount) + '</td>';
                html += '</tr>';
            }

            // Arrears
            ArrearList.forEach(function(arrear, index) {
                html += '<tr style="border-bottom: 0.5px solid;">';
                html += '<td style="text-align: center;padding: 2px;">2.' + (index + 1) + '</td>';
                html += '<td style="text-align: left;padding: 2px;">' + arrear.Name + ' (' + arrear.Type + ')</td>';
                html += '<td class="a" style="padding: 7px;">' + addCommas(arrear.Amount) + '</td>';
                html += '</tr>';
            });

            // Total
            html += '<tr>';
            html += '<td style="text-align: center;padding: 2px;"></td>';
            html += '<td style="text-align: right;padding: 2px;font-weight: bold;">TOTAL AMOUNT</td>';
            html += '<td class="a" style="padding: 7px;font-weight: bold;">Rs ' + addCommas(TotalAmount) + '</td>';
            html += '</tr>';

            html += '</tbody>';
            html += '</table>';
            html += '</div>';

            // Amount in Words
            html += '<div style="width: 100%;float: left;clear: both;margin-top: 5px;">';
            html += '<div style="width: 35%;float: left;"><h4 style="font-size: 10px;margin: 2px 0px 0px 3px">Amount In Words</h4></div>';
            html += '<div style="width: 65%;float: left;"><p style="font-size: 9px;margin: 2px 0px 0px 3px">' + inwords + '</p></div>';
            html += '</div>';

            // Signatures
            html += '<div style="width:100%;clear: both;margin-top: 10px;">';
            html += '<div style="width: 70%;float: left;">';
            html += '<h2 style="font-size: 10px;margin: 2px 0px 0px 3px">BANK OFFICER STAMP SIGNATURE</h2>';
            html += '</div>';
            html += '<div style="width:30%;float: left;"><h2 style="font-size: 10px;margin: 2px 0px">DEO NAME</h2></div>';
            html += '<hr style="margin: 20px 0px;"><div style="width: 100%;text-align:center;clear: both;">';
            html += '<h2 style="font-size: 10px;margin: 2px 0px 0px 3px">APPLICANT SIGNATURE</h2>';
            html += '</div>';
            html += '<br><br>';
            html += '<hr style="margin: 20px 0px;"><div style="width: 100%;text-align:center;clear: both;">';
            html += '<h2 style="font-size: 10px;margin: 2px 0px 0px 3px">ETO SIGNATURE/STAMP</h2>';
            html += '</div>';
            html += '</div>';

            html += '</div>';
            html += '</div>';

            return html;
        }


        function printDiv(printSection) {
            var w = window.open();
            w.document.write(printSection);
            // w.document.close();

            setTimeout(function() {
                w.print();
                setTimeout(function() {
                    // w.close();
                }, 500);
            }, 500);
        }

        // Helper functions
        function addCommas(nStr) {
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        var a = ['', 'one ', 'two ', 'three ', 'four ', 'five ', 'six ', 'seven ', 'eight ', 'nine ', 'ten ', 'eleven ', 'twelve ', 'thirteen ', 'fourteen ', 'fifteen ', 'sixteen ', 'seventeen ', 'eighteen ', 'nineteen '];
        var b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

        function inWords(num) {
            if ((num = num.toString()).length > 9) return 'overflow';
            var n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
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





@endsection
