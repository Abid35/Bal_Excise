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

    .unit_span {

        border: 1px solid !important;

        border-right: 0px !important;

        width: 46px !important;

        height: 32px !important;

        color: black !important;

        background-color: #f2ecec !important;

    }



    .input-group {

        margin-bottom: 0px !important;

    }



    .forspan {

        width: 300px !important;

        margin-left: 241px !important;

    }

    .error {

        border: 3px solid red !important;

    }

</style>



<div class="topTabsSection">

    <div class="headingDiv wdth100">

        <h2>Add New Arrival</h2>

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

        <form id="Arrivalform">

            @csrf

            <div class="row form-group">

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>ETO</label></div>

                        <div class="col-md-7"><select class="form-control" id="ETO_CODE" name="ETO_CODE"><option></option></select></div>

                    </div>

                </div>







                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>District</label></div>

                        <div class="col-md-7"><select class="form-control" id="DivisionID" name="DivisionID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Judiction</label></div>

                        <div class="col-md-7"><select class="form-control" id="Division" name="Division"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">



                        <div class="row form-group">

                            <div class="col-md-5"><label>Registration No</label></div>

                            <div class="col-md-7"><input pattern="[A-Z]{3}[0-9]{3}" placeholder="Format = (ABC123)" type="text" class="form-control" id="RegistrationMarkID" name="RegistrationMarkID" maxlength="20" onkeypress="ValidateInputNA(this.id,event)" /></div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Province</label></div>

                        <div class="col-md-7"><select class="form-control" id="ArrivalProvinceID" name="ArrivalProvinceID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>City</label></div>

                        <div class="col-md-7">

                            <select class="form-control" id="ArrivalCityID" name="ArrivalCityID"><option></option></select>



                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Serial No. Of Reg Book</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="BookSerialno" name="BookSerialno" onkeypress="ValidateInputNA(this.id,event)" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Date Of Registration</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="DateofRegistration" name="DateofRegistration" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Last Tax Paid Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="LastTaxPaiddate" name="LastTaxPaiddate" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Date Of Reporting</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="ReportingDate" name="ReportingDate" /></div>

                    </div>

                </div>

                <div class="col-md-12">

                    <h4 class="prmnt">Intimation To MRA/ETO</h4>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Letter No.</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="LetterNo" name="LetterNo" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="LetterDate" name="LetterDate" /></div>

                    </div>

                </div>

            </div>

            <h4 class="h4Vouchr">

                <svg xmlns="http://www.w3.org/2000/svg" width="54.145" height="44.151" viewBox="0 0 54.145 44.151">

                    <g id="owner" transform="translate(0 -4.768)">

                        <g id="Group_3" data-name="Group 3" transform="translate(0 4.768)">

                            <path id="Path_4" data-name="Path 4" d="M53.341,26.562c-.24-2.1-5.894,0-5.894,0l-.333,2.989c-.125-.069-.247-.135-.38-.2L45.3,23.12a5.767,5.767,0,0,0-6.029-5.042l-17.487,0s.925,1.017.966,1.017H39.84a4.185,4.185,0,0,1,4.128,3.253L45.5,28.5c-.1,0-.192-.013-.286-.013H19.671c-.1,0-.195.01-.289.013l.8-3.2-.907-.823-1.118,4.875c-.131.062-.257.127-.379.2l-.332-2.989a13.341,13.341,0,0,0-2.875-.846v3.865l2.9.156a3.794,3.794,0,0,0-1.816,3.126v5.711a3.915,3.915,0,0,0,2.251,3.384V45.8c0,1.3,1.6,2.352,3.583,2.352S25.075,47.1,25.075,45.8V42.607H39.206V45.8c0,1.3,1.6,2.352,3.582,2.352S46.37,47.1,46.37,45.8V42.236a4.072,4.072,0,0,0,2.866-3.661V32.862a3.8,3.8,0,0,0-1.814-3.124l5.923-.319A8.39,8.39,0,0,0,53.341,26.562ZM25.692,37.468H19.226V34.393h6.466Zm13.07,0H27.017V36.146H38.762Zm0-1.649H27.017V34.5H38.762Zm7.79,1.649H40.086V34.393h6.466v3.075Z" transform="translate(0.699 -4.129)" fill="#00607f" />

                            <circle id="Ellipse_1" data-name="Ellipse 1" cx="4" cy="4" r="4" transform="translate(5.746)" fill="#df6437" />

                            <path id="Path_5" data-name="Path 5" d="M15.639,18.648l6.966,6.329v0c0,.006.005.012.012.012A1.687,1.687,0,1,0,25,22.6c-.005,0-.008,0-.01-.012l-6.572-6.564a8.308,8.308,0,0,0-4.864-2.39H5.54C-.2,13.743,0,17.957,0,17.957V27.8H.007c0,.023-.005.051-.005.069a1.687,1.687,0,1,0,3.375,0c0-.021,0-.045-.005-.069h.005V18.691H4.434L4.418,46.206a2.283,2.283,0,1,0,4.565,0L8.978,28.858H10V46.227l.02.019a2.266,2.266,0,0,0,4.532-.024l-.006-27.574h1.1Z" transform="translate(0 -4.343)" fill="#df6437" />

                        </g>

                    </g>

                </svg>

                OWNER

            </h4>

            <div class="row form-group">

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Owner Type</label></div>

                        <div class="col-md-7"><select class="form-control" id="OwnerTypeID" name="OwnerTypeID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6" id="OwnerTitleDiv">

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

                                <div class="col-md-7"><input type="text" class="form-control" id="OwnerName" name="OwnerName" maxlength="50" onkeypress="ValidateInput(this.id,event)" /></div>

                            </div>

                        </div>

                        <div class="col-md-6" id="HideOldCnic">

                            <div class="row form-group">

                                <div class="col-md-5"><label>Old CNIC No</label></div>

                                <div class="col-md-6">

                                    <input type="text" data-inputmask="'mask':'99999-9999999-9'" placeholder="xxxxx-xxxxxxx-x" class="form-control oldcnic" name="oldCnic" id="oldCnicNo" />

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

                                    <input type="text" class="form-control newcnic" data-inputmask="'mask':'99999-9999999-9'" placeholder="xxxxx-xxxxxxx-x" id="newCnicNo" name="newCnic" />

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

                <div class="row form-group">

                    <div class="col-md-12">

                        <h4 class="prmnt">Permanent Address</h4>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>House No</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="HouseNo" name="HouseNo" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Province</label></div>

                        <div class="col-md-7">

                            <select class="form-control" id="ProvinceID" name="ProvinceID"><option></option></select>



                        </div>

                    </div>

                </div>



                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>City</label></div>

                        <div class="col-md-7">

                            <select class="form-control" id="CityID" name="CityID"><option value="none">--Select Province first--</option></select>



                        </div>

                    </div>

                </div>



                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Mobile No</label></div>

                        <div class="col-md-7">

                            <input type="text" class="form-control mobile" data-inputmask="'mask':'\\929999999999'" placeholder="92xxxxxxxxxx" id="Mobile" name="Mobile" />

                            <span id="Existmobile" style="color:red;display:none"></span>

                        </div>

                    </div>

                </div>



            </div>

            <h4 class="h4Vouchr">

                <svg xmlns="http://www.w3.org/2000/svg" width="40.96" height="54.832" viewBox="0 0 40.96 54.832">

                    <g id="Generalchar" transform="translate(-48.173)">

                        <g id="Group_176" data-name="Group 176" transform="translate(48.173)">

                            <path id="Path_1159" data-name="Path 1159" d="M87.333,4.444h-6.8V1.8a1.8,1.8,0,0,0-3.6,0V4.444H70.453V1.8a1.8,1.8,0,0,0-3.6,0V4.444H60.374V1.8a1.8,1.8,0,1,0-3.6,0V4.444h-6.8a1.8,1.8,0,0,0-1.8,1.8V53.032a1.8,1.8,0,0,0,1.8,1.8H87.333a1.8,1.8,0,0,0,1.8-1.8V6.244A1.8,1.8,0,0,0,87.333,4.444Zm-1.8,46.789H51.772V8.043h5v2.1a1.8,1.8,0,1,0,3.6,0v-2.1h6.479v2.1a1.8,1.8,0,1,0,3.6,0v-2.1h6.479v2.1a1.8,1.8,0,1,0,3.6,0v-2.1h5Z" transform="translate(-48.173)" fill="#6d4c41" />

                            <path id="Path_1160" data-name="Path 1160" d="M127.025,139.758H105.716a1.8,1.8,0,1,0,0,3.6h21.309a1.8,1.8,0,1,0,0-3.6Z" transform="translate(-95.89 -119.636)" fill="#df6437" />

                            <path id="Path_1161" data-name="Path 1161" d="M127.025,209.758H105.716a1.8,1.8,0,1,0,0,3.6h21.309a1.8,1.8,0,1,0,0-3.6Z" transform="translate(-95.89 -179.557)" fill="#00607f" />

                            <path id="Path_1162" data-name="Path 1162" d="M127.025,279.758H105.716a1.8,1.8,0,1,0,0,3.6h21.309a1.8,1.8,0,1,0,0-3.6Z" transform="translate(-95.89 -239.479)" fill="#00607f" />

                        </g>

                    </g>

                </svg>

                GENERAL CHARACTERISTIC

            </h4>







            <div class="row form-group p-20">



                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Category Of Vehicle</label></div>

                        <div class="col-md-7"><select class="form-control" id="CategoryID" name="CategoryID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Type Of Body</label></div>

                        <div class="col-md-7"><select class="form-control" id="BodyTypeID" name="BodyTypeID"><option value='0'>--Select BodyTypeID--</option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Maker's Name</label></div>

                        <div class="col-md-7"><select class="form-control" id="ManuFacturerID" name="ManuFacturerID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Maker's Classification</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="MakerClassification" name="MakerClassification" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Year Of Manufacture</label></div>

                        <div class="col-md-7"><select class="form-control" id="YearOfManufacture" name="YearOfManufacture"><option></option></select></div>

                    </div>

                </div>



                <div class="col-md-6">
                    <div class="row form-group">
                        <div class="col-md-5"><label>Engine Capacity</label></div>
                        <div class="input-group ">

                            <div class="input-group-addon">

                                <select class="Dropdown" id="EUnit" name="EUnit"><option></option></select>


                            </div>


                            <input class="form-control" id="CC" name="CC" maxlength="20" onkeypress="ValidateInputN(this.id,event)" /></div></div>

                        </div>
                        </div>


                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Engine No</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="EngineNo" maxlength="50" name="EngineNo" /></div>

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="row form-group">
                    <div class="col-md-5"><label>Unladen Weight</label></div>
                    <div class="input-group col-md-7">

                        <div class="input-group-addon">

                            <select class="Dropdown" id="TrailerUnitID" name="Unit"><option></option></select>

                        </div>


                        <input type="text" class="form-control" id="UnladenWeight" name="UnladenWeight" />

                    </div>
                    </div>


                </div>
                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Fuel Type</label></div>

                        <div class="col-md-7"><select type="number" class="form-control" id="FueltypeID" name="FueltypeID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Wheel Base</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="wheelbox" maxlength="40" name="wheelbox"  /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Vehicle Price</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="VehiclePrice" name="VehiclePrice" maxlength="50" onkeypress="ValidateInputN(this.id,event)" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Chassis No</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="ChassisNo" maxlength="50" name="ChassisNo" onkeypress="ValidateInputNA(this.id,event)" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Class Of Vehicle</label></div>

                        <div class="col-md-7"><select class="form-control" id="ClassID" name="ClassID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Number Of Cylinder(S)</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="NoofCylinder" name="NoofCylinder" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Seating Capacity <span style="font-size:10px">(including driver)</span></label></div>

                        <div class="col-md-7"><div class="input-group"><span class="input-group-addon">Seats</span><input type="text" class="form-control" id="SeatingCapacity" maxlength="20" name="SeatingCapacity" onkeypress="ValidateInputN(this.id,event)" /></div></div>

                    </div>

                </div>



                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Color Of Vehicle</label></div>

                        <div class="col-md-7"><select class="form-control" id="ColorID" name="ColorID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Reg Serial No</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="RegNo" name="RegNo" onkeypress="ValidateInputNA(this.id,event)" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                    <div class="col-md-5"><label>Trailer Vehicle<input type="checkbox" class="checkbox" id="IsTrailerVeh" name="IsTrailerVeh"  /></label> </div>



                    </div>

                </div>



            <div id="ShowDiv">

                <h4 class="h4Vouchr">

                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="74" height="74" viewBox="0 0 74 74">

                        <image id="additionaltralier" width="74" height="74" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAYAAAD0eNT6AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAL0AAAC9ABdzF0jwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAACAASURBVHic7N13eBzXee/x7zb03kEUEiRBgp0iJVJW7z1y7z0uuYlt2Umue9wSF0VXiVvi2JZsy7Jkx1XNVrF6syiqkaLYCYAFANHLomPb/WMImaTYgDmzs+X3eZ55ZFPimbO7M3PeOeU9ICIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIuqJy76D8XLlxf4HY9REREJE7KahruAWL5xeU98+atLnK7PiIiIuKw6cZ/+lAQICIikuKObvxRECAiIpLajtf4oyBAREQkNZ2s8UdBgIiISGo51cYfBQEiIiKpYaaNPwoCREREkttsG38UBIiIiCQnu40/CgJERESSi6nGHwUBIiIiycF044+CABERkcQ2Z96St+NA4z995JeUd2nvABERkQRUXrfgFjwe54IA9QSIiIgkJgUBIiIiaUpBgIiISJpSECAiIpKmKmrn34azEwM7ly1blhHHjyQiIiKnwukgoKSqbkMcP46IiIicKieHAzweT2zOwqWvj+sHEhERkVPjZE9AUXnV7nh+FhEREZkBp4IAf0ZmhAsu8Mf1w4iIiMipK69b8HMnhgNqGpetju8nERERkRmpqJ3/SwwHAIdSEYvIKfK6XQERST/dbS3vKq9bcCsej7EyY55owFhhImlAAYCIuKLnQPP7y2vnGw0CROTUKQAQEdcoCBBxjwIAEXFVz4Hm92dm5YTcrodIulEAICIikoYUAIiIiKQhBQAiIiJpSAGAiIhIGlIAICIikoYUAIiIiKQhBQAiIiJpSAGAiIhIGlIAICIikoYUAIiIiKQhBQAiIiJpSAGAiIhIGlIAICIikoYUAIiIiKQhBQAiIiJpSAGAiIhIGlIAICIikoYUAIiIiKQhBQAiIiJpSAGAiIhIGlIAICIikob8bldARIzJAN4AXAssAYrcrc6pm5oY17NIJM5004mkhiuB7wML3K7IbMRiUberIJJ2NAQgkvyuA/5Ikjb+poyOBOcBHrfrISIiEg9vAqJATAcxoBX4OtYQiIiISErKAzpxv9FN1GMr8FVg3uy+XhERkcT0T7jfyCbDEQYeAj4AFMzmixYREUkkT+J+45psxxjwa6yVEhkz/8pFRETcN4z7DWoyHwPArcAlaPKgpCFd9CLJKQ8rABAz9gG3A7/EmjsgkvIUAIgkp2Kg3+1KpKhtwG+Bn2OtKhBJSQoARJKTAgDnRYFnsIKB24Fed6sjYpYCAJHkpAAgviaBB7GCgd9hTSYUSWoKAESSkwIA9wwC92BNIHwEq6dAJOkoABBJTgoAEkMb8Aes+QIvulwXkRlRACCSnBQAJB5NHpSkogBAJDkpAEhcmjwoSUEBgEhyUgCQHDR5UBKWAgCR5GQkAHjou9caqIp913z+ISbGUr5tHMAKAm7HSuOsyYPiKr/bFRAR96xaWOZ2FQDweb1uVyEeioGPHDragd9jrSR4wc1KSfpKi7tORCTB1ADXAc/z122L57tZIUk/CgBEJCWUFma7XYXZWgp8BdgNPAZ8GKu3QMRRCgBEJCXc+I+X8OQP3sh1b1lJZUmO29WZDS9wPnATcBAr2dD7gKT8MJL4FACISMpomlvMlz54Oi/f+nb+eMPVvO+KxeRlB9yu1mxkAtdg5RTowJor8Ddo3pYYpItJRFKO1+Nh/bJK1i+r5Jt/dyaPvdTObx5p5r4N+wiFk27yfSHw3kPH9OTB3wJPuVkpSX4KAEQkpWVm+Lh8fT2Xr69ncGSSB549wG8f2cMTmzuIxdyu3YxNTx68jr9mHvwF0OxmpSQ5aQhARNJGUV4mb794Ib/7xhW8+LO38aUPns7C2kK3qzVb05MH92CtJvgkUO5qjSSpKAAQkbRUW57HdW9ZyTM/enOyTx4EWAt8BzjAXycP5rpaI0l4CgBEJO2l6OTBdjR5UE5AF4WIyCHHmzx4/4Z9TCX35MEOrDTEmjwor1IAICJyDCk2eXAOf508uB34DZo8mPY0BCAichIpNnlwCa+dPFjhao3EFQoARERmIEUnD3ZgbVusyYNpRAGAiMgspdDkQR9wCco8mFb044qI2JRikwcL0OTBtKAAQETEoDSYPHgb1vwBSXIKAEREHDI9efDtFy+krWeEPzzewq8e3M2etiG3qzYb05MHvwK8gLWK4FdAt5uVktnTHAARkTjQ5EFJNAoARETiLEUnD/ZgDRFo8mCSUAAgIuKS6cmD//GJs9nxy3dx25cv4dpzGsjwJ+WjORt4K3A30An8CDjH1RrJCSlKExFJACk2ebAU+OihYwfwa+B2YLeblZIjKQAQEUkwKTZ5sAlNHkxISdnPJCKSLtJg8mCeqzVKY+oBEBFHhCNRDvaN0dk3xthk+IT/bSQSsX2+bS095AdCtstJdOedNodzVlXz+Esd3PFECx29o25XaTamJw9eAvwXcAfWEMHDgP2LQU6Jx+0KiMisFAP9dgvp+dPfGqjKkXYdGOT7v93CAxv3MzA8abx8SWmdwE+A72KtKhAHKQAQSU4JFwDEYnD9bS/y3d9sJhJNvllrklD6gI9g9QyIQzQHQESM+OR3n+Q//3eTGn8xoRRrD4L3uV2RVKYAQERsu+nubfzqQa3wEqO8wI+B1W5XJFUpABARW/qHJ/n32150uxqSmjKBb7tdiVSlAEBEbPnDY80MjU65XQ1JXRcAy92uRCpSACAitvx54wG3qyCp73K3K5CKFACIiC17O4fdroKkvsVuVyAVKQAQEVsGtdZfnFfodgVSkQIAEbElCTeqkeSjnDUOUAAgIiKShhQAiIiIpCEFACIiImlIAYCIiEgaUgAgIiKShhQAiIiIpCG/2xUQEVlUnE2mz977yJ7BccbDUVtl1C9YSG5+vq0yUl1nWzsDvd1uV0MMUAAgIq676bLF1Odn2irj2jtfYUvvqK0yPnfjd1h//kW2ykhlTzz6NJ95z5vcroYYoiEAERE5qenGPzSu1M+pQgGAiIickBr/1KQAQEREjkuNf+pSACAiIsekxj+1KQAQEZHXUOOf+hQAiIjIEdT4pwcFACIi8io1/ulDAYCIiABq/NONAgAREVHjn4YUAIiIpDk1/ulJAYCISBp7/OEn+cy73+Bc4+/xOFOu2KYAQEQkTT3x6NN89n1vITRhbw+F48kuLOcdf3edI2WLfQoARETSkNPd/tmF5fzwrvtYsLjRkfLFPgUAIiJpJl6N//KVSx0pX8xQACAikkbU+Ms0BQAiImlCjb8cTgGAiEgaUOMvR1MAICKS4tT4y7EoABARSWFq/OV4FACIiKQoNf5yIgoARERSkBp/ORkFACIiKUaNv5wKBQAiIilEjb+cKgUAIiIpQo2/zIQCABGRFKDGX2ZKAYCISJJT4y+z4Xe7AiIiMnuPP/Ikn33Pmxzb0jenqIIf33M/S5Y1OVK+uEc9ACIiSaxqTiWBnDxHys4uLOd/7rxXjX+KUgAgIpLEFjct4uY/PkBOSaXRctXtn/oUAIiIJDnTQYAa//SgAEBEJAWYCgLU+KcPBQAiIinCbhCgxj+9KAAQEUkhsw0C1PinHwUAIiIpZqZBgBr/9KQAQEQkBZ1qEKDGP30pABARccAD9z1EV1ePq3VY3LSIH999HznFFcf891aSnwfU+KcpBQAiIobde/f9fOmDb+NdF1/IwY5OV+uyZGkTN//pz6/pCZhO8rN0uZL8pCsFACIiBt179/189aPvIjI1wWBHC++57BLXg4CjhwPU7S+gAEBExJg/3vEnvvqRdxKZmnj1zwY7WnjvFZfR2dntYs2sIOBHd95H5cKV3PRHdfuLAgARESPuvft+/vXv30skNPmafzfQtod3X3KR6z0BS5c3ce/GDcrtL4ACABER2w7v9j+eRBkOEJmmAEBExIZTafynKQiQRKIAQERklmbS+E8b7GjhvZdfqiBAXKcAQERkFo414e9UDbQ3J8TEwCTyeuA54IfAR4A1QMDVGqUAv9sVEBFJNiea8HeqBtr28J5LL+YXDzxI9Zwqg7VLSRnA6YeOaWFgF/DCYcfzwMwjsjSlHgARkRmYTbf/8Qy0N2s4YPb8wFLgvcB3gCeBYWArcCvwSeAcIMutCiY6BQAiIqfIavzfbaTxn6YgwCgFBTOgAEBE5BTc8+qY/7jxsgfam/nnD3/UeLkCHDsoGERzCjQHQETkZO69+37+7e/fZ2vM/0Tyymr4xve/50jZckyZaE6BAgARkRP5a7e/+Td/sBr/W+57kIYF8xwpX07ZdE/BdG8BpHhQoABAROQ41PinvZQOChQAiIgcgxp/OY6UCQoUAIiIHEWNv8xQUgYFCgBERA6jxl8MSfigQAGAiMghjz7wMH/46Q/V+ItTEiooUAAgInLIb3/4bcfKzi+v45b7H2ReQ71j55CkdKygYAp4mSODgi1AyPSJRUTEQXllNfzs3gfU+MupisveBwoAREQcpG5/McT48IECABERh6jbXxx2KsMHTwPbjveXRUTEMDX+4pJjDR/sBm4AfgZEpv9QmwGJiBimxt+sJXOLec/li1ixoJSAX83WLDQCNwEPAmXTf6geABERg9T4m9dYV8S3rzsHgKlQhK2tA2ze08vmPb1s2t3Lzv2DhMJRl2uZFC7ECgLOB4IKAEREDFHj77yMgI/TFpVx2qJXX2SZCkV4pbWfzbv7Xg0MFBQc12qsbZH/VgGAiIgBavzdkxHwsWZROWsWlb/6Z5NTEbbu/WtQsHFbF7vbhlysZUL5APCfCgBERGxS4594MjOODAoe39TBW754v8u1Shge4COaTSEiYkN+eR0/U+MvyedCBQAiIrOUV1bDT+99gAY1/pJ85mkIQERklvyxKT711qvdrkZCGx0Oul0FY+Zm5/Dh2rm8Mhxky0iQXaMjhGMxt6s1W/kKAEREZmmwr4fBvh63qyFxku/z867qOqi2/n84FqN1fPTVgOCV4SCvjASZjCbH6gMFACIiIrPg93hozMmjMSePN1bOAZIrKFAAICIiYkgyBQUKAERERByUqEGBAgAREZE4S4SgQAGAiIhIAoh3UKAAQEREJEEdKyjoC02x7pnH7JdtuwSZiWzgNGAOUOJyXSS55bhdAZF48XjcrkFi8Rv6QhQAxEcT8BXgWvTgFhGZkfKibLerkJIUADjvE8B/ou9aRGRWFtQUuF2FlKS9AJz1BeB7qPEXEZm1S8+oc7sKKUkBgHMuBv7N7UqIiCSzK9bXM7cq3+1qpCQFAM7wADei71dEZNbysgN89UNnuF2NlKUGyhlrgdVuV0JEJFll+L388NPns6Cm0O2qpCyNTTvjcrcrICKSrGrKc/nRpy9g/bJKt6uS0hQAOKPe7QqIiCQTjwdOayznTefP5/1XNZGV4XO7SilPAYAzit2ugIjM3A3/cBZrFpe5XY20U5yfSVVJDhkBNfrxpABAROSQ+TUFrFqoAEDSgyYBioiIpCEFACIiImlIAYCIiEgaUgAgIiKShhQAiIiIpCEFACIiImlIywAT1Opl1cyrUzoBObZQKMKfHt7pdjVE0spQOMS9PV1uV4PxaMRIOQoAEtQH37aWD7xtjdvVkAQ1GJxg7vob3K6GSFo5MDHOJ7ZvdrsaxmgIQEREJA0pABAREUlDCgBERETSkAIAERGRNKQAQEREJA0pABAREUlDCgBERETSkPIAiIgc8nff3khmZqbb1eAjr1/Gx6+ud7saKSUr4HO7CglHAYCIyCF9vf1uVwGAA90Nblch5VSW5LhdhYSjIQAREUl59VV5VBRnu12NhKIAQEREUp7X4+Gq1811uxoJRQGAiIikhX96x2qyMjQXYJoCABERSQvVpTnc8A9nuV2NhKEAQERE0sY7L23ki+9fi9fjcbsqrlMAICIiaeVTb1vF//7rZSyuL3K7Kq460TLAAFALzAE0dXJmKu0WsLO5h8eeaTFRF0lBI2NTbldB5DUi0RhDI5MMj4UIhaOMToSIxcDjgcyAj+xMP9mZforyM8nwu/v+eeGaGh7/7zfy9MsHefiFNlo7goxNhF2t06kKRaL8ZUun7XKOFQCcBnwGuBIotH0GmZUf3PosP7j1WberISJyhHAkSnN7kO17B9ja2see9iBdfWO09YzQMzhBOBI9aRkeD5QXZVNdmkt1aQ4NcwpYMreYpQ3FNNUXkxmniXo+r4fzVs/hvNVz4nI+UwZHJml8++22y/Ef9b9vBD6BhgZERASYmIqwcVsXT718kKdePsjmPX1MhSK2yozFoHtgnO6BcTbvOfLf+X1eGusKOWdlNeeumsPrlldSlOd+dsZUNB0AeIHfAG90sS4iIpIA+oMT/Okv+7jn6b08vaXTdoM/E+FIlO17B9i+d4Cb7t6Gz+thdWMZ15w9j2vPmUd9ZX7c6pLqpgOAL6HGX0QkbU1ORbjjyRZ+90gzT2/pPKWu/HiIRGO8sLOHF3b28LWfPsfqxjLefMEC3n7xQorz1TNghx+owRrzFxGRNNPaEeS2B3Zx25930R+ccLs6J7Vpdy+bdvfyb7c8zxXr63nflYs5P8nG8BOFH/gQoF0SRETSyJbmPm781Sbu27CPWMzt2szcVCjC3U+1cvdTrZzRVMH/fddqLlpb63a1koofuMrtSoiISHxs3tPLjb/cxAMb9ydlw38sz+3o5u1f/jNrF5fzz+9czaVn1LldpaTgBxa6XQkREXFWV/8YN9z+Erc9sItoqrT8R3lhZw/v+uqDnL2imm/+3XqWNpS4XaWE5gf0DYmIAO+8chXz5hS7XQ0uWFVmrKypcJSb7t7Kjb/cxMh4yFi5iezpLQe5+JN388Grm/jMu0/TMsLj8ANKiCwiArz5nOqUmlC2fe8AH/vPJ9jS3Od2VeIuHIly093buOOJFv7j42drK+BjUMIfEZEUE45E+d7vXuaST96Vlo3/4XoHJ3j/1x/mQ996lMGRSberk1BOtBeAiIgkmbaeET70zUd5cVeP21VJKHc/1cpLu3q46XMXsnZxudvVSQjqARARSRF/2dLJZZ+6R43/cRzoHuHaz97Lj+/a6nZVEoICABGRJBeLwX/9fgtv+sJ99AyOu12dhDYVivDFHz/LP37vqbimOE5ECgBERJJYJBrj0//9F7720+eIRFNzeZ8TbntgF2/90gMER9N3a20FACIiSWoqFOEj//4oP79vh9tVSUp/2dLJNZ/+Ewf7xtyuiiuMTAKcm28/kogB+4atfyYiXyCAz+fH6/NDLEY4HCIaDhONJmYXUkEGlBpa+to3CcEEDZK9Xh9evx+/PwAeD9FImEgkTCSUmOudPVj3i921t1Gs+0XSV3B0ivf860M880qn21U5Jn8gA58/gMfrJRaLEQlNEYmEiUUTY5Ohadv3DXDtZ//E775+BXOr0munQSMBwBfXQK7Nkm7fDXtdfqBl5uSRX1xGdl4BWbkF1j9z8vEFAsf9O7FYjNDkOOMjw0yMDjE+MszY8CDD/T1EI+E41v5IUxH4QBMsLLBXzp4h+NZLZuo0W16fn/yScnLyiw77bfIJZGbj8Ry/KY2EQkyMDTM+EmRiNMj4SJDh/h4mx0fjWPsjxYClxfDuRnvljIbho48bqZIkobGJMO/62oM8u7XL1XrkFBSRV1T66vMyO6+AzOxc60XpOKLRCFMT40yMWPfk+EiQseEBRgZ6ibmUoXDvwWHe+IX7uOffr6amPNeVOrghIZYB3tEK9+6P/3n9gQyKKmooLKuisKySzJy8GZfh8XjIyMohIyuHwrLKV/88Fo0yMtjLUG8Xgz0HGR7oIZ6JtycicMNL8C9roX7mHwuw3jBv2GSVFVceDwXF5RSWV1NYVkVeUSke78z7mHyBALmFJeQWHpnscmJshGBvJ0O9nQx2dxAOxbd74979kBuAN8yL62klRUyFIrz/6w+70vhnZOdQXFFLYVklBWWVBDKyZlyG1+sjKyePrJw8iir+mnQpEg4z3N/96n05NjxosuondaBrhDd/8X7uueEqyouy43put7geAPy5DX7XEr/zebxeisrnUF7bQHFVLV6vz7Hz5JdUkF9SQe2iFUyOj9Lb1kpPWwvjI0FHznm00bD19v7ltVA9w/0eO0bh+k1WGfGSnVdAee18ymobyMx2LgrPyskjq34hFfULiUYjDHS20dPWwmB3R9zeQH7bbPWaXarNy2QGwpEoH77+UR57qT1u5/T5/ZRU11NeO5/C0ko4Qa+b3fMUVcyhqGIOc5euYTQ4QM+BFnrb9xKajM/Khub2Id78xfu56/qrKM5P/fTBrgYAT3fCrbvicy5/IIOqhsVUzVtMIHPmUatdmdm51DQup6ZxOcP93bTv3spAt/M3cXAKbtwMXzsd8o4/knGEkZD1d+I17l9cWUPNwmXkl1TE54SH8Xp9lM6ZS+mcuYQmJzjYuoPOvTvjMofg57usnoCzKk/+34oAfPnmjdy3IT7dpZnZucxZuIyKuvkn7NJ3Sm5BMbnL1jJ36Rr6Ow/QvvsVRof6HT/v9r0DfPj6R/n1v16G35fa8+RdCwD2DcPN253vFQ9kZFE5bxHV85vwBzKcPdkpyi+poGl9BWPBATqat9Pb3urom2fnGHz7Zfj8aeA/yfUcicH3tkCX0wG3x0NxxRxqF60kr6jU4ZOdmkBmFvVNq6lZuIzu/c10NG9lasK5LyIWgx9vs3pnGtJr7pHMwq8e3M1Nd29z/DxZOXlUNTRROa/RsR7SmfB4PJRW11NaXc9wfzcHdr7MUK+zEx+f2NTBv/z4Wa7/+9c5eh63uRIAjISsBmnKwcmgHo+HqoYm6havxOc/xVffOMspKGbhaWdR1bCYlpefdTS63TFo9bb8bdOJ/7uf74StA45VA4C8olLmr1z/mrH5ROHzB6ie30RF/QIO7NxMZ+tOxwK0UNQKuL6+zv5EWkldf9nSyT//19OOnsPnD1C3eBVVDYtPOLnWTfklFSx93SX0H9xP69bnmRp3bvneT/64ncX1xXzw6pM8NJNY3B85sRj8YCv0TDh3jryiUhpWrEuYN8uTySsqZeW5V9LT3srerS8QnnJmw4qH26GpCM6qOva/39Bl/TdO8QcyqF20MqEfMIfz+QPMW3Y65XULaN2ykeF+Z9Krdo/D97fAZ1aDN/G/FomzvqEJPvLvjxIKO/fGVFxZw/wV68nInuFkIZeUVNdTVDGH9j3b6Niz1bHl2F/40QZWLixN2b0D4j7A8YdW2OzQ5lQer5d5y9ay4twrk6bxf5XHQ3ntfFadfw2FZcdpoQ342U6rwTla1zjc7GAukcLyalZfeC3V85uSovE/XG5BMcvPvpy5S9fOajXCqdjSD3fudaRoSWKxGHzi20/SPeDMUJQ/I5OmdRfQtO7CpGn8p3l9fuoWr2T5uVeQnWdzvfNxhCNRPvYfTzA24d6SbifFNQBoDjr3kMvMyWP52ZdTPX+JMyeIk4ysbJaceTF1i1c50lCOheG/XrHG+qdFYtafjTtwjXs8HuqaVrF0/UWuTL40ac6CJSw76zLHVijc2Qot8VkgIkniJ3/cxoPPHXCk7PyScladdzXFlcm9FCW3oJgV515JWU2DI+U3tw/xhR9tcKRst8UtAAhH4abt4ESq6uLKGlaed1XyvfUfh8fjoXbRCpaceQn+DPNLUZqDR+Zd+NM+ZxqeQEYWS193KbWNKxxbOhRv+cVlrDz/aooraoyXHYlZ90gkUdNhSlztbhviaz99zpGyp4PZZHvrPx6fP0DjmrOZv/JMR3rpbv/zrritvoinuAUAd+2FAyPmyy2vnc/iMy5ImBn+JhWWVbL87MsdeeP8fYu11r9zzErEZFpmdi7Lzr6MgtL4L+1zmj+QweJ1F1BRv9B42ftH4J69xouVJPS5/3mGiSnzY9tzl66xhrNSJCg/XOXchSxZf5EjE78//8NnGB1PzBTjsxWXAKBtFO7eZ77cmoXLWHjaWSl5IU/Lzitg+TmXk51faLTcUNSaD3DzDvOrMXLyi6w6OzQulwg8Hg8LVp3JnAVLjZd9515ody9bsSSA3z/WzBObOoyW6fF6aVxztiPXbCIpLKtiyZkXG+89be8Z5cZfbTJaptviEgD8bIc1BGBSfdNq6pecZrbQBJWRlcPysy8np6DYaLnbBmC74SV/uQXFLDv7MjKyUqNr8WTmLl1DXdMqo2VOB2eSnoKjU3z55o1Gy/R4vSw+/TzHxskTTX5xGcvPusx4EPCju7ayfZ/D66TjyPEA4KVeaw26SdXzl1DTuNxsoQnOH8hgyfqLZrVfQbxk5eaz5MyLUnI45kRqG1dQ3WB2rfD2AedWy0hi+85vNhuf9b9g1ZlJP9lvprLzC1my/iKjWQxD4ShfMRycucnRACCG+Tz/ZTXzmLd0jdlCk0RGVjZLz7w4IWfTBzKyWLL+QgKZ6bGJxtHmLT+d8rr5Rsv83z1x3T9KEkD3wDg337PdaJlzl66lvNbstZks8opKaVp3gdGMho++2M7TWw4aK89NjgYAz3SZ3eK3oLSShavPSpkZ5bORlZtP07oLEyJF5zSv18eSMy8iKzd1x/xPxYKVZ1JgcD+D/SOwodtYn5Y7JwAAIABJREFUcZIEvvObzYxPmluPW93QxJwFyb002q7CsioaVqwzWua3fvGi0fLcYqRvpGccRo8qKYY109yUQGYWjWvOcSwRy6mIRsJEo9ZkBp8/4Nrkw7yiUuYuXUPrK84sEZqpecvWuprWNxaLEQlbs3O9Xq8rG5fAoUlWa8/h5cfvJTRlJtXl71pgfgEcfaWNGWoj9nXaj9CjBropDo7Yz345GbE/0airf8zIdzIbA8OT3Hq/uckf088JN0XCoVfTaLs5NFhRv4Bgfxc9B8w0Ss9u7eIPj7e4liEwOGpmpzYPVlud2Dwelqy/iKLy6ricLhIOEezrJtjXxdjwIOMjQSbHR1/TH+v1+cnOKyA7r4C8olIKyqrIzS+KWw/FzuefoP+gu2tTS6vrWXT6efE5WSzGaHCAYF8XwwO9TIwOMz4SJBo5sjX0eDxkZueSlVdATn4RBaWVFJRWxG1PiMHuDrZvfFT99+IafyCDleddFbc5Q6HJcYZ6uxju72Z8ZIjxkeAxN9LyBzIOPTMLySsup7Cskqzc+OyEFY2EefnJ+xgfHorL+ZJBUgQANQuXOT7j39S+8IHMbMpq5lFeN59cw7P2jxYOTfHy43+yghMXZObkseq8q/EFnG1YrX3Bmw/tCz67N2uP10tReTXltfMprqp1fAhl37YX6Wh2fuc2kWNZdPp5lFbXO3qOcGiK3va99La1MDzQO+tysvMKKKttoLx2vmNZNqeNDQ+y5Yn7HNs7INkkfACQlZvPqguuceyBHQmH6d6/h47mbUxNmN1ZKr+knJqFyxydfdvfeYCdzz3uWPkn0rTuQoorzWfEmzbc3037nq0MdJndoSiQmUXl3EXMmb/EseAlGomw+bF7mBhzIPuVyAmUVNWy+IwLHCs/NDlB595dHGzdTiRkMDHOoS3C6xavcnRI8cDOzbTt2uJY+cnEB3zV7UqcyMLTzibHcBKcaQNdbWx/9hH6Du57dQzZpKnxMXrb9zLc301ecRkBB9L6ZucVMjrUz8RofJPIl1TVUbtohSNlT4wOs/ulp9m/YxMTo+bHY6ORMMG+LroPtBDIzHKkp8bj9ZKdV0BvuwNpFkWOw+vz0bTuQkfG22PRKJ2tO9n5/GMM9RwkFjW/O+HE6DBd+3YzOTZCQWmFI/N58kvK6evYTzjkzK6rySShA4DS6npHGpnQ5Dg7n3+C9t2vONLwH21ybITuA3vw+QLkF5cZLz+/pJyufXuIxZzbLvRwXp+fpnXOpF8+2LKdXc8/wfiI8wFNNBKmv/MAI4O9FJVX4/Obfdhk5eYzFuyPy2cRAahbvIriKvM9jqPBAbY98zC97a2ONPxHGwsO0NPWQnZeofGMoh6Pl+y8fHrbFJwnbADg8XodaWSGervYtuEhxoKGsxOdRCwWY7Cng7FgP8UVNXh95oY0/IEMopEww/3xWTNWs3AZJYbHF8OhKXa98CSdrTtnPf9itiZGh+ltbyWvqIzMHLNjkHlFpXTt3WW0TJFjycjOYdHac42vTurat4ddzz9BaNKZLYmPJxoJ09u+l2gkTGFZldHPlZWbz8hAT9oP0SVsAFBe20BF3QKjZfYf3M+u55+Iy1v/8YyPBBnoaqekqtborPTcgmK69u1yPDr3+vw0rj0Hn8nsWpPjbH/mYYJxCmCOJRIO09veSlZuPjkFRcbK9WdkMj4yzNhwfANOST/1TavJLzG7LK19z1b2bn0+7kH54YYHehgLDlBSVWd0GXhmdh49B5qNlZeM3FtUfyIej/ENK7r27WHnC08mxOzPseFBXnn6z0YnHfozMh3Zne5oVfMaCWSYy0Q4NT7GlqceYDTofn7tWDTK7peepnv/HqPl1i5antbJq8R5gcwsKurNvjC1btnI/u0vGS1ztvo729ix8RGiEXPP74LSCqOJu5KRFzCXdsqQ0up6cvLNvYX1dx6gdcuzCbUue3JshG0bHiYcMpPQAWDOgqWOLm/zen1UzzcXmIWnJtm24WEmE6kbLhaj5eVn6TOYXyE7r5CSqjpj5YkcrXr+EqMT5vbv2ERngg1dDfV2seuFJ4z2RtQsSq89ZY4S9gJdbtfiaJVzFxkra2Swj90vPOVqF9bxjA8PsfO5x43VLSMrx9FleSXVdWRkmcn1H4vF2Pn844yPJF5Sjlgsxp4Xn2Z0qN9YmVVzG42VJXI4j9dLpcHev54DzbTvfsVYeSYNdLWzb9sLxsorKp8Tt0RECeigF0ioBZGZ2bkUlprplomEQuxOkG7/4wn2ddG262Vj5ZnekOZwJrcSPbBzM8G+xE10H41G2PXCk8bWOReWVaXNFskSX8UVc4xtezs2PEjLlsRIMX48B1t20N95wFh56bJF8jFs8QJ3ul2Lw5XVNhgbL23d+lxSzPJs2/2KrUxahysqn2N0jH5aIDOLooo5Rsoa7u+hfc9WI2U5aWJ0mL3bnjdTmMdjXdsihpUZ2ulvuufr6NTaiah50zPG9tsoT9/78k4vcCvQ5nZNppnatnK4v9vYxg+Oi8VoeXmDkaEAj9dLac1cA5U6UlnNPCPLcGKxGK1bNibUfIwT6d7fTLDPzChZGj9oxCH+QIaxYb/O1p0JMRn3VIRDU+zfZmaCYlZuPvnF7mzq46L9wC+8wDjwD0B8ssicQFZOnrGkD60J3o11tLHgIN37zSxJKa4wPw/AVJnd+3YnzUNm2r5tZrb+zMkvcjzXuaSXwvJqIxN/w6EpDuzcbKBG8dN9oJmRwT4jZTk5dyoBRbHa/InpZYD3AJ/C5SCgoKzKSDkDXW1J18gAdOx5xUgvQH5JhdH1sl6vz8j64lg0SnsSbpAzMtjHYHeHkbJMXeMiAIWllUbKOdiyw9X8KLNlarJiQZmZ7zEJRIDrgD/BkXkAvg/8DbDPhUoB1kQpE9r3JF8jAzAxNkJfx17b5fj8fvKKSu1X6JC84lIjS4x6O/Ym1pK/GWjfY+ZBU5g+DxqJAxMBZTQSobN1h4HaxF9/5wEjK4nyisritl24i1qBa4D/nv6Do5/q9wKLgXcCrweWAaeSvN4P2F5LUWAgmp0YDTqaEtfj8Ti6pLB7f7ORWamFZVUM9/cYqBEUlJoJzJzOuuXkbxPs62ZidNj2kiFTQS4wjJkcHrZ3QsoLeJIiz1E4CuNh29dHBDCxuUMWYGtNbUZWtpEh0/7OA0bzkRzN8WfmgRbm2twu3uPxUFBSwUC37Z1HpwB39mc/tl7gFeAu4H+BI3ZAOtZr3SRwy6HjVL0em6sJApnZRtaYdxue+OfzeXnjVat5/RWrOX3VXMpL85maCrO/vZ+Hn9zBbb97lu27Dxo731BfF1MTY7aXjJncTjPPQFmT46MMGV72t6Sxmve8dT0Xn9NEfU0JGRl+evqGeW7TPu687yXuun8zkYi5Ua2ethbqFq+yVUZGVg6BjCwTM5jfA9xttxAMbAf+22tyyM9I/Ajg+a4In3rMdj77TcDpBqrzb8C/2CnA1D3e02b2mZmTncF733omV12ygqWLqiktzmVkdJLdLV38+bFt3PLrZ+jqMbdBVm9bK3ObVttePZZTWGwiAHgIuNpuIfFiKnWU7fVhpib/DRrcO37l0hp+eMN7aGo88q0tKyvAogWVLFpQyUffey6/+O0GPv/NO5icNPBCFosx0NVOpc3EMdm55nbQyjLw2wx2tRub+Z+Z6ef6L76J9771TLzeI2/6yvICrrl0BddcuoJ//vuD/J9P386W7WauiYGudtsBAFjfZ6jfdgBgfss3iSfbu2llGbjHo5EwQ72dtsuZds2lK7jxq2+louzInrK83ExOW1HPaSvq+cSHL+L679/Pf//0MSM9A1MTY4wM9dse9jTUBiVVyk9TM8USIgAIT00yamjTlQvOXsy9v7zuNY3/0Xw+Lx94x1nc/fOPkZtjJhmHiRsyKzffyLI9j8dDVk6e7XJMPWRyczK559aP8/63v+41jf/RljRWc9+vruP8s8xklhwNDhjpKjX0oEmracspyHYAYOI6Gu7vMbaB2P9533n8/PsffE3jf7Sc7Az+9TPX8r1vvMPYDn8mlupm5xUaqIkCgFkxdTGbeMtcMK+cW777AXKyT30r4jNOm8cPrn+n7XMDRsbuPV4vmQYa7sycfCMrCoYHzMxH+OH/ezenrz71PAc52Rnc8t0PMH/uqUxlOYlYzMhvowBASJAAIGhontDlFy7j659/w4wa9He/eR2f+ujFRs5vYidRQ72mRYC57leHmQoAqu0WYCJNqqm88t/4/BsoyJ95Nr2/uXwVl56/xPb5pybGjCzJycy2/52aKCMSCjE1YX8v8SsvWs7Vl6yY8d8rLMjm3z73etvnB2s7Z7sM5QLQEEBysz0bNMPAdWTimZkR8PGtL77xpD1yx/LZT1zBvDr7K5bGh+3fl75AAF/AyEqApFnrayoAsP16ZWIJxvio/Ytg8cIqLrtg9jveXfdhMxGtiYbGxHeaKL8LwMc/dOGs/+6VFy2ncb79PSZMPDC9fiNTb9IudVkK8WJzBQBYy33tmjDwnHnjVafNuhHPCPj4yHvOtV2HybFhI0MZPp+RAMB+12ucmAoAbF+JJhqa0KT93NBXXrTM1t8/c20DJUX2I3MTnyVRAoDQpP23/9LiXNadNs9WGVdeZH/rz0T5XYCUX7ScwnIA24PfRu5NA/n0r7zY3n11hc1nLlgpxsOhyZP/hydh6N5Mml2/EigAsB/NRsL2Z+GfbNLfyfh8XhY22H/TNDEE4DUSACTG79I4vxKfz97lave3BTO/iwKAtGf7DcHj8RhJAWziem5aaO++mldXSmZmYjxnTDzvMPD7xoupAMD2lWgi05yJXayKC+0Hb6XF9n//aMT+FsY+n/0HhNdAGSY+S+L8LgYeMgaudRQAJDPb3f8mnpeQGPemx+Mx0msaMXBvGvpe1QMwUyYerCZ+vP7BMdtl9A7YT3drouGNGLi5TTwgTHyW/kH7ybV6++2XYaRHxMx2q6ZyeEj82b6pTG3Zmwj3ZiwWM3J/mwisDX2vib+f8iGmAgD7+TWNdK3avwB27rG3Xj0SidLcan9pjYlu4qiB7zRRutX2tHbbzupn97cF8BqYJGRo0xVzuz1JvNkeeI/FYmZ6CQ08Z3Y221uD37q/z0gStUQZrsTA7xsvph4itrfeM/HFBzLtpxK+92F7m74880KLkWg2kDnzZYhHCxsJAOyXYeJ36RsY5dkXW22VYfe3Bcgw8LtEQkYCADMZr8QNRhqISMTAvZlh/3q+9yF799X9j9i/Lz0eD/6A/URshoJz+7Oe48RUAGB7U2YTX3y2zY1aAHY1d3H/I1tn/fe/86OHbdcBzCT5MNHQmPldzOTF+P5PHp313/3jg1vY02o/WUiWgWxhhh4yybfftUwzEwAYuL9NpPm+876XaN3fO6u/OzkZ5oe3PmG7DqYSlhm6N9OuB6DfbgFTE/bH3rPzjaRy5EvX38VQcOZB3F33b+KRp+xvq5mRlWOka25q3H5PxOS4/d/FFwgY2ejpgUe3cs+fX57x3xsMjvGVG0zsm2MmMDPxu2DgnhPXhLB2c7TFyDPTQEA7FYrwua//gWh05iPB13//fto67Mey2fkGUsmHpkwFAElzbyZMD4CJxDf5xeW2d4QCaN7Xwwc+eQtj46ee9/3ZF1v52Od+ZfvcAAWl9pcRRqMRJk0EAIYSbOSX2P9MAP/w2V+y8aVTHwoYHZvkA5+4ZdZvKEfweMgvsZ9/x1BipKR5yMgxddgtwMQzs8DA9Qzw4OPb+cI375hREHDb7zbwvZsfMXL+AgPPFxPf5yHmtod1mKkAwPasNxNfvj8jk9z8ItvlADz+l11c8Y7vsnXnie/TSCTKzbc/xRve/4MZBQwnUlBaabuMidFhIzttxWIxJsbsr2ooLLP/mcBq0F//vh/wk18+fdJJga/s6OCKd3yPJzbsNnLu3IJi/IFT3x/ieAw9aBQAJLeECADyS8qN5BMA+PEvnuS9H/spnd0nzpY5OjbJF791J9d98ddGnlEAhWX2c3xMmAnMB0iiOQCmlhLZfsKair6Kq2oZDZoZHn1lRwfnv+FGXn/Fat5wxSrOOG0eFWUFTE2F2Xugj4ef3MFtv3/WyOzyV3k8FFfa3+fFYDTLxEjQdtd3UUWN1Ttj4IafnArz6a/9jptvf4r3vmU9F53TxLy6UgIBHz19wzz30l7uuG8Tdz+weVbdksdTXGkm/b6h36bZRCHiGtt7VJtosLw+P4VlVQx0m9ky+75HXuGxZ3bx7jet4+pLV7Bs8RzKSvIIDk+wp7WbBx7dyi2/eYaeXtsjIK/KyMoht6DYdjmG7ktz+9HHgakAYJvdAkKT40xNjNseKy6vnU/bri12q/OqaDTGHfe+xB33vgRYs01NRa3HUlhWZWRjpNEhcy+II0P9FFfZa/wys3MpLK00uvf4zj2d/Mv1dwF3Ac7/NuW1DbbLmBwfJTxlP2UpYH+yiSFv/eOYiZE3x4XN7Hpryl67BZi6x8tqG4wFAADj41PcfPtT3Hz7U0Cc7ksDF+DooJHvc5+JQuLFZA9A2G55wb5OymrsPWSzcvMpKKkwsj3ksTh5IQNU1C0wUk7QYEMb7OsEVtoup7xugdEA4GhO/jYFpZVkGVhlYvDzJ0wAMBJy9p5IUbbXvk1NjDNuoHeupKoOf0amqcD0NRx9Zno8lBt4ZsaiUVNtxsxnKbvI1ByAKQx0SQ712ksoMW3OQvubS7ghKyeP0jmnvtf98UTCIUYM9gAMD/QayZBVNmcumTlJs1HWEWoMXVOGArMRkqyrUV7D/uJ3zFxPXp+P6oYmA7WJv5KqOiMrc4YHzTzjAHPdz3FgMpuY7Qva1NtRcWUNuYUlRsqKp5rG5XgMdGUF+7qNzNyfFotGGe63n93Q4/Uaa0jjKa+olKKKOUbKMhTk7sBA9k1x1S7A9iu3qWdmVcNifIHk216ittH+Dp9gtMfUSGAXLyYDgKftFjA5NmJkv3WAhuVnGCknXnILS4x0ZQEMdJl/OTQ1RlhRvzC5gjOPh3nLTzdS1OhQv5G128BfTBQirgoBs884dshQbyfRqP2UwP5ABnWLV9kuJ55MPksMPTPHgZ0mCooXkwHAYyYK6Wmzl+51Wn5JORX1ZhpUp3k8HuavXG/k7T8WjdJ30Pw8lN72vUZ6FTweDw0rzjAyaSceKusWWPklDDB1bQOPmypIXGX7dwyHpowF/FXzFidNcO7PyGTuktOMlDUxGmRk0HYqG7ACczNrwePEZACwGQMJgXoOtBibNDJv2RlGxoecVrtoBXlFpUbK6u9qc2QyT2hygsEeM/kt8ovLqV1opuvOSVm5+cxdttZIWbFYjN72vUaKAp4yUZC4zkgg19vWYqIYPB4Pi9aeayQLqdMWrDoTf4b93P8A3QfMfH8kYWBuMgCIYuDBNDUxRrDPzGRAn99P45pzjCW6cEJhWRU1jSuMlWfqYXAsPQbLrl280lhyICd4fT4WnX6esYfhUM9BQpNG8oNsBZxZ4iLx9jgGtgYe6O4gNGUm/XxWbj4NK9YZKcspcxYsoaSqzlh5hgJzMNQLHk+mtxQ1shNO195dJooBrLH1Raefa6R73bSc/CIWnX6esbpNjo8y0G07wdhxDXS2MTVhJsmVx+Nh8ekXGEngYZrH46HxtLON1q3T3DU9+x2Rji2xVscnPpPf1yCwyW4hsWiU7n17DFTHUl7bQO0i+8t+nVBcVUv9kjXGyhvoamPSQKZTYBTYaKKgeDIdAPwOAxFtX+cBxobN7XZaXFnL/JXrE2rcOSs3nyVnXmQktey0jj1bjc7+P1o0GqGj2XbOp1f5AgGa1l9IVgItDfR4PMxfdSYl1fXGyhwNDjDQ1WaquD+YKugQ9SbMjOlEFneYKKSjZbupvewBqFu8kqqGxcbKM6GwrIpFa82+zLXvsT0Pc9qfMLCqI95MBwAHMTE+GYvRscdcQwPWjNHFp5+XEMMBOQVFLDvrUiMZ/6ZNTYzTvd/57LBd+3Yb624EK43n8nMuT4jJR16vj8Y15xhLxjStfbexlUGdwJOmCjskqWYtJwDT39fvTRQSnpqke7+5XgCwVlLVG5poZ1dJVR1N6y40+vwe6jloZHnzIUZ+x3gzHQAA/NpEIb3trUY2oTlcSVUdS8682MjWtLNVWl3P8rMvN9r4A3Q0bzOyHOhkopEwB1vMJqELZGaz7HWXGh3Xm6mMrByWvu5iI4mYDjc+MkTfwf2mijPSw3YUM/skp497DJe3A0Nrx514BtQsXMaC1a/D63Pvxammcbn18ma4Dm3mAvNx4F5ThcWTE7/qPuAfMRBcTI2PUlYzz3aFDpeZk0t57XzGhgeZGDW3IcXJeH1+5i1by9xla433QkyMBmnetMHxNMXTRof6Ka+ZZ3T4wuvzUXaozGB/V9w+C1iJo5aceZGRvdGPtuelv5i8zv4vYCyaOGQH8FHAvag4eTwLfNmBcsuAC+0WEgmH8Pp8RnYTPVxuYQkllXUM93cb7f07mUBmNotPP4/KuY3Gh2/7Ow/QYa77/x7gNlOFxZMTAcAYsA5YZLeg8ZEgecWlZOeaXcrn8/spr20gr6iE4f4eIuGQ0fKPVlxZw5J1FxrLJne03S8+ZWqP+VMSi0WZGB8xHpwB5BeXUVbTwOTYsOMBWkZWNg0r1jF3yRp8PlPbYvxV38H9Jrv/92EFAKYjowmsrYX/xnC5qWYSeBvOpGBuAa7DwEvTyEAv5TUNRoNzgEBmFpX1C/FnZDI80OPoXCM8Hspr59O07gJyHJgkHI2E2bHxMZPP/X8CzI6/xIlT/To9wPtMFDQy0Evl3EY8XvOjFdl5BVTObSSQkcXY8KDxQCC/pJz5K9ZRt3iV8RtyWl/HPpMTWU7ZxEiQvKISR/Is+AMZlNU0UFReRWhqwnggEMjMonbRChrXnG0s/8LRIuEwO5571OQ19U0MZNs8jheBAuB1DpWf7MLAh4D7HCo/CKwBbCfkj8ViTIwN295U7Vg8Hg/5xWVUzF2I1+dnNNhvNhDweCidM5fFp59L5dxGvA4E5QAHdm42ufthC/ApkjQ1t1MBQCvwJsB2X1Q4NEUsFqOovNp+rY7B4/WSX1xGVcMicgtLiEYiTI6PzHrf+oysbCrnNjJ/5ZnUNC53NBFReGqSnc897ngPxvEM9/dQXrfAsfHBzOxcymoaKK2uw+f3Mzk+OuuZzh6vl+LKGuqbVjN/5ToKSysdCSqn7d/2IkOGEidhLTF6L9bbulP+jBW4nw84E60mpzbgrcCdDp9nEHiPiYImRofJyS8kJ7/IRHGv4fP5KSyrpHLuIrJy8giHppgan32K6+z8QubMX8LC1WdRUb+QQEaWwdoeaXSon+bNG2b9fD+GGzA/MTdunFwX97fAT4yU5PE42oV+tEg4zHB/N8G+LkaDA0yMDjM5NvKacWmfP0BWbj7ZeQXkFZVRWFZFToEzN92x7Nj4qCN5/2eitLqeRaefF7fzjQUHGOrtYmSwl/GRIBOjw68JgDweD5k5eWTnFpBTUERBaSUFpRWOvVEcrb/zADufM5oU7AfAx0wWeAKVwMeB1wNLMLdleDKZAJ7DmnR5E9YkL6d5ge0YGDoFa4ntyvOujtsS29DUBMHeLoL93YwPDzE+Ejzmvhf+jEyy8wrIziskv7icwrLKuO0QGgmHePmJe032KI4D80jipbROBgBZwF4M9AIABDKyWHn+VcZnz89ENBJ5dZat3x9wNa9AR/M29m170bXzH65h+RnurhmOxQgfCgK8Xp+rM5Ynx0Z4+Yl7CYeMpQSPYTXEbizX82Ldv+k0QTAI9Lp07vcDt5gqLK+olGVnX+bq0udIOEwsFsWDx/XdBne98CR9HUb3SfkuVvd/0nK6BfsU8G1ThRWUVrD0zEsc7bpNBsP93Wx95iFnJ+LMgNfrY9nZlzk2np4sotEIW5/+s6mNRab9FmvymaQ+P9aqDGOJKKrmLbY230pznXt30brFaKK+CazfybnUq3HgdGj4IvBOwEiWl8nxUSbGhimtqkuorH7xND48xLYNDxONmMv6ZVcsFqO/8wAlVXUEDG3QkWxisRh7XnzK2P7sh4SxGn+33kglvqJYq6iuNVXgyGAfPr+f/BIzO1omo4GuNpo3Gd9B+3+A35guNN6cDgAiWBOL3mKqwOnZ+vGaD5BIpsbH2PrMg4Qm47cW91RFIxEGutspnTM3KXYTM611y0aT2/1O+xHwc9OFSkLbghX0lZkqcKjnIFk5eeQWJt6+G04b7u9mx3OPme4tHQHeAcQvkYxD4jE4tBW4CqgxVeDIQC8er8d4wotEFpqaYNuGh5gcNZsd0aRIaIpgbyelNfNcHYePt/07NhnPjoj1kHnLoX9K+ohiLS17t8lCB7rayC1wZtluohoNDrB9wyNG90g45Ks4tyQ0ruL1lN4OfACDcw6CvV1EI2HHlgcmksmxEbb+5SEmRown+3kYa6KmsUXDockJBrvaKamqTf2egFiM1q3Pc7B5uxOlfwNrgxFJP7uB0zG0ImBaX+d+MnNyE3IHTtOCfd3sePYRk5NxpzVjLcl1Pu96HMQrANiP1aW13mShwwM9TI6PUFxZm5Db/ZowFhxg2zMPMTk+arroEayemT8CHwaMtdahqQn6D+6nqGKOo2t63RSLRtn90tP0HHBkA6ZXsBJppcRDRmbleawUzeaWYR6aq+MPBMgvTt05AdPLcCPOzJP6IGB2pzoXxbOf9gmscROj4edYcICRwT6KK2tSrtt5sLuD7RsfJTzlyC6T/4yV/GUAK83pZSYLj4RD9HbsI6+oLKG2+zUhNDnBzucfcyoHQxhrEtgBJwqXpNGPNRxwsemCB3sOEglPUVhWlXIvTgdbdtCyeQOxmCMrpH6D1TOXMuL9618APOLEeTOyc1i05tyUmO0ai8Vo27WFtt1bTGasOtxfgHOxHjBgrfd+CodSwdZyNyhIAAAJwUlEQVQsXEZd0+qUeNgE+7rZ/eKTTE04lhvmeuDzThUuScULPA6c40TheUWlNK49NyUC9Eg4RPPmDabX+R+uG1hBEif9OZZ4vzLvBUoxPBQA1gXQ096K1+cjv7gsaZcJTo2PsWPjo/San1E+bRir6//wxeoxYCNW95bxzG/D/T0M9/dQWF6dtPMCYrEY7XteoXnTM06mXt4OvAurF0AkhrX/w4cwOEQ3bWpinN62llcz8yWrkcE+tj3zEMP9PU6e5h3AS06ewA1u9Jk/DFwK1BovORZjqOcgQz0HyS0sISMreRKYxWIxOlt3sOuFJ53cBS+GNbv4qWP8u27gIFYKWOMmx0boOdCMz+8nt7A0qXoDRgb72PncY/S273X0NMDlWL+ByLQ+rOGAa5woPBqN0Nexj/GRIfJLypMqQI+EQuzb/iKtLz/rxGS/w/0QgwntEolbT+Eq4AXAucX8Hg+V9QutrV5dTkF5MsP93bRs2chYcNDpU30L+MJJ/psfYU0+ckxuQTENK9cl/ESkcGiKtp0v07l352v2gTAshvWGkfSJRcQxN2P1BDjG6/MzZ8FSahuXJ3y21YGuNlpe3njM/QYMexZrgyxHJmK5zc3XsLOAR3F45zF/RiZV8xZTPb/JsS15Z2t0qJ/2PVudHLc63MNYb5gnm1meibW7leP5Q4sra6hdtDLhUgiHpyY52LqTztYdTr9ZTLsR+HQ8TiRJKwtrIrXj92VmTh7VDU1Uzmt0dR+BYxnoaqNt1xbT6baPpwtrOWZbPE7mBrf7YT8G/Fc8TuQLBKxAoGExgUx3hwaGejtp3/2K6bSxJ9ICrOPIcf8TqcfaDa3CsRodpqhiDjULl1NQGpfTHdfUxBgHW3bQtW+XE8lDjucRrMBM4/5yMnG9LzOyc6hZsIzyugX4/O5tChmLRuk7uJ/23a8wNux4L+m0KayVUUa39Uw0bgcAYGVV+kq8TubxeCgoq6K8toHS6vq4bRE7OT5Kb/teuvfvcXKM/1jagfOwgoCZWAk8huFlmyeSmZ1LWc08KuoXkpWbH5dzRqMRBjrb6GlrYbC7w+mu/qO9jLUyZiCeJ5WktgrrvozbvuNer4/iqlrKaxsoqqiJ2/yd0aF+eg600NuxN97pz2NYE6JTPg13IgQAYE2wiPu2ij5/gKKKORSWVVFYVmW00YlGIwz39zDU28lQz8F4dVkdrQdr/Gq2qerOA+7Hhe1g84vLKSyvprCsivziMqNjkuMjQYK9nQz1djLY0xHPt/3D7cT6flNqWZHExUXAvVjDdXGVkZVNUUXNoWdmpdHe1HBoimBfF8HeLga62+P9onS4jwP/7dbJ4ylRAgAP8BOsqMs1mdm55BWXvbosJjuvgMycvBPOHYhGI4QmJ5gYCTI+GmR8JMhYcJCRgV6iUVcTuQ1iPSjsLl25GrgDB5YhnSqvz09+cRk5BUVk5xaQlVdAdm4BgcysEwYG4alJJsZGmBgNMjY8xMToMMP9PfGYOHQy+7HWdivZj8zWm4Ff485Krlfl5BeRW1RKdm6+dV/mFZCZnXfCIYNoJMzUxDjjI0HGR4aYGAkyGhxgdKg/3j1wx/JV4GtuVyId+YCfYnW/JNzh8wdiGVnZsazc/FhWTl7MH8iIebxe1+t1nKMPs0l93oY1C9btz/Waw+v1xfwZmbGsnLxYVm5+LCMrO+bzB1yv1wmO/RjO8S5p660k6H0JxPyBjFhGdk4sKzc/lnnomYnH43q9TnB8ZTY/gpjjwYrA3L4Qkvloxxq/N+0iYCgBPl8yH9uwJnKJmHIlMIb713YyH1Gs1OiSID6GtVzN7Qsj2Y7NOJlbAdYCnQnwOZPxeBoomflXLnJS56PgfLZHGGszNEkwb8bKjub2BZIsx0NAPPJ5LgT2uPD5kvm4G8iZzZctcoqWYW0j7Pa1nkzHAHDFbL5siY/FWEul3L5QEvmIAt8lvpP0CoHfGv4cqXhEsTb3SaxsKpKqSrB2+HT7uk+GYxewZHZfs8RTLtZ6TLcvmEQ8urD2VXCDB/i/WAkz3P4eEvHoxIGtXEVOwgf8P6zg0+17IFGPO4CC2X7B4o6/BYK4f/EkyvEwUG3rGzXjLKyZ7W5/H4l0PEpi/DaSvi7BSmHr9r2QSMcIDu9zIs6ag7qeB4BPYu0VnigKsYYhwrj//bj9gPks6vKXxFAI3Ib790UiHBvR8tuU8UbSL7qNArcCibyF3lnAFtz/rtw47gBq7H+FIsa9GdiH+/eIG8cQ1hI/9zYzEEcUADcAo7h/kTl9vIi1Dj8ZBIDPkz7DNa3AG4x8cyLOyQG+AUzg/j0Tj2P6hUlDcSmuCqv7eRz3LzrTx8vAm0iclM0zUYY1GSlVA7Q24O9xeDtrEcMagV+R2nlWHgPONvR9SZKoBf6H1AgEXgHeQWKN889WNfA9UufNoxNr46osk1+SSJwtBf6X1AoEHsfaXVPSWCnwT8AO3L8gZ3JMYt2QFxj/RhJDFfBFknfFwHPAh1BCH0ktS4EfkbxJ10LA70nd56bMkgdr3PzXJHY39HbgC1gNZDrwYY2ZP0Div32MADcBpzvyTYgkjkLgE1j7Vbh9353K0Y61a58m3spJ5QDXYj3M3c5lHwGewVouttjJD50EqoC/wwoGEmVXs37gduDtKFmIpKc1wDdJvNTCncAPsF7stNTWgGScXGaXF1iHtYHG+kP/28koMgS8hNXob8CaoNLp4PmSVRFwFXAh1nLCJcTn+gxhbaL0JHDPoX+G43BekWSwGitf/gXAOViZWeMlhLV+/zGsvU6exHqBEkPSMQA4lhqsQGAZMBdry9a5h45Tnew1CDQDLYf9czvwAtbERJmZYuB1h44mYAHWRkT5NsrsxZqDsB3rwbIR2IQ1QVFETiwAnIH14rQCa9vxZZiZEBvGys+/BSsgfwFrB81RA2XLcSgA+P/t3K0KAkEUBtAPtIhsEEFB8P2fSwTLVl20GT7FaJEtnlOmThju3B9mvtukT73WSVb5HPYpnRFf09/5mMcuTQa2aTIwpN2DIW0T3tJxwpRe7GP6Ccopggn82jItlA5Jjq91n47P3nFzkVbu97QYmtJk/JzO8i9pwfSYee8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMDfewIBe7ntuQRGcgAAAABJRU5ErkJggg==" />

                    </svg>

                    ADDITIONAL TRALIER

                </h4>

                <div class="row form-group">

                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Type Of Body</label></div>

                            <div class="col-md-7"><select class="form-control" id="TrailerBodyID" name="TrailerBodyID"><option></option></select></div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Unladen Weight</label></div>

                            <div class="col-md-7"><input type="text" class="form-control" id="TrailerUnladenWeight" name="TrailerUnladenWeight" /></div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Maximum Axle Weight</label></div>

                            <div class="col-md-7"><input type="text" class="form-control" id="TrailerAxleWeight" name="TrailerAxleWeight" /></div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Unit</label></div>

                            <div class="col-md-7"><select class="form-control" id="Unit" name="Unit"><option></option></select></div>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <h4 class="prmnt">Tyres</h4>

                    </div>

                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Front Axle</label></div>

                            <div class="col-md-7"><input type="text" class="form-control" id="TrailerFrontAxle" name="TrailerFrontAxle" /></div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Rear Axle</label></div>

                            <div class="col-md-7"><input type="text" class="form-control" id="TrailerRearAxle" name="TrailerRearAxle" /></div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Any Other Axle</label></div>

                            <div class="col-md-7"><input type="text" class="form-control" id="TrailerOtherAxle" name="TrailerOtherAxle" /></div>

                        </div>

                    </div>

                </div>

                <h4 class="h4Vouchr">

                    <svg xmlns="http://www.w3.org/2000/svg" width="56.685" height="38.149" viewBox="0 0 56.685 38.149">

                        <g id="additionalattachment" transform="translate(0 -24.381)">

                            <rect id="Rectangle_799" data-name="Rectangle 799" width="47.994" height="29.534" transform="translate(0 32.995)" fill="#beddf5" />

                            <rect id="Rectangle_800" data-name="Rectangle 800" width="23.997" height="29.534" transform="translate(23.997 32.995)" fill="#93c7ef" />

                            <rect id="Rectangle_801" data-name="Rectangle 801" width="47.994" height="9.845" transform="translate(0 24.381)" fill="#0052b4" />

                            <g id="Group_177" data-name="Group 177" transform="translate(9.23 43.455)">

                                <rect id="Rectangle_802" data-name="Rectangle 802" width="12.306" height="3.692" fill="#fff" />

                                <rect id="Rectangle_803" data-name="Rectangle 803" width="12.306" height="3.692" transform="translate(0 7.384)" fill="#fff" />

                                <rect id="Rectangle_804" data-name="Rectangle 804" width="12.306" height="3.692" transform="translate(17.228)" fill="#fff" />

                                <rect id="Rectangle_805" data-name="Rectangle 805" width="14.767" height="3.692" transform="translate(17.228 7.384)" fill="#fff" />

                            </g>

                            <rect id="Rectangle_806" data-name="Rectangle 806" width="23.997" height="9.845" transform="translate(23.997 24.381)" fill="#003778" />

                            <path id="Path_1181" data-name="Path 1181" d="M315.222,280.381a10.46,10.46,0,1,0,10.46,10.46A10.472,10.472,0,0,0,315.222,280.381Z" transform="translate(-268.997 -255.157)" fill="#ffc170" />

                            <path id="Path_1182" data-name="Path 1182" d="M408.381,301.3a10.46,10.46,0,1,0,0-20.92" transform="translate(-362.156 -255.157)" fill="#ff9811" />

                            <path id="Path_1183" data-name="Path 1183" d="M374.328,343.794h-2.461v-2.461h-3.692v2.461h-2.461v3.692h2.461v2.461h3.692v-2.461h2.461Z" transform="translate(-323.796 -309.956)" fill="#fff" />

                        </g>

                    </svg>

                    ADDITIONAL ATTACHMENT

                </h4>

                <div class="row form-group">

                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Max Laden Weight</label></div>

                            <div class="col-md-7"><div class="input-group"><span class="input-group-addon">KG</span><input type="text" class="form-control" id="TrailerMaxladenWeight" name="TrailerMaxladenWeight" /></div></div>

                        </div>

                    </div>



                </div>

            </div>

            <h4 class="h4Vouchr">

                <svg xmlns="http://www.w3.org/2000/svg" width="37.089" height="37.535" viewBox="0 0 37.089 37.535">

                    <g id="otherdetails" transform="translate(0.01 0)">

                        <g id="layer_1" data-name="layer 1" transform="translate(-0.01 0)">

                            <path id="Path_1184" data-name="Path 1184" d="M37.079,10.945V4.832a.579.579,0,0,0-.336-.516L33.42,2.752V.571A.571.571,0,0,0,32.834,0H2.844a.571.571,0,0,0-.563.571V3.909a2.846,2.846,0,0,0,0,5.582v2.463a2.846,2.846,0,0,0,0,5.582v2.471a2.846,2.846,0,0,0,0,5.582v2.463a2.846,2.846,0,0,0,0,5.582v3.331a.571.571,0,0,0,.563.571h29.99a.571.571,0,0,0,.571-.571v-6.9L36.728,28.5a.579.579,0,0,0,.328-.516v-6.1a.579.579,0,0,0-.328-.516l-1.485-.688,1.485-.7a.579.579,0,0,0,.328-.516V13.361a.579.579,0,0,0-.328-.516l-1.485-.688,1.485-.7a.579.579,0,0,0,.352-.516ZM1.116,6.692A1.72,1.72,0,0,1,2.281,5.082V8.295a1.7,1.7,0,0,1-1.149-1.6Zm0,8.045a1.7,1.7,0,0,1,1.165-1.6v3.213a1.72,1.72,0,0,1-1.149-1.611Zm0,8.053a1.72,1.72,0,0,1,1.149-1.611v3.213a1.7,1.7,0,0,1-1.134-1.6Zm0,8.045a1.7,1.7,0,0,1,1.149-1.564v3.174a1.72,1.72,0,0,1-1.134-1.611Zm2.3,2.783A2.861,2.861,0,0,0,5.7,30.827a.571.571,0,1,0-1.141,0,1.712,1.712,0,0,1-1.141,1.618V25.581A2.861,2.861,0,0,0,5.7,22.79a.571.571,0,1,0-1.141,0,1.7,1.7,0,0,1-1.141,1.6V17.528A2.861,2.861,0,0,0,5.7,14.737a.571.571,0,0,0-1.141,0,1.712,1.712,0,0,1-1.141,1.611V9.483A2.861,2.861,0,0,0,5.7,6.692a.571.571,0,1,0-1.141,0A1.7,1.7,0,0,1,3.414,8.256V1.141H8.371V36.393H3.414ZM35.961,22.25v5.395l-2.51,1.173V21.547l.493-.235Zm0-8.522v5.387l-2.533,1.212V13.056l.493-.235Zm0-3.127-3.323,1.564a.579.579,0,0,0-.328.516V36.393H9.5V1.141H32.287V3.127a.579.579,0,0,0,.328.516l3.323,1.564Z" transform="translate(0.01 0)" fill="#c4570c" />

                            <path id="Path_1185" data-name="Path 1185" d="M31.29,31.15H18.211a.567.567,0,1,0,0,1.134H31.29a.571.571,0,0,0,.563-.571A.563.563,0,0,0,31.29,31.15Z" transform="translate(-3.841 -6.796)" fill="#ebb562" />

                            <path id="Path_1186" data-name="Path 1186" d="M27.8,35.93H18.211a.571.571,0,1,0,0,1.141H27.8a.571.571,0,1,0,0-1.141Z" transform="translate(-3.841 -7.839)" fill="#ebb562" />

                            <path id="Path_1187" data-name="Path 1187" d="M24.747,8.23a7.107,7.107,0,1,0,3.432,13.33h0A7.109,7.109,0,0,0,24.747,8.23Zm-2.76,12.4-.078-.133-.078-.133-.086-.211-.047-.125a.418.418,0,0,0-.055-.25V19.66a3.041,3.041,0,0,1,0-.383,3.127,3.127,0,0,1,0-.461v-.149a.6.6,0,0,1,.07-.313c.07-.1.039-.117.055-.18a2.589,2.589,0,0,1,.1-.281l.086-.18c.039-.086.086-.172.133-.258a1.337,1.337,0,0,1,.1-.18,2.565,2.565,0,0,1,.156-.242l.125-.164a2.431,2.431,0,0,1,.18-.219l.133-.149.219-.2c.047,0,.086-.086.133-.117h0l.141.086a1.869,1.869,0,0,0,.266.164l.242.109.141.047a2.385,2.385,0,0,0,.735.133A2.439,2.439,0,0,0,25.4,16.6l.133-.047.25-.109a2.447,2.447,0,0,0,.266-.164l.133-.086h0l.07.047.078.063c.109.1.227.211.336.328l.063.07.172.2.094.133.133.188a2.736,2.736,0,0,1,.188.328l.094.188a1.673,1.673,0,0,0,.078.172l.086.235a.688.688,0,0,0,.039.117,3.7,3.7,0,0,1,.164.946V19.3a2.056,2.056,0,0,1,0,.383.625.625,0,0,1,0,.117,2.345,2.345,0,0,1-.055.25l-.047.125a.6.6,0,0,1-.086.211l-.07.133c0,.047-.055.094-.086.133a6.083,6.083,0,0,1-5.449-.023Zm3.854-5.543a1.407,1.407,0,0,1-2.181,0,2.424,2.424,0,0,1-.633-1.611,1.728,1.728,0,1,1,3.448,0,2.463,2.463,0,0,1-.633,1.611Zm3.729,3.776a6.185,6.185,0,0,1-.532.649v-.2a.719.719,0,0,0,0-.125V19.05a5.309,5.309,0,0,0-.094-.7v-.063a5.363,5.363,0,0,0-1.5-2.65l-.2-.18-.141-.125h0a3.448,3.448,0,0,0,.258-.508l.063-.164a4.112,4.112,0,0,0,.117-.414,1.76,1.76,0,0,0,.039-.172,3.636,3.636,0,0,0,.055-.586,2.869,2.869,0,1,0-5.723,0,3,3,0,0,0,.063.594c0,.047,0,.1,0,.156a4.456,4.456,0,0,0,.125.43,1.142,1.142,0,0,1,.055.149,4.113,4.113,0,0,0,.266.524h0c-.156.125-.3.266-.453.407l-.133.117c-.094.1-.188.2-.274.313l-.141.2-.211.321-.125.219c-.055.109-.117.227-.164.336s-.07.156-.1.235-.086.235-.125.36a2.153,2.153,0,0,0-.07.227,3.409,3.409,0,0,0-.086.407,1.438,1.438,0,0,0-.039.2,3.909,3.909,0,0,0-.047.6,1.907,1.907,0,0,0,0,.211A5.965,5.965,0,1,1,29.7,12.03h0a5.981,5.981,0,0,1,1,3.307,5.9,5.9,0,0,1-1.134,3.495Z" transform="translate(-3.841 -1.795)" fill="#dd3e46" />

                        </g>

                    </g>

                </svg>

                OTHER DETAIL

            </h4>

            <div class="row form-group">

                <div class="col-md-12">

                    <h4 class="prmnt">Officer Inspecting The Vehicle</h4>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Designation</label></div>

                        <div class="col-md-7"><select class="form-control" id="DesignationID" name="DesignationID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Name</label></div>

                        <div class="col-md-7"><select class="form-control" id="OfficerName" name="OfficerName"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="InspectionDate" name="InspectionDate" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Remarks</label></div>

                        <div class="col-md-7"><textarea class="form-control" rows="3" id="Remarks" name="Remarks"></textarea></div>

                    </div>

                </div>

                <div class="col-md-12">

                    <h4 class="prmnt">Verification Report</h4>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Number</label></div>

                        <div class="col-md-7"><input type="number" class="form-control" id="VerificationNo" name="VerificationNo" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="VerificationDate" name="VerificationDate" /></div>

                    </div>

                </div>

                <div class="col-md-12">

                    <h4 class="prmnt">Other</h4>

                </div>


                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Attach Scan Documents</label></div>

                        <div class="col-md-7"><input type="file" class="form-control red" name="upload" id="Document" multiple /></div>

                    </div>

                </div>

                <div class="col-md-12">

                    <div class="row form-group">

                        <div class="col-md-3" style="width: 20.5%;"></div>

                        <div class="col-md-7" style="width:79.5%" id="ImgesAttached"></div>

                    </div>

                </div>

            </div>

            <div class="row form-group">

                <div class="col-md-3"></div>

                <div class="col-md-6 text-center">



                    <a href="/DEO/Arrival" > <button type="button" class="btn btnCancel">CANCEL</button></a>



                    <a onclick="SaveArrival();" id="Operation" class="btn btnCustom">SUBMIT</a>



                </div>

            </div>

        </form>



    </div>

