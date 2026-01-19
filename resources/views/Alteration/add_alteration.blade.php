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

        <h2>Add New Alteration</h2>

    </div>

</div>

<div class="panel panel-default mb-50 addnewpanl">

    <div class="panel-body ">

        <div style="padding: 20px" >
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

            <form id="Alterationform"  >
            @csrf
                <div class="row form-group">


                    <input type="hidden" name="red_id" id="reg_id" >
                    <div class="col-md-6">

                        <div class="row form-group ">

                            <div class="col-md-5"><label>ETO</label></div>

                            <div class="col-md-7">

                                <select class="form-control" id="ETO" name="ETO"><option></option></select>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-3"><label>District</label></div>

                            <div class="col-md-9"><select class="form-control pdl-30" id="DivisionID" name="DivisionID"></select></div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="row">

                            <div class="col-md-5"><label>Registration Number</label></div>

                            <div class="col-md-7"><input type="text" id="RegistrationNo" class="form-control" onkeypress="ValidateInputNA(this.id,event)" /></div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Alteration Code</label></div>

                            <div class="col-md-7"><input type="text" class="form-control" id="AltCode" name="AltCode"   /></div>

                        </div>

                    </div>

                    <div class="col-md-2">

                        <input type="button" class="btn btnSearch" id="Search" value="Search" onclick="SearchFor()" />

                        <input type="button" class="btn btnSearch" id="Clear" value="Clear" />

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

                            <div class="col-md-5"><label>Owner Name</label></div>

                            <div class="col-md-7">
                                <input type="text" class="form-control" id="OwnerName" name="OwnerName" />
                                <input type="hidden" class="form-control" id="father_or_husband_name" name="father_or_husband_name" />
                            </div>

                        </div>

                    </div>





                    <div class="col-md-6">

                        <div class="row form-group">

                            <div class="col-md-5"><label>Chassis No</label></div>

                            <div class="col-md-7"><input type="text" class="form-control" id="ChassisNo" name="ChassisNo" /></div>

                        </div>

                    </div>

                    <div class="col-md-6" id="CNICDiv">

                        <div class="row form-group">

                            <div class="col-md-5"><label>CNIC</label></div>

                            <div class="col-md-7"><input type="text" class="form-control" id="CNIC" name="CNIC" /></div>

                        </div>

                    </div>

                    <div class="col-md-6" id="NTNDiv" style="display:none">

                        <div class="row form-group">

                            <div class="col-md-5"><label>NTN</label></div>

                            <div class="col-md-7"><input type="text" class="form-control" id="NTN" name="NTN" disabled/></div>

                        </div>

                    </div>



                    <!--<div class="col-md-6">

            <div class="row form-group">

                <div class="col-md-5"><label>Color Of Vehicle</label></div>

                <div class="col-md-7"><select class="form-control" id="ColorID" name="ColorID"><option></option></select></div>-->



                    <!--</div>

            </div>-->



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

                    Alteration

                </h4>
                <div style="padding: 20px">
                    <div class="row form-group">



                        <h3 class="h4Vouchr">Color  Alteration</h3>

                        <div id="EngineAlteration">

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Color Of Vehicle</label></div>

                                    <div class="col-md-7"><select class="form-control" id="ColorID" name="ColorID"></select></div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>New Color Of Vehicle</label></div>

                                    <div class="col-md-7"><select class="form-control txtecount" id="NewColorID" name="NewColorID"><option ></option></select></div>

                                </div>

                            </div>

                            <h3 class="h4Vouchr">Fuel  Alteration</h3>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Fuel Type </label></div>

                                    <div class="col-md-7">

                                        <select class="form-control" id="FuelID" name="FuelID"></select>
                                        <input type="text" name="FuelNull" id="FuelNull" value="Not Assigned" class="form-control" disabled style="display:none">


                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>New Fuel Type</label></div>

                                    <div class="col-md-7"><select class="form-control txtecount" id="NewFuelID" name="NewFuelID"><option ></option></select></div>



                                </div>

                            </div>

                            <h2 class="h4Vouchr">Engine Alteration</h2>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Old Engine Number</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="EngineNo" name="EngineNo"></div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>New Engine Number</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="NewEngineNo" name="NewEngineNo"></div>

                                </div>

                            </div>

                            <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>Old Engine CC</label></div>
                                <div class="col-md-7">


                                <div class="input-group">

                                    <div class="input-group-addon">

                                    <select class="Dropdown" id="UnitCCold" onkeypress="ValidateInputN(this.id,event)" name="UnitCCold" readonly></select>

                                    </div>

                                    <input type="text" class="form-control" id="oldCC" maxlength="50" name="oldCC"  readonly />

                                </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>New Engine CC</label></div>

                                <div class="col-md-7">

                                <div class="input-group">

                                    <div class="input-group-addon">

                                    <select class="Dropdown" id="UnitCCnew" onkeypress="ValidateInputN(this.id,event)" name="UnitCCnew" readonly></select>

                                    </div>

                                    <input type="text" class="form-control" id="newCC" maxlength="50" name="newCC" />

                                </div>


                                </div>

                            </div>

                        </div>


                            <h2 class="h4Vouchr">Seating  Alteration</h2>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Old Seating Capacity </label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="SeatingID" name="SeatingID"></div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>New Seating Capacity</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="NewSeatingID" name="NewSeatingID"></div>

                                </div>

                            </div>

                            <h2 class="h4Vouchr">Wheel  Alteration</h2>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Old Number of Front Axles </label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="FrontAxle" name="FrontAxle" readonly></div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>New Number of Front Axles</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="NewFrontAxle" name="NewFrontAxle"></div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Old Number Rear Axles </label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="RearAxle" name="RearAxle" readonly></div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>New Number of Rear Axles</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="NewRearAxle" name="NewRearAxle"></div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Old Number Other Axles </label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="AnyOtherAxle" name="AnyOtherAxle" readonly></div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>New Number Other Axles</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="NewAnyOtherAxle" name="NewAnyOtherAxle"></div>

                                </div>

                            </div>



                        </div>

                        <h2 class="h4Vouchr">Body   Alteration</h2>





                        <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>Class Of Vehicle</label></div>

                                <div class="col-md-7"><select class="form-control" id="ClassID" name="ClassID"></select></div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>New Class Of Vehicle</label></div>

                                <div class="col-md-7"><select type="text" class="form-control" id="NewClassID" name="NewClassID"><option ></option></select></div>

                            </div>

                        </div>

                        <h2 class="h4Vouchr">Max Laden Weight   Alteration</h2>





                        <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>Max Laden Weight</label></div>
                                <div class="input-group">

                                    <div class="input-group-addon">

                                    <select class="Dropdown" id="Unit" onkeypress="ValidateInputN(this.id,event)" name="Unit" readonly></select>

                                    </div>

                                    <input type="text" class="form-control" id="laden_weigth" maxlength="50" name="laden_weigth" />

                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>New Max Laden Weight</label></div>

                                <div class="input-group">

                                    <div class="input-group-addon">

                                    <select class="Dropdown" id="NUnit" onkeypress="ValidateInputN(this.id,event)" name="NUnit"><option ></option></select>

                                    </div>

                                    <input type="text" class="form-control" id="new_laden_weigth" maxlength="50" name="new_laden_weigth" />

                                </div>

                            </div>

                        </div>

                        <h2 class="h4Vouchr">Eto Name  Alteration</h2>






                        <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Eto Name </label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="ETO_" name="ETO_" readonly></div>

                                </div>

                        </div>

                        <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>New Eto Name</label></div>

                                <div class="col-md-7">


                                    <select class="form-control txtecount" id="NewETO" name="NewETO"><option></option></select>

                                </div>

                            </div>

                        </div>

                        <h2 class="h4Vouchr">Register Number Alteration</h2>





                        <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>Old Number</label></div>
                                <div class="col-md-7">



                                    <input type="text" class="form-control" id="oldNumber" maxlength="50" name="oldNumber"  readonly />

                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>New Number</label></div>

                                <div class="col-md-7">



                                    <input type="text" class="form-control" id="newNumber" maxlength="50" name="newNumber" />

                                </div>

                            </div>

                        </div>


                        <h2 class="h4Vouchr">Division Alteration</h2>





                        <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>Division</label></div>
                                <div class="col-md-7">


                                    <select class="form-control pdl-30" id="division" name="division">
                                        <option></option>

                                        @if(auth()->id() == 61)
                                            @foreach(App\Models\jurisdiction::where('eto_location_id', auth()->user()->eto_location_id)->whereIn('Jurisdiction', ['nasirabad', 'JAFARABAD'])->get() as $jud)
                                                <option value="{{ $jud->id }}">{{ $jud->Jurisdiction }}</option>
                                            @endforeach
                                        @else
                                            @foreach(App\Models\jurisdiction::where('eto_location_id', auth()->user()->eto_location_id)->get() as $jud)
                                                <option value="{{$jud->id }}">{{$jud->Jurisdiction }}</option>
                                            @endforeach
                                        @endif
                                    </select>
{{--                                <select class="form-control pdl-30" id="division" name="division"><option></option>--}}
{{--                                 @foreach(App\Models\jurisdiction::where('eto_location_id', auth()->user()->eto_location_id)->get() as $jud)--}}
{{--                                        <option value="{{$jud->id }}">{{$jud->Jurisdiction }}</option>--}}
{{--                                    @endforeach</select>--}}

                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>New Division</label></div>

                                <div class="col-md-7">


                                <select class="form-control pdl-30" id="newDivision" name="newDivision">
                                    <option value="0" selected disabled>Select Jurisdiction</option>
                                    @foreach(App\Models\jurisdiction::where('eto_location_id', auth()->user()->eto_location_id)->get() as $jud)
                                        <option value="{{$jud->id }}">{{$jud->Jurisdiction }}</option>
                                    @endforeach
                                </select>

                                </div>

                            </div>

                        </div>






                        <div class="col-md-6">

                            <div class="row form-group">

                                <div class="col-md-5"><label>Alteration Date</label></div>

                                <div class="col-md-7"><input type="date" class="form-control" id="AlterationDate" name="AlterationDate" /></div>

                            </div>

                        </div>



                    </div>

                    <div class="row form-group">

                        <div class="col-md-3">

                        <input type="hidden" id="RecordId" name="RecordId" value="@if(isset($id)){{$id}}@endif" />

                        </div>

                        <div class="col-md-6 text-center">



                            <a href="{{url('/alteration')}}" >  <button type="button" class="btn btnCancel">CANCEL</button></a>



                            <a class="btn btnCustom" id="Operation" onclick="SaveAlteration();">SUBMIT</a>

                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>

