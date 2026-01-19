@extends('layouts.dash')

@section('content')





            <!-- page content -->

            <div class="right_col" role="main">

                <div class="">

                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">


    <style>

        .addnewpanl svg {

            height: 25px;

            width: 25px;

        }



        label {

            margin: 7px 0px

        }



        .prmnt {

            color: #25272f;

            padding-left: 15px;

            border-left: 1px solid #25272f;

        }



        .img {

            height: 100px;

            width: 100px;

            display: block;

            float: left;

            margin: 5px;

            padding: 5px;

            border: 1px solid #ddd;

        }



        .error {

            border: 3px solid red !important;

        }

    </style>



<div class="topTabsSection">

    <div class="headingDiv wdth100">

        @if(isset($id))
            <h2>Edit New Procurement</h2>
        @else
            <h2>Add New Procurement</h2>

        @endif


    </div>

</div>



<div class="panel panel-default mb-50 addnewpanl">

    <div class="panel-body">

        <h4 class="h4Vouchr">

            <svg xmlns="http://www.w3.org/2000/svg" width="51.054" height="47.5" viewBox="0 0 51.054 47.5">

                <g id="keys" transform="translate(0 -17.75)">

                    <path id="Path_1163" data-name="Path 1163" d="M44.213,186.853a1.5,1.5,0,0,1-1.5,1.5H16.969a.5.5,0,0,0-.489.4,8.464,8.464,0,0,1-8.142,6.884A8.58,8.58,0,0,1,0,186.853c0-.044,0-.088,0-.131a8.571,8.571,0,0,1,8.337-8.652,8.464,8.464,0,0,1,8.142,6.883.5.5,0,0,0,.489.4H30a.5.5,0,0,0,.5-.5v-2.126a1.529,1.529,0,0,1,1.428-1.542,1.5,1.5,0,0,1,1.576,1.5v2.168a.5.5,0,0,0,.5.5h2.6a.5.5,0,0,0,.5-.5v-2.126a1.529,1.529,0,0,1,1.427-1.542,1.5,1.5,0,0,1,1.576,1.5v2.168a.5.5,0,0,0,.5.5h2.1a1.5,1.5,0,0,1,1.5,1.37C44.211,186.766,44.213,186.81,44.213,186.853Z" transform="translate(0 -144.271)" fill="#685e68" />

                    <path id="Path_1164" data-name="Path 1164" d="M44.213,265.81a1.5,1.5,0,0,1-1.5,1.5H16.969a.5.5,0,0,0-.489.4,8.464,8.464,0,0,1-8.142,6.884A8.58,8.58,0,0,1,0,265.81Z" transform="translate(0 -223.228)" fill="#40383f" />

                    <path id="Path_1165" data-name="Path 1165" d="M40.671,213.85a5.578,5.578,0,0,1-5.336,5.781A5.578,5.578,0,0,1,30,213.85c0-.044,0-.087,0-.131a5.564,5.564,0,0,1,5.334-5.649,5.564,5.564,0,0,1,5.334,5.649C40.671,213.763,40.671,213.806,40.671,213.85Z" transform="translate(-26.997 -171.268)" fill="#d7ebed" />

                    <path id="Path_1166" data-name="Path 1166" d="M40.671,265.81a5.578,5.578,0,0,1-5.336,5.781A5.578,5.578,0,0,1,30,265.81Z" transform="translate(-26.997 -223.228)" fill="#b6dade" />

                    <path id="Path_1167" data-name="Path 1167" d="M71.3,251v.263a1.5,1.5,0,1,1-3,0V251a1.5,1.5,0,1,1,3,0Z" transform="translate(-61.463 -208.551)" fill="#685e68" />

                    <path id="Path_1168" data-name="Path 1168" d="M71.3,265.81v.132a1.5,1.5,0,1,1-3,0v-.132Z" transform="translate(-61.463 -223.228)" fill="#40383f" />

                    <path id="Path_1169" data-name="Path 1169" d="M137.052,22.255v6.513a4.505,4.505,0,0,1-4.5,4.5H126.14a4.505,4.505,0,0,1-4.5-4.5V27.573a.5.5,0,0,0-.5-.5H97.07a1.5,1.5,0,0,1,0-3h2.1a.5.5,0,0,0,.5-.5V20.852A1.529,1.529,0,0,1,101.1,19.31a1.5,1.5,0,0,1,1.575,1.5v2.76a.5.5,0,0,0,.5.5h2.6a.5.5,0,0,0,.5-.5V20.852a1.529,1.529,0,0,1,1.428-1.543,1.5,1.5,0,0,1,1.575,1.5v2.76a.5.5,0,0,0,.5.5h11.352a.5.5,0,0,0,.5-.5V22.255a4.505,4.505,0,0,1,4.5-4.5h6.407a4.505,4.505,0,0,1,4.5,4.5Z" transform="translate(-85.998)" fill="#685e68" />

                    <path id="Path_1170" data-name="Path 1170" d="M137.052,95.28v3.256a4.505,4.505,0,0,1-4.5,4.5H126.14a4.505,4.505,0,0,1-4.5-4.5V97.342a.5.5,0,0,0-.5-.5H97.07a1.5,1.5,0,0,1-1.5-1.562Z" transform="translate(-85.998 -69.769)" fill="#40383f" />

                    <path id="Path_1171" data-name="Path 1171" d="M395.41,49.252v6.513a1.5,1.5,0,0,1-1.5,1.5H387.5a1.5,1.5,0,0,1-1.5-1.5V49.252a1.5,1.5,0,0,1,1.5-1.5h6.407A1.5,1.5,0,0,1,395.41,49.252Z" transform="translate(-347.359 -26.997)" fill="#ff5b5b" />

                    <path id="Path_1172" data-name="Path 1172" d="M395.41,95.28v3.256a1.5,1.5,0,0,1-1.5,1.5H387.5a1.5,1.5,0,0,1-1.5-1.5V95.28Z" transform="translate(-347.359 -69.769)" fill="#f40000" />

                    <path id="Path_1173" data-name="Path 1173" d="M421,80.8V81a1.5,1.5,0,0,1-3,0v-.2a1.5,1.5,0,0,1,3,0Z" transform="translate(-376.156 -55.389)" fill="#d7ebed" />

                    <path id="Path_1174" data-name="Path 1174" d="M421,95.28v.1a1.5,1.5,0,0,1-3,0v-.1Z" transform="translate(-376.156 -69.769)" fill="#b6dade" />

                    <path id="Path_1175" data-name="Path 1175" d="M119.986,343.231a1.5,1.5,0,0,1-.2.751l-3.666,6.351a1.5,1.5,0,0,1-1.3.751h-7.333a1.5,1.5,0,0,1-1.3-.751l-3.088-5.35a.5.5,0,0,0-.433-.25H90.815a.5.5,0,0,0-.5.5v3.17a1.5,1.5,0,0,1-1.576,1.5,1.529,1.529,0,0,1-1.427-1.542v-3.128a.5.5,0,0,0-.5-.5h-2.6a.5.5,0,0,0-.5.5v3.17a1.5,1.5,0,0,1-1.576,1.5,1.529,1.529,0,0,1-1.427-1.542v-3.128a.5.5,0,0,0-.5-.5h-2.06a1.526,1.526,0,0,1-1.544-1.5h0a1.5,1.5,0,0,1,1.5-1.5h24.562a.5.5,0,0,0,.433-.25l3.088-5.349a1.5,1.5,0,0,1,1.3-.751h7.333a1.5,1.5,0,0,1,1.3.751l3.666,6.35A1.5,1.5,0,0,1,119.986,343.231Z" transform="translate(-68.932 -285.834)" fill="#685e68" />

                    <path id="Path_1176" data-name="Path 1176" d="M119.986,413.81a1.5,1.5,0,0,1-.2.751l-3.666,6.351a1.5,1.5,0,0,1-1.3.751h-7.333a1.5,1.5,0,0,1-1.3-.751l-3.088-5.35a.5.5,0,0,0-.433-.25H90.815a.5.5,0,0,0-.5.5v3.17a1.5,1.5,0,0,1-1.576,1.5,1.529,1.529,0,0,1-1.427-1.542v-3.128a.5.5,0,0,0-.5-.5h-2.6a.5.5,0,0,0-.5.5v3.17a1.5,1.5,0,0,1-1.576,1.5A1.529,1.529,0,0,1,80.7,418.94v-3.128a.5.5,0,0,0-.5-.5h-2.06a1.526,1.526,0,0,1-1.544-1.5h43.386Z" transform="translate(-68.932 -356.412)" fill="#40383f" />

                    <path id="Path_1177" data-name="Path 1177" d="M377.027,370.228l-2.8,4.849h-5.6l-2.8-4.849,2.8-4.848h5.6Z" transform="translate(-329.209 -312.83)" fill="#007a9f" />

                    <path id="Path_1178" data-name="Path 1178" d="M377.027,413.81l-2.8,4.849h-5.6l-2.8-4.849Z" transform="translate(-329.209 -356.412)" fill="#00607f" />

                    <path id="Path_1179" data-name="Path 1179" d="M409.753,399v.263a1.5,1.5,0,0,1-3,0V399a1.5,1.5,0,1,1,3,0Z" transform="translate(-366.032 -341.735)" fill="#d7ebed" />

                    <path id="Path_1180" data-name="Path 1180" d="M409.753,413.81v.132a1.5,1.5,0,0,1-3,0v-.132Z" transform="translate(-366.032 -356.412)" fill="#b6dade" />

                </g>

            </svg>

            KEY

        </h4>

        <form id="Procurementform">
        @csrf
            <div class="row form-group">



                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>ETO</label></div>

                            <div class="col-md-7"><select class="form-control" id="ETO" name="ETO"><option></option></select></div>

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Jurisdiction</label></div>

                            <div class="col-md-7">

                                <select class="form-control" id="DivisionID" name="DivisionID"><option></option></select>

                                <input type="hidden" id="RecordId" name="RecordId" value="@if(isset($id)){{$id}}@endif" />

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>District</label></div>

                            <div class="col-md-7">

                                <select class="form-control" id="Division" name="Division"><option></option></select>

                                <input type="hidden" id="RecordId" name="RecordId" value="@if(isset($id)){{$id}}@endif" />

                            </div>

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Registration No</label></div>

                            <div class="col-md-7"><input pattern="[A-Z]{3}[0-9]{3}" placeholder="Format = (ABC123)" type="text" class="form-control" id="RegistrationMarkID" name="RegistrationMarkID" maxlength="20" /></div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Source Of Procurement</label></div>

                            <div class="col-md-7"><select class="form-control" id="ProcurementSourceID" name="ProcurementSourceID"><option></option></select></div>

                        </div>

                    </div>



                </div>

            <h4 class="h4Vouchr">

                <svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">

                    <g><path d="m256 0c-89.365 0-162.193 72.459-164.758 161.212l164.758-5.318 164.758 5.317c-2.565-88.752-75.393-161.211-164.758-161.211z" fill="#ff641a" /><path d="m256 0v155.894l164.758 5.317c-2.565-88.752-75.393-161.211-164.758-161.211z" fill="#f03800" /><g><path d="m15 91c-8.291 0-15-6.709-15-15v-61c0-8.291 6.709-15 15-15h61c8.291 0 15 6.709 15 15s-6.709 15-15 15h-46v46c0 8.291-6.709 15-15 15z" fill="#3b4a51" /></g><g><path d="m76 512h-61c-8.291 0-15-6.709-15-15v-61c0-8.291 6.709-15 15-15s15 6.709 15 15v46h46c8.291 0 15 6.709 15 15s-6.709 15-15 15z" fill="#3b4a51" /></g><g><path d="m497 91c-8.291 0-15-6.709-15-15v-46h-46c-8.291 0-15-6.709-15-15s6.709-15 15-15h61c8.291 0 15 6.709 15 15v61c0 8.291-6.709 15-15 15z" fill="#293939" /></g><g><path d="m497 512h-61c-8.291 0-15-6.709-15-15s6.709-15 15-15h46v-46c0-8.291 6.709-15 15-15s15 6.709 15 15v61c0 8.291-6.709 15-15 15z" fill="#293939" /></g><g><path d="m420.758 161.212-78.312 145.063-86.446 139.801c77.882 41.647 177.116 14.874 221.84-62.576 44.579-77.225 18.118-175.558-57.082-222.288z" fill="#80bfff" /><path d="m169.554 306.275-78.312-145.063c-75.2 46.73-101.66 145.063-57.082 222.288 44.398 76.91 143.202 104.998 221.84 62.576z" fill="#fed843" /></g><path d="m420.758 161.212c-53.625-33.307-115.135-32.032-164.758-5.318l86.446 150.381c48.214-29.823 80.073-83.311 78.312-145.063z" fill="#6aa9ff" /><path d="m91.242 161.212c-1.754 61.529 29.901 115.118 78.312 145.063l86.446-150.381c-49.284-26.307-111.138-27.986-164.758 5.318z" fill="#ff9100" /><path d="m256 306.275h-86.446c1.893 56.074 31.599 110.477 86.446 139.801 55.007-29.68 84.549-83.644 86.446-139.801z" fill="#97de3d" /><path d="m342.446 306.275h-86.446v139.801c55.007-29.679 84.549-83.644 86.446-139.801z" fill="#59c36a" /><path d="m320.951 218.5c-16.011-27.74-38.712-48.6-64.951-62.606-26.065 14.031-49.067 35.081-64.951 62.606-15.956 27.642-22.5 58.006-21.495 87.775 25.177 15.573 54.728 24.725 86.446 24.725s61.269-9.152 86.446-24.725c1.005-29.769-5.539-60.133-21.495-87.775z" fill="#f0f7ff" /><path d="m320.951 218.5c-16.011-27.74-38.712-48.6-64.951-62.606v175.106c31.718 0 61.269-9.152 86.446-24.725 1.005-29.769-5.539-60.133-21.495-87.775z" fill="#dfe7f4" /></g>

                </svg>

                GOVERNMENT SCHEME

            </h4>

            <div class="row form-group">

                <div class="col-md-12">

                    <h4 class="prmnt">Agreement - 1</h4>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Bank</label></div>

                        <div class="col-md-7"><select class="form-control" id="BankID" name="BankID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Branch</label></div>

                        <div class="col-md-7"><select class="form-control" id="BranchID" name="BranchID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Sales Certificate No.</label></div>

                        <div class="col-md-7"><input type="number" class="form-control" id="SalesCertificateNo" name="SalesCertificateNo" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Agreement No.</label></div>

                        <div class="col-md-7"><input type="number" class="form-control" id="AgreementNo" name="AgreementNo" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Bill Of Entry No.</label></div>

                        <div class="col-md-7"><input type="number" class="form-control" id="BillEntryNo" name="BillEntryNo" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Letter No.</label></div>

                        <div class="col-md-7"><input type="number" class="form-control" id="LetterNo" name="LetterNo" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Sales Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="SalesDate" name="SalesDate" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Agreement Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="AgreementDate" name="AgreementDate" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Bill Of Entry Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="BillEntryDate" name="BillEntryDate" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Letter Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="LetterDate" name="LetterDate" /></div>

                    </div>

                </div>

                <div class="col-md-12">

                    <h4 class="prmnt">Agreement - 2</h4>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Agreement ID</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="AgreementID" name="AgreementID" onkeypress="ValidateInputN(this.id,event)" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>PTA - NCO No.</label></div>

                        <div class="col-md-7"><input type="number" class="form-control" id="PTANOCNo" name="PTANOCNo" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>PTA - NCO Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="PTANOCDate" name="PTANOCDate" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Sales Certificate No.</label></div>

                        <div class="col-md-7"><input type="number" class="form-control" id="SalesCertificateNo2" name="SalesCertificateNo2" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Sales Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="SalesDate2" name="SalesDate2" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Attach Scan Document</label></div>

                        <div class="col-md-7"><input type="file" class="form-control" id="Document" name="UploadedFile" /></div>

                    </div>

                </div>

                <div class="col-md-12">

                    <h4 class="prmnt">New Owner</h4>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Type</label></div>

                        <div class="col-md-7"><select class="form-control" id="OwnerTypeID" name="OwnerTypeID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Title</label></div>

                        <div class="col-md-7"><select class="form-control" id="OwnerTitleID" name="OwnerTitleID"><option></option></select></div>

                    </div>

                </div>

                <div class="row form-group" id="OwnersAppended">

                    <div id="owner_0">

                        <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>Name</label></div>

                                <div class="col-md-7"><input type="text" class="form-control" id="Name" name="Name" maxlength="50" onkeypress="ValidateInput(this.id,event)" /></div>

                            </div>

                        </div>

                        <div class="col-md-6" id="HideOldCnic">

                            <div class="row form-group">

                                <div class="col-md-5"><label>Old CNIC No</label></div>

                                <div class="col-md-6">

                                    <input type="text" data-inputmask="'mask':'99999-9999999-9'" placeholder="xxxxx-xxxxxxx-x" class="form-control" id="OldCNIC" name="OldCNIC" />

                                    <span id="ExistoldCnic" style="color:red;display:none"></span>

                                </div>

                                <div class="col-md-1" style="padding-left: 0;">

                                    <button type="button" id="AddOwners" class="btn btnCustom" onclick="AddMoreOwner()" style="margin:0;width:100%"><i class="fa fa-plus"></i></button>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6" id="HideNewCnic">

                            <div class="row form-group">

                                <div class="col-md-5"><label id="lblCnic">New CNIC No</label></div>

                                <div class="col-md-7">

                                    <input type="text" class="form-control" data-inputmask="'mask':'99999-9999999-9'" placeholder="xxxxx-xxxxxxx-x" id="NewCNIC" name="NewCNIC" />

                                    <span id="ExistnewCnic" style="color:red;display:none"></span>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6" id="HideFatherDiv">

                            <div class="row form-group">

                                <div class="col-md-5"><label>Father or Husband Name</label></div>

                                <div class="col-md-6"><input type="text" class="form-control" id="Guardian" name="Guardian" maxlength="50" onkeypress="ValidateInput(this.id,event)" /></div>

                            </div>

                        </div>

                    </div>

                </div>





                <div class="col-md-12">

                    <h4 class="prmnt">Permanent Address</h4>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>House No</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="HouseNO" name="HouseNO" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Province</label></div>

                        <div class="col-md-7"><select class="form-control" id="ProvinceID" name="ProvinceID"><option></option></select></div>



                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>City</label></div>

                        <div class="col-md-7"><select class="form-control" id="CityID" name="CityID"><option value="0">--Select City --</option></select></div>



                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Telephone</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="Telephone" name="Telephone" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Mobile</label></div>

                        <div class="col-md-7">

                            <input type="text" class="form-control" id="Mobile" name="Mobile" />

                            <span id="Existmobile" style="color:red;display:none"></span>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Email</label></div>

                        <div class="col-md-7">

                            <input type="email" class="form-control" id="Email" name="Email" />

                            <span id="ExistEmail" style="color:red;display:none"></span>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row form-group">

                <div class="col-md-3"></div>

                <div class="col-md-6 text-center">



                    <a href="/DEO/Procurement"   <button type="button" class="btn btnCancel">CANCEL</button></a>



                    <a class="btn btnCustom" id="Operation" onclick="SaveProcurementInfo();">SUBMIT</a>

                </div>

            </div>

        </form>

    </div>

