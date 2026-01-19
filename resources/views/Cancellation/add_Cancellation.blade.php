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

        <h2>Add New Cancellation</h2>

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

        <form id="Cancellationform">
            @csrf

            <div class="row form-group">

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

                        <div class="col-md-5"><label>District</label></div>

                        <div class="col-md-7"><select class="form-control" id="DivisionID" name="DivisionID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Registration No</label></div>

                        <div class="col-md-7"><input type="text" id="RegistrationNo" class="form-control" onkeypress="ValidateInputNA(this.id,event)" /></div>

                    </div>

                </div>



                <div class="col-md-6">

                    <div class="col-md-5"></div>

                    <div class="col-md-7 text-right">

                        <input type="button" class="btn btnSearch" id="Search" value="Search" onclick="SearchFor()" />

                        <input type="button" class="btn btnSearch" id="Clear" value="Clear" />

                    </div>

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

                        <div class="col-md-5"><label>Type Of Body</label></div>

                        <div class="col-md-7"><select class="form-control" id="BodyTypeID" name="BodyTypeID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Category</label></div>

                        <div class="col-md-7"><select class="form-control" id="CategoryID" name="CategoryID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Chassis No</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="ChassisNo" name="ChassisNo" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Engine No</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="EngineNo" name="EngineNo" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Color Of Vehicle</label></div>

                        <div class="col-md-7">

                            <select class="form-control" id="ColorID" name="ColorID"><option></option></select>



                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Class Of Vehicle</label></div>

                        <div class="col-md-7"><select class="form-control" id="ClassID" name="ClassID"><option></option></select></div>

                    </div>

                </div>

            </div>

            <h4 class="h4Vouchr">

                <svg xmlns="http://www.w3.org/2000/svg" width="53.415" height="30.6" viewBox="0 0 53.415 30.6">

                    <g id="Group_424" data-name="Group 424" transform="translate(-1468.4 -142.438)">

                        <g id="Group_66" data-name="Group 66" transform="translate(942.7 27.237)">

                            <path id="Path_1031" data-name="Path 1031" d="M573,123.9H561.2a.7.7,0,1,1,0-1.4H573a.7.7,0,1,1,0,1.4Z" fill="#df6437" />

                            <path id="Path_2193" data-name="Path 2193" d="M573,123.9H561.2a.7.7,0,1,1,0-1.4H573a.7.7,0,1,1,0,1.4Z" transform="translate(-22)" fill="#df6437" />

                            <path id="Path_1033" data-name="Path 1033" d="M536.6,137.9a3.1,3.1,0,1,1,3.1-3.1A3.116,3.116,0,0,1,536.6,137.9Zm0-4.8a1.7,1.7,0,1,0,1.7,1.7A1.628,1.628,0,0,0,536.6,133.1Z" fill="#e7bc11" />

                            <path id="Path_1034" data-name="Path 1034" d="M569.4,137.9a3.1,3.1,0,1,1,3.1-3.1A3.116,3.116,0,0,1,569.4,137.9Zm0-4.8a1.7,1.7,0,1,0,1.7,1.7A1.686,1.686,0,0,0,569.4,133.1Z" fill="#e7bc11" />

                            <path id="Path_1036" data-name="Path 1036" d="M577.3,134.9h-2.6a.669.669,0,0,1-.7-.6,4.575,4.575,0,0,0-4.6-4.1,4.648,4.648,0,0,0-4.6,4.1c0,.4-.3.6-.7.6h-6.3a.7.7,0,1,1,0-1.4h5.6a6.053,6.053,0,0,1,11.8,0h2V127a2.25,2.25,0,0,0-1.6-2.2l-3-1c-.2-.1-.4-.2-.4-.4l-1.8-4.7a3.37,3.37,0,0,0-3-2.1H547.3a4.416,4.416,0,0,0-3.7,1.9l-3.2,4.4a3.755,3.755,0,0,1-2.1,1.4l-7.7,1.6a4.508,4.508,0,0,0-3.5,4.4v3.1h3.6a6.053,6.053,0,0,1,11.8,0H548a.7.7,0,1,1,0,1.4h-6.1a.669.669,0,0,1-.7-.6,4.575,4.575,0,0,0-4.6-4.1,4.648,4.648,0,0,0-4.6,4.1c0,.4-.3.6-.7.6h-4.2a1.367,1.367,0,0,1-1.4-1.4v-3.1a5.987,5.987,0,0,1,4.7-5.8l7.7-1.6a2.223,2.223,0,0,0,1.3-.8l3.2-4.4a5.974,5.974,0,0,1,4.9-2.5h20.1a4.642,4.642,0,0,1,4.3,3l1.7,4.3,2.6.9a3.785,3.785,0,0,1,2.6,3.6v6.5A1.52,1.52,0,0,1,577.3,134.9Z" fill="#e7bc11" />

                            <path id="Path_1037" data-name="Path 1037" d="M565,132.4a.684.684,0,0,1-.7-.7v-8.6a.7.7,0,0,1,1.4,0v8.6A.684.684,0,0,1,565,132.4Z" fill="#e7bc11" />

                            <path id="Path_1038" data-name="Path 1038" d="M552.1,121.3H552a.838.838,0,0,1-.6-.8l.9-4.6a.76.76,0,0,1,.8-.6.838.838,0,0,1,.6.8l-.9,4.6A.73.73,0,0,1,552.1,121.3Z" fill="#e7bc11" />

                            <path id="Path_1039" data-name="Path 1039" d="M565.1,123.9a.73.73,0,0,1-.7-.6l-1.4-7.2a.707.707,0,1,1,1.4-.2l1.4,7.2a.641.641,0,0,1-.6.8C565.2,123.8,565.2,123.9,565.1,123.9Z" fill="#e7bc11" />

                            <path id="Path_1040" data-name="Path 1040" d="M578,129.6h-3.4a2,2,0,0,1,0-4h3.3a.7.7,0,1,1,0,1.4h-3.3a.6.6,0,0,0,0,1.2H578a.7.7,0,1,1,0,1.4Z" fill="#e7bc11" />

                            <path id="Path_1041" data-name="Path 1041" d="M526.8,129.9h-.2a.7.7,0,1,1,0-1.4h.2a5.012,5.012,0,0,0,4.8-3.7.728.728,0,0,1,1.4.4A6.635,6.635,0,0,1,526.8,129.9Z" fill="#e7bc11" />

                            <path id="Path_1046" data-name="Path 1046" d="M578.4,140.8h-49a.7.7,0,1,1,0-1.4h49a.684.684,0,0,1,.7.7C579.2,140.4,578.8,140.8,578.4,140.8Z" transform="translate(0 5)" fill="#7d4300" />

                            <path id="Path_1032" data-name="Path 1032" d="M536.6,140.8a6,6,0,1,1,6-6A6.018,6.018,0,0,1,536.6,140.8Zm0-10.6a4.6,4.6,0,1,0,4.6,4.6A4.526,4.526,0,0,0,536.6,130.2Z" fill="#df6437" />

                            <path id="Path_1035" data-name="Path 1035" d="M569.4,140.8a6,6,0,1,1,6-6A6.018,6.018,0,0,1,569.4,140.8Zm0-10.6a4.6,4.6,0,1,0,4.6,4.6A4.588,4.588,0,0,0,569.4,130.2Z" fill="#df6437" />

                        </g>

                        <text id="X" transform="translate(1490 168)" fill="#df6437" font-size="20" font-family="Calibri"><tspan x="0" y="0">X</tspan></text>

                    </g>

                </svg>

                CANCELLATION

            </h4>

            <div class="row form-group">

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Intimation Letter No</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="IntimationLetterNo" name="IntimationLetterNo" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Intimation Letter Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="IntimationDate" name="IntimationDate" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Reason</label></div>

                        <div class="col-md-7">

                            <select name="Reason" id="Reason" class="form-control">
                                <option value="0" selected disabled>Select Reason</option>
                                @foreach(App\Models\cancellation_reason::all() as $rea)
                                    <option value="{{$rea->id}}">{{$rea->reason}}</option>
                                @endforeach
                            </select>


                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Transaction Date</label></div>

                        <div class="col-md-7"><input type="date" class="form-control" id="TransactionDate" name="TransactionDate" /></div>

                    </div>

                </div>

                <div class="col-md-12">

                    <div class="row form-group">

                        <div class="col-md-5" style="width:21%"><label>Remarks</label></div>

                        <div class="col-md-7" style="width:79%"><textarea class="form-control" rows="3" id="Remarks" name="Remarks" onkeypress="ValidateInputNA(this.id,event)"></textarea></div>

                    </div>

                </div>

            </div>

            <div class="row form-group">

                <div class="col-md-3"></div>

                <div class="col-md-6 text-center">

                    <a href="/DEO/Cancel"> </a> <button type="button" class="btn btnCancel">CANCEL</button>



                    <a onclick="SaveCancellation();" id="Operation" class="btn btnCustom">APPLY</a>

                </div>

            </div>

        </form>

    </div>