</div>



<script>

    $("#Clear").click(function () {

        // LoadBookTypes();

        $('#ApplicationFor').removeClass('error');

        $('#DistrictID').removeClass('error');

        $('#RegistrationNo').removeClass('error');

         $("#ETO").val('0');

        $("#RegistrationNo").val('');

        $("#ChassisNo").val('');

        $("#CategoryID").val('0');

        $("#ClassID").val('0');

        $("#BodyTypeID").val('0');

        $("#OwnerName").val('');

        $("#CNIC").val('');

        $("#ConvertionDate").val('mm/dd/yyyy');

        $("#NewCategoryID").val('0');

        $("#NewBodyType").val('0');

        $("#NewClassVehicle").val('0');

        $("#ColorID").val('');

        $("#EngineID").val('');

        $("#SeatingID").val('');

        $("#FrontAxle").val('');

        $("#RearAxle").val('');

        $('#FuelID').val('0')

        $("#NewRearAxle").val('');

        $("#AnyOtherAxle").val('');

        $("#NewAnyOtherAxle").val('');

        $("#NewClassID").val('0');

        $("#NewFuelID").val('0');

        $("#NewEngineNo").val('');

        $("#NewSeatingID").val('');

        $("#NewFrontAxle").val('');

        $("#OldOwnerHouseNo").val('');

        $("#new_laden_weigth").val('');

    });

    $('#AlterationTypeID').on('change', function () {

        var a = $('#AlterationTypeID').val();

        if (a == 10) {

            $('#SimpleAlteration').css('display', 'block');

            $('#EngineAlteration').css('display', 'none');

            $('#BodyAlteration').css('display', 'none');

        } else if (a == 11) {

            $('#BodyAlteration').css('display', 'none');

            $('#EngineAlteration').css('display', 'block');

            $('#SimpleAlteration').css('display', 'none');

        } else if (a == 13) {

            $('#SimpleAlteration').css('display', 'none');

            $('#BodyAlteration').css('display', 'block');

            $('#EngineAlteration').css('display', 'none');

        } else if (a == 0) {

            $('#SimpleAlteration').css('display', 'none');

            $('#BodyAlteration').css('display', 'none');

            $('#EngineAlteration').css('display', 'none');

        }

    });