</div>



<input type="hidden" id="RecordId" />





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

    $(document).ready(function () {

        $("#ShowDiv").hide();
        $("#AddOwners").hide();

        LoadDivision();

        LoadETO();

        LoadRegistrationMark();

        LoadOwnerType();

        LoadOwnerTitle();

        LoadVehicleCategory();

        LoadManufacturers();

        LoadCCs();

        LoadBodyType();

        LoadVehicleType();

        LoadColors();

        //LoadTrailerBodyType();

        LoadTrailerUnits();

        LoadRoles();

        LoadName();

        LoadYears();

        LoadArrivalProvince();

        LoadProvince();

        LoadDivisions();

        LoadFuelType();

        $("#LetterNo").prop("disabled", true)

        $('#LetterNo').val((Math.random().toString().substr(2, 10)));







        $('#IsTrailerVeh').click(function () {

            if ($(this).is(':checked')) {

                $("#ShowDiv").show();

            } else {

                $("#ShowDiv").hide();

            }

        });

        $('#IsTribleVeh').click(function () {



            if ($(this).is(':checked')) {

                $("#TribleDiv").show();

            } else {

                $("#TribleDiv").hide();

            }

        });



        var value = $('#RecordId').val();



        if (value != "") {



            GetData(value);

            //GetDocumentData(value);

            $("#Operation").attr("onclick", "SaveArrival()").unbind("click");

            $("#Operation").attr("onclick", "UpdateArrival()").bind("click");

            $("#Operation").text('Update');

        }

    });

    function LoadYears() {

        //Reference the DropDownList.

        var ddlYears = document.getElementById("YearOfManufacture");



        //Determine the Current Year.

        var currentYear = (new Date()).getFullYear();

        var starting = 1950;

        //Loop and add the Year values to DropDownList.

        for (var i = starting; i <= currentYear + 1; i++) {

            var option = document.createElement("OPTION");

            option.innerHTML = i;

            option.value = i;

            ddlYears.appendChild(option);

        }

    }

    //function LoadDivisions() {



    //    $.ajax({

    //        type: "Get",

    //        contentType: 'application/json; charset=utf-8',

    //        url: "/DEO/LoadDivisions",

    //        dataType: 'json',

    //        success: function (response) {

    //

    //            //removeOptions(document.getElementById("slabID"));

    //            if (response.Status == true) {

    //                if (typeof response != 'undefined' && response != null && response != 0) {

    //

    //                    $('#DivisionID').empty();

    //                    $('#DivisionID').append("<option value='0'>--Select Division--</option>");

    //                    $.each(response.Data, function (index, value) {

    //                        $('<option value="' + value.ID + '">' + value.NAME + '</option>').appendTo('#DivisionID');

    //                    });



    //                }

    //                else {



    //                }

    //            }

    //            else {



    //            }

    //        },

    //        error: function (response) {

    //            Swal("Something went wrong");

    //        }

    //    });

    //}

    function LoadRegistrationMark() {

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadRegistrationMark",

            dataType: 'json',

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#RegistrationMarkID').empty();

                        $('#RegistrationMarkID').append("<option value='0'>--Select Registration Mark--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.registration_mark + '</option>').appendTo('#RegistrationMarkID');

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

    function LoadOwnerType() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadOwnerType",

            dataType: 'json',

            async: false,

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

    function LoadVehicleCategory() {

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadCategory",

            dataType: 'json',



            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#CategoryID').empty();

                        $('#CategoryID').append("<option value='0'>--Select Category--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.category_of_vehicle + '</option>').appendTo('#CategoryID');

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

    function LoadManufacturers() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadManufacturer",

            dataType: 'json',



            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#ManuFacturerID').empty();

                        $('#ManuFacturerID').append("<option value='0'>--Select Manufacturer--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.manufacturer + '</option>').appendTo('#ManuFacturerID');

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

    function LoadCCs() {

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadEUnit",

            dataType: 'json',

            async:false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#EUnit').empty();

                        $('#EUnit').append("<option value='0'>--Select Engine Capacity--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.unit + '</option>').appendTo('#EUnit');

                        });



                    }

                    else {



                    }

                }

                else {





                }

            },

            error: function (response) {

                //alert("Something Went Wrong Please Try Again Letter....!");

                swal(response.msg);

            }

        });

        }

    function LoadBodyType() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadBodyType",

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#BodyTypeID').empty();

                        $('#BodyTypeID').append("<option value='0'>--Select Body Type--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#BodyTypeID');

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

    function LoadVehicleType() {

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadVehicleClass",

            dataType: 'json',

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#ClassID').empty();

                        $('#ClassID').append("<option value='0'>--Select Vehicle Class--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.class_of_vehicle + '</option>').appendTo('#ClassID');

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

    function LoadColors() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadColor",

            dataType: 'json',

            async:false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#ColorID').empty();

                        $('#ColorID').append("<option value='0'>--Select Color--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.colors + '</option>').appendTo('#ColorID');

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

    //function LoadTrailerBodyType() {



    //    $.ajax({

    //        type: "Get",

    //        contentType: 'application/json; charset=utf-8',

    //        url: "/DEO/LoadTrailerBodyType",

    //        dataType: 'json',

    //        async: false,

    //        success: function (response) {



    //            //removeOptions(document.getElementById("slabID"));

    //            if (response.Status == true) {

    //                if (typeof response != 'undefined' && response != null && response != 0) {



    //                    $('#TrailerBodyID').empty();

    //                    $('#TrailerBodyID').append("<option value='0'>--Select Trailer Body Type--</option>");

    //                    $.each(response.Data, function (index, value) {

    //                        $('<option value="' + value.ID + '">' + value.Name + '</option>').appendTo('#TrailerBodyID');

    //                    });



    //                }

    //                else {



    //                }

    //            }

    //            else {



    //            }

    //        },

    //        error: function (response) {

    //            alert("Something Went Wrong Please Try Again Letter....!");

    //        }

    //    });



    //}

    function LoadTrailerUnits() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadUnit",

            dataType: 'json',



            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#TrailerUnitID').empty();

                        $('#TrailerUnitID').append("<option value='0'>--Select Trailer Unit--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.unit + '</option>').appendTo('#TrailerUnitID');

                        });

                        $('#Unit').empty();

                            $('#Unit').append("<option value='0'>--Select Unit--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.unit + '</option>').appendTo('#Unit');

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

    function LoadRoles() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadRoles",

            dataType: 'json',

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#DesignationID').empty();

                        $('#DesignationID').append("<option value='0'>--Select Designation--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.designation + '</option>').appendTo('#DesignationID');

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

    function LoadName() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadUser",

            dataType: 'json',

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#OfficerName').empty();

                        $('#OfficerName').append("<option value='0'>--Select Name--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.officer_name + '</option>').appendTo('#OfficerName');

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

    function LoadArrivalProvince() {

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



                        $('#ArrivalProvinceID').empty();

                        $('#ArrivalProvinceID').append("<option value='0'>--Select Province Name--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.province + '</option>').appendTo('#ArrivalProvinceID');

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

            async:false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#ProvinceID').empty();

                        $('#ProvinceID').append("<option value='0'>--Select ProvinceName--</option>");

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

<script>

    $("#ProvinceID").change(function () {

        var ProvinceID = $("#ProvinceID").val();

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadCity",

            dataType: 'json',

            async: false,

            data: { ProvinceID: ProvinceID },

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#CityID').empty();

                        $('#CityID').append("<option value='0'>--Select City--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.city_code + '">' + value.cities + '</option>').appendTo('#CityID');

                        });

                        $('#ArrivalCityID').empty();

                            $('#ArrivalCityID').append("<option value='0'>--Select City--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.city_code + '">' + value.cities + '</option>').appendTo('#ArrivalCityID');

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

    $("#ArrivalProvinceID").change(function () {

        var ProvinceID = $("#ArrivalProvinceID").val();

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadCity",

            dataType: 'json',

            async: false,

            data: { ProvinceID: ProvinceID },

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {




                        $('#ArrivalCityID').empty();

                            $('#ArrivalCityID').append("<option value='0'>--Select City--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.city_code + '">' + value.cities + '</option>').appendTo('#ArrivalCityID');

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





<!-- <script src="/Scripts/jquery.inputmask.bundle.js"></script> -->



<script>

    $(".mobile").inputmask({ "mask": "\\929999999999" });

    $(".telephone").inputmask({ "mask": "\\929999999999" });

    $(".oldcnic").inputmask({ "mask": "\\99999-9999999-9" });

    $(".newcnic").inputmask({ "mask": "\\99999-9999999-9" });



    $("#Arrivalform").validate({

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

            "ArrivalProvinceID": {

                required: true,

                Dropdown: true,

            },

            "BookSerialno"              :{required:true,},

            "DateofRegistration"        :{required:true,},

            "LastTaxPaiddate"           :{required:true,},

            "ReportingDate"             :{required:true,},

            "LetterNo"                  :{required:true,},

            "LetterDate"                :{required:true,},

            "OwnerTypeID": {

                required: true,

                Dropdown: true,

            },

            "OwnerTitleID": {

                required: true,

                Dropdown: true,

            },

            "OwnerName"                 :{required:true,},

            "OldCnicNo": {

                required: true,

                CNICCheck: 13,

            },

            "NewCnicNo": {

                required: true,

                CNICCheck: 13,

            },

            "Guardian"                  :{required:true,},

            "HouseNo"                   :{required:true,},

            "ProvinceID": {

                required: true,

                Dropdown: true,

            },

            "CityID": {

                required: true,

                Dropdown: true,

            },

            "ArrivalCityID": {

                required: true,

                Dropdown: true,

                },

            "Telephone": {

                required: true,

                ContactNumberCheck: 12,

            },

            "Mobile": {

                required: true,

                ContactNumberCheck: 12,

            },

            "Email": {

                required: true,

                email:true,

            },

            "CategoryID": {

                required: true,

                Dropdown: true,

            },

            "ManuFacturerID": {

                required: true,

                Dropdown: true,

            },

            "MakerClassification"       :{required:true,},

            "YearOfManufacture"         :{required:true,},

            "BodyTypeID": {

                required: true,

                Dropdown: true,

            },
            "EUnit": {

            required: true,



            },

            "CC": {

                required: true,



            },

            "EngineNo"                  :{required:true},

            "ChassisNo"                 :{required:true},

            "ClassID": {

                required: true,

                Dropdown: true,

            },

            "NoofCylinder"              :{required:true,},

            "SeatingCapacity"           :{required:true,},

            "UnladenWeight"             :{required:true,},

            "ColorID": {

                required: true,

                Dropdown: true,

            },

            "RegNo"                     :{required:true,},

            "TrailerBodyID": { CheckedDropdown:true,},

            "TrailerUnladenWeight": { requiredIfChecked:true,},

            "TrailerAxleWeight": { requiredIfChecked:true,},

            "TrailerUnitID": { CheckedDropdown:true,},

            "Unit": { CheckedDropdown:true,},

            "TrailerFrontAxle": { requiredIfChecked:true,},

            "TrailerRearAxle": { requiredIfChecked:true,},

            "TrailerOtherAxle": { requiredIfChecked:true,},

            "TrailerMaxladenWeight": { requiredIfChecked:true,},

            "DesignationID": {

                required: true,



            },

            "OfficerName": {

                required: true,



            },

            "InspectionDate"            :{required:true,},

            "Remarks"                   :{required:true,},

            "VerificationNo"            :{required:true,},

            "VerificationDate"          :{required:true,},

            "TribleVehicleDate": { requiredIfIsTribleVehChecked:true,},

            "upload"                    :{required:true,},



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



    $.validator.addMethod("CheckedDropdown", function (value, element) {

        if ($("#IsTrailerVeh").is(":checked")) { return value > 0; }

        return true;

    }, "You must select at least one");



    $.validator.addMethod("requiredIfChecked", function (val, ele, arg) {

        if ($("#IsTrailerVeh").is(":checked") && ($.trim(val) == '')) { return false; }

        return true;

    }, "This field is required if IsTrailerVeh is checked...");



    $.validator.addMethod("requiredIfIsTribleVehChecked", function (val, ele, arg) {

        if ($("#IsTribleVeh").is(":checked") && ($.trim(val) == '')) { return false; }

        return true;

    }, "This field is required if IsTribleVeh is checked...");



    function SaveArrival() {



        function ValidateDate(newCnic, mobile, email) {



            var stat = null;

            $.ajax({

                url: '{{url("/")}}/DEO/CheckExist',

                type: "GET",

                dataType: "JSON",

                async: false,

                data: { NewCNIC: newCnic, Mobile: mobile, Email: email, tableName: 'NewArrival', key: 'Mobile', KeyCNIC:'NewCnicNo'},

                success: function (response) {



                    if (response.Status) {

                        //var msg = "";

                        stat = 0;

                    }

                    else {

                        if (response.msg.IsCNICExists != 0) {

                            $("#ExistnewCnic").css("display", "block");

                            $("#ExistnewCnic").html("CNIC already exist");



                            stat = 1;

                        }

                        if (response.msg.IsMobileExists != 0) {

                            $("#Existmobile").css("display", "block");

                            $("#Existmobile").html("Mobile already exist");



                            stat = 1;

                        }

                        if (response.msg.IsEmailExists != 0) {

                            $("#ExistEmail").css("display", "block");

                            $("#ExistEmail").html("Email already exist");



                            stat = 1;

                        }

                    }



                }

            });

            return stat;

        }





        // var Arrivalvalitade = $('#Arrivalform').valid();



        // if (Arrivalvalitade) {


            var _token= $("input[name='_token']").val();

            var ETO_CODE = $('#ETO_CODE').val()

            var DivisionID = $('#DivisionID').val()

            var Division = $('#Division').val()

            var RegistrationMarkID = $('#RegistrationMarkID').val()

            var ArrivalProvinceID = $('#ArrivalProvinceID').val()

            var BookSerialno = $('#BookSerialno').val()

            var DateofRegistration = $('#DateofRegistration').val()

            var LastTaxPaiddate = $('#LastTaxPaiddate').val()

            var ReportingDate = $('#ReportingDate').val()

            var LetterNo = $('#LetterNo').val()

            var LetterDate = $('#LetterDate').val()

            var OwnerTypeID = $('#OwnerTypeID').val()

            var OwnerTitleID = $('#OwnerTitleID').val()

            var Owners = $("input[name=OwnerName]");

            var FueltypeID = $("#FueltypeID").val();

            var VehiclePrice = $("#VehiclePrice").val();

            var wheelbox = $('#wheelbox').val();

            var ownerName = "";

            if (Owners.length > 0) {

                for (var i = 0; i < Owners.length; i++) {

                    if (ownerName == "") {

                        ownerName = Owners[i].value;

                    } else {

                        ownerName = ownerName + "," + Owners[i].value;

                    }

                }

            }

            OwnerName = ownerName;



            var CNIC = $("input[name=newCnic]");

            var NewCnic = "";

            if (CNIC.length > 0) {

                for (var i = 0; i < CNIC.length; i++) {

                    if (NewCnic == "") {

                        NewCnic = CNIC[i].value;

                    } else {

                        NewCnic = NewCnic + "," + CNIC[i].value;

                    }

                }

            }

            var oldCNIC = $("input[name=oldCnic]");

            var oldCnic = "";

            if (oldCNIC.length > 0) {

                for (var i = 0; i < oldCNIC.length; i++) {

                    if (oldCnic == "") {

                        oldCnic = oldCNIC[i].value;

                    } else {

                        oldCnic = oldCnic + "," + oldCNIC[i].value;

                    }

                }

            }

            var Guradians = $("input[name=Guardian]");

            var guardianName = "";

            if (Guradians.length > 0) {

                for (var i = 0; i < Guradians.length; i++) {

                    if (guardianName == "") {

                        guardianName = Guradians[i].value;

                    } else {

                        guardianName = guardianName + "," + Guradians[i].value;

                    }

                }

            }


            var HouseNo = $('#HouseNo').val()

            var ProvinceID = $('#ProvinceID').val()

            var CityID = $('#CityID').val();

            var ArrivalCityID = $('#ArrivalCityID').val();

            var Telephone = $('#Telephone').val()

            var Mobile = $('#Mobile').val()

            var Email = $('#Email').val()

            var CategoryID = $('#CategoryID').val()

            var ManuFacturerID = $('#ManuFacturerID').val()

            var MakerClassification = $('#MakerClassification').val()

            var YearOfManufacture = $('#YearOfManufacture').val()

            var BodyTypeID = $('#BodyTypeID').val()

            var EngineCapacity = $('#CC').val()

            var EngineUnit= $('#EUnit').val()

            var EngineNo = $('#EngineNo').val()

            var ChassisNo = $('#ChassisNo').val()

            var ClassID = $('#ClassID').val()

            var NoofCylinder = $('#NoofCylinder').val()

            var SeatingCapacity = $('#SeatingCapacity').val()

            var UnladenWeight = $('#UnladenWeight').val()

            var ColorID = $('#ColorID').val()

            var RegNo = $('#RegNo').val()

            var IsTrailerVeh = $('#IsTrailerVeh').prop("checked")

            var TrailerBodyID = $('#TrailerBodyID').val()

            var TrailerUnladenWeight = $('#TrailerUnladenWeight').val()

            var TrailerAxleWeight = $('#TrailerAxleWeight').val()

            var TrailerUnitID = $('#TrailerUnitID').val();


            var Unit = $('#Unit').val();

            var TrailerFrontAxle = $('#TrailerFrontAxle').val()

            var TrailerRearAxle = $('#TrailerRearAxle').val()

            var TrailerOtherAxle = $('#TrailerOtherAxle').val()

            var TrailerMaxladenWeight = $('#TrailerMaxladenWeight').val()

            var DesignationID = $('#DesignationID').val()

            var OfficerName = $('#OfficerName').val()

            var InspectionDate = $('#InspectionDate').val()

            var Remarks = $('#Remarks').val()

            var VerificationNo = $('#VerificationNo').val()

            var VerificationDate = $('#VerificationDate').val()

            var IsTribleVeh = $('#IsTribleVeh').prop("checked")

            var TribleVehicleDate = $('#TribleVehicleDate').val()



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

        var ver = "";

        if (ETO_CODE   == 0) {

                $('#ETO_CODE').addClass('error');

                check = false;
                ver="ETO_CODE";

                }    //edit by


        if (DivisionID  == 0) {

            $('#DivisionID').addClass('error');

            check = false;
            ver="DivisionID";

        }    //edit by

        if (Division  == 0) {

            $('#Division').addClass('error');

            check = false;
            ver="Division";

            }    //edit by

        if (OwnerTypeID  == 0) {

            $('#OwnerTypeID').addClass('error');

            check = false;
            ver="OwnerTypeID";

        }



        if (OwnerTypeID == 1) {



            if (oldCnic  == "" && NewCnic  == "") {



                if (NewCnic == "") {

                    $('#newCnic').addClass('error');

                    check = false;
                    ver="newCnic";


                } //edit by

                if (oldCnic  == "") {

                    $('#oldCnic').addClass('error');

                    check = false;
                    ver="oldCnic";

                } //edit by

            }

            if (guardianName  == "") {

                $('#Guardian').addClass('error');

                check = false;
                ver="Guardian";

            } //edit by

            if (OwnerTitleID == 0) {

                $('#OwnerTitleID').addClass('error');

                check = false;
                ver="OwnerTitleID";

                }

                if (OwnerName == "" || ownerName == null) {

                $('#OwnerName').addClass('error');

                check = false;
                ver="OwnerName";

                }       //edit by


        }



        if (OwnerTypeID == 4) {



            if (NewCnic  == "") {

                $('#newCnic').addClass('error');

                check = false;
                ver="newCnic";

            }



        }





        if (OwnerTypeID == 3) {



            if (oldCnic  == "" && NewCnic  == "") {



                if (NewCnic  == "") {

                    $('#newCnic').addClass('error');

                    check = false;
                    ver="newCnic";

                } //edit by

                if (oldCnic  == "") {

                    $('#oldCnic').addClass('error');

                    check = false;
                    ver="oldCnic";

                } //edit by

            }

            if (guardianName  == "") {

                $('#Guardian').addClass('error');

                check = false;
                ver="Guardian";

            } //edit by

            if (OwnerTitleID == 0) {

            $('#OwnerTitleID').addClass('error');

            check = false;
            ver="OwnerTitleID";

            }

            if (OwnerName == "" || ownerName == null) {

            $('#OwnerName').addClass('error');

            check = false;
            ver="OwnerName";

            }       //edit by


        }             //edit by





        if (RegistrationMarkID == 0) {

            $('#RegistrationMarkID').addClass('error');

            check = false;
            ver="RegistrationMarkID";

        }             //edit by

        if (RegNo  == "" || RegNo  == null) {

            $('#RegNo').addClass('error');

            check = false;
            ver="RegNo";

        }



        if (ProvinceID  == 0) {

            $('#ProvinceID').addClass('error');

            check = false;
            ver="ProvinceID";

        } //edit by

        if (ArrivalProvinceID  == 0) {

            $('#ArrivalProvinceID').addClass('error');

            check = false;
            ver="ArrivalProvinceID";

        } //edit by

        if (BookSerialno  == 0) {

            $('#BookSerialno').addClass('error');

            check = false;
            ver="BookSerialno";

        } //edit by

        if (DateofRegistration  == 0) {

            $('#DateofRegistration').addClass('error');

            check = false;
            ver="DateofRegistration";

        } //edit by

        if (LastTaxPaiddate  == 0) {

            $('#LastTaxPaiddate').addClass('error');

            check = false;
            ver="LastTaxPaiddate";

        } //edit by

        if (ReportingDate  == 0) {

            $('#ReportingDate').addClass('error');

            check = false;
            ver="ReportingDate";

        } //edit by

        if (LetterNo  == 0) {

            $('#LetterNo').addClass('error');

            check = false;
            ver="LetterNo";

        } //edit by

        if (LetterDate  == 0) {

            $('#LetterDate').addClass('error');

            check = false;
            ver="LetterDate";

        } //edit by

        if (HouseNo   == 0) {

            $('#HouseNo').addClass('error');

            check = false;
            ver="HouseNo";

        } //edit by



        if (CityID  == null || CityID  == "") {

            $('#City').addClass('error');

            check = false;
            ver="CityID";

        } //edit by

        if (ArrivalCityID  == null || ArrivalCityID  == "") {

            $('#City').addClass('error');

            check = false;
            ver="ArrivalCityID";

            } //edit by

        if (Mobile  == "" || Mobile  == null) {

            $('#Mobile').addClass('error');

            check = false;
            ver="Mobile";

        }//edit by

        if (CategoryID  == 0) {

            $('#CategoryID').addClass('error');

            check = false;
            ver="CategoryID";

        }//edit by

        if (ClassID  == 0) {

            $('#ClassID').addClass('error');

            check = false;
            ver="ClassID";

        }//edit by

        if (BodyTypeID  == 0) {

            $('#BodyTypeID').addClass('error');

            check = false;
            ver="BodyTypeID";

        }//edit by

        if (ManuFacturerID  == 0) {

            $('#ManuFacturerID' ).addClass('error');

            check = false;
            ver="ManuFacturerID";

        }//edit by

        if (MakerClassification   == 0) {

            $('#MakerClassification ' ).addClass('error');

            check = false;
            ver="MakerClassification";

        }//edit by


        if (EngineNo  == "" || EngineNo  == null) {

           $('#EngineNo').addClass('error');

           check = false;
           ver="EngineNo";

        } //edit by

        if (ChassisNo  == "" || ChassisNo  == null) {

            $('#ChassisNo').addClass('error');

            check = false;
            ver="ChassisNo";

        } //edit by

        if (SeatingCapacity  == "" || SeatingCapacity  == null) {

            $('#SeatingCapacity').addClass('error');

            check = false;
            ver="SeatingCapacity";

        } //edit by

        if (EngineCapacity  == "" || EngineCapacity  == null) {

            $('#CC').addClass('error');

            check = false;
            ver="EngineCapacity";

        } //edit by

        if (EngineUnit  == "" || EngineUnit  == null) {

        $('#EUnit').addClass('error');

        check = false;
        ver="EngineUnit";

        } //edit by



        if (ColorID  == 0) {

            $('#ColorID').addClass('error');

            check = false;
            ver="ColorID";

        } //edit by



        if (YearOfManufacture == null || YearOfManufacture == "") {

           $('#YearOfManufacture').addClass('error');

           check = false;
           ver="YearOfManufacture";

        }


        if (NoofCylinder  == null || NoofCylinder  == "") {

            $('#NoofCylinder ').addClass('error');

            check = false;
            ver="NoofCylinder";

        }











        // if (IsTrailerVeh  == "" || IsTrailerVeh == null) {

        //    $("#IsTrailerVeh").css("display", "block");

        //    $("#IsTrailerVeh").html("Select the trailer type")

        //    check = false;
        //    ver="IsTrailerVeh";

        // }

        if (IsTrailerVeh == 1) {





            if (TrailerBodyID == null || TrailerBodyID == "") {

                $('#TrailerBodyID').addClass('error');

                check = false;
                ver="TrailerBodyID";

            }


                if (TrailerUnladenWeight  == null || TrailerUnladenWeight  == "") {

                    $('#TrailerUnladenWeight').addClass('error');

                    check = false;
                    ver="TrailerUnladenWeight";

                }

                if (TrailerAxleWeight  == null || TrailerAxleWeight  == "") {

                    $('#TrailerAxleWeight').addClass('error');

                    check = false;
                    ver="TrailerAxleWeight";

                }

                if (TrailerUnitID  == null || TrailerUnitID  == "") {

                    $('#TrailerUnitID').addClass('error');

                    check = false;
                    ver="TrailerUnitID";

                }


                if (Unit  == null || Unit  == "") {

                    $('#Unit').addClass('error');

                    check = false;
                    ver="Unit";

                    }


           if (TrailerFrontAxle == "" || TrailerFrontAxle == null) {

               $('#TrailerFrontAxle').addClass('error');

               check = false;
               ver="TrailerFrontAxle";

           }

           if (TrailerRearAxle  == "" || TrailerRearAxle  == null) {

               $('#TrailerRearAxle').addClass('error');

               check = false;
               ver="TrailerRearAxle";

           }

           if (TrailerOtherAxle  == "" || TrailerOtherAxle  == null) {

               $('#TrailerOtherAxle ').addClass('error');

               check = false;
               ver="TrailerOtherAxle";

           }

           if (TrailerMaxladenWeight  == "" || TrailerMaxladenWeight  == null) {

                $('#TrailerMaxladenWeight').addClass('error');

                check = false;
                ver="TrailerMaxladenWeight";

            } //edit by

           if (check == false) {

               console.log(ver);
               return false


           }



        }

        if (DesignationID  == null || DesignationID  == "") {

           $('#DesignationID').addClass('error');

           check = false;
           ver="DesignationID";

        }

        if (OfficerName  == null || OfficerName == "") {

           $('#OfficerName ').addClass('error');

           check = false;
           ver="OfficerName";

        }

        if (InspectionDate == "") {

           $('#InspectionDate').addClass('error');

           check = false;
           ver="InspectionDate";

        }

        if (Remarks == "") {

           $('#Remarks').addClass('error');

           check = false;
           ver="Remarks";

        }

        if (VerificationNo == "") {

           $('#VerificationNo').addClass('error');

           check = false;
           ver="VerificationNo";

        }

        if (VerificationDate == "") {

           $('#VerificationDate').addClass('error');

           check = false;
           ver="VerificationDate";

        }

        if (TribleVehicleDate == "") {

            $('#TribleVehicleDate').addClass('error');

            check = false;
            ver="TribleVehicleDate";

        }

        // if (isTribleVeh == "" || isTribleVeh == null) {

        //    $("#TribleType").css("display", "block");

        //    $("#TribleType").html("Select the trailer type");

        //    check = false;

        // }

        if (check == false) {

        $("#RecordId").css("display", "block");

        $("#RecordId").html(" *Fill the required field(s)");
        console.log(ver);
        return false;

        }     //edit by







        //edit by

        else {

        $("#RecordId").css("display", "None");

        }//edit by


            fileData.append("_token", _token,)

            fileData.append("ETO_CODE", ETO_CODE,)

            fileData.append("DivisionID", DivisionID,)

            fileData.append("Division", Division,)

            fileData.append("RegistrationMarkID", RegistrationMarkID,)

            fileData.append("ArrivalProvinceID", ArrivalProvinceID,)

            fileData.append("BookSerialno", BookSerialno,)

            fileData.append("DateofRegistration", DateofRegistration)

            fileData.append("LastTaxPaiddate", LastTaxPaiddate)

            fileData.append("ReportingDate", ReportingDate)

            fileData.append("LetterNo", LetterNo)

            fileData.append("LetterDate", LetterDate)

            fileData.append("OwnerTypeID", OwnerTypeID)

            fileData.append("OwnerTitleID", OwnerTitleID)

            fileData.append("OwnerName", ownerName)

            fileData.append("OldCnicNo", oldCnic)

            fileData.append("NewCnic", NewCnic)

            fileData.append("Guardian", guardianName)

            fileData.append("HouseNo", HouseNo)

            fileData.append("ProvinceID", ProvinceID)

            fileData.append("CityID", CityID)

            fileData.append("ArrivalCityID", ArrivalCityID)

            fileData.append("Telephone", Telephone)

            fileData.append("Mobile", Mobile)

            fileData.append("Email", Email)

            fileData.append("CategoryID", CategoryID)

            fileData.append("ManuFacturerID", ManuFacturerID)

            fileData.append("MakerClassification", MakerClassification)

            fileData.append("YearOfManufacture", YearOfManufacture)

            fileData.append("BodyTypeID", BodyTypeID)

            fileData.append("EngineCapacity", EngineCapacity)

            fileData.append("EngineUnit", EngineUnit)

            fileData.append("EngineNo", EngineNo)

            //fileData.append("IsSpecialNumber", isSpecialNo)

            fileData.append("ChassisNo", ChassisNo)

            fileData.append("ClassID", ClassID)

            fileData.append("NoofCylinder", NoofCylinder)

            fileData.append("SeatingCapacity", SeatingCapacity)

            fileData.append("UnladenWeight", UnladenWeight)

            fileData.append("ColorID", ColorID)

            fileData.append("RegNo", RegNo)

            fileData.append("IsTrailerVeh", IsTrailerVeh)

            fileData.append("TrailerBodyID", TrailerBodyID)

            fileData.append("TrailerUnladenWeight", TrailerUnladenWeight)

            fileData.append("TrailerAxleWeight", TrailerAxleWeight)

            fileData.append("TrailerUnitID", TrailerUnitID)

            fileData.append("Unit", Unit)

            fileData.append("TrailerFrontAxle", TrailerFrontAxle)

            fileData.append("TrailerRearAxle", TrailerRearAxle)

            fileData.append("TrailerOtherAxle", TrailerOtherAxle)

            fileData.append("TrailerMaxladenWeight", TrailerMaxladenWeight)

            fileData.append("DesignationID", DesignationID)

            fileData.append("OfficerName", OfficerName)

            fileData.append("InspectionDate", InspectionDate)

            fileData.append("Remarks", Remarks)

            fileData.append("VerificationNo", VerificationNo)

            fileData.append("VerificationDate", VerificationDate)

            fileData.append("IsTribleVeh", IsTribleVeh)

            fileData.append("TribleVehicleDate", TribleVehicleDate)

            fileData.append("wheelbox", wheelbox,)


            fileData.append("VehiclePrice", VehiclePrice)

            fileData.append("FueltypeID", FueltypeID)

            var getVal = ValidateDate(NewCnic, Mobile, Email);



            if (getVal == 1) {

                return false;

            }

            else {

                $.ajax({

                    url: '{{url("/")}}/Arrival',

                    contentType: false, // Not to set any content header

                    processData: false, // Not to process data

                    type: "POST",

                    dataType: "JSON",

                    data: fileData,


                    success: function (response) {



                        if (response.Status) {

                            swal({

                                title: "Record Registered!.",

                                type: "success",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: "OK",

                                closeOnConfirm: true

                            },

                                function (isConfirm) {

                                    window.location.href = "/Arrival";

                                    // LoadTable();

                                })

                        }

                        else if (response.Status == false) {

                            if (response.Data == 1) {

                                swal("ChassisNo  Already Exist");

                                $('#ChassisNo').addClass('error');

                               // $('#RegNo').addClass('error');

                            }

                            else if (response.Data == 2) {

                                swal(" RegNo Already Exist");

                               // $('#ChassisNo').addClass('error');

                                $('#RegNo').addClass('error');



                            }

                        }





                        else  {



                            swal(response.msg);

                        }











                    },

                });

            }

        // }

        // else {

        //     alert("Fill the Required fields!.");

        // }

    }



    function GetData(ID) {



           // var ID = ;



        $.ajax({

            url: '/DEO/GetArrivalList',

            type: "GET",

            dataType: "JSON",

            data: {ID:ID},

            success: function (response) {

                debugger

                if (response.Status) {



                    $('#ETO_CODE').val(response.Data[0].ETO_CODE);

                    var E_code = $('#ETO_CODE').val();

                    $.ajax({

                        type: "Get",

                        contentType: 'application/json; charset=utf-8',

                        url: "/DEO/LoadETOLoction",

                        dataType: 'json',

                        data: { E_code: E_code },

                        async: false,

                        success: function (response) {



                            //removeOptions(document.getElementById("slabID"));

                            if (response.Status == true) {

                                if (typeof response != 'undefined' && response != null && response != 0) {



                                    $('#Division').empty();

                                    $('#Division').append("<option value='0'>--Select District--</option>");

                                    $.each(response.Data, function (index, value) {

                                        //$('<option value="' + value.ID + '">' + value.NAME + '</option>').appendTo('#Division');

                                        $('<option value="' + value.eto_code + '">' + value.eto_location + '</option>').appendTo('#Division');

                                    });



                                }

                                else {



                                }

                            }

                            else {



                            }

                        },

                        error: function (response) {

                            swal(response.msg);

                            //Swal("Something went wrong");

                        }

                        });

                    $.ajax({

                        type: "Get",

                        contentType: 'application/json; charset=utf-8',

                        url: "/DEO/LoadDivisions",

                        dataType: 'json',

                        data: { E_code: E_code },

                        async: false,

                        success: function (response) {



                            //removeOptions(document.getElementById("slabID"));

                            if (response.Status == true) {

                                if (typeof response != 'undefined' && response != null && response != 0) {



                                    $('#Division').empty();

                                    $('#Division').append("<option value='0'>--Select District--</option>");

                                    $.each(response.Data, function (index, value) {

                                        //$('<option value="' + value.ID + '">' + value.NAME + '</option>').appendTo('#Division');

                                        $('<option value="' + value.id + '">' + value.Jurisdiction + '</option>').appendTo('#Division');

                                    });



                                }

                                else {



                                }

                            }

                            else {



                            }

                        },

                        error: function (response) {

                            swal(response.msg);

                            //Swal("Something went wrong");

                        }

                    });



                   // $('#DivisionID').val(response.Data[0].JurisdictionID);

                    $('#DivisionID').val(response.Data[0].DivisionID);

                    $('#RegistrationMarkID').val(response.Data[0].RegistrationMarkID);

                    $('#ArrivalProvinceID').val(response.Data[0].ArrivalProvinceID);

                    $.ajax({

                    type: "Get",

                    contentType: 'application/json; charset=utf-8',

                    url: "/DEO/LoadCity",

                    dataType: 'json',

                    data: { ProvinceID: $('#ArrivalProvinceID').val() },

                    async: false,

                    success: function (response) {



                        //removeOptions(document.getElementById("slabID"));

                        if (response.Status == true) {

                            if (typeof response != 'undefined' && response != null && response != 0) {



                                $('#ArrivalCityID').empty();

                                $('#ArrivalCityID').append("<option value='0'>--Select Name--</option>");

                                $.each(response.Data, function (index, value) {

                                    $('<option value="' + value.city_code + '">' + value.cities + '</option>').appendTo('#ArrivalCityID');

                                });





                            }

                            else {



                            }

                        }

                        else {



                        }

                    },

                    error: function (response) {

                        // alert("Something Went Wrong Please Try Again Letter....!");

                        console.log(response.msg);

                    }

                    });

                    $('#ArrivalCityID').val(response.Data[0].ArrivalCityID);

                    $('#BookSerialno').val(response.Data[0].BookSerialno);

                    $('#DateofRegistration').val(moment(response.Data[0].DateofRegistration).format('YYYY-MM-DD'));

                    $('#LastTaxPaiddate').val(moment(response.Data[0].LastTaxPaiddate).format('YYYY-MM-DD'));

                    $('#ReportingDate').val(moment(response.Data[0].ReportingDate).format('YYYY-MM-DD'));

                    $('#LetterNo').val(response.Data[0].LetterNo);

                    $('#LetterDate').val(moment(response.Data[0].LetterDate).format('YYYY-MM-DD'));

                    $('#OwnerTypeID').val(response.Data[0].OwnerTypeID);

                    $('#OwnerTitleID').val(response.Data[0].OwnerTitleID);

                    $('#OwnerName').val(response.Data[0].OwnerName);

                    $('#OldCnicNo').val(response.Data[0].OldCnicNo);

                    $('#NewCnicNo').val(response.Data[0].NewCnicNo);

                    $('#Guardian').val(response.Data[0].Guardian);

                    $('#HouseNo').val(response.Data[0].HouseNo);

                    $('#ProvinceID').val(response.Data[0].ProvinceID);

                    $.ajax({

                        type: "Get",

                        contentType: 'application/json; charset=utf-8',

                        url: "/DEO/LoadCity",

                        dataType: 'json',

                        data: { ProvinceID: $('#ProvinceID').val() },

                        async: false,

                        success: function (response) {



                            //removeOptions(document.getElementById("slabID"));

                            if (response.Status == true) {

                                if (typeof response != 'undefined' && response != null && response != 0) {



                                    $('#CityID').empty();

                                    $('#CityID').append("<option value='0'>--Select Name--</option>");

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

                            // alert("Something Went Wrong Please Try Again Letter....!");

                            console.log(response.msg);

                        }

                    });

                    $('#CityID').val(response.Data[0].CityID);

                    $('#Telephone').val(response.Data[0].Telephone);

                    $('#Mobile').val(response.Data[0].Mobile);

                    $('#Email').val(response.Data[0].Email);



                    $('#BodyTypeID').val(response.Data[0].BodyTypeID);

                    $.ajax({

                        type: "Get",

                        contentType: 'application/json; charset=utf-8',

                        url: "/DEO/LoadcategoryTypeAgainstBody",

                        dataType: 'json',

                        data: { BodyTypeID: $('#BodyTypeID').val() },

                        async: false,

                        success: function (response) {



                            //removeOptions(document.getElementById("slabID"));

                            if (response.Status == true) {

                                if (typeof response != 'undefined' && response != null && response != 0) {



                                    $('#CategoryID').val(response.Data.category_of_vehicle_id);



                                    //$('#CategoryID').empty();

                                    //$('#CategoryID').append("<option value='0'>--Select category--</option>");

                                    //$.each(response.Data, function (index, value) {

                                    //    $('<option value="' + value.ID + '">' + value.Name + '</option>').appendTo('#CategoryID');

                                    //});



                                }

                                else {



                                }



                            }

                            else {





                            }

                        },

                        error: function (response) {

                            // alert("Something Went Wrong Please Try Again Letter....!");

                            swal(response.msg);

                        }

                    });



                    $('#ManuFacturerID').val(response.Data[0].ManuFacturerID);

                    $('#MakerClassification').val(response.Data[0].MakerClassification);

                    $('#YearOfManufacture').val(response.Data[0].YearOfManufacture);

                    $('#CC').val(response.Data[0].EngineCapacity);

                    $('#EUnit').val(response.Data[0].EngineUnit);

                    $('#EngineNo').val(response.Data[0].EngineNo);

                    $('#ChassisNo').val(response.Data[0].ChassisNo);

                    $('#ClassID').val(response.Data[0].ClassID);

                    $('#NoofCylinder').val(response.Data[0].NoofCylinder);

                    $('#SeatingCapacity').val(response.Data[0].SeatingCapacity);

                    $('#UnladenWeight').val(response.Data[0].UnladenWeight);

                    $('#ColorID').val(response.Data[0].ColorID)

                    $('#RegNo').val(response.Data[0].RegNo)

                    $('#DesignationID').val(response.Data[0].DesignationID)

                    $('#OfficerName').val(response.Data[0].OfficerName)

                    $('#InspectionDate').val(moment(response.Data[0].InspectionDate).format('YYYY-MM-DD'));

                    $('#Remarks').val(response.Data[0].Remarks)

                    $('#VerificationNo').val(response.Data[0].VerificationNo)

                    $('#VerificationDate').val(moment(response.Data[0].VerificationDate).format('YYYY-MM-DD'));

                    $('#IsTrailerVeh').prop("checked", response.Data[0].IsTrailerVeh);

                    if ($('#IsTrailerVeh').is(":checked")) {

                        $('#TrailerBodyID').val(response.Data[0].TrailerBodyID)

                        $('#TrailerUnladenWeight').val(response.Data[0].TrailerUnladenWeight)

                        $('#TrailerAxleWeight').val(response.Data[0].TrailerAxleWeight)

                        $('#TrailerUnitID').val(response.Data[0].TrailerUnitID)

                        $('#TrailerFrontAxle').val(response.Data[0].TrailerFrontAxle)

                        $('#TrailerRearAxle').val(response.Data[0].TrailerRearAxle)

                        $('#TrailerOtherAxle').val(response.Data[0].TrailerOtherAxle)

                        $('#TrailerMaxladenWeight').val(response.Data[0].TrailerMaxladenWeight)

                    }

                    else {

                        $("#ShowDiv").css("display", "None");

                    }



                    if ($('#IsTribleVeh').is(":checked")) {

                      //  $('#TribleVehicleDate').val(moment(response.Data[0].TribleVehicleDate).format('YYYY-MM-DD'));

                    }



                }

                else {

                    swal("something went wrong")

                }

            }

        });



    }



    $("#CategoryID").change(function () {



        var CategoryID = $("#CategoryID").val();



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadBodyType",

            data: { CategoryID: CategoryID },

            dataType: 'json',

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#BodyTypeID').empty();

                        $('#BodyTypeID').append("<option value='0'>--Select BodyTypeID--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#BodyTypeID');

                        });



                    }

                    else {



                    }

                }

                else {





                }

            },

            error: function (response) {

                //alert("Something Went Wrong Please Try Again Letter....!");

                swal(response.msg);

            }

        });



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadTrailerBodyType",

            dataType: 'json',

            data: { "CategoryID": CategoryID},

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#TrailerBodyID').empty();

                        $('#TrailerBodyID').append("<option value='0'>--Select Trailer Body Type--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#TrailerBodyID');

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



    function UpdateArrival() {

        var Arrivalvalitade = $('#Arrivalform').valid();



        if (Arrivalvalitade) {



            var ID = $('#RecordId').val();

            var ETO_CODE = $('#ETO_CODE').val()

            var DivisionID = $('#DivisionID').val()

            var RegistrationMarkID = $('#RegistrationMarkID').val()

            var ArrivalProvinceID = $('#ArrivalProvinceID').val()

            var ArrivalCityID = $('#ArrivalCityID').val()


            var BookSerialno = $('#BookSerialno').val()

            var DateofRegistration = $('#DateofRegistration').val()

            var LastTaxPaiddate = $('#LastTaxPaiddate').val()

            var ReportingDate = $('#ReportingDate').val()

            var LetterNo = $('#LetterNo').val()

            var LetterDate = $('#LetterDate').val()

            var OwnerTypeID = $('#OwnerTypeID').val()

            var OwnerTitleID = $('#OwnerTitleID').val()

            var OwnerName = $('#OwnerName').val()

            var OldCnicNo = $('#OldCnicNo').val()

            var NewCnicNo = $('#NewCnicNo').val()

            var Guardian = $('#Guardian').val()

            var HouseNo = $('#HouseNo').val()

            var ProvinceID = $('#ProvinceID').val()

            var CityID = $('#CityID').val()

            var Telephone = $('#Telephone').val()

            var Mobile = $('#Mobile').val()

            var Email = $('#Email').val()

            var CategoryID = $('#CategoryID').val()

            var ManuFacturerID = $('#ManuFacturerID').val()

            var MakerClassification = $('#MakerClassification').val()

            var YearOfManufacture = $('#YearOfManufacture').val()

            var BodyTypeID = $('#BodyTypeID').val()

            var EngineCapacity = $('#CC').val()

            var EngineUnit = $('#EUnit').val()

            var EngineNo = $('#EngineNo').val()

            var ChassisNo = $('#ChassisNo').val()

            var ClassID = $('#ClassID').val()

            var NoofCylinder = $('#NoofCylinder').val()

            var SeatingCapacity = $('#SeatingCapacity').val()

            var UnladenWeight = $('#UnladenWeight').val()

            var ColorID = $('#ColorID').val()

            var RegNo = $('#RegNo').val()

            var IsTrailerVeh = $('#IsTrailerVeh').prop("checked")

            var TrailerBodyID = $('#TrailerBodyID').val()

            var TrailerUnladenWeight = $('#TrailerUnladenWeight').val()

            var TrailerAxleWeight = $('#TrailerAxleWeight').val()

            var TrailerUnitID = $('#TrailerUnitID').val()

            var TrailerFrontAxle = $('#TrailerFrontAxle').val()

            var TrailerRearAxle = $('#TrailerRearAxle').val()

            var TrailerOtherAxle = $('#TrailerOtherAxle').val()

            var TrailerMaxladenWeight = $('#TrailerMaxladenWeight').val()

            var DesignationID = $('#DesignationID').val()

            var OfficerName = $('#OfficerName').val()

            var InspectionDate = $('#InspectionDate').val()

            var Remarks = $('#Remarks').val()

            var VerificationNo = $('#VerificationNo').val()

            var VerificationDate = $('#VerificationDate').val()

            var IsTribleVeh = $('#IsTribleVeh').prop("checked")



            var TribleVehicleDate = $('#TribleVehicleDate').val()



            $.ajax({

                url: "/DEO/UpdateArrival",

                type: "POST",

                dataType: "JSON",

                data: {

                    ID: ID,

                    ETO_CODE: ETO_CODE,

                    DivisionID: DivisionID,

                    RegistrationMarkID: RegistrationMarkID,

                    ArrivalProvinceID: ArrivalProvinceID,

                    ArrivalCityID: ArrivalCityID,

                    BookSerialno: BookSerialno,

                    DateofRegistration: DateofRegistration,

                    LastTaxPaiddate: LastTaxPaiddate,

                    ReportingDate: ReportingDate,

                    LetterNo: LetterNo,

                    LetterDate: LetterDate,

                    OwnerTypeID: OwnerTypeID,

                    OwnerTitleID: OwnerTitleID,

                    OwnerName: OwnerName,

                    OldCnicNo: OldCnicNo,

                    NewCnicNo: NewCnicNo,

                    Guardian: Guardian,

                    HouseNo: HouseNo,

                    ProvinceID: ProvinceID,

                    CityID: CityID,

                    Telephone: Telephone,

                    Mobile: Mobile,

                    Email: Email,

                    CategoryID: CategoryID,

                    ManuFacturerID: ManuFacturerID,

                    MakerClassification: MakerClassification,

                    YearOfManufacture: YearOfManufacture,

                    BodyTypeID: BodyTypeID,

                    EngineCapacity: EngineCapacity,

                    EngineUnit: EngineUnit,

                    EngineNo: EngineNo,

                    ChassisNo: ChassisNo,

                    ClassID: ClassID,

                    NoofCylinder: NoofCylinder,

                    SeatingCapacity: SeatingCapacity,

                    UnladenWeight: UnladenWeight,

                    ColorID: ColorID,

                    RegNo: RegNo,

                    IsTrailerVeh: IsTrailerVeh,

                    TrailerBodyID: TrailerBodyID,

                    TrailerUnladenWeight: TrailerUnladenWeight,

                    TrailerAxleWeight: TrailerAxleWeight,

                    TrailerUnitID: TrailerUnitID,

                    TrailerFrontAxle: TrailerFrontAxle,

                    TrailerRearAxle: TrailerRearAxle,

                    TrailerOtherAxle: TrailerOtherAxle,

                    TrailerMaxladenWeight: TrailerMaxladenWeight,

                    DesignationID: DesignationID,

                    OfficerName: OfficerName,

                    InspectionDate: InspectionDate,

                    Remarks: Remarks,

                    VerificationNo: VerificationNo,

                    VerificationDate: VerificationDate,

                    IsTribleVeh: IsTribleVeh,

                    TribleVehicleDate: TribleVehicleDate

                },

                success: function (response) {

                    if (response.Status) {

                        //var msg = "";

                        swal({

                            title: "Updated Successfully!.",

                            type: "success",

                            showCancelButton: false,

                            confirmButtonColor: "#DD6B55",

                            confirmButtonText: "OK",

                            closeOnConfirm: true

                        },

                            function (isConfirm) {

                                window.location.href = "/DEO/Arrival";

                                // LoadTable();

                            })



                    }

                    else {

                        swal("something went wrong.")

                    }

                },

                error: function () {



                }

            });

        }



        else {

            alert("Fill the Required fields!.");

        }

    }

    function LoadFuelType() {

    $.ajax({

        type: "Get",

        contentType: 'application/json; charset=utf-8',

        url: "/DEO/LoadFuelType",

        dataType: 'json',

        async: false,

        success: function (response) {

            //removeOptions(document.getElementById("slabID"));

            if (response.Status == true) {

                if (typeof response != 'undefined' && response != null && response != 0) {



                    $('#FueltypeID').empty();

                    $('#FueltypeID').append("<option value='0'>--Select Fuel type --</option>");

                    $.each(response.Data, function (index, value) {

                        $('<option value="' + value.id + '">' + value.fuel_type + '</option>').appendTo('#FueltypeID');

                    });



                }

                else {



                }

            }

            else {



            }

        },

        error: function (response) {

            //alert("Something Went Wrong Please Try Again Letter....!");

            swal(response.msg);

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



                        $('#ETO_CODE').empty();

                        $('#ETO_CODE').append("<option value='0'>--Select ETO Name--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.eto_code + '">' + value.eto_name + '</option>').appendTo('#ETO_CODE');

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



    //$("#ETO_CODE").change(function () {

    //    //s var eto_location = $('#ETOLocation').val();

    //    var E_code = $('#ETO_CODE').val();

    //

    //    $.ajax({

    //        type: "Get",

    //        contentType: 'application/json; charset=utf-8',

    //        url: "/DEO/LoadDivisions",

    //        dataType: 'json',

    //        data: { E_code: E_code },

    //        async: false,

    //        success: function (response) {



    //            //removeOptions(document.getElementById("slabID"));

    //            if (response.Status == true) {

    //                if (typeof response != 'undefined' && response != null && response != 0) {



    //                    $('#DivisionID').empty();

    //                    $('#DivisionID').append("<option value='0'>--Select Division--</option>");

    //                    $.each(response.Data, function (index, value) {

    //                        //$('<option value="' + value.ID + '">' + value.NAME + '</option>').appendTo('#Division');

    //                        $('<option value="' + value.ID + '">' + value.NAME + '</option>').appendTo('#DivisionID');

    //                    });



    //                }

    //                else {



    //                }

    //            }

    //            else {



    //            }

    //        },

    //        error: function (response) {

    //            swal(response.msg);s

    //            //Swal("Something went wrong");

    //        }

    //    });

    //});



    function LoadBodyType() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadBodyType",

            dataType: 'json',

            async: false,

            /*data: { CategoryID: CategoryID, Location_Code: selectedETOLocation },*/

            //async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#BodyTypeID').empty();

                        $('#BodyTypeID').append("<option value='0'>--Select Body Type--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#BodyTypeID');

                        });



                    }

                    else {



                    }

                }

                else {





                }

            },

            error: function (response) {

                // alert("Something Went Wrong Please Try Again Letter....!");

                swal(response.msg);

            }

        });



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadTrailerBodyType",

            dataType: 'json',

            /*data: { "CatergoryId": CategoryID},*/

            //async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#TrailerBodyID').empty();

                        $('#TrailerBodyID').append("<option value='0'>--Select Trailer Body Type--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#TrailerBodyID');

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



                        $('#DivisionID').empty();

                        $('#DivisionID').append("<option value='0'>--Select Distict--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' +  value.eto_location + '</option>').appendTo('#DivisionID');

                        });



                    }

                    else {



                    }

                }

                else {



                }

            },

            error: function (response) {

                console.log(response.msg);

                swal("Something went wrong");

            }

        });

    }

    function LoadDivision() {
        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadDivisions",

            dataType: 'json',



            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#Division').empty();

                        $('#Division').append("<option value='0'>--Select Division--</option>");

                        $.each(response.Data, function (index, value) {

                            //$('<option value="' + value.ID + '">' + value.NAME + '</option>').appendTo('#Division');

                        $('<option value="' + value.id + '">' + value.Jurisdiction + '</option>').appendTo('#Division');

                        });



                    }

                    else {



                    }

                }

                else {



                }

            },

            error: function (response) {

                swal(response.msg);

            //Swal("Something went wrong");

            }

            });


    }



    $("#OwnerTypeID").change(function () {

        // debugger



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







    var ownerCounter = 1;

    function AddMoreOwner() {

        var a = '<div id="owner_' + ownerCounter + '">                                                                                                                                                                '

            + '    <div class="col-md-6">                                                                                                                                                        '

            + '        <div class="row form-group">                                                                                                                                              '

            + '            <div class="col-md-5"><label>Name</label></div>                                                                                                                       '

            + '            <div class="col-md-7"><input type="text" class="form-control" id="OwnerName" name="OwnerName" /></div>                                                                '

            + '        </div>                                                                                                                                                                    '

            + '    </div>                                                                                                                                                                        '

            + '    <div class="col-md-6">                                                                                                                                                        '

            + '        <div class="row form-group">                                                                                                                                              '

            + '            <div class="col-md-5"><label>Old CNIC No</label></div>                                                                                                                '

            + '            <div class="col-md-6">                                                                                                                                                '

            + '                <input type="text" data-inputmask=""mask":"99999-9999999-9"" placeholder="xxxxx-xxxxxxx-x" class="form-control oldcnic" id="oldCnicNo" name="oldCnic" />                    '

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

            + '                <input type="text" class="form-control newcnic" data-inputmask=""mask":"99999 - 9999999 - 9"" placeholder="xxxxx-xxxxxxx-x" id="newCnicNo" name="newCnic" />                    '

            + '                <span id="ExistnewCnic" style="color:red;display:none"></span>                                                                                                    '

            + '            </div>                                                                                                                                                                '

            + '        </div>                                                                                                                                                                    '

            + '    </div>                                                                                                                                                                        '

            + '    <div class="col-md-6">                                                                                                                                                        '

            + '        <div class="row form-group">                                                                                                                                              '

            + '            <div class="col-md-5"><label>Father or Husband Name</label></div>                                                                                                     '

            + '            <div class="col-md-6"><input type="text" class="form-control" id="Guardian" name="Guardian" /></div>                                                          '

            + '        </div>                                                                                                                                                                    '

            + '    </div>                                                                                                                                                                        '

            + '</div>                                                                                                                                                                            ';



        $('#OwnersAppended').append(a);

        ownerCounter++;



    }



    function RemoveOwner(a) {

        $('#owner_' + a).remove();

    }



    function ValidateInputN(id, event) {

        $('#' + id).keypress(function (e) {



            var regex = new RegExp("[^0-9.-]"); //for interger and float

            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

            if (!regex.test(str)) {

                return true;

            } else {

                event.preventDefault();

                // $('#' + id).val('');

                return false;

            }



        });





    }//end by fadii



    function ValidateInputNA(id, event) {

        $('#' + id).keypress(function (e) {



            var regex = new RegExp("^[^a-zA-Z0-9]+$");

            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

            if (!regex.test(str)) {

                return true;

            } else {

                event.preventDefault();

                // $('#' + id).val('');

                return false;

            }



        });





    }



</script>





                        </div>

                    </div>

                </div>

            </div>



            <!-- /page content -->





@endsection
