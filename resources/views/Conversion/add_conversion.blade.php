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

        <h2>Add New Conversion</h2>

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

        <form id="Conversionform">
            @csrf

            <div class="row form-group">

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>ETO</label></div>

                        <div class="col-md-7">

                            <select class="form-control" id="ETO" name="ETO"><option></option></select>



                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-3"><label>District</label></div>

                        <div class="col-md-9"><select class="form-control" id="DivisionID" name="DivisionID"><option></option></select></div>

                    </div>

                </div>



                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Registration No</label></div>

                        <div class="col-md-7"><input type="text" id="RegistrationNo" class="form-control" onkeypress="ValidateInputNA(this.id,event)" /></div>

                    </div>

                </div>



                <div class="col-md-4">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Conversion Code</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="ConversionCode" name="ConversionCode" /></div>

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

                        </g>

                    </g>

                </svg>

                VEHICLE INFO

            </h4>

            <div class="row form-group">

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Owner Name</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="OwnerName" name="OwnerName" /></div>

                    </div>

                </div>









                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Category</label></div>

                        <div class="col-md-7"><select class="form-control" id="CategoryID" name="CategoryID" ><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Type Of Body</label></div>

                        <div class="col-md-7"><select class="form-control" id="BodyTypeID" name="BodyTypeID"></select></div>


                    </div>

                </div>

                <!--<div class="col-md-6">

        <div class="row form-group">

            <div class="col-md-5"><label>Class Of Vehicle</label></div>

            <div class="col-md-7"><select class="form-control" id="ClassID" name="ClassID"><option></option></select></div>

        </div>-->



                <!--</div>-->

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>CNIC</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="CNIC" name="CNIC" /></div>

                    </div>

                </div>

                <div class="col-md-6">



                </div>

                <div class="col-md-6">

                    <!--<div class="row form-group">

        <div class="col-md-5"><label>Color Of Vehicle</label></div>

        <div class="col-md-7">

            <select class="form-control" id="ColorID" name="ColorID"><option></option></select>-->



                    <!--</div>

        </div>-->

                </div>

                <div class="col-md-6">



                    <div class="row form-group">

                        <div class="col-md-5"><label>Chassis No</label></div>

                        <div class="col-md-7"><input class="form-control" id="ChassisNo" name="ChassisNo"></div>

                    </div>

                </div>

            </div>

            <h4 class="h4Vouchr">

                <svg xmlns="http://www.w3.org/2000/svg" width="55.2" height="37.6" viewBox="0 0 55.2 37.6">

                    <g id="Group_83" data-name="Group 83" transform="translate(-236.1 -175)">

                        <path id="Path_1105" data-name="Path 1105" d="M247,205.4a2.6,2.6,0,1,1,2.6-2.6A2.647,2.647,0,0,1,247,205.4Zm0-3.8a1.2,1.2,0,1,0,1.2,1.2A1.216,1.216,0,0,0,247,201.6Z" fill="#e7bc11" />

                        <path id="Path_1106" data-name="Path 1106" d="M277.4,205.4a2.6,2.6,0,1,1,2.6-2.6A2.647,2.647,0,0,1,277.4,205.4Zm0-3.8a1.2,1.2,0,1,0,1.2,1.2A1.216,1.216,0,0,0,277.4,201.6Z" fill="#e7bc11" />

                        <path id="Path_1108" data-name="Path 1108" d="M236.9,200.7a.7.7,0,1,1,0-1.4,4.372,4.372,0,0,0,3.8-2.2l1.1-1.9a.738.738,0,1,1,1.3.7l-1.1,1.9A5.958,5.958,0,0,1,236.9,200.7Z" fill="#e7bc11" />

                        <path id="Path_1109" data-name="Path 1109" d="M252.2,194.5a.7.7,0,0,1,0-1.4l30.9-.2a.7.7,0,1,1,0,1.4l-30.9.2Z" fill="#df6437" />

                        <path id="Path_1110" data-name="Path 1110" d="M263.4,205.6h-.2a.715.715,0,0,1-.5-.9l3.2-11v-5a.7.7,0,0,1,1.4,0V194l-3.2,11.1A.752.752,0,0,1,263.4,205.6Z" fill="#e7bc11" />

                        <path id="Path_1111" data-name="Path 1111" d="M262,197.6h-2.3a.7.7,0,1,1,0-1.4H262a.7.7,0,1,1,0,1.4Z" fill="#df6437" />

                        <path id="Path_1112" data-name="Path 1112" d="M270,197.6h-2.3a.7.7,0,1,1,0-1.4H270a.7.7,0,1,1,0,1.4Z" fill="#df6437" />

                        <path id="Path_1113" data-name="Path 1113" d="M287.3,205.6h-5.2a.713.713,0,0,1-.6-.3.854.854,0,0,1,0-.7,4.058,4.058,0,0,0,.4-1.9,4.816,4.816,0,0,0-1.3-3.2,4.53,4.53,0,0,0-7.7,3,4.477,4.477,0,0,0,.4,2,.854.854,0,0,1,0,.7.713.713,0,0,1-.6.3h-21a.713.713,0,0,1-.6-.3.854.854,0,0,1,0-.7,4.058,4.058,0,0,0,.4-1.9,4.816,4.816,0,0,0-1.3-3.2,4.53,4.53,0,0,0-7.7,3,4.477,4.477,0,0,0,.4,2,.854.854,0,0,1,0,.7.713.713,0,0,1-.6.3h-3.2a3.009,3.009,0,0,1-3-3v-2.2a3.533,3.533,0,0,1,.4-1.7l.6-1.2a4.023,4.023,0,0,1,3.1-2.4l11.7-2,4.3-3.8a5.069,5.069,0,0,1,3.3-1.3l15.9-.1a7.493,7.493,0,0,1,5.3,2.2l2.7,2.7,4.8.4a3.365,3.365,0,0,1,3.1,3.3v5.2a.684.684,0,0,1-.7.7,1.155,1.155,0,0,0-1.2,1.2A2.133,2.133,0,0,1,287.3,205.6Zm-4.2-1.4h4.2a.645.645,0,0,0,.6-.6,2.58,2.58,0,0,1,1.9-2.5v-4.5a1.95,1.95,0,0,0-1.8-1.9l-5-.4c-.2,0-.3-.1-.5-.2l-2.8-2.9a5.816,5.816,0,0,0-4.3-1.8l-15.8.1a3.492,3.492,0,0,0-2.4,1l-4.5,3.9c-.1.1-.2.1-.3.2l-11.9,2a2.546,2.546,0,0,0-2,1.6l-.6,1.2a1.978,1.978,0,0,0-.2,1.1v2.2a1.58,1.58,0,0,0,1.6,1.6h2.2a8.806,8.806,0,0,1-.2-1.7,5.9,5.9,0,1,1,11.6,1.6h19a8.806,8.806,0,0,1-.2-1.7,5.9,5.9,0,0,1,11.8.2C283.3,203.3,283.2,203.8,283.1,204.2Z" fill="#e7bc11" />

                        <path id="Path_1114" data-name="Path 1114" d="M263.7,189.5a.684.684,0,0,1-.7-.7v-2.9h-7.6a.7.7,0,1,1,0-1.4H263a1.367,1.367,0,0,1,1.4,1.4v2.9A.684.684,0,0,1,263.7,189.5Z" fill="#e7bc11" />

                        <path id="Path_1115" data-name="Path 1115" d="M268.3,189.4a.684.684,0,0,1-.7-.7v-9.9a.7.7,0,0,1,1.4,0v9.9A.684.684,0,0,1,268.3,189.4Z" fill="#e7bc11" />

                        <path id="Path_1116" data-name="Path 1116" d="M272.9,189.4a.684.684,0,0,1-.7-.7v-2.9a1.367,1.367,0,0,1,1.4-1.4h7.6a.7.7,0,1,1,0,1.4h-7.6v2.9A.683.683,0,0,1,272.9,189.4Z" fill="#e7bc11" />

                        <path id="Path_1117" data-name="Path 1117" d="M253.8,187.4a2.3,2.3,0,1,1,2.3-2.3A2.263,2.263,0,0,1,253.8,187.4Zm0-3.2a.9.9,0,1,0,.9.9A.9.9,0,0,0,253.8,184.2Z" fill="#df6437" />

                        <path id="Path_1118" data-name="Path 1118" d="M268.3,179.6a2.3,2.3,0,1,1,2.3-2.3A2.326,2.326,0,0,1,268.3,179.6Zm0-3.2a.9.9,0,1,0,.9.9A.9.9,0,0,0,268.3,176.4Z" fill="#df6437" />

                        <path id="Path_1119" data-name="Path 1119" d="M282.8,187.4a2.3,2.3,0,1,1,2.3-2.3A2.263,2.263,0,0,1,282.8,187.4Zm0-3.2a.9.9,0,1,0,.9.9A.9.9,0,0,0,282.8,184.2Z" fill="#df6437" />

                        <path id="Path_1120" data-name="Path 1120" d="M286.4,208.6H240.3a.7.7,0,1,1,0-1.4h46.1a.7.7,0,1,1,0,1.4Z" transform="translate(0 4)" fill="#7d4300" />

                        <path id="Path_1104" data-name="Path 1104" d="M247,208.6a5.911,5.911,0,0,1-5.9-5.9,5.9,5.9,0,0,1,11.8,0A5.911,5.911,0,0,1,247,208.6Zm0-10.3a4.4,4.4,0,1,0,4.4,4.4A4.439,4.439,0,0,0,247,198.3Z" fill="#df6437" />

                        <path id="Path_1107" data-name="Path 1107" d="M277.4,208.6a5.911,5.911,0,0,1-5.9-5.9,5.9,5.9,0,0,1,11.8,0A5.911,5.911,0,0,1,277.4,208.6Zm0-10.3a4.4,4.4,0,1,0,4.4,4.4A4.375,4.375,0,0,0,277.4,198.3Z" fill="#df6437" />

                    </g>

                </svg>

                CONVERSION

            </h4>

            <div class="row form-group">



                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>New Category</label></div>

                        <div class="col-md-7"><select class="form-control" id="NewCategoryID" name="NewCategoryID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>New Type Of Body</label></div>

                        <div class="col-md-7"><select class="form-control" id="NewBodyType" name="NewBodyType"><option value="0">--Select NewBody Type</option></select></div>

                    </div>

                </div>









                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Conversion Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="ConvertionDate" name="ConvertionDate" /></div>

                    </div>

                </div>



            </div>

            <div class="row form-group">

                <div class="col-md-3"></div>

                <div class="col-md-6 text-center">



                    <a href="/DEO/Conversion" >  <button type="button" class="btn btnCancel">CANCEL</button>



                    <a onclick="SaveConversion();" id="Operation" class="btn btnCustom">APPLY</a>

                </div>

            </div>

        </form>

    </div>