</div>






<script>



    $("#Mobile").inputmask({ "mask": "\\929999999999" });

    $("#telephone").inputmask({ "mask": "\\929999999999" });

    $("#OldCNIC").inputmask({ "mask": "\\99999-9999999-9" });

    $("#NewCNIC").inputmask({ "mask": "\\99999-9999999-9" });



    $("#Procurementform").validate({

        rules: {

            "DivisionID": {

                required: true,

                Dropdown: true,

            },

            "Division": {

                required: true,

                Dropdown: true,

                },

            "RegistrationMarkID": {

                required: true,



            },

            "ProcurementSourceID": {

                required: true,

                Dropdown: true,

            },

            "BankID": {

                required: true,

                Dropdown: true,

            },

            "BranchID": {

                required: true,

                Dropdown: true,

            },

            "SalesCertificateNo": { required: true, },

            "AgreementNo": { required: true, },

            "BillEntryNo": { required: true, },

            "LetterNo": { required: true, },

            "SalesDate": { required: true, },

            "AgreementDate": { required: true, },

            "BillEntryDate": { required: true, },

            "LetterDate": { required: true, },

            "AgreementID": {

                required: true,



            },

            "PTANOCNo": { required: true, },

            "PTANOCDate": { required: true, },

            "SalesCertificateNo2": { required: true, },

            "SalesDate2": { required: true, },

            "Document": { required: true, },

            "OwnerTypeID": {

                required: true,

                Dropdown: true,

            },

            "OwnerTitleID": {

                required: true,

                Dropdown: true,

            },

            "Name": { required: true, },

            "OldCNIC": { required: true, },

            "NewCNIC": { required: true, },

            "Guardian": { required: true, },

            "HouseNO": { required: true, },

            "ProvinceID": {

                required: true,

                Dropdown: true,

            },

            "CityID": {

                required: true,

                Dropdown: true,

            },

            "Telephone": { required: true, },

            "Mobile": { required: true, },

            "Email": { required: true, },



        },



        messages: {

        },

        errorClass: "error",

        errorElement: "em",

        errorPlacement: function (error, element) {



            return false;

        },

        submitHandler: function (form) { // for demo

            return false; // for demo

        }

    });



    jQuery.validator.addMethod("ContactNumberCheck", function (value, element, param) {

        var dd = value;

        for (var a = 1; a <= 12; a++) {

            dd = dd.replace("_", "");

            dd = dd.replace("-", "");

        }

        return this.optional(element) || dd.length == parseInt(param);

    }, "Phone Number Is Not Valid");





    jQuery.validator.addMethod("CNICCheck", function (value, element, param) {

        var dd = value;

        for (var a = 1; a <= 13; a++) {

            dd = dd.replace("_", "");

            dd = dd.replace("-", "");

        }

        return this.optional(element) || dd.length == parseInt(param);

    }, "CNIC Is Not Valid");





    $.validator.addMethod("Dropdown", function (value, element) {

        return this.optional(element) || value > 0;

    }, "You must select at least one");





    function ValidateDate(newCnic, mobile, email) {

        var stat = null;

        $.ajax({

            url: "/DEO/CheckExist",

            type: "GET",

            dataType: "JSON",

            async: false,

            data: { NewCNIC: newCnic, Mobile: mobile, Email: email, tableName: 'Procurement', key: 'Mobile', KeyCNIC: 'NewCNIC' },

            success: function (response) {



                if (response.Status) {

                    //var msg = "";

                    stat = 0;

                }

                else {

                    if (response.IsCNICExists != 0) {

                        $("#ExistnewCnic").css("display", "block");

                        $("#ExistnewCnic").html("CNIC already exist");



                        stat = 1;

                    }

                    if (response.IsMobileExists != 0) {

                        $("#Existmobile").css("display", "block");

                        $("#Existmobile").html("Mobile already exist");



                        stat = 1;

                    }

                    if (response.IsEmailExists != 0) {

                        $("#ExistEmail").css("display", "block");

                        $("#ExistEmail").html("Email already exist");



                        stat = 1;

                    }

                }



            }

        });

        return stat;

    }



    var ownerCounter = 1;

    function AddMoreOwner() {

        var a = '<div id="owner_' + ownerCounter + '">                                                                                                                                                                '

            + '    <div class="col-md-6">                                                                                                                                                        '

            + '        <div class="row form-group">                                                                                                                                              '

            + '            <div class="col-md-5"><label>Name</label></div>                                                                                                                       '

            + '            <div class="col-md-7"><input type="text" class="form-control" id="Name" name="Name" /></div>                                                                '

            + '        </div>                                                                                                                                                                    '

            + '    </div>                                                                                                                                                                        '

            + '    <div class="col-md-6">                                                                                                                                                        '

            + '        <div class="row form-group">                                                                                                                                              '

            + '            <div class="col-md-5"><label>Old CNIC No</label></div>                                                                                                                '

            + '            <div class="col-md-6">                                                                                                                                                '

            + '                <input type="text" data-inputmask=""mask":"99999-9999999-9"" placeholder="xxxxx-xxxxxxx-x" class="form-control" id="OldCNIC" name="OldCNIC" />                    '

            + '                <span id="ExistoldCnic" style="color:red;display:none"></span>                                                                                                    '

            + '            </div>                                                                                                                                                                '

            + '            <div class="col-md-1" style="padding-left: 0;">                                                                                                                       '

            + '                <button type="button" id="AddOwners" class="btn btnCustom" onclick="RemoveOwner(' + ownerCounter + ')" style="margin:0;width:100%"><i class="fa fa-minus"></i></button>                                        '

            + '            </div>                                                                                                                                                                '

            + '        </div>                                                                                                                                                                    '

            + '    </div>                                                                                                                                                                        '

            + '    <div class="col-md-6">                                                                                                                                                        '

            + '        <div class="row form-group">                                                                                                                                              '

            + '            <div class="col-md-5"><label>New CNIC No</label></div>                                                                                                                '

            + '            <div class="col-md-7">                                                                                                                                                '

            + '                <input type="text" class="form-control" data-inputmask=""mask":"99999 - 9999999 - 9"" placeholder="xxxxx-xxxxxxx-x" id="NewCNIC" name="NewCNIC" />                    '

            + '                <span id="ExistnewCnic" style="color:red;display:none"></span>                                                                                                    '

            + '            </div>                                                                                                                                                                '

            + '        </div>                                                                                                                                                                    '

            + '    </div>                                                                                                                                                                        '

            + '    <div class="col-md-6">                                                                                                                                                        '

            + '        <div class="row form-group">                                                                                                                                              '

            + '            <div class="col-md-5"><label>Father or Husband Name</label></div>                                                                                                     '

            + '            <div class="col-md-6"><input type="text" class="form-control" id="Guardian" name="Guardian" /></div>                                                          '

            + '        </div>                                                                                                                                                                    '

            + '    </div>                                                                                                                                                                       '

            + '</div>                                                                                                                                                                            ';



        $('#OwnersAppended').append(a);

        ownerCounter++;



    }



    function RemoveOwner(a) {

        $('#owner_' + a).remove();

    }





    function SaveProcurementInfo() {


        var _token= $("input[name='_token']").val();
        // var procurementvalitade = $('#Procurementform').valid();

        // if (procurementvalitade) {



            $("#DivisionUpdate").css("display", "None");



            var DivisionID = $('#DivisionID').val()

            var Division = $('#Division').val()

            var RegistrationMarkID = $('#RegistrationMarkID').val()

            var ProcurementSourceID = $('#ProcurementSourceID').val()

            var BankID = $('#BankID').val()

            var BranchID = $('#BranchID').val()

            var SalesCertificateNo = $('#SalesCertificateNo').val()

            var AgreementNo = $('#AgreementNo').val()

            var BillEntryNo = $('#BillEntryNo').val()

            var LetterNo = $('#LetterNo').val()

            var SalesDate = $('#SalesDate').val()

            var AgreementDate = $('#AgreementDate').val()

            var BillEntryDate = $('#BillEntryDate').val()

            var LetterDate = $('#LetterDate').val()

            var AgreementID = $('#AgreementID').val()

            var PTANOCNo = $('#PTANOCNo').val()

            var PTANOCDate = $('#PTANOCDate').val()

            var SalesCertificateNo2 = $('#SalesCertificateNo2').val()

            var SalesDate2 = $('#SalesDate2').val()

            var Document = $('#Document').val()

            var OwnerTypeID = $('#OwnerTypeID').val()

            var OwnerTitleID = $('#OwnerTitleID').val()

            var OwnerName = $('#Name').val()

            var OldCNIC = $('#OldCNIC').val()

            var NewCNIC = $('#NewCNIC').val()

            //var Guardian = $('#Guardian').val()

            var HouseNO = $('#HouseNO').val()

            var ProvinceID = $('#ProvinceID').val()

            var CityID = $('#CityID').val()

            var Telephone = $('#Telephone').val()

            var Mobile = $('#Mobile').val()

            var Email = $('#Email').val()

            var ETO_CODE =$("#ETO").val()







            var Owners = $("input[name=Name]");

            var OwnerName = "";

            if (Owners.length > 0) {

                for (var i = 0; i < Owners.length; i++) {

                    if (OwnerName == "") {

                        OwnerName = Owners[i].value;

                    } else {

                        OwnerName = OwnerName + "," + Owners[i].value;

                    }

                }

            }

            OwnerName = OwnerName;



            var CNIC = $("input[name=NewCNIC]");

            var NewCNIC = "";

            if (CNIC.length > 0) {

                for (var i = 0; i < CNIC.length; i++) {

                    if (NewCNIC == "") {

                        NewCNIC = CNIC[i].value;

                    } else {

                        NewCNIC = NewCNIC + "," + CNIC[i].value;

                    }

                }

            }

            var oldCNIC = $("input[name=OldCNIC]");

            var OldCNIC = "";

            if (oldCNIC.length > 0) {

                for (var i = 0; i < oldCNIC.length; i++) {

                    if (OldCNIC == "") {

                        OldCNIC = oldCNIC[i].value;

                    } else {

                        OldCNIC = OldCNIC + "," + oldCNIC[i].value;

                    }

                }

            }

            var Guradians = $("input[name=Guardian]");

            var Guardian = "";

            if (Guradians.length > 0) {

                for (var i = 0; i < Guradians.length; i++) {

                    if (Guardian == "") {

                        Guardian = Guradians[i].value;

                    } else {

                        Guardian = Guardian + "," + Guradians[i].value;

                    }

                }

            }



            var files = $("#Document").get(0).files;

            if (files.length > 3) {

                $("#Attachmsg").css("display", "block");

                $("#Attachmsg").html("only select 3 documents");

                return false;

            }

            if (files.length > 3) {

                $("#Attachmsg").css("display", "None");

            }

            var fileData = new FormData();



            for (var i = 0; i < files.length; i++) {

                fileData.append("upload", files[i]);

            }



            var check = true;

            if (Division == null || Division == "") {

               $('#Division').addClass('error');

               check = false;

            }

            fileData.append("_token", _token,)

            fileData.append("JurisdictionID", DivisionID,)

            fileData.append("DistrictID", DivisionID,)

            fileData.append("RegistrationMarkID", RegistrationMarkID,)

            fileData.append("ProcurementSourceID", ProcurementSourceID,)

            fileData.append("BankID", BankID,)

            fileData.append("BranchID", BranchID)

            fileData.append("SalesCertificateNo", SalesCertificateNo)

            fileData.append("AgreementNo", AgreementNo)

            fileData.append("EntryBillNo", BillEntryNo)

            fileData.append("LetterNo", LetterNo)

            fileData.append("SalesDate1", SalesDate)

            fileData.append("AgreementDate", AgreementDate)

            fileData.append("EntryDateBill", BillEntryDate)

            fileData.append("LetterDate", LetterDate)

            fileData.append("AgreementId", AgreementID)

            fileData.append("PtaNcoNo", PTANOCNo)

            fileData.append("PtaNcoDate", PTANOCDate)

            fileData.append("SalesCertificateNo2", SalesCertificateNo2)

            fileData.append("SalesDate2", SalesDate2)

            fileData.append("ScanDocumentPath", Document)

            fileData.append("OwnerTypeID", OwnerTypeID)

            fileData.append("OwnerTitleID", OwnerTitleID)

            fileData.append("OwnerName", OwnerName)

            fileData.append("OldCNIC", OldCNIC)

            fileData.append("NewCNIC", NewCNIC)

            fileData.append("FatherHusband", Guardian)

            fileData.append("HouseNo", HouseNO)

            fileData.append("ProvinceID", ProvinceID)

            fileData.append("CityID", CityID)

            //fileData.append("IsSpecialNumber", isSpecialNo)

            fileData.append("Telephone", Telephone)

            fileData.append("Mobile", Mobile)

            fileData.append("Email", Email)

            fileData.append("ETO_CODE", ETO_CODE)



            var getVal = ValidateDate(NewCNIC, Mobile, Email);



            if (getVal == 1) {

                return false;

            }

            else {



                $.ajax({

                    url: "{{url('/procurement')}}",

                    contentType: false, // Not to set any content header

                    processData: false, // Not to process data

                    type: "Post",

                    dataType: "JSON",

                    data: fileData,


                    success: function (response) {

                        if (response.Status) {

                            //var msg = "";

                            swal({

                                title: "Record Registered!.",

                                type: "success",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: "OK",

                                closeOnConfirm: true

                            },

                                function (isConfirm) {

                                    window.location.href = "/procurement";

                                    // LoadTable();

                                })

                        }

                        else {

                            swal("something went wrong")

                        }

                    }

                });

            }

        // }

        // else {

        //     alert("Please fill the reqiured fields!.");

        // }

    }



    $("#OwnerTypeID").change(function () {



        var OwnerTypeID = $("#OwnerTypeID").val();





        if (OwnerTypeID == "1") {

            $("#AddOwners").hide();

            $("#HideOldCnic").show();

            $("#HideNewCnic").show();

            $("#HideFatherDiv").show();

            $("#OwnerTitleDiv").show();

            $("#lblCnic").text("New CNIC No");

        }

        else if (OwnerTypeID == "2") {

            $("#HideOldCnic").hide();

            $("#HideNewCnic").hide();

            $("#HideFatherDiv").hide();

            $("#OwnerTitleDiv").hide();

        }

        else if (OwnerTypeID == "3") {

            $("#AddOwners").show();

            $("#HideOldCnic").show();

            $("#HideNewCnic").show();

            $("#HideFatherDiv").show();

            $("#OwnerTitleDiv").show();

            $("#lblCnic").text("New CNIC No");

        }

        else if (OwnerTypeID == "4") {

            $("#HideNewCnic").show();

            $("#OwnerTitleDiv").hide();

            $("#HideOldCnic").hide();

            $("#HideFatherDiv").hide();

            $("#lblCnic").text("NTN No")

        }

    });