</div>

<input type="hidden" id="RecordId" />

<script>

    $(document).ready(function () {

        $("#OwnerName").prop("disabled", true)

        $("#CategoryID").prop("disabled", true)

        $("#VehicleName").prop("disabled", true)

        $("#BodyTypeID").prop("disabled", true)

        $("#ClassID").prop("disabled", true)

        //$("#MobileNumber").prop("disabled", true)

        //$("#CNIC").prop("disabled", true)

        $('#ChassisNo').prop("disabled", true);

        $('#ColorID').prop("disabled", true);

       // $('#FuelID').prop("disabled", true);

        $('#EngineNo').prop("disabled", true);

       // $('#SeatingID').prop("disabled", true);

        //$('#FrontAxle').prop("disabled", true);

       /// $('#RearAxle').prop("disabled", true);

       // $('#AnyOtherAxle').prop("disabled", true);

        $('#ChassisNo').prop("disabled", true);

        $('#IntimationLetterNo').prop("disabled", true);

       LoadDivisions();

        LoadETO();

        //LoadRegistrationMark();

        LoadVehicleCategory();

        LoadBodyType();

        LoadColors();

        LoadVehicleType();

        var value = $('#RecordId').val();

        //var value1 = 100;

        //$("#VehicleName").val(1+value1);

        //$('#IntimationLetterNo').val(value1 ++);

        if (value != "") {

            GetData(value);

            //GetDocumentData(value);

            $("#Operation").attr("onclick", "SaveCancellation()").unbind("click");

            $("#Operation").attr("onclick", "UpdateCancellation()").bind("click");

            $("#Operation").text('Update');

            $('#DivisionID').prop("disabled", true);

            $('#RegistrationNo').prop("disabled", true);

            $('#Search').prop("disabled", true);

            $('#Clear').prop("disabled", true);

            $('#ETO').prop("disabled", true);

            $('#Clear').prop("disabled", true);

        }

    });

    function ValidateInputNA(id, event) {

        $('#' + id).keypress(function (e) {

            var regex = new RegExp("^[^a-zA-Z0-9 ]+$");

            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

            if (!regex.test(str)) {

                return true;

            } else {

                event.preventDefault();

                //$('#' + id).val('');

                return false;

            }

        });

    }

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

                            $('<option value="' + value.eto_code + '">' + value.eto_location + '</option>').appendTo('#DivisionID');

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

                            $('<option value="' + value.id + '">' + value.eto_name + '</option>').appendTo('#ETO');

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

    $("#Cancellationform").validate({

        rules: {

            "DivisionID": {

                required: true,

                Dropdown: true,

            },

            "RegistrationMarkID": {

                required: true,

                Dropdown: true,

            },

            "ETO": {

                required: true,

                Dropdown: true,

            },

            "OwnerName"             :{ required :true,},

            "CategoryID": {

                required: true,

                Dropdown: true,

            },

            "BodyTypeID": {

                required: true,

                Dropdown: true,

            },

            "ChassisNo"             :{ required :true,},

            "EngineNo"              :{ required :true,},

            "ColorID": {

                required: true,

                Dropdown: true,

            },

            "ClassID": {

                required: true,

                Dropdown: true,

            },

            "IntimationLetterNo"    :{ required :true,},

            "IntimationDate"        :{ required :true,},

            "Reason"                :{ required :true,},

            "TransactionDate"       :{ required :true,},

            "Remarks"               :{ required :true,},

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

    function SaveCancellation() {

        var _token= $("input[name='_token']").val();

        //var Cancellationvalitade = $('#Cancellationform').valid();

       // if (Cancellationvalitade) {

            var DivisionID = $('#DivisionID').val();

            //var ETO_CODE = $('#ETO').val();

            var RegistrationNo = $('#RegistrationNo').val();

            var ETO = $('#ETO').val();

            var OwnerName = $('#OwnerName').val();

            var CategoryID = $('#CategoryID').val();

            var ClassID = $('#ClassID').val();

            var BodyTypeID = $('#BodyTypeID').val();

            var ChassisNO = $('#ChassisNo').val();

            var EngineNo = $('#EngineNo').val();

            var ColorID = $('#ColorID').val();

            var IntimationLetterNo = $('#IntimationLetterNo').val();

            var IntimationDate = $('#IntimationDate').val();

            var Reason = $('#Reason').val();

            var TransactionDate = $('#TransactionDate').val();

            var Remarks = $('#Remarks').val();

            $.ajax({

                url: '{{url("cancellation_save")}}',

                contentType: "application/json; charset=utf-8",

                type: "POST",

                dataType: "JSON",

                data: JSON.stringify({

                    _token: _token,

                    DivisionID: DivisionID,

                    RegNo: RegistrationNo,

                    ETO_CODE: ETO,

                    OwnerName: OwnerName,

                    CategoryID: CategoryID,

                    BodyTypeID: BodyTypeID,

                    ClassID: ClassID,

                    ChassisNO: ChassisNO,

                    EngineNo: EngineNo,

                    ColorID: ColorID,

                    IntimationLetterNo: IntimationLetterNo,

                    IntimationDate: IntimationDate,

                    Reason: Reason,

                    TransactionDate: TransactionDate,

                    Remarks: Remarks

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

                                window.location.href = "{{url('Cancellation')}}";

                                // LoadTable();

                            })

                    }

                    else {

                        swal('Something went wrong');

                    }

                },

            });

        //}

        // else {

        //     swal("Fill the Required fields!.");

        // }

    }

     function GetData(ID) {

           // var ID = ;



        $.ajax({

            url: '/DEO/GetCancellationList',

            type: "GET",

            dataType: "JSON",

            data: {ID:ID},

            success: function (response) {

                if (response.Status) {

                    $('#RegistrationNo').val(response.Data[0].RegNo);

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

                    $('#OwnerName').val(response.Data[0].OwnerName);

                    $('#ChassisNo').val(response.Data[0].ChassisNO);

                    $('#EngineNo').val(response.Data[0].EngineNo);

                    $('#ColorID').val(response.Data[0].ColorID);

                    $('#ClassID').val(response.Data[0].ClassID);



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

                   // $('#BodyTypeID').val(response.Data[0].BodyTypeID);

                    $('#IntimationLetterNo').val(response.Data[0].IntimationLetterNo);

                    $('#IntimationDate').val(moment(response.Data[0].IntimationDate).format('YYYY-MM-DD'));;

                    $('#Reason').val(response.Data[0].Reason);

                    $('#TransactionDate').val(moment(response.Data[0].TransactionDate).format('YYYY-MM-DD'));;

                    $('#Remarks').val(response.Data[0].Remarks);

                }

                else {

                    swal("something went wrong")

                }

            }

        });

    }

    function UpdateCancellation() {

        var Cancellationvalitade = $('#Cancellationform').valid();

        if (Cancellationvalitade) {

            var ID = $('#RecordId').val();

            var DivisionID = $('#DivisionID').val();

            var RegistrationNo = $('#RegistrationNo').val();

            var ETO = $('#ETO').val();

            var OwnerName = $('#OwnerName').val();

            var CategoryID = $('#CategoryID').val();

            var BodyTypeID = $('#BodyTypeID').val();

            var ChassisNO = $('#ChassisNo').val();

            var EngineNo = $('#EngineNo').val();

            var ColorID = $('#ColorID').val();

            var ClassID = $('#ClassID').val();

            var IntimationLetterNo = $('#IntimationLetterNo').val();

            var IntimationDate = $('#IntimationDate').val();

            var Reason = $('#Reason').val();

            var TransactionDate = $('#TransactionDate').val();

            var Remarks = $('#Remarks').val();

            $.ajax({

                url: '/DEO/UpdateNewCancellation',

                contentType: "application/json; charset=utf-8",

                type: "POST",

                dataType: "JSON",

                data: JSON.stringify({

                    ID: ID,

                    DivisionID: DivisionID,

                    Registration: RegistrationNo,

                    ETO_CODE: ETO,

                    OwnerName: OwnerName,

                    CategoryID: CategoryID,

                    BodyTypeID: BodyTypeID,

                    ChassisNO: ChassisNO,

                    EngineNo: EngineNo,

                    ColorID: ColorID,

                    ClassID: ClassID,

                    IntimationLetterNo: IntimationLetterNo,

                    IntimationDate: IntimationDate,

                    Reason: Reason,

                    TransactionDate: TransactionDate,

                    Remarks: Remarks

                }),

                success: function (response) {

                    if (response.Status) {

                        swal({

                            title: "Updated Successfully!.",

                            type: "success",

                            showCancelButton: false,

                            confirmButtonColor: "#DD6B55",

                            confirmButtonText: "OK",

                            closeOnConfirm: true

                        },

                            function (isConfirm) {

                                window.location.href = "../DEO/Cancel";

                                // LoadTable();

                            })

                    }

                    else {

                        swal('Something went wrong');

                    }

                },

            });

        }

        else {

            swal("Pleas fill required fields");

        }

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

            //$("#DivisionRegion").css("display", "None");

            $('#DivisionID').removeClass('error');

            $('#RegistrationNo').removeClass('error');

            var getVal = ValidateCode(DivisionID, Regno);

            if (getVal == 1) {

                $('#RegistrationNo').addClass('error');

                $('#DivisionID').addClass('error');

                swal("already exist in cancelation")

                //$("#RecordId1").css("display", "block");

                //$("#RecordId1").html(" Chassis Number  Already  Exist");

                return false;

            }

            else {

                $('#RegistrationNo').removeClass('error');

                $('#DivisionID').removeClass('error');

                $.ajax({

                    type: "Get",

                    contentType: 'application/json; charset=utf-8',

                    url: "/DEO/getVehicleInfoagainstId",

                    dataType: 'json',

                    data: { RegNo: Regno, DistrictID: DivisionID , type: "Cancellation"},

                    async: false,

                    success: function (response) {

                        if (response.Status == true) {

                            if(response.Data2==null)
                            {
                                $('#OwnerName').val(response.Data.name_);

                            }
                            else
                            {
                                $('#OwnerName').val(response.Data2[0].name);
                            }


                            $('#ClassID').val(response.Data.class_of_vehicle_id);

                            $('#CategoryID').val(response.Data.category_of_vehicle_id);


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

                            $("#ChassisNo").val(response.Data.chassis_no);

                            // $('#DistrictID').val(response.Data.Districts);

                            $('#EngineNo').val(response.Data.engine_no);

                            ////$('#VehicleClass').val(response.Data[0].VehicleClassID);

                            ////$('#Category').val(response.Data[0].CategoryID);

                            $("#ColorID").val(response.Data.color_of_vehicle_id);

                            $("#EngineID").val(response.Data.engine_capacity);

                            // $("#SeatingID").val(response.Data.seating_capacity);

                            // $("#FrontAxle").val(response.Data3.front_axle);

                            // $("#RearAxle").val(response.Data3.rear_axle);

                            // $("#AnyOtherAxle").val(response.Data3.any_other_axle);

                            // $("#RegNo").val(response.Data.registration_no);

                            // $('#FuelID').html(response.Data.fuel_type_id);

                            // $('#CNIC').val(response.Data2.new_cnic_no);

                            // $('#MobileNumber').val(response.Data.mobile_no);

                            //$('#IntimationLetterNo').val()+1;

                            //$('#IntimationLetterNo').val(response.ETO_CODE,response.RegNo);
                            $('#IntimationLetterNo').val((Math.random().toString().substr(2, 10))); // randomly generate inrimation letter no

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

    }

    function ValidateCode(DivisionID, Regno) {

        var stat = null;

        $.ajax({

            url: '{{url("/")}}/DEO/RegistrationCheckC',

            type: "GET",

            dataType: "JSON",

            async: false, //int? DivisionID, string Regno

            data: { DivisionID: DivisionID, Regno: Regno},

            success: function (response) {

                if (response.Status) {

                    //var msg = "";

                    if (response.Data == 1) {

                       // $("#RegistrationNo").css("display", "block");

                        //$("#chassisNo").html(" chassis number exist");

                        stat = 1;

                    }

                    else {

                        stat = 0;

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