</script>

<script>

    /*var count = 0;*/

    $(document).ready(function () {



        $("#OwnerName").prop("disabled", true)

        $("#CategoryID").prop("disabled", true)

        $("#VehicleName").prop("disabled", true)

        $("#BodyTypeID").prop("disabled", true)

        $("#ClassID").prop("disabled", true)

        $("#MobileNumber").prop("disabled", true)

        $("#CNIC").prop("disabled", true)

        $('#ChassisNo').prop("disabled", true);

        $('#ColorID').prop("disabled", true);

        $('#FuelID').prop("disabled", true);

        $('#EngineNo').prop("disabled", true);

        $('#SeatingID').prop("disabled", true);

        $('#FrontAxle').prop("disabled", true);

        $('#RearAxle').prop("disabled", true);

        $('#AnyOtherAxle').prop("disabled", true);

        $('#ChassisNo').prop("disabled", true);

        $('#AltCode').prop("disabled", true);

        $("#laden_weigth").prop("disabled", true);

        $("#Unit").prop("disabled", true);

        $("#ETO_").prop("disabled", true);

        $("#oldNumber").prop("disabled", true);

        $("#division").prop("disabled", true);


        LoadETOLocation();

        LoadETO();

        Unit();

        LoadUnitsCC();

        // LoadDivisions();

        //LoadRegistrationMark();

        // LoadAlterationType();

        /*LoadVehicleCategory();*/

        LoadBodyType();

        LoadNewBodyType();

        LoadColors();

        LoadColorsNew();

        LoadVehicleType();

        /*LoadVehicleCategoryNew();*/

        LoadVehicleTypeNew();

        LoadFuelType();

        LoadNewFuelType();

        LoadnewDivisions()


        var value = $('#RecordId').val();

        if (value != "") {

            GetData(value);

            //GetDocumentData(value);

            $("#Operation").attr("onclick", "SaveAlteration()").unbind("click");

            $("#Operation").attr("onclick", "UpdateAlteration()").bind("click");

            $("#Operation").text('Update');

            $("#Search").prop("disabled", true);

            $("#Clear").prop("disabled", true);

            $("#RegistrationNo").prop("disabled", true);

            $("#DivisionID").prop("disablzed", true);

            $('#RegistrationNo').prop("disabled", true);

        }

    });

</script>