</script>



<script>

    $('#nontrailer').click(function () {

        $("#ShowDiv").css("display", "None");

    });

    $('#trailer').click(function () {

        $("#ShowDiv").css("display", "Block");

    });



    $('#nontrible').click(function () {

        $("#DateDiv").css("display", "None");



    });



    $('#trible').click(function () {

        $("#DateDiv").css("display", "Block");

    });

</script>

<script>

    function imgToData(input) {



        if (input.files) {



            var length = input.files.length;

            $('#ImgesAttached').empty();

            if (length <= 3) {



                $.each(input.files, function (i, v) {

                    var n = i + 1;

                    var File = new FileReader();

                    File.onload = function (event) {

                        $('<img/>').attr({

                            src: event.target.result,

                            class: 'img',

                            id: 'img-' + n + '-preview',

                        }).appendTo('#ImgesAttached');



                        //$('<input/>').attr({

                        //    type: 'text',

                        //    value: event.target.result,

                        //    id: 'img-' + n + '-val'

                        //}).appendTo('ImgesAttached');

                    };



                    File.readAsDataURL(input.files[i]);

                });

            }

            else {

                alert('Only 3 images allowed!');

            }

        }

    }





    $('input[type="file"]').change(function (event) {

        imgToData(this);

    });

</script>

