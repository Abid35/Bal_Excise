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



    /*.btnCustom,.btnCancel{

        width:20% !important;

    }*/



</style>



<div class="topTabsSection">

    <div class="headingDiv wdth100">

        <h2>Add New Book Issued</h2>

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

        <form id="Bookform">
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

                        <div class="col-md-5"><label>District</label></div>

                        <div class="col-md-7"><select class="form-control" id="DivisionID" name="DivisionID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Registration No</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="RegNo" maxlength="20" name="RegNo" /></div>

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





            <div class="row">

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Owner Type</label></div>

                        <div class="col-md-7"><select class="form-control" id="OwnerTypeID" name="OwnerTypeID"><option></option></select></div>

                    </div>

                </div>

                <div class="col-md-6" id="OwnerTitleDiv">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Title</label></div>

                        <div class="col-md-7"><select class="form-control" id="OwnerTitle" name="OwnerTitle"><option></option></select></div>

                    </div>

                </div>

            </div>



            <div class="row form-group">



                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Category</label></div>

                        <div class="col-md-7"><select class="form-control" id="CategoryID" name="CategoryID"><option></option></select></div>

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

                        <div class="col-md-5"><label>Class Of Vehicle</label></div>

                        <div class="col-md-7"><select class="form-control" id="ClassID" name="ClassID"><option></option></select></div>

                    </div>

                </div>



                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Owner Name</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="OwnerName" name="OwnerName" /></div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Chassis No</label></div>

                        <div class="col-md-7"><input type="text" class="form-control" id="ChassisNo" name="ChassisNo" /></div>

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

                            BOOK DETAIL

                        </h4>

                        <div class="row form-group">

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Application For</label></div>

                                    <div class="col-md-7"><select class="form-control" id="BookType" name="BookType"></select></div>

                                </div>

                            </div>

                            <div class="col-md-6 hideextra">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Reason</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control " id="ReasonID" name="ReasonID"/></div>

                                </div>

                            </div>

                            <div class="col-md-6 hideextra">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Circumstances</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control " id="Circumstances" maxlength="50" name="Circumstances" /></div>

                                </div>

                            </div>

                            <div class="col-md-6 hideextra">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>FIR #</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control " maxlength="20" id="FIR" name="FIR" /></div>

                                </div>

                            </div>

                            <div class="col-md-6 hideextra">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>FIR Date</label></div>

                                    <div class="col-md-7"><input type="date" class="form-control " id="FIRDate" name="FIRDate" /></div>

                                </div>

                            </div>

                            <div class="col-md-6 hideextra">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Police Station</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control " id="PoliceStationID" name="PoliceStationID"/></div>

                                </div>

                            </div>

                            <div class="col-md-6 hideextra">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Inspection Date</label></div>

                                    <div class="col-md-7"><input type="date" class="form-control" id="InspectionDate" name="InspectionDate" /></div>

                                </div>

                            </div>

                            <div class="col-md-6 hideextra">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Inspector</label></div>

                                    <div class="col-md-7">

                                        <input type="text" class="form-control" id="Inspector" name="Inspector" />



                                    </div>

                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label id="labelbook">Duplicate Book #</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="DuplicateBook" maxlength="20" name="DuplicateBook" /></div>

                                </div>

                            </div>

                        </div>

                        <div class="row form-group">

                            <div class="col-md-3"></div>

                            <div class="col-md-6 text-center">

                                <a href="/NBI">  <button type="button" class="btn btnCancel">CANCEL</button></a>



                                <a onclick="SaveBookinfo();" id="Operation" class="btn btnCustom">APPLY</a>

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

    $(document).ready(function () {

        LoadETO();

        LoadOwnerTitle()

        LoadOwnerType()

        LoadBookTypes();

        LoadDivisions();

        LoadRegistrationMark();

        LoadVehicleCategory();

        LoadBodyType();

        LoadVehicleType();

        LoadColors();

        //LoadReasons();

        //LoadPoliceStations();

        $("#OwnerTypeID").prop("disabled", true);

        $("#OwnerTitle").prop("disabled", true);

        $("#CategoryID").prop("disabled", true);

        $("#ClassID").prop("disabled", true);

        $("#BodyTypeID").prop("disabled", true);

        $("#OwnerName").prop("disabled", true);

        $("#ChassisNo").prop("disabled", true);



        var value = $('#RecordId').val();



        if (value != "") {

            GetData(value);

            //GetDocumentData(value);

            $("#Operation").attr("onclick", "SaveBookinfo()").unbind("click");

            $("#Operation").attr("onclick", "UpdateBookinfo()").bind("click");

            $("#Operation").text('Update');



        }



    });

    function LoadBookTypes() {



        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadBookType",

            dataType: 'json',

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#BookType').empty();

                        $('#BookType').append("<option value='0'>--Select ApplicationFor--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.application_type + '</option>').appendTo('#BookType');

                        });



                    }

                    else {



                    }

                }

                else {



                }

            },

            error: function (response) {

                swal("Something went wrong");

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

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#OwnerTitle').empty();

                        $('#OwnerTitle').append("<option value='0'>--Select Owner Title--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.owner_title + '</option>').appendTo('#OwnerTitle');

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

                            $('<option value="' + value.id + '">' + value.Name + '</option>').appendTo('#CategoryID');

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


    $("#BookType").change(function () {
            var val = $('#BookType').val();
            if(val==3)
            {
                $('.hideextra').hide();
                $('#labelbook').text("Book Serial #");
            }
            else
            {
                $('.hideextra').show();
                $('#labelbook').text("Duplicate Book #");
            }
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

                swal("Something went wrong");

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

                        $('#OwnerTypeID').append("<option value='0'>--Select OwnerType--</option>");

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



    //$("#ClassID").change(function () {

    //    var VehicleClassID = $("#ClassID").val();

    //    var CategoryID = $("#CategoryID").val();



    //    $.ajax({

    //        type: "Get",

    //        contentType: 'application/json; charset=utf-8',

    //        url: "/DEO/LoadBodyType",

    //        dataType: 'json',

    //        data: {  CategoryID: CategoryID },

    //        success: function (response) {



    //            //removeOptions(document.getElementById("slabID"));

    //            if (response.Status == true) {

    //                if (typeof response != 'undefined' && response != null && response != 0) {



    //                    $('#BodyTypeID').empty();

    //                    $('#BodyTypeID').append("<option value='0'>--Select Body Type--</option>");

    //                    $.each(response.Data, function (index, value) {

    //                        $('<option value="' + value.id + '">' + value.Name + '</option>').appendTo('#BodyTypeID');

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

    //});



    //}

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

    function LoadReasons() {



        $.ajax({



            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadReasons",

            dataType: 'json',

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#ReasonID').empty();

                        $('#ReasonID').append("<option value='0'>--Select Reason--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.Name + '</option>').appendTo('#ReasonID');

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

    function LoadPoliceStations() {

        $.ajax({

            type: "Get",

            contentType: 'application/json; charset=utf-8',

            url: "/DEO/LoadPoliceStation",

            dataType: 'json',

            async: false,

            success: function (response) {



                //removeOptions(document.getElementById("slabID"));

                if (response.Status == true) {

                    if (typeof response != 'undefined' && response != null && response != 0) {



                        $('#PoliceStationID').empty();

                        $('#PoliceStationID').append("<option value='0'>--Select Police Station--</option>");

                        $.each(response.Data, function (index, value) {

                            $('<option value="' + value.id + '">' + value.Name + '</option>').appendTo('#PoliceStationID');

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



    function SearchFor() {





        var District = $('#DivisionID ').val();

        var Regno = $('#RegNo').val().trim();

        var eto = $('#ETO').val();

        var check = true;

        if (District == null || District == "") {

            $('#DivisionID').addClass('error');

            check = false;

        }

        if (Regno == null || Regno == "") {

            $('#RegNo').addClass('error');

            check = false;

        }

        if (check == false) {



            swal("Please fill the search criteria.");

            $("#RegistrationNo").val('');

            $("#DistrictID").val('');

            $("#VehicleName").val('');

            $("#Category").val('');

            $("#Class").val('');

            $("#BodyType").val('');

            $("#OwnerName").val('');

            $("#CNIC").val('');

            $("#MobileNumber").val('');

            $("#LastPaidYear").val('');

            $("#LastPaidAmount").val('');

            $("#DurationID").val('');

            $("#TaxAmount").val('');



            //    $("#DivisionRegion").css("display", "block");

            //    $("#DivisionRegion").html("Please fill the required field(s)").css("font-size","large");

            return false;

        }

        else {

            //$("#DivisionRegion").css("display", "None");

            $('#RegNo').removeClass('error');

            $('#DivisionID').removeClass('error');





            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/getVehicleInfoagainstId",

                dataType: 'json',

                data: { RegNo: Regno, DistrictID: District ,ETO_CODE:eto, type : "bookissue"},

                success: function (response) {

                    if (response.Status == true) {



                        $('#OwnerTypeID').val(response.Data.owner_type_id);

                        $('#OwnerTitle').val(response.Data.title);

                        if(response.Data2==null)
                            {
                                $('#OwnerName').val(response.Data.name_);

                            }
                            else
                            {
                                $('#OwnerName').val(response.Data2.name);
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



    $("#Bookform").validate({

        rules: {

            "BookType": {

                required: true,

                Dropdown: true,

            },

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

            //"OwnerName": { required: true, },

            //"CategoryID": {

            //    required: true,

            //    Dropdown: true,

            //},

            //"BodyTypeID": {

            //    required: true,

            //    Dropdown: true,

            //},

            //"ChassisNo": { required: true, },

            //"EngineNo": { required: true, },

            //"ColorID": {

            //    required: true,

            //    Dropdown: true,

            //},

            //"ClassID": {

            //    required: true,

            //    Dropdown: true,

            //},

            //"ReasonID": {

            //    required: true,

            //    Dropdown: true,

            //},

            "RegNo": {required:true},

            //"Circumstances"   :{ required :true,},

            //"FIR"             :{ required :true,},

            //"FIRDate"         :{ required :true,},

            //"PoliceStationID": {

            //    required: true,

            //    Dropdown: true,

            //},

            //"InspectionDate"  :{ required :true,},

            //"Inspector"       :{ required :true,},

            //"RegNo"           :{ required :true,},

            //"DuplicateBook"   :{ required :true,},



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











    function SaveBookinfo() {


        var check= true;
        // var Bookvalitade = $('#Bookform').valid();

        var _token= $("input[name='_token']").val();

        // if (Bookvalitade) {

            var ETO_CODE = $('#ETO').val();

            var BookType = $('#BookType').val();

            var DivisionID = $('#DivisionID').val();

            var RegNo = $('#RegNo').val();

            var OwnerName = $('#OwnerName').val();

            var CategoryID = $('#CategoryID').val();

            var BodyTypeID = $('#BodyTypeID').val();

            var OwnerTypeID = $('#OwnerTypeID').val();

            var OwnerTitleID = $('#OwnerTitle').val();

            var ClassID = $('#ClassID').val();

            var ReasonID = $('#ReasonID').val();

            var Circumstances = $('#Circumstances').val();

            var FIR = $('#FIR').val();

            var FIRDate = $('#FIRDate').val();

            var PoliceStationID = $('#PoliceStationID').val();

            var InspectionDate = $('#InspectionDate').val();

            var Inspector = $('#Inspector').val();

            var DuplicateBook = $('#DuplicateBook').val();

            var ChassisNo = $("#ChassisNo").val();

            if (DuplicateBook == "") {

                $('#DuplicateBook').addClass('error');

                check = false;

                }


            if (BookType == 0) {

                    $('#BookType').addClass('error');

                    check = false;

                    }

            if (BookType != 3) {

                if (ReasonID == 0) {

                    $('#ReasonID').addClass('error');

                    check = false;

                    }

                if (Circumstances == 0) {

                        $('#Circumstances').addClass('error');

                        check = false;

                        }

                if (FIR == 0) {

                    $('#FIR').addClass('error');

                    check = false;

                    }

                if (FIRDate == 0) {

                    $('#FIRDate').addClass('error');

                    check = false;

                    }

                if (PoliceStationID == 0) {

                    $('#PoliceStationID').addClass('error');

                    check = false;

                    }

                if (InspectionDate == 0) {

                    $('#InspectionDate').addClass('error');

                    check = false;

                    }

                if (Inspector == 0) {

                    $('#Inspector').addClass('error');

                    check = false;

                    }


                }


                if (check == false) {

                swal("Please fill the search criteria.");



                return false;

                }



            $.ajax({

                url: '/NBI',

                contentType: "application/json; charset=utf-8",

                type: "POST",

                dataType: "JSON",

                data: JSON.stringify({

                    _token: _token,

                    ETO_CODE: ETO_CODE,

                    BookType: BookType,

                    DivisionID: DivisionID,

                    OwnerName: OwnerName,

                    OwnerTypeID: OwnerTypeID,

                    OwnerTitleID: OwnerTitleID,

                    CategoryID: CategoryID,

                    BodyTypeID: BodyTypeID,

                    ClassID: ClassID,

                    ReasonID: ReasonID,

                    Circumstances: Circumstances,

                    FIR: FIR,

                    FIRDate: FIRDate,

                    PoliceStationID: PoliceStationID,

                    InspectionDate: InspectionDate,

                    Inspector: Inspector,

                    RegNo: RegNo,

                    DuplicateBook: DuplicateBook,

                    ChassisNo: ChassisNo

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

                                window.location.href = "/NBI";

                                // LoadTable();

                            })

                    }

                    else {

                        swal(response.msg);

                    }

                },



                error: function (response) {
                    swal('Something went wrong');
                }

            });

        //}

        // else {

        //     alert("please verify your form first!.");

        // }

    }



     function GetData(ID) {

           // var ID = ;





         $("#Search").hide(),

          $("#Clear").hide(),



        $.ajax({

            url: '/DEO/GetNewBookList',

            type: "GET",

            dataType: "JSON",

            data: {ID:ID},

            success: function (response) {



                if (response.Status) {

                    $('#BookType').val(response.Data[0].BookType);



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

                            //swal("Something went wrong");

                        }

                    });

                    $('#DivisionID').val(response.Data[0].DivisionID);

                    $("#OwnerTypeID").val(response.Data[0].OwnerTypeID);

                    $("#OwnerTitle").val(response.Data[0].OwnerTitleID);

                    $('#OwnerName').val(response.Data[0].OwnerName);

                    $('#ClassID').val(response.Data[0].ClassID);

                    //$.ajax({

                    //    type: "Get",

                    //    contentType: 'application/json; charset=utf-8',

                    //    url: "/DEO/LoadBodyType",

                    //    dataType: 'json',

                    //    data: {  CategoryID: $('#CategoryID').val() },

                    //    async:false,

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

                    $('#ReasonID').val(response.Data[0].ReasonID);

                    $('#Circumstances').val(response.Data[0].Circumstances);

                    $('#FIR').val(response.Data[0].FIR);

                    $('#FIRDate').val(moment(response.Data[0].FIRDate).format('YYYY-MM-DD'));

                    $('#PoliceStationID').val(response.Data[0].PoliceStationID);

                    $('#InspectionDate').val(moment(response.Data[0].InspectionDate).format('YYYY-MM-DD'));

                    $('#Inspector').val(response.Data[0].Inspector);

                    $('#RegNo').val(response.Data[0].RegNo);

                    $('#DuplicateBook').val(response.Data[0].DuplicateBook);

                    $("#ChassisNo").val(response.Data[0].ChassisNo);





                }

                else {

                    swal("something went wrong")

                }

            }

        });



    }

    function UpdateBookinfo() {



        var Bookvalitade = $('#Bookform').valid();

        if (Bookvalitade) {

        var ID = $('#RecordId').val();

        var BookType = $('#BookType').val();

        var ETO_CODE = $('#ETO').val();

        var DivisionID = $('#DivisionID').val();

        var OwnerTypeID = $('#OwnerTypeID').val();

        var OwnerTitleID = $('#OwnerTitle').val();

        var OwnerName = $('#OwnerName').val();

        var CategoryID = $('#CategoryID').val();

        var BodyTypeID = $('#BodyTypeID').val();

        var ChassisNo = $('#ChassisNo').val();

        var EngineNo = $('#EngineNo').val();

        var ColorID = $('#ColorID').val();

        var ClassID = $('#ClassID').val();

        var ReasonID = $('#ReasonID').val();

        var Circumstances = $('#Circumstances').val();

        var FIR = $('#FIR').val();

        var FIRDate = $('#FIRDate').val();

        var PoliceStationID = $('#PoliceStationID').val();

        var InspectionDate = $('#InspectionDate').val();

        var Inspector = $('#Inspector').val();

        var RegNo = $('#RegNo').val();

        var DuplicateBook = $('#DuplicateBook').val();

        var ChassisNo = $("#ChassisNo").val();



        $.ajax({

            url: '/DEO/UpdateNewBook',

            contentType: "application/json; charset=utf-8",

            type: "POST",

            dataType: "JSON",

            data: JSON.stringify({

                ID :ID,

                BookType: BookType,

                DivisionID: DivisionID,

                OwnerTypeID: OwnerTypeID,

                OwnerTitleID: OwnerTitleID,

                OwnerName: OwnerName,

                CategoryID: CategoryID,

                BodyTypeID: BodyTypeID,

                ChassisNo: ChassisNo,

                EngineNo: EngineNo,

                ColorID: ColorID,

                ClassID: ClassID,

                ReasonID: ReasonID,

                Circumstances: Circumstances,

                FIR: FIR,

                FIRDate: FIRDate,

                PoliceStationID: PoliceStationID,

                InspectionDate: InspectionDate,

                Inspector: Inspector,

                RegNo: RegNo,

                DuplicateBook: DuplicateBook,

                ETO_CODE: ETO_CODE



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

                            window.location.href = "../DEO/Book";

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

            alert("please verify your form first!.");

        }

    }



    $("#Clear").click(function () {



        $('#DivisionID').val('0');

        $('#RegNo').val('');

        $("#OwnerTypeID").val('0');

        $("#OwnerTitle").val('0');

        $("#CategoryID").val('0');

        $("#ClassID").val('0');

        $("#BodyTypeID").val('0');

        $("#OwnerName").val('');

        $("#BodyType").val('');

        $("#OwnerName").val('');

        $("#ChassisNo").val('');



        $("#BookType").val('0');

        $("#ReasonID").val('0');

        $("#Circumstances").val('');

        $("#FIR").val('');

        $("#FIRDate").val('');

        $("#Inspector").val('');

        $("#PoliceStationID").val('0');

        $("#InspectionDate").val('');

        $("#DuplicateBook").val('');



    });



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











































</script>

                        </div>

                    </div>

                </div>

            </div>



            <!-- /page content -->





@endsection