<script>

    $("#NewColorID").on('onchange()', function () {

        doSomething();

    })





    function LoadDivisions() {

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/ETOLocation",

            dataType: 'json',

            async: false,

            success: function (response) {

                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {

                        $('#DivisionID').empty();



                        $('#DivisionID').append("<option value='0' selected>--Select Division--</option>");



                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.eto_location + '</option>').appendTo('#DivisionID');





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

    function LoadnewDivisions() {

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


                        $('#division').empty();

                        $('#newDivision').empty();


                        $('#division').append("<option value='0' selected>--Select Division--</option>");

                        $('#newDivision').append("<option value='0' selected>--Select Division--</option>");

                        $.each(response.Data, function (index, value) {


                            $('<option value="' + value.id + '">' + value.Jurisdiction + '</option>').appendTo('#division');

                            $('<option value="' + value.id + '">' + value.Jurisdiction + '</option>').appendTo('#newDivision');



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


    function LoadUnitsCC() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadEUnit",

            dataType: 'json',

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#UnitCCold').empty();

                        $('#UnitCCnew').empty();

                        $('#UnitCCold').append("<option value='0'>Unit</option>");

                        $('#UnitCCnew').append("<option value='0'>Unit</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.unit + '</option>').appendTo('#UnitCCold');

                            $('<option value="' + value.id + '">' + value.unit + '</option>').appendTo('#UnitCCnew');

                        });

                        $('#UnitCCold').val(2);

                        $('#UnitCCnew').val(2);

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

            dataType: 'json',

            async: false,

            success: function (response) {

                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {

                        $('#BodyTypeID').empty();

                        $('#BodyTypeID').append("<option value='0' selected>--Select Body Type--</option>");

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

    function LoadColors() {

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadColor",

            dataType: 'json',

            async: false,

            success: function (response) {

                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {

                        $('#ColorID').empty();

                        $('#ColorID').append("<option value='-1'>--Not Assigned--</option>");

                        $('#ColorID').append("<option value='0' selected>--Select Color--</option>");

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

    function LoadColorsNew() {

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadColor",

            dataType: 'json',

            async: false,

            success: function (response) {

                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {

                        $('#NewColorID').empty();

                        $('#NewColorID').append("<option value='0' selected>--Select Color--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.colors + '</option>').appendTo('#NewColorID');

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

                        $('#ClassID').append("<option value='0' selected>--Select Vehicle Class--</option>");

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

</script>





<script src="/Scripts/jquery.inputmask.bundle.js"></script>

<script>

    function SearchFor() {

             //   debugger

                var DivisionID = $('#DivisionID ').val();

                var Regno = $('#RegistrationNo').val().trim();

                var eto = $('#ETO').val();

                var check = true;

                if (DivisionID == 0) {

                    $('#DivisionID').addClass('error');

                    check = false;

                }

                if (Regno == null || Regno == "") {

                    $('#RegistrationNo').addClass('error');

                    check = false;

                }

                if (eto == 0) {

                    $('#ETO').addClass('error');

                    check = false;

                }

                if (check == false) {

                    swal("Please fill the search criteria.");



                    $("#RegistrationNo").val('');

                    return false;

                }

                else {

                    // var getVal = ValidateCode(DivisionID, Regno);



                    //$("#DivisionRegion").css("display", "None");

                    $('#DivisionID').removeClass('error');

                    $('#RegistrationNo').removeClass('error');

                    $.ajax({

                        type: "Get",

                        contentType: 'application/json; charset=utf-8',

                        url: "/DEO/getVehicleInfoagainstId",

                        dataType: 'json',

                        data: { RegNo: Regno, DistrictID: DivisionID , ETO_CODE : eto , type: "Alter"},

                        async: false,

                        success: function (response) {

                            if (response.Status == true) {


                                console.log(response);

                                $('#OwnerName').val(response.Data.name_ !="" ? response.Data.name_ : "Not Assigned");

                                // $('#BodyTypeID').val(response.VehicleInfo.BodyTypeID);
                                $("#father_or_husband_name").val(response.Data.father_or_husband_name );
                                $("#reg_id").val(response.Data.id );


                                $("#AltCode").val(response.alter_c );

                                $('#CategoryID').val(response.Data.category_of_vehicle_id !="" ? response.Data.category_of_vehicle_id : "-1");

                                $('#ClassID').val(response.Data.class_of_vehicle_id !="" ? response.Data.class_of_vehicle_id : "-1");


                                $.ajax({

                                    type: "Get",

                                    contentType: 'application/json; charset=utf-8',

                                    url: "/DEO/LoadBodyType",

                                    dataType: 'json',

                                    data: { CategoryID: $('#CategoryID').val() },

                                    async: false,

                                    success: function (response) {

                                        //removeOptions(document.getElementById("slabID"));

                                        if (response.Status == true) {

                                            if (typeof response != 'undefined' && response != null && response != 0) {

                                                $('#BodyTypeID').empty();

                                                $('#BodyTypeID').append("<option value='0' selected>--Select Body Type--</option>");

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

                                $('#BodyTypeID').val(response.Data.type_of_body !="" ? response.Data.type_of_body : "Not Assigned");

                                $.ajax({

                                    type: "Get",

                                    contentType: 'application/json; charset=utf-8',

                                    url: "/DEO/LoadCategory",

                                    data: { BodyTypeID: $('#BodyTypeID').val() },

                                    dataType: 'json',

                                    async: false,

                                    success: function (response) {

                                        //removeOptions(document.getElementById("slabID"));

                                        if (response.Status == true) {

                                            if (typeof response != 'undefined' && response != null && response != 0) {

                                                $('#CategoryID').empty();

                                                $('#CategoryID').append("<option value='0' selected>--Select Category--</option>");

                                                $.each(response.Data, function (index, value) {

                                                    $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#CategoryID');

                                                });

                                            }

                                            else {

                                            }

                                            $('#CategoryID').val(response.Data[0].ID);

                                        }

                                        else {

                                        }

                                    },

                                    error: function (response) {

                                        //alert("Something Went Wrong Please Try Again Letter....!");

                                        swal(response.msg);

                                    }

                                });

                                $('#ChassisNo').val(response.Data.chassis_no !="" || response.Data.chassis_no !=null ? response.Data.chassis_no : "Not Assigned");

                                // $('#DistrictID').val(response.VehicleInfo.Districts);

                                $('#EngineNo').val(response.Data.engine_no !="" || response.Data.engine_no !=null ? response.Data.engine_no : "Not Assigned");

                                $('#oldCC').val(response.Data.engine_capacity !="" || response.Data.engine_capacity !=null ? response.Data.engine_capacity : "Not Assigned");

                                ////$('#VehicleClass').val(response.Data[0].VehicleClassID);

                                ////$('#Category').val(response.Data[0].CategoryID);

                                $("#ColorID").val(response.Data.color_of_vehicle_id !="" || response.Data.color_of_vehicle_id !=null ? response.Data.color_of_vehicle_id : "-1");

                                ////$("#EngineID").val(response.Data.EngineNo);

                                $("#SeatingID").val(response.Data.seating_capacity !="" || response.Data.seating_capacity !=null ? response.Data.seating_capacity : "Not Assigned");

                                if(response.Data2!=null)
                                {

                                    $("#FrontAxle").val(response.Data2.front_axle !="" || response.Data2.front_axle !=null ? response.Data2.front_axle : "Not Assigned");

                                    $("#RearAxle").val(response.Data2.rear_axle !="" || response.Data2.rear_axle !=null ? response.Data2.rear_axle : "Not Assigned");

                                    $("#AnyOtherAxle").val(response.Data2.any_other_axle !="" || response.Data2.any_other_axle !=null ? response.Data2.any_other_axle : "Not Assigned");

                                    $("#Unit").val(response.Data2.unit_code !="" || response.Data2.unit_code !=null ? response.Data2.unit_code : "Not Assigned");

                                }
                                else
                                {
                                    $("#laden_weigth").val( "Not Assigned");

                                    $("#FrontAxle").val( "Not Assigned");

                                    $("#RearAxle").val( "Not Assigned");

                                    $("#AnyOtherAxle").val("Not Assigned");

                                    $("#Unit").val( "0");


                                }

                                if(response.Data3!=null)
                                {
                                    $("#RegATAxleFrontAxle").val(response.Data3.tyre_front_axle !="" || response.Data3.tyre_front_axle !=null ? response.Data3.tyre_front_axle : "Not Assigned");

                                    $("#RegATAxleRearAxle").val(response.Data3.tyre_rear_axle !="" || response.Data3.tyre_rear_axle !=null ? response.Data3.tyre_rear_axle : "Not Assigned");

                                    $("#RegATAxleOtherAxle").val(response.Data3.tyre_any_other_axle !="" || response.Data3.tyre_any_other_axle !=null ? response.Data3.tyre_any_other_axle : "Not Assigned");

                                    $("#laden_weigth").val(response.Data3.max_lan_weight !="" || response.Data3.max_lan_weight !=null ? response.Data3.max_lan_weight : "Not Assigned");

                                }
                                else
                                {
                                    $("#RegATAxleFrontAxle").val( "Not Assigned");

                                    $("#RegATAxleRearAxle").val( "Not Assigned");

                                    $("#RegATAxleOtherAxle").val( "Not Assigned");
                                }






                                $("#ETO_").val(response.Data.eto_name_id !="" || response.Data.eto_name_id !=null ? response.Data.eto_name_id : "Not Assigned");

                                $("#RegNo").val(response.Data.registration_no !="" || response.Data.registration_no !=null? response.Data.registration_no : "Not Assigned");

                                if(response.Data.fuel_type_id =="" || response.Data.fuel_type_id ==null)
                                {
                                    $('#FuelID').hide();
                                    $('#FuelNull').show();

                                }
                                else
                                {
                                    $('#FuelNull').hide();
                                    $('#FuelID').show();
                                    $('#FuelID').val(response.Data.fuel_type_id );
                                }


                                if(response.Data.owner_type_id == 4)
                                {
                                    $('#CNICDiv').hide();

                                    $('#NTNDiv').show();


                                    $('#NTN').val(response.Data.ntn_no !="" || response.Data.ntn_no !=null ? response.Data.ntn_no : 'Not Assigned');

                                }
                                else
                                {
                                    $('#NTNDiv').hide();

                                    $('#CNICDiv').show();

                                    $('#CNIC').val(response.Data.new_cnic_no !="" || response.Data.new_cnic_no !=null ? response.Data.new_cnic_no : response.Data.old_cnic_no );

                                }


                                $('#MobileNumber').val(response.Data.mobile_no !="" || response.Data.mobile_no !=null ? response.Data.mobile_no : "Not Assigned");

                                $('#oldNumber').val(response.Data.registration_no !="" || response.Data.registration_no !=null ? response.Data.registration_no : "Not Assigned");

                                $('#division').val(response.Data.Jurisdiction_id !="" || response.Data.Jurisdiction_id !=null ? response.Data.Jurisdiction_id : "-1");




                            }

                            else if(response.Status == 'error') {



                            swal(response.msg);

                            }


                            else {



                                swal("Record not Found.");

                            }

                        },

                        error: function (response) {

                            swal("Something went wrong");

                        }

                    });

                }

            }

            //$("#Alterationform").validate({

            //    rules: {

            //        "DivisionID": {

            //            required: true,

            //            Dropdown: true,

            //        },

            //        "RegistrationMarkID": {

            //            required: true,

            //            Dropdown: true,

            //        },

            //        "AlterationTypeID": {

            //            required: true,

            //            Dropdown: true,

            //        },

            //        "AlterationCode"       :{ required:true,},

            //        "OwnerName"            :{ required:true,},

            //        "CategoryID": {

            //            required: true,

            //            Dropdown: true,

            //        },

            //        "BodyTypeID": {

            //            required: true,

            //            Dropdown: true,

            //        },

            //        "ChassisNo"            :{ required:true,},

            //        "EngineNo"             :{ required:true,},

            //        "NewColorID": {

            //            required: true,

            //            Dropdown: true,

            //        },

            //        "NewFuelID": {

            //            required: true,

            //            Dropdown: true,

            //        },

            //        "NewEngineNo": { required: true, },

            //        "NewSeatingID": { required: true, },

            //        "NewFrontAxle": { required: true, },

            //        "NewRearAxle": { required: true, },

            //        "NewAnyOtherAxle": { required: true, },

            //        "NewCategory": {

            //            required: true,

            //            Dropdown: true,

            //        },

            //        "NewClassID": {

            //            required: true,

            //            Dropdown: true,

            //        },

            //        "NewBodyTypeID": {

            //            required: true,

            //            Dropdown: true,

            //        },

            //        "ClassID": {

            //            required: true,

            //            Dropdown: true,

            //        },

            //        "VehicleNumber"        :{ required:true,},

            //       //"NewEngineNo"          :{ required:true,},

            //        "AlterbodyFrom"        :{ required:true,},

            //        "AlterBodyto"          :{ required:true,},

            //        "AlterSimplefrom"      :{ required:true,},

            //        "AlterSimpleto"        :{ required:true,},

            //        "AlterationDate": { required: true, },

            //        "AlterSimplefrom": {

            //        },

            //        "AlterSimpleto": {

            //        },

            //    },

            //    messages: {

            //    },

            //    errorClass: "error",

            //    errorElement: "em",

            //    errorPlacement: function (error, element) {

            //        return false;

            //    },

            //    submitHandler: function (form) { // for demo

            //        return false; // for demo

            //    }

            //});

            //$.validator.addMethod("Dropdown", function (value, element) {

            //    return this.optional(element) || value > 0;

            //}, "You must select at least one");

            //$.validator.addMethod("Alterationtype", function (value, element) {

            //    return (value == "Simple Alteration" || value == "Engine Alteration" || value == "Body Alteration");

            //}, "You must select at least one");

    function SaveAlteration() {

        // var Alterationvalitade = $('#Alterationform').valid();

      //  debugger

            var _token= $("input[name='_token']").val();

            var ETO = $('#ETO').val();

            var DivisionID = $('#DivisionID').val();

            var RegistrationNo = $('#RegistrationNo').val();

            var OwnerName = $('#OwnerName').val();
            var father_or_husband_name = $('#father_or_husband_name').val();

            var ChassisNo = $('#ChassisNo').val();

            var CNIC = $('#CNIC').val();

            var ColorID = $('#ColorID').val();

            var NewColorID = $('#NewColorID').val(); //1

            var FuelID = $('#FuelID').val();

            var NewFuelID = $('#NewFuelID').val(); //2

            var EngineID = $('#EngineID').val();

            var NewEngineNo = $('#NewEngineNo').val(); //3

            var SeatingID = $('#SeatingID').val();

            var NewSeatingID = $('#NewSeatingID').val(); //4

            var FrontAxle = $('#FrontAxle').val();

            var NewFrontAxle = $('#NewFrontAxle').val(); //5.1

            var RearAxle = $('#RearAxle').val();

            var NewRearAxle = $('#NewRearAxle').val(); //5.2

            var AnyOtherAxle = $('#AnyOtherAxle').val();

        var NewAnyOtherAxle = $('#NewAnyOtherAxle').val(); //5.3

            // var CategoryID = $('#CategoryID').val();

            // var NewCategory = $('#NewCategory').val();

            var ClassID = $('#ClassID').val();

            var NewClassID = $('#NewClassID').val();    //6

        //     var BodyTypeID = $('#BodyTypeID').val();

        //     var NewBodyTypeID = $('#NewBodyTypeID').val(); //7

        //     var RegATAxleFrontAxle = $("#RegATAxleFrontAxle").val();

        //     var RegATAxleRearAxle  = $("#RegATAxleRearAxle").val();

        //     var RegATAxleOtherAxle = $("#RegATAxleOtherAxle").val();

        // var NewRegATAxleFrontAxle = $("#NewRegATAxleFrontAxle").val();  //8.1

        // var NewRegATAxleRearAxle = $("#NewRegATAxleRearAxle").val();    //8.2

        // var NewRegATAxleOtherAxle = $("#NewRegATAxleOtherAxle").val();    //8.3

        var AlterationDate = $('#AlterationDate').val();

        var unit= $('#Unit').val();

        var laden= $('#laden_weigth').val();

        var newunit= $('#NUnit').val();

        var newladen= $('#new_laden_weigth').val();

        var NewETO= $('#NewETO').val();

        var newNumber= $('#newNumber').val();

        var Division= $('#division').val();

        var newDivision= $('#newDivision').val();

        var reg_id = $("#reg_id").val();

        var newCC = $("#newCC").val();

        var UnitCCnew = $("#UnitCCnew").val();


    //    debugger

        var count=0;

        if (NewColorID != null && NewColorID != "0" && NewColorID != 0 ) {

            count = count+ 1;

        }

        if (NewFuelID != null && NewFuelID != "0" && NewFuelID != 0) {

            count = count + 1;

        }

        if (NewEngineNo != "") {

            count = count + 1;

        }

        if (newCC != "") {

            count = count + 1;

            }

        if (NewSeatingID != "") {

            count = count + 1;

        }

        if (NewFrontAxle != "" && NewRearAxle != "" && NewAnyOtherAxle != "") {

            count = count + 1;

        }

        if (NewClassID != "") {

            count = count + 1;

            }

        // if (NewRegATAxleFrontAxle != "" && NewRegATAxleRearAxle != "" && NewRegATAxleOtherAxle != "") {

        //     count = count + 1;

        // }

        if (newladen != "") {

            count = count + 1;

            }

        if (NewETO != "") {

            count = count + 1;

            }

        if (newNumber != "") {

        count = count + 1;

        }

        if (newDivision != "") {

        count = count + 1;

        }


        $('#AlterationNumber').val(count);

     //   debugger



                //window.location.href = "../DEO/Alter";

                // LoadTable();



        var AltCode = $('#AltCode').val();

        if (ETO != '0' && DivisionID != '0' && RegistrationNo != "") {

            if (NewColorID != "0" || NewFuelID != "0" || NewEngineNo != "" || NewSeatingID != "" || NewFrontAxle != "" || NewRearAxle != "" || NewAnyOtherAxle != "" || NewClassID != "0" || newCC !="" || newNumber!="" || NewETO!="") {

                //swal({

                //    title: count + " Number of Alteration ",

                //    type: "success",

                //    showCancelButton: true,

                //    confirmButtonColor: "#DD6B55",

                //    confirmButtonText: "OK",

                //    closeOnConfirm: true

                //}

                     swal({

                         title:  count + " Number of Alteration",



                         type: "success",

                         showCancelButton: true,

                         confirmButtonColor: '#DD6B55',

                         confirmButtonText: 'Yes, I am sure!',

                         cancelButtonText: "No, cancel it!",

                         closeOnConfirm: false,

                         closeOnCancel: true,

                     },



                         function (isConfirm) {

                             if (isConfirm) {





                                 $.ajax({

                                     url: "/alteration",

                                     contentType: "application/json; charset=utf-8",

                                     type: "POST",

                                     dataType: "JSON",

                                     data: JSON.stringify({

                                        _token: _token,

                                        reg_id : reg_id,

                                         ETO_CODE: ETO,

                                         DivisionID: DivisionID,

                                         RegistrationNo: RegistrationNo,

                                         OwnerName: OwnerName,

                                         father_or_husband_name: father_or_husband_name,

                                         ChasisNo: ChassisNo,

                                         CNIC: CNIC,

                                         ColorID: ColorID,

                                         NewColorID: NewColorID,

                                         FuelID: FuelID,

                                         NewFuelID: NewFuelID,

                                         EngineID: EngineID,

                                         NewEngineNo: NewEngineNo,

                                         newCC : newCC,

                                         SeatingID: SeatingID,

                                         NewSeatingID: NewSeatingID,

                                         FrontAxle: FrontAxle,

                                         NewFrontAxle: NewFrontAxle,

                                         RearAxle: RearAxle,

                                         NewRearAxle: NewRearAxle,

                                         AnyOtherAxle: AnyOtherAxle,

                                         NewAnyOtherAxle: NewAnyOtherAxle,

                                        //  CategoryID: CategoryID,

                                        //  NewCategory: NewCategory,

                                         ClassID: ClassID,

                                         NewClassID: NewClassID,

                                        //  BodyTypeID: BodyTypeID,

                                        //  NewBodyTypeID: NewBodyTypeID,

                                         AlterationDate: AlterationDate,

                                         ALT_CODE: AltCode,

                                         unit: Unit ,

                                        laden : laden ,

                                        newunit : newunit ,

                                        newladen : newladen ,

                                        NewETO : NewETO ,

                                        newNumber : newNumber ,

                                        Division : Division,

                                        newDivision : newDivision,

                                        //  RegATAxleFrontAxle: RegATAxleFrontAxle,

                                        //  RegATAxleRearAxle: RegATAxleRearAxle,

                                        //  RegATAxleOtherAxle: RegATAxleOtherAxle,

                                        //  NewRegATAxleFrontAxle: NewRegATAxleFrontAxle,

                                        //  NewRegATAxleRearAxle: NewRegATAxleRearAxle,

                                        //  NewRegATAxleOtherAxle: NewRegATAxleOtherAxle,


                                         count:count,

                                     }),

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

                                                     window.location.href = "/alteration";

                                                     // LoadTable();

                                                 })

                                         }

                                         else {

                                             swal(response.msg);

                                         }

                                     },

                                 }

                                 );

                             }

                             else {

                                 swal('Try agian');



                             }

                         }) //end funtion isconfrom

            }

            else {

                var Alterationvalitade = $('#Alterationform').valid();

                swal("select atleast 1 Alteration ");

                return false;

            }

        }

        else {

            swal("Please Fill the Search criteria! ");

                }



    }

        //if (NewColorID == 0 && NewFuelID == 0)

        //    else if (NewEngineNo == "" && NewSeatingID == "")

        //    else if (NewFrontAxle == "" && NewRearAxle == "")

        //    else if (NewAnyOtherAxle == "")

        //    else if (NewClassID == 0 || NewBodyTypeID == 0 || NewCategory == 0)

        //{

        //    return false;

        //}

        ////else if (NewEngineNo == "" || NewSeatingID == "") { return false; }

        ////else if (NewFrontAxle == "" || NewRearAxl == "") { return false; }

        ////else if (NewAnyOtherAxle == "") { return false;}

        ////else if (NewClassID == 0 || NewBodyTypeID == 0 || NewCategor == 0) { return false; }

        ////    swal("SELECT ONE ATERATION PLEAS ")

        ////    return false;

        ////}

        //var EngineNo = $('#EngineNo').val();

        //var VehicleNumber = $('#VehicleNumber').val();

        //var AlterbodyFrom = $('#AlterbodyFrom').val();

        //var AlterBodyto = $('#AlterBodyto').val();

        //var AlterSimplefrom = $('#AlterSimplefrom').val();

        //var AlterSimpleto = $('#AlterSimpleto').val();

        //var getVal = ValidateCode(ChassisNo);

        //if (getVal == 1) {

        //    $('#ChassisNo').addClass('error');

        //    //$("#RecordId").css("display", "block");

        //    //$("#RecordId").html(" *Chassis Number  Already  Exist");

        //    swal("*Chassis number already exist")

        //    return false;

        //}

        function GetData(ID) {

            // var ID = ;


        }


        function LoadVehicleCategoryNew() {

            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadCategory",

                dataType: 'json',

                async: false,

                success: function (response) {

                    //removeOptions(document.getElementById("slabID"));

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {

                            $('#NewCategory').empty();

                            $('#NewCategory').append("<option value='0'>--Select Category--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.ID + '">' + value.Name + '</option>').appendTo('#NewCategory');

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

        function LoadVehicleTypeNew() {

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

                            $('#NewClassID').empty();

                            $('#NewClassID').append("<option value='0'>--Select Vehicle Class--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.class_of_vehicle + '</option>').appendTo('#NewClassID');

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

        //function ValidateCode(ChassisNo) {

        //    var stat = null;

        //

        //    $.ajax({

        //        url: '/DEO/CheckChassisNo',

        //        type: "GET",

        //        dataType: "JSON",

        //        async: false,

        //        data: { Name: ChassisNo },

        //        success: function (response) {

        //            if (response.Status) {

        //                //var msg = "";

        //                if (response.errorcode == 1) {

        //                    $("#ChassisNo").css("display", "block");

        //                    $("#ChassisNo").html(" chassis number exist");

        //                    stat = 1;

        //                }

        //                else {

        //                    stat = 0;

        //                }

        //            }

        //        }

        //    });

        //    return stat;

        //}

    function LoadNewBodyType()

    {

            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadBodyType",

                dataType: 'json',

                /*data: { CategoryID: CategoryID },*/

                async: false,

                success: function (response) {

                    //removeOptions(document.getElementById("slabID"));

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {

                            $('#NewBodyTypeID').empty();

                            $('#NewBodyTypeID').append("<option value='0'>--Select New Body Type--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#NewBodyTypeID');

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

        ////$("#NewClassID").change(function () {

        ////    var CategoryID = $("#NewCategory").val();

        ////    var VehicleClassID = $("#NewClassID").val();

        ////

        ////    $.ajax({

        ////        type: "Get",

        ////        contentType: 'application/json; charset=utf-8',

        ////        url: "/DEO/LoadBodyType",

        ////        dataType: 'json',

        ////        data: { CategoryID: CategoryID, VehicleClassID: VehicleClassID },

        ////        async: false,

        ////        success: function (response) {

        ////            //removeOptions(document.getElementById("slabID"));

        ////            if (response.Status == true) {

        ////                if (typeof response != 'undefined' && response != null && response != 0) {

        ////                    $('#NewBodyTypeID').empty();

        ////                    $('#NewBodyTypeID').append("<option value='0'>--Select Body Type--</option>");

        ////                    $.each(response.Data, function (index, value) {

        ////                        $('<option value="' + value.ID + '">' + value.Name + '</option>').appendTo('#NewBodyTypeID');

        ////                    });

        ////                }

        ////                else {

        ////                }

        ////            }

        ////            else {

        ////            }

        ////        },

        ////        error: function (response) {

        ////            alert("Something Went Wrong Please Try Again Letter....!");

        ////        }

        ////    });

        ////});

</script>

<script>

            var date = new Date();

            var day = date.getDate();

            var month = date.getMonth() + 1;

            var year = date.getFullYear();

            if (month < 10) month = "0" + month;

            if (day < 10) day = "0" + day;

            var today = year + "-" + month + "-" + day;

            document.getElementById('AlterationDate').value = today;

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

                                $('#FuelID').empty();

                                $('#FuelID').append("<option value='-1'>--Not Assigned --</option>");


                                $('#FuelID').append("<option value='0' selected>--Select Fuel type --</option>");

                                $.each(response.Data, function (index, value) {

                                    $('<option value="' + value.id + '">' + value.fuel_type + '</option>').appendTo('#FuelID');

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

            function LoadNewFuelType() {

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

                                $('#NewFuelID').empty();

                                $('#NewFuelID').append("<option value='0'>--Select Fuel type --</option>");

                                $.each(response.Data, function (index, value) {

                                    $('<option value="' + value.id + '">' + value.fuel_type + '</option>').appendTo('#NewFuelID');

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

                                    $('#NewETO').empty();

                                    $('#ETO').empty();

                                    $('#NewETO').append("<option value='0'>--Select ETO Name--</option>");



                                    $('#ETO').append("<option value='0'>--Select ETO Name--</option>");

                                    $.each(response.Data, function (index, value) {

                                        $('<option value="' + value.eto_code + '">' + value.eto_name + '</option>').appendTo('#NewETO');

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

    function Unit() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadUnit",

            dataType: 'json',

            async:false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {





                        $('#Unit').empty();

                        $('#Unit').append("<option value='-1'>---Not Assigned---</option>");

                        $('#Unit').append("<option value='0'>Unit</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.unit + '</option>').appendTo('#Unit');

                        });






                        $('#NUnit').empty();

                        $('#NUnit').append("<option value='0'>Unit</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.unit + '</option>').appendTo('#NUnit');

                        });




                        $('#NUnit').val(1);




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

    function ValidateInputNA(id, event) {

        $('#' + id).keypress(function (e) {

            var regex = new RegExp("^[^a-zA-Z0-9]+$");

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

    function LoadETOLocation() {

            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadETOLoction",

                dataType: 'json',

                async: false,

                success: function (response) {

                    if (response.Status == true) {

                        {{--if (typeof response != 'undefined' && response != null && response != 0) {--}}



                        {{--    $('#DivisionID').empty();--}}

                        {{--    $('#DivisionID').append("<option value='0'>--Select District--</option>");--}}

                        {{--    $.each(response.Data, function (index, value) {--}}

                        {{--        $('<option value="' + value.id + '">' + value.eto_location + '</option>').appendTo('#DivisionID');--}}

                        {{--    });--}}

                        {{--    $('#DivisionID').val({{auth()->user()->eto_location_id}});--}}
                        {{--    $("#DivisionID").prop('disabled', true);--}}


                        {{--}--}}
                        if (typeof response != 'undefined' && response != null && response != 0) {



                            $('#DivisionID').empty();
                            $('#DivisionID').append("<option value='0'>--Select District--</option>");

                            @if(auth()->id() == 61)
                            $.each(response.Data, function (index, value) {
                                if (value.id == 5 || value.id == 19) {
                                    $('<option value="' + value.id + '">' + value.eto_location + '</option>').appendTo('#DivisionID');
                                }
                            });
                            $("#DivisionID").prop('disabled', false);

                            @else
                            $.each(response.Data, function (index, value) {
                                $('<option value="' + value.id + '">' + value.eto_location + '</option>').appendTo('#DivisionID');
                            });

                            $('#DivisionID').val({{ auth()->user()->eto_location_id }});
                            $("#DivisionID").prop('disabled', true);
                            @endif


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

            }

    $("#ETO").change(function () {

       //s var eto_location = $('#ETOLocation').val();

        var E_code = $('#ETO').val();

/*
        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadDivisions",

            dataType: 'json',

            data: {  E_code: E_code },

            async: false,

            success: function (response) {

                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {

                        $('#DivisionID').empty();

                        $('#DivisionID').append("<option value='0'>--Select Division--</option>");

                        $.each(response.Data, function (index, value) {

                            //$('<option value="' + value.ID + '">' + value.NAME + '</option>').appendTo('#Division');

                            $('<option value="' + value.ID + '">' + value.NAME + '</option>').appendTo('#DivisionID');

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
*/
    });

    function ValidateCode(DivisionID, Regno) {

        var stat = null;

        $.ajax({

            url: '/DEO/AltCheckC',

            type: "GET",

            dataType: "JSON",

            async: false, //int? DivisionID, string Regno

            data: { DivisionID: DivisionID, Regno: Regno },

            success: function (response) {

                if (response.Status) {

                    //var msg = "";

                    if (response.TransferCode >= 0) {

                        // $("#RegistrationNo").css("display", "block");

                        //$("#chassisNo").html(" chassis number exist");

                        // console.log(response.msg);

                        stat = response.TransferCode;

                    }

                    else {

                        stat = 1;

                    }

                }

            }

        });

        return stat;

    }



    //$('.txtecount').change(function ()  {

    //    debugger

    // /*   $('.txtecount').each(function () {*/



    //    //var count = $('#AlterationNumber').val(count);



    //        if ($(this).val() != "") {

    //            debugger

    //            count++;

    //        }

    //        $('#AlterationNumber').val(count);

    //   /* });*/







    //});





</script>



                        </div>

                    </div>

                </div>

            </div>



            <!-- /page content -->





@endsection