<script>

    $(".Numbers").click(function () {

        $("#NumberType").css("display", "None");

    });

    $(".trailers").click(function () {

        $("#TrailerType").css("display", "None");

    });

    $(".tribles").click(function () {

        $("#TribleType").css("display", "None");

    });

    //$(".trailers").click(function () {

    //    if (this.val === "trailer") {

    //        $("#ShowDiv").css("display", "Block");

    //    }

    //    else if (this.val === "nontrailer") {

    //        $("#ShowDiv").css("display", "Block");

    //    }

    //    else {



    //    }

    //});



    //$(".trible").click(function () {

    //    if (this.val === "Yes") {

    //        $("#DateDiv").css("display", "Block");

    //    }

    //    else if (this.val === "No") {

    //        $("#DateDiv").css("display", "Block");

    //    }

    //    else {



    //    }

    //});

</script>

<script>

    $(document).ready(function () {

        LoadDivisions();

        LoadDivision();

        // LoadRegistrationMark();

        LoadProcurementSource();

        LoadOwnerType();

        LoadOwnerTitle();

        LoadBank();

        LoadProvince();

        LoadETO();

        var value = $('#RecordId').val();

        if (value != "") {

            GetData(value);

            //GetDocumentData(value);

            $("#Operation").attr("onclick", "SaveProcurementInfo()").unbind("click");

            $("#Operation").attr("onclick", "UpdateProcurementInfo()").bind("click");

            $("#Operation").text('Update');

        }

    });



    function LoadDivisions() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadDivisions",

            dataType: 'json',

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#DivisionID').empty();

                        $('#DivisionID').append("<option value='0'>--Select Division--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.Jurisdiction + '</option>').appendTo('#DivisionID');

                        });



                    }

                    else {



                    }

                }

                else {



                }

            },

            error: function (response) {

                Swal("Something went wrong");

            }

        });

    }

    function LoadDivision() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadETOLoction",

            dataType: 'json',

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#Division').empty();

                        $('#Division').append("<option value='0'>--Select Division--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.eto_location + '</option>').appendTo('#Division');

                        });



                    }

                    else {



                    }

                }

                else {



                }

            },

            error: function (response) {

                Swal("Something went wrong");

            }

        });

    }

    // function LoadRegistrationMark() {



    //     $.ajax({

    //         type: "Get",

    //         contentType: 'application/json; charset=utf-8',

    //         url: "/DEO/LoadRegistrationMark",

    //         dataType: 'json',

    //         async:false,

    //         success: function (response) {



    //             //removeOptions(document.getElementById("slabID"));

    //             if (response.Status == true) {

    //                 if (typeof response != 'undefined' && response != null && response != 0) {



    //                     $('#RegistrationMarkID').empty();

    //                     $('#RegistrationMarkID').append("<option value='0'>--Select Registration Mark--</option>");

    //                     $.each(response.Data, function (index, value) {

    //                         $('<option value="' + value.id + '">' + value.registration_mark + '</option>').appendTo('#RegistrationMarkID');

    //                     });



    //                 }

    //                 else {



    //                 }

    //             }

    //             else {



    //             }

    //         },

    //         error: function (response) {

    //             Swal("Something went wrong");

    //         }

    //     });

    // }

    function LoadProcurementSource() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadProcurementSource",

            dataType: 'json',

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#ProcurementSourceID').empty();

                        $('#ProcurementSourceID').append("<option value='0'>--Select Prcurement Source--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.source_of_procurement + '</option>').appendTo('#ProcurementSourceID');

                        });



                    }

                    else {



                    }

                }

                else {



                }

            },

            error: function (response) {

                Swal("Something went wrong");

            }

        });

    }



    function LoadETO() {

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadETO",

            dataType: 'json',

            async: false,

            success: function (response) {

                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#ETO').empty();

                        $('#ETO').append("<option value='0'>--Select ETO Name--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.eto_code + '">' + value.eto_name + '</option>').appendTo('#ETO');

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

    }















    function LoadOwnerType() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadOwnerType",

            dataType: 'json',



            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#OwnerTypeID').empty();

                        $('#OwnerTypeID').append("<option value='0'>--Select Owner Type--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.owner_type + '</option>').appendTo('#OwnerTypeID');

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



    }

    function LoadOwnerTitle() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadOwnerTitle",

            dataType: 'json',

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#OwnerTitleID').empty();

                        $('#OwnerTitleID').append("<option value='0'>--Select Owner Title--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.owner_title + '</option>').appendTo('#OwnerTitleID');

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



    }

    function LoadBank() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadBank",

            dataType: 'json',

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#BankID').empty();

                        $('#BankID').append("<option value='0'>--Select Bank--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.bank + '</option>').appendTo('#BankID');

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



    }

    function LoadProvince() {

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadProvince",

            dataType: 'json',

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#ProvinceID').empty();

                        $('#ProvinceID').append("<option value='0'>--Select Province--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.province + '</option>').appendTo('#ProvinceID');

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



    }



</script>

//Cities

<script>

    $("#ProvinceID").change(function () {

        var provinceid = $("#ProvinceID").val();



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadCity",

            dataType: 'json',

            data: { ProvinceID: provinceid },

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#CityID').empty();

                        $('#CityID').append("<option value='0'>--Select City--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.city_code + '">' + value.cities + '</option>').appendTo('#CityID');

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

    });

</script>

//Branches

<script>

    $("#BankID").change(function () {



        var BankID = $('#BankID').val()

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadBranches",

            dataType: 'json',

            data: { bankID: BankID },

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#BranchID').empty();

                        $('#BranchID').append("<option value='0'>--Select Branches--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.branch + '</option>').appendTo('#BranchID');

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

    });

</script>



<script>



    function GetData(ID) {

        var BankID = $('#BankID').val();

        $.ajax({

            url: "/DEO/GetProcurementList",

            type: "GET",

            dataType: "JSON",

            data: { ID: ID },



            success: function (response) {

                if (response.Status) {

                    ;

                    $('#Division').val(response.Data.eto_location_id);

                    $('#RegistrationMarkID').val(response.Data.registration_marks_id);

                    $('#ProcurementSourceID').val(response.Data.source_of_procurement_id);

                    $('#ETO').val(response.Data.eto_name_id);

                    var E_code = $('#ETO').val();



                    $('#DivisionID').val(response.Data.jurisdiction_id);



                    $('#BankID').val(response.Data2.bank_id);



                    LoadBranches(response.Data2.bank_id);

                    $('#BranchID').val(response.Data2.branch_id);





                    $('#SalesCertificateNo').val(response.Data2.sales_cer_no);

                    $('#AgreementNo').val(response.Data2.agreement_no);

                    $('#BillEntryNo').val(response.Data2.bill_of_entry_no);

                    $('#LetterNo').val(response.Data2.letter_no);

                    //$('#SalesDate').val(response.Data.SalesDate);

                    $('#SalesDate').val(moment(response.Data2.sales_date).format("YYYY-MM-DD"));

                    //$('#AgreementDate').val(response.Data.AgreementDate);

                    $('#AgreementDate').val(moment(response.Data2.agreement_date).format("YYYY-MM-DD"));

                    //$('#BillEntryDate').val(response.Data.BillEntryDate);

                    $('#BillEntryDate').val(moment(response.Data2.bill_of_entry_date).format("YYYY-MM-DD"));

                    $('#LetterDate').val(moment(response.Data2.letter_date).format("YYYY-MM-DD"));;

                    $('#AgreementID').val(response.Data3.aggrement_id);

                    $('#PTANOCNo').val(response.Data3.pta_nco_no);

                    //$('#PTANOCDate').val(response.Data.PTANOCDate);

                    $('#PTANOCDate').val(moment(response.Data3.pta_nco_date).format("YYYY-MM-DD"));

                    $('#SalesCertificateNo2').val(response.Data3.sale_cer_no);

                    $('#SalesDate2').val(moment(response.Data3.sales_date).format("YYYY-MM-DD"));

                    //$('#Document').val(response.Date.)                                 ;

                    $('#OwnerTypeID').val(response.Data3.owner_type);



                    if (response.Data3.owner_type == "1") {

                        $("#AddOwners").hide();

                        $("#HideOldCnic").show();

                        $("#HideNewCnic").show();

                        $("#HideFatherDiv").show();

                        $("#OwnerTitleDiv").show();

                        $("#lblCnic").text("New CNIC No");

                    }

                    else if (response.Data3.owner_type == "2") {

                        $("#HideOldCnic").hide();

                        $("#HideNewCnic").hide();

                        $("#HideFatherDiv").hide();

                        $("#OwnerTitleDiv").hide();

                    }

                    else if (response.Data3.owner_type == "3") {

                        $("#AddOwners").show();

                        $("#HideOldCnic").show();

                        $("#HideNewCnic").show();

                        $("#HideFatherDiv").show();

                        $("#OwnerTitleDiv").show();

                        $("#lblCnic").text("New CNIC No");

                    }

                    else if (response.Data3.owner_type == "4") {

                        $("#HideNewCnic").show();

                        $("#OwnerTitleDiv").hide();

                        $("#HideOldCnic").hide();

                        $("#HideFatherDiv").hide();

                        $("#lblCnic").text("NTN No")

                    }





                    $('#OwnerTitleID').val(response.Data3.owner_title);






                    if ( Array.isArray(response.Data4)) {




                        for (var i = 0; i < response.Data4.length; i++) {





                            if (i > 0) {

                                $("#AddOwners").trigger('click');

                            }

                            console.log(response.Data4[i].name);

                            $('#owner_' + i + ' #Name').val(response.Data4[i].name);

                            $('#owner_' + i + ' #OldCNIC').val(response.Data4[i].old_cnic);

                            $('#owner_' + i + ' #NewCNIC').val(response.Data4[i].new_cnic);

                            $('#owner_' + i + ' #Guardian').val(response.Data4[i].father_or_husband_name);






                        }

                    }



                    //$('#Name').val(response.Data.OwnerName);

                    //$('#OldCNIC').val(response.Data.OldCNIC);

                    //$('#NewCNIC').val(response.Data.NewCNIC);

                    //$('#Guardian').val(response.Data.FatherHusband);

                    $('#HouseNO').val(response.Data.house_no);

                    $('#ProvinceID').val(response.Data.province_id);



                    LoadCities(response.Data.province_id);

                    $('#CityID').val(response.Data.city_id);

                    $('#Telephone').val(response.Data.telephone);

                    $('#Mobile').val(response.Data.mobile);

                    $('#Email').val(response.Data.email);





                }

                else {

                    swal("something went wrong")

                }

            }

        });



    }

</script>



//Update

<script>

    function UpdateProcurementInfo() {

        // var procurementvalitade = $('#Procurementform').valid();

        // if (procurementvalitade) {






            var ID = $('#RecordId').val();

            var _token= $("input[name='_token']").val();
        // var procurementvalitade = $('#Procurementform').valid();

        // if (procurementvalitade) {



            $("#DivisionUpdate").css("display", "None");



            var DivisionID = $('#DivisionID').val()

            var Division = $('#Division').val()

            var RegistrationMarkID = $('#RegistrationMarkID').val()

            var ProcurementSourceID = $('#ProcurementSourceID').val()

            var BankID = $('#BankID').val()

            var BranchID = $('#BranchID').val()

            var SalesCertificateNo = $('#SalesCertificateNo').val()

            var AgreementNo = $('#AgreementNo').val()

            var BillEntryNo = $('#BillEntryNo').val()

            var LetterNo = $('#LetterNo').val()

            var SalesDate = $('#SalesDate').val()

            var AgreementDate = $('#AgreementDate').val()

            var BillEntryDate = $('#BillEntryDate').val()

            var LetterDate = $('#LetterDate').val()

            var AgreementID = $('#AgreementID').val()

            var PTANOCNo = $('#PTANOCNo').val()

            var PTANOCDate = $('#PTANOCDate').val()

            var SalesCertificateNo2 = $('#SalesCertificateNo2').val()

            var SalesDate2 = $('#SalesDate2').val()

            var Document = $('#Document').val()

            var OwnerTypeID = $('#OwnerTypeID').val()

            var OwnerTitleID = $('#OwnerTitleID').val()

            var OwnerName = $('#Name').val()

            var OldCNIC = $('#OldCNIC').val()

            var NewCNIC = $('#NewCNIC').val()

            //var Guardian = $('#Guardian').val()

            var HouseNO = $('#HouseNO').val()

            var ProvinceID = $('#ProvinceID').val()

            var CityID = $('#CityID').val()

            var Telephone = $('#Telephone').val()

            var Mobile = $('#Mobile').val()

            var Email = $('#Email').val()

            var ETO_CODE =$("#ETO").val()







            var Owners = $("input[name=Name]");

            var OwnerName = "";

            if (Owners.length > 0) {

                for (var i = 0; i < Owners.length; i++) {

                    if (OwnerName == "") {

                        OwnerName = Owners[i].value;

                    } else {

                        OwnerName = OwnerName + "," + Owners[i].value;

                    }

                }

            }

            OwnerName = OwnerName;



            var CNIC = $("input[name=NewCNIC]");

            var NewCNIC = "";

            if (CNIC.length > 0) {

                for (var i = 0; i < CNIC.length; i++) {

                    if (NewCNIC == "") {

                        NewCNIC = CNIC[i].value;

                    } else {

                        NewCNIC = NewCNIC + "," + CNIC[i].value;

                    }

                }

            }

            var oldCNIC = $("input[name=OldCNIC]");

            var OldCNIC = "";

            if (oldCNIC.length > 0) {

                for (var i = 0; i < oldCNIC.length; i++) {

                    if (OldCNIC == "") {

                        OldCNIC = oldCNIC[i].value;

                    } else {

                        OldCNIC = OldCNIC + "," + oldCNIC[i].value;

                    }

                }

            }

            var Guradians = $("input[name=Guardian]");

            var Guardian = "";

            if (Guradians.length > 0) {

                for (var i = 0; i < Guradians.length; i++) {

                    if (Guardian == "") {

                        Guardian = Guradians[i].value;

                    } else {

                        Guardian = Guardian + "," + Guradians[i].value;

                    }

                }

            }



            var files = $("#Document").get(0).files;

            if (files.length > 3) {

                $("#Attachmsg").css("display", "block");

                $("#Attachmsg").html("only select 3 documents");

                return false;

            }

            if (files.length > 3) {

                $("#Attachmsg").css("display", "None");

            }

            var fileData = new FormData();



            for (var i = 0; i < files.length; i++) {

                fileData.append("upload", files[i]);

            }



            var check = true;

            if (Division == null || Division == "") {

               $('#Division').addClass('error');

               check = false;

            }

            fileData.append("_token", _token,)

            fileData.append("Record_id", ID,)

            fileData.append("JurisdictionID", DivisionID,)

            fileData.append("DistrictID", DivisionID,)

            fileData.append("RegistrationMarkID", RegistrationMarkID,)

            fileData.append("ProcurementSourceID", ProcurementSourceID,)

            fileData.append("BankID", BankID,)

            fileData.append("BranchID", BranchID)

            fileData.append("SalesCertificateNo", SalesCertificateNo)

            fileData.append("AgreementNo", AgreementNo)

            fileData.append("EntryBillNo", BillEntryNo)

            fileData.append("LetterNo", LetterNo)

            fileData.append("SalesDate1", SalesDate)

            fileData.append("AgreementDate", AgreementDate)

            fileData.append("EntryDateBill", BillEntryDate)

            fileData.append("LetterDate", LetterDate)

            fileData.append("AgreementId", AgreementID)

            fileData.append("PtaNcoNo", PTANOCNo)

            fileData.append("PtaNcoDate", PTANOCDate)

            fileData.append("SalesCertificateNo2", SalesCertificateNo2)

            fileData.append("SalesDate2", SalesDate2)

            fileData.append("ScanDocumentPath", Document)

            fileData.append("OwnerTypeID", OwnerTypeID)

            fileData.append("OwnerTitleID", OwnerTitleID)

            fileData.append("OwnerName", OwnerName)

            fileData.append("OldCNIC", OldCNIC)

            fileData.append("NewCNIC", NewCNIC)

            fileData.append("FatherHusband", Guardian)

            fileData.append("HouseNo", HouseNO)

            fileData.append("ProvinceID", ProvinceID)

            fileData.append("CityID", CityID)

            //fileData.append("IsSpecialNumber", isSpecialNo)

            fileData.append("Telephone", Telephone)

            fileData.append("Mobile", Mobile)

            fileData.append("Email", Email)

            fileData.append("ETO_CODE", ETO_CODE)







                $.ajax({

                    url: "{{url('/procurement')}}",

                    contentType: false, // Not to set any content header

                    processData: false, // Not to process data

                    type: "Post",

                    dataType: "JSON",

                    data: fileData,


                    success: function (response) {

                        if (response.Status) {

                            //var msg = "";

                            swal({

                                title: "Record Updated!.",

                                type: "success",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: "OK",

                                closeOnConfirm: true

                            },

                                function (isConfirm) {

                                    window.location.href = "/procurement";

                                    // LoadTable();

                                })

                        }

                        else {

                            swal("something went wrong")

                        }

                    }

                });






    }

</script>

<script>

    function LoadBranches(BankID) {

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadBranches",

            dataType: 'json',

            data: { bankID: BankID },

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#BranchID').empty();

                        $('#BranchID').append("<option value='0'>--Select Branches--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.branch + '</option>').appendTo('#BranchID');

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

    }



    function LoadCities(CityID) {

        $.ajax({

            type: "Get",

            url: "/DEO/LoadCity",

            async: false,

            dataType: 'json',

            data: { ProvinceID: CityID },

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#CityID').empty();

                        $('#CityID').append("<option value='0'>--Select City--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.city_code + '">' + value.cities + '</option>').appendTo('#CityID');

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

    }



function ValidateInput(id, event) {



$('#' + id).keypress(function (e) {



    var regex = new RegExp("^[^a-zA-Z ]+$");

    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

    if (!regex.test(str)) {

        return true;

    } else {

        event.preventDefault();

        //$('#' + id).val('');

        return false;

    }



});





} //edit by fadii



//edit by fadii




    function ValidateInputN(id, event) {

        $('#' + id).keypress(function (e) {



            var regex = new RegExp("[^0-9.-]"); //for interger and float

            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

            if (!regex.test(str)) {

                return true;

            } else {

                event.preventDefault();

                $('#' + id).val('');

                return false;

            }



        });





    }





    $("#ETO").change(function () {

        //s var eto_location = $('#ETOLocation').val();

        var E_code = $('#ETO').val();



        // $.ajax({

        //     type: "Get",

        //     contentType: 'application/json; charset=utf-8',

        //     url: "/DEO/LoadDivisions",

        //     dataType: 'json',

        //     data: { E_code: E_code },

        //     async: false,

        //     success: function (response) {



        //         //removeOptions(document.getElementById("slabID"));

        //         if (response.Status == true) {

        //             if (typeof response != 'undefined' && response != null && response != 0) {



        //                 $('#DivisionID').empty();

        //                 $('#DivisionID').append("<option value='0'>--Select Division--</option>");

        //                 $.each(response.Data, function (index, value) {

        //                     //$('<option value="' + value.ID + '">' + value.NAME + '</option>').appendTo('#Division');

        //                     $('<option value="' + value.id + '">' + value.jurisdiction + '</option>').appendTo('#DivisionID');

        //                 });



        //             }

        //             else {



        //             }

        //         }

        //         else {



        //         }

        //     },

        //     error: function (response) {

        //         swal(response.msg);

        //         //Swal("Something went wrong");

        //     }

        // });

    });

</script>

                        </div>

                    </div>

                </div>

            </div>



            <!-- /page content -->





@endsection