</div>



<input type="hidden" id="RecordId" />



<script>

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



    $(document).ready(function () {







        //$('#ConvertionDate').datepicker('setDate', 'today');

        //$('#ConvertionDate').datepicker('today');

        //$("#ConvertionDate").datepicker("option", "gotoCurrent", true);





        // $('#ConvertionDate').datepicker();



        $("#OwnerName").prop("disabled", true)



        $("#CategoryID").prop("disabled", true)



        $("#VehicleName").prop("disabled", true)

        $("#BodyTypeID").prop("disabled", true)

        $("#ClassID").prop("disabled", true)



        $("#MobileNumber").prop("disabled", true)

        $("#CNIC").prop("disabled", true)

        $('#ChassisNo').prop("disabled", true);

        $('#ConversionCode').prop("disabled", true);



        //$("#RegNo").prop("disabled", true)



        //$("#Division").prop("disabled", true)

        LoadDivisions();

        //LoadRegistrationMark();

        LoadETO();

        /*LoadVehicleCategory();*/



        //LoadColors();

        LoadVehicleType();

         LoadBodyType();

        LoadOldVehicleCategory();

        LoadNewVehicleCategory();

        LoadoldVehicleType();







        var value = $('#RecordId').val();



        if (value != "") {

            GetData(value);

            //GetDocumentData(value);

            $("#Operation").attr("onclick", "SaveConversion()").unbind("click");

            $("#Operation").attr("onclick", "UpdateConversion()").bind("click");

            $("#Operation").text('Update');

            $("#Search").prop("disabled", true);

            $("#Clear").prop("disabled", true);

            $("#RegistrationNo").prop("disabled", true);

            $("#DivisionID").prop("disabled", true);

            $('#ChassisNo').prop("disabled", true);



        }

    });



    $("#Clear").click(function () {



        // LoadBookTypes();

        $('#ApplicationFor').removeClass('error');

        $('#DistrictID').removeClass('error');

        $('#RegistrationNo').removeClass('error');



        // $("#ApplicationFor").val('');

        $("#RegistrationNo").val('');



        $("#VehicleName").val('');

        $("#CategoryID").val('0');

        $("#ClassID").val('0');

        $("#BodyTypeID").val('0');

        $("#OwnerName").val('');

        $("#CNIC").val('');

        $("#ConvertionDate").val('mm/dd/yyyy');

        $("#NewCategoryID").val('0');

        $("#NewBodyType").val('0');

        $("#NewClassVehicle").val('0');

        $("#ChassisNo").val('');

        $("#ConversionCode").val('');



    });



    function LoadDivisions() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadETOLoction",

            dataType: 'json',

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#DivisionID').empty();

                        $('#DivisionID').append("<option value='0'>--Select Division--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.eto_location + '</option>').appendTo('#DivisionID');

                        });

                        $('#DivisionID').val({{auth()->user()->eto_location_id}});
                        $("#DivisionID").prop('disabled', true);

                    }

                    else {



                    }

                }

                else {



                }

            },

            //error: function (response) {

            //    Swal("Something went wrong");

            //}

        });

    }

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

                            $('<option value="' + value.id + '">' + value.Name + '</option>').appendTo('#RegistrationMarkID');

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

    function LoadVehicleCategory() {

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



                        $('#NewClassVehicle').empty();

                        $('#NewClassVehicle').append("<option value='0'>--Select Vehicle Class--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.class_of_vehicle + '</option>').appendTo('#NewClassVehicle');

                        });



                    }

                    else {



                    }

                }

                else {



                }

            },

            ////error: function (response) {

            ////    alert("Something Went Wrong Please Try Again Letter....!");

            ////}

        });



    }

    function LoadColors() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadColor",

            dataType: 'json',



            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#ColorID').empty();

                        $('#ColorID').append("<option value='0'>--Select Color--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.Name + '</option>').appendTo('#ColorID');

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



    $("#BodyTypeID").change(function () {



        var BodyTypeID = $("#BodyTypeID").val();



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadCategory",

            data: { BodyTypeID: BodyTypeID },

            dataType: 'json',

            async: false,

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

                //alert("Something Went Wrong Please Try Again Letter....!");

                swal(response.msg);

            }

        });



    });





    $("#NewCategoryID").change(function () {



        var CategoryID = $("#NewCategoryID").val();



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



                        $('#NewBodyType').empty();

                        $('#NewBodyType').append("<option value='0'>--Select NewBodyType--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#NewBodyType');

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



    });





    function LoadOldVehicleCategory() {

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

    function LoadNewVehicleCategory() {

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



                        $('#NewCategoryID').empty();

                        $('#NewCategoryID').append("<option value='0'>--Select Category--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.category_of_vehicle + '</option>').appendTo('#NewCategoryID');

                        });



                    }

                    else {



                    }

                }

                else {





                }

            },

            ////error: function (response) {

            ////    alert("Something Went Wrong Please Try Again Letter....!");

            ////}

        });



    }



    function LoadoldVehicleType() {

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

            ////error: function (response) {

            ////    alert("Something Went Wrong Please Try Again Letter....!");

            ////}

        });



    }



    function SearchFor() {



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

        if (check == false) {

            swal("Please fill the search criteria.");

            $("#DivisionID").val('0');

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

                data: { RegNo: Regno, DistrictID: DivisionID ,ETO_CODE:eto,  type: "Conversion"},

                success: function (response) {


                    if (response.Status == true) {


                            $("#ConversionCode").val(parseInt(response.Data.conversion_code)+parseInt(1));






                        $('#OwnerName').val(response.Data.name_);



                        // $('#BodyTypeID').val(response.VehicleInfo.BodyTypeID);

                        $('#CategoryID').val(response.Data.category_of_vehicle_id);

                        // $('#ClassID').val(response.Data.VehicleClassID);

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

                        // debugger

                        $('#BodyTypeID').val(response.Data.type_of_body);

                        // $.ajax({

                        //     type: "Get",

                        //     contentType: 'application/json; charset=utf-8',

                        //     url: "/DEO/LoadcategoryTypeAgainstBody",

                        //     dataType: 'json',

                        //     data: { BodyTypeID: $('#BodyTypeID').val() },

                        //     async: false,

                        //     success: function (response) {



                        //         //removeOptions(document.getElementById("slabID"));

                        //         if (response.Status == true) {

                        //             if (typeof response != 'undefined' && response != null && response != 0) {



                        //                 $('#CategoryID').val(response.Data.category_of_vehicle_id);



                        //                 //$('#CategoryID').empty();

                        //                 //$('#CategoryID').append("<option value='0'>--Select category--</option>");

                        //                 //$.each(response.Data, function (index, value) {

                        //                 //    $('<option value="' + value.id + '">' + value.Name + '</option>').appendTo('#CategoryID');

                        //                 //});



                        //             }

                        //             else {



                        //             }



                        //         }

                        //         else {





                        //         }

                        //     },

                        //     error: function (response) {

                        //         // alert("Something Went Wrong Please Try Again Letter....!");

                        //         swal(response.msg);

                        //     }

                        // });



                        $('#ChassisNo').val(response.Data.chassis_no);



                        // $('#DistrictID').val(response.VehicleInfo.Districts);

                        $('#EngineNo').val(response.Data.engine_no);

                        ////$('#VehicleClass').val(response.Data[0].VehicleClassID);

                        ////$('#Category').val(response.Data[0].CategoryID);





                        $("#RegNo").val(response.Data.registration_no);


                        $('#CNIC').val(response.Data.new_cnic_no !== "" && response.Data.new_cnic_no !== null
                            ? response.Data.new_cnic_no
                            : response.Data.old_cnic_no);

                        $('#MobileNumber').val(response.Data.mobile_no);





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



</script>

<script>



    function LoadNewBodytype() {

        var CategoryID = $("#NewCategoryID").val();



        $.ajax({

            type: "Get",

            url: "/DEO/LoadBodyType",

            dataType: 'json',

            async: false,



            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#NewBodyType').empty();

                        $('#NewBodyType').append("<option value='0'>--Select New Body Type--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#NewBodyType');

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



<script src="/Scripts/jquery.validate.js"></script>

<script>



    $("#Conversionform").validate({

        rules: {



            "DivisionID": {

                required: true,

                Dropdown: true,

            },

            "RegistrationMarkID": {

                required: true,

                Dropdown: true,

            },



            "OwnerName": {

                required: true,

            },



            "NewBodyType": {

                required: true,

                Dropdown: true,

            },



            "ClassID": {

                required: true,

                Dropdown: true,

            },

            "NewClassVehicle": {

                required: true,

                Dropdown: true,

            },

            "NewCategoryID": {

                required: true,

                Dropdown: true,

            },

            "ConvertionDate"       :{ required:true,},



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



    $.validator.addMethod("Dropdown", function (value, element) {

        return this.optional(element) || value > 0;

    }, "You must select at least one");





    function SaveConversion() {



        //var Conversionvalitade = $('#Conversionform').valid();

        //if (Conversionvalitade) {
        var _token= $("input[name='_token']").val();

        var DivisionID = $('#DivisionID ').val();

        var Regno = $('#RegistrationNo').val();

        var OwnerName = $('#OwnerName').val();

        var NewCategoryID = $('#NewCategoryID').val();

        var NewClassVehicle = $('#NewClassVehicle').val();

        var NewBodyType = $('#NewBodyType').val();



        var check = true;

        if (DivisionID == 0) {

            $('#DivisionID').addClass('error');

            check = false;

        }

        if (Regno == null || Regno == "") {

            $('#RegistrationNo').addClass('error');

            check = false;

        }

        if (OwnerName == null || OwnerName == "") {

            $('#OwnerName').addClass('error');

            check = false;

        }

        if (NewCategoryID == 0) {

            $('#NewCategoryID').addClass('error');

            check = false;

        }

        if (NewClassVehicle == 0) {

            $('#NewClassVehicle').addClass('error');

            check = false;

        }

        if (NewBodyType == 0) {

            $('#NewBodyType').addClass('error');

            check = false;

        }





        if (check == false) {

            swal("Please fill the search criteria.");

            // $("#DivisionID").val('0');

            // $("#RegistrationNo").val('');



            return false;

        }

        else {

            //$("#DivisionRegion").css("display", "None");

            $('#DivisionID').removeClass('error');

            $('#RegistrationNo').removeClass('error');

            $('#OwnerName').removeClass('error');





            var DivisionID = $('#DivisionID').val();

            var RegistrationNo = $('#RegistrationNo').val();

            var OwnerName = $('#OwnerName').val();

            var CategoryID = $('#CategoryID').val();

            var ClassID = $('#ClassID').val();

            var CNIC = $('#CNIC').val();

            var BodyTypeID = $('#BodyTypeID').val();

            var NewCategoryID = $('#NewCategoryID').val();

            var NewClassVehicle = $('#NewClassVehicle').val();

            var NewBodyType = $('#NewBodyType').val();

            var ConvertionDate = $('#ConvertionDate').val();

            var ChassisNo = $('#ChassisNo').val();

            var ETO_code = $('#ETO').val();



            var Convertion_code = $('#ConversionCode').val();



            $.ajax({

                url: '/conversion_save',

                contentType: "application/json; charset=utf-8",

                type: "POST",

                dataType: "JSON",

                data: JSON.stringify({

                    _token: _token,

                    DivisionID: DivisionID,

                    RegistrationNo: RegistrationNo,

                    OwnerName: OwnerName,

                    CategoryID: CategoryID,

                    ClassID: ClassID,

                    CNIC: CNIC,

                    BodyTypeID: BodyTypeID,

                    NewCategoryID: NewCategoryID,

                    NewClassVehicle: NewClassVehicle,

                    NewBodyType: NewBodyType,

                    ConvertionDate: ConvertionDate,

                    ChassisNo: ChassisNo,

                    ETO_CODE: ETO_code,

                    Conversion_code: Convertion_code





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

                                window.location.href = "{{url('/Conversion')}}";

                                // LoadTable();

                            })

                    }

                    else {

                        swal('Something went wrong');

                    }

                },

            });

        }





    }



    function GetData(ID) {

           // var ID = ;



        $.ajax({

            url: '/DEO/GetConversionList',

            type: "GET",

            dataType: "JSON",

            data: { ID: ID },

            async: false,

            success: function (response) {



                if (response.Status) {

                    $('#DivisionID').val(response.Data[0].DivisionID);

                    $('#RegistrationNo').val(response.Data[0].RegistrationNo);

                    $('#OwnerName').val(response.Data[0].OwnerName);

                    /*$('#CategoryID').val(response.Data[0].CategoryID);*/

                    $('#ClassID').val(response.Data[0].ClassID);



                    //$.ajax({

                    //    type: "Get",

                    //    contentType: 'application/json; charset=utf-8',

                    //    url: "/DEO/LoadBodyType",

                    //    dataType: 'json',

                    //    data: { CategoryID: $('#CategoryID').val() },

                    //    async: false,

                    //    success: function (response) {



                    //        //removeOptions(document.getElementById("slabID"));

                    //        if (response.Status == true) {

                    //            if (typeof response != 'undefined' && response != null && response != 0) {



                    //                $('#BodyTypeID').empty();

                    //                $('#BodyTypeID').append("<option value='0'>--Select Body Type--</option>");

                    //                $.each(response.Data, function (index, value) {

                    //                    $('<option value="' + value.id + '">' + value.Name + '</option>').appendTo('#BodyTypeID');

                    //                });



                    //            }

                    //            else {



                    //            }

                    //        }

                    //        else {





                    //        }

                    //    },

                    //    error: function (response) {

                    //        alert("Something Went Wrong Please Try Again Letter....!");

                    //    }

                    //});





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

                                    //    $('<option value="' + value.id + '">' + value.Name + '</option>').appendTo('#CategoryID');

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











                    $('#ChassisNo').val(response.Data[0].ChassisNo);



                    $('#ETO').val(response.Data[0].ETO_CODE);

                    var E_code = $('#ETO').val();



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



                                    $('#DivisionID').empty();

                                    $('#DivisionID').append("<option value='0'>--Select Division--</option>");

                                    $.each(response.Data, function (index, value) {

                                        //$('<option value="' + value.id + '">' + value.NAME + '</option>').appendTo('#Division');

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

                            swal(response.msg);

                            //Swal("Something went wrong");

                        }

                    });



                    $('#DivisionID').val(response.Data[0].DivisionID);



                    $('#ConversionCode').val(response.Data[0].Conversion_code);



                    $('#CNIC').val(response.Data[0].CNIC);

                    $('#NewClassVehicle').val(response.Data[0].NewClassVehicle);

                   /* $('#NewCategoryID').val(response.Data[0].NewCategoryID);*/

                    $('#NewBodyType').val(response.Data[0].NewBodyType);

                    $.ajax({

                        type: "Get",

                        contentType: 'application/json; charset=utf-8',

                        url: "/DEO/LoadcategoryTypeAgainstBody",

                        dataType: 'json',

                        data: { BodyTypeID: $('#NewBodyType').val() },

                        async: false,

                        success: function (response) {



                            //removeOptions(document.getElementById("slabID"));

                            if (response.Status == true) {

                                if (typeof response != 'undefined' && response != null && response != 0) {



                                    $('#NewCategoryID').val(response.Data.category_of_vehicle_id);



                                    //$('#CategoryID').empty();

                                    //$('#CategoryID').append("<option value='0'>--Select category--</option>");

                                    //$.each(response.Data, function (index, value) {

                                    //    $('<option value="' + value.id + '">' + value.Name + '</option>').appendTo('#CategoryID');

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



                    $('#ConvertionDate').val(moment(response.Data[0].ConvertionDate).format('YYYY-MM-DD'));



                }

                else {

                    swal("something went wrong")

                }

            }

        });



    }



    function UpdateConversion() {

        var DivisionID = $('#DivisionID').val();

        var RegistrationNo = $('#RegistrationNo').val();

        var OwnerName = $('#OwnerName').val();

        var CategoryID = $('#CategoryID').val();

        var ClassID = $('#ClassID').val();

        var CNIC = $('#CNIC').val();

        var BodyTypeID = $('#BodyTypeID').val();

        var NewCategoryID = $('#NewCategoryID').val();

        var NewClassVehicle = $('#NewClassVehicle').val();

        var NewBodyType = $('#NewBodyType').val();

        var ConvertionDate = $('#ConvertionDate').val();

        var ChassisNo = $('#ChassisNo').val();



        var ID = $('#RecordId').val();



        var check = true;

        if (NewCategoryID == 0) {

            $('#NewCategoryID').addClass('error');

            check = false;

        }

        if (NewClassVehicle == 0) {

            $('#NewClassVehicle').addClass('error');

            check = false;

        }

        if (NewBodyType == 0) {

            $('#NewBodyType').addClass('error');

            check = false;

        }





        if (check == false) {

            swal("Please fill the search criteria.");





            return false;

        }

        else {

            //$("#DivisionRegion").css("display", "None");

            $('#DivisionID').removeClass('error');

            $('#RegistrationNo').removeClass('error');

            $('#OwnerName').removeClass('error');



            $.ajax({

                url: '/DEO/UpdateNewConversion',

                contentType: "application/json; charset=utf-8",

                type: "POST",

                dataType: "JSON",

                data: JSON.stringify({

                    ID: ID,

                    DivisionID: DivisionID,

                    RegistrationNo: RegistrationNo,

                    OwnerName: OwnerName,

                    CategoryID: CategoryID,

                    ClassID: ClassID,

                    CNIC: CNIC,

                    BodyTypeID: BodyTypeID,

                    NewCategoryID: NewCategoryID,

                    NewClassVehicle: NewClassVehicle,

                    NewBodyType: NewBodyType,

                    ConvertionDate: ConvertionDate,

                    ChassisNo: ChassisNo

                }),

                success: function (response) {

                    if (response.Status) {

                        swal({

                            title: "Updated successfully!.",

                            type: "success",

                            showCancelButton: false,

                            confirmButtonColor: "#DD6B55",

                            confirmButtonText: "OK",

                            closeOnConfirm: true

                        },

                            function (isConfirm) {

                                window.location.href = "../DEO/Conversion";

                                // LoadTable();

                            })

                    }

                    else {

                        swal('Something went wrong');

                    }

                },

            });

        }

    }

    //Searchfor



</script>

<script>

    //for current date time

    var date = new Date();



    var day = date.getDate();

    var month = date.getMonth() + 1;

    var year = date.getFullYear();



    if (month < 10) month = "0" + month;

    if (day < 10) day = "0" + day;



    var today = year + "-" + month + "-" + day;





    document.getElementById('ConvertionDate').value = today;







    function LoadETO() {

        //var selectedETOLocation = $('#ETOLocation').val();

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadETO",

            data: { /*code: selectedETOLocation*/ },

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

                //alert("Something Went Wrong Please Try Again Letter....!");

                swal(response.msg);

            }

        });

    }



    // $("#ETO").change(function () {

    //     //s var eto_location = $('#ETOLocation').val();

    //     var E_code = $('#ETO').val();



    //     $.ajax({

    //         type: "Get",

    //         contentType: 'application/json; charset=utf-8',

    //         url: "/DEO/LoadDivisions",

    //         dataType: 'json',

    //         data: { E_code: E_code },

    //         async: false,

    //         success: function (response) {



    //             //removeOptions(document.getElementById("slabID"));

    //             if (response.Status == true) {

    //                 if (typeof response != 'undefined' && response != null && response != 0) {



    //                     $('#DivisionID').empty();

    //                     $('#DivisionID').append("<option value='0'>--Select Division--</option>");

    //                     $.each(response.Data, function (index, value) {

    //                         //$('<option value="' + value.id + '">' + value.NAME + '</option>').appendTo('#Division');

    //                         $('<option value="' + value.id + '">' + value.Jurisdiction + '</option>').appendTo('#DivisionID');

    //                     });



    //                 }

    //                 else {



    //                 }

    //             }

    //             else {



    //             }

    //         },

    //         error: function (response) {

    //             swal(response.msg);

    //             //Swal("Something went wrong");

    //         }

    //     });

    // });



    function ValidateCode(DivisionID, Regno) {



        var stat = null;

        $.ajax({

            url: '/DEO/ConversionCheckC',

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









</script>

                        </div>

                    </div>

                </div>

            </div>



            <!-- /page content -->





@endsection
