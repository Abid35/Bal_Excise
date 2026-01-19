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

                            <h2>Add New Transfer</h2>

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

                            <form id="Transferform">


                                @csrf

                                <div class="row form-group">

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>ETO </label></div>

                                            <div class="col-md-7"><select class="form-control" id="ETO_CODE" name="ETO_CODE"><option></option></select></div>

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

                                            <div class="col-md-5"><label>Registration Number </label></div>

                                            <div class="col-md-7"><input type="text" class="form-control" id="RegNo" name="RegNo" /></div>



                                        </div>

                                    </div>



                                    <div class="col-md-4">

                                        <div class="row form-group">

                                            <div class="col-md-4"><label>Transfer Code</label></div>

                                            <div class="col-md-8 pdl-30"><input type="text" class="form-control" id="TranferCode" name="TranferCode" /></div>

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

                                    GOVERNMENT DEPARTMENT

                                </h4>

                                <div class="row form-group">

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Name</label></div>

                                            <div class="col-md-7"><input type="text" class="form-control" id="govtDepart" name="govtDepart" /></div>

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

                                            <div class="col-md-5"><label>Chassis No</label></div>

                                            <div class="col-md-7"><input type="text" class="form-control" id="ChassisNo" name="ChassisNo" /></div>

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

                                    OLD OWNER

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

                                            <div class="col-md-7"><select class="form-control" id="OldOwnerTitleID" name="OldOwnerTitleID"><option></option></select></div>

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

                                            <div class="col-md-6" id="HideOldntn">
                                                <div class="row form-group">
                                                    <div class="col-md-5"><label>NTN No</label></div>
                                                    <div class="col-md-6">
                                                        <input type="text" data-inputmask="'mask':'9999999-9'" placeholder="xxxxxxx-x"  class="form-control oldNTN"  id="oldNTN" name="oldNTN" disabled/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" id="HideOldCnic">
                                                <div class="row form-group">
                                                    <div class="col-md-5"><label>Old CNIC No</label></div>
                                                    <div class="col-md-6">
                                                        <input type="text" data-inputmask="'mask':'999-99-999999'" placeholder="xxx-xx-xxxxxx" class="form-control NewoldCnic"  id="oldCnic" name="oldCnic"/>
                                                        {{--                                    <input type="text" data-inputmask="'mask':'99999-9999999-9'" placeholder="xxxxx-xxxxxxx-x" class="form-control" id="oldCnic" name="oldCnic" />--}}
                                                        <span id="ExistoldCnic" style="color:red;display:none"></span>
                                                    </div>
                                                    <div class="col-md-1" style="padding-left: 0;"
                                                    <button type="button" id="AddOwners" class="btn btnCustom" onclick="AddMoreOwner()" style="margin:0;width:100%"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" id="HideNewCnic">

                                            <div class="row form-group">

                                                <div class="col-md-5"><label id="lblCnic">New CNIC No</label></div>

                                                <div class="col-md-7">

                                                    <input type="text" class="form-control" data-inputmask="'mask':'99999-9999999-9'" placeholder="xxxxx-xxxxxxx-x" id="newCnic" name="newCnic" />

                                                    <span id="ExistnewCnic" style="color:red;display:none"></span>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-6" id="HideFatherDiv">

                                            <div class="row form-group">

                                                <div class="col-md-5"><label>Father or Husband Name</label></div>

                                                <div class="col-md-6"><input type="text" class="form-control" id="guardianName" name="guardianName" maxlength="50" onkeypress="ValidateInput(this.id,event)" /></div>

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

                                        <div class="col-md-7"><input type="text" class="form-control" id="OldOwnerHouseNo" name="OldOwnerHouseNo" /></div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="row form-group">

                                        <div class="col-md-5"><label>Province</label></div>

                                        <div class="col-md-7">

                                            <select class="form-control" id="OldOwnerProvinceID" name="OldOwnerProvinceID"><option></option></select>



                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="row form-group">

                                        <div class="col-md-5"><label>City</label></div>

                                        <div class="col-md-7">

                                            <select class="form-control" id="OldOwnerCityID" name="OldOwnerCityID"><option></option></select>



                                        </div>

                                    </div>

                                </div>



                                <div class="col-md-6">

                                    <div class="row form-group">

                                        <div class="col-md-5"><label>Mobile</label></div>

                                        <div class="col-md-7"><input type="text" class="form-control" data-inputmask="'mask':'\\929999999999'" placeholder="92xxxxxxxxxx" id="OldOwnerMobile" name="OldOwnerMobile" /></div>

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

                            NEW OWNER

                        </h4>

                        <div class="row form-group">

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Owner Type</label></div>

                                    <div class="col-md-7"><select class="form-control" id="NewOwnerTypeID" name="OwnerTypeID"><option></option></select></div>

                                </div>

                            </div>

                            <div class="col-md-6" id="OwnerTitleDiv1">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Title</label></div>

                                    <div class="col-md-7"><select class="form-control" id="NewOwnerTitleID" name="NewOwnerTitleID"><option></option></select></div>

                                </div>

                            </div>

                            <div class="row form-group" id="Owners1Appendeds">

                                <div id="ownerno_0">

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Name</label></div>

                                            <div class="col-md-7"><input type="text" class="form-control" id="NewOwnerName" name="NewOwnerName" maxlength="50"  /></div>

                                        </div>

                                    </div>

                                    <div class="col-md-6" id="HideOldCnic1">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Old CNIC No</label></div>

                                            <div class="col-md-6">

                                                <input type="text" data-inputmask="'mask':'999-99-999999'" placeholder="xxx-xx-xxxxxx" class="form-control NewoldCnic" id="NewoldCnic" name="NewoldCnic" />

                                                <span id="ExistoldCnic" style="color:red;display:none"></span>

                                            </div>

                                            <div class="col-md-1" style="padding-left: 0;">

                                                <button type="button" id="AddOwners1" class="btn btnCustom" onclick="AddMoreOwner1()" style="margin:0;width:100%"><i class="fa fa-plus"></i></button>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6" id="HideNewCnic1">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label id="lblCnic1">New CNIC No</label></div>

                                            <div class="col-md-6">

                                                <input type="text" class="form-control newCnic1" data-inputmask="'mask':'99999-9999999-9'" placeholder="xxxxx-xxxxxxx-x" id="newCnic1" name="newCnic1" />
                                                <input type="text" class="form-control NTN" style="display:none" data-inputmask="'mask':'9999999-9'" placeholder="xxxxxxx-x" id="NTN" name="newCnic1" />


                                                <span id="ExistnewCnic" style="color:red;display:none"></span>

                                            </div>

                                            <div class="col-md-1" style="padding-left: 0;">

                                                <button type="button" class="btn btnCustom" id="searchCnicBtn" disabled style="margin:0;width:100%;"><i class="fa fa-search"></i></button>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6" id="HideFatherDiv1">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Father or Husband Name</label></div>

                                            <div class="col-md-6"><input type="text" class="form-control" id="guardianName1" name="guardianName1" maxlength="50"  /></div>

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

                                    <div class="col-md-7"><input type="text" class="form-control" id="NewOwnerHouseNo" name="NewOwnerHouseNo" /></div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Province</label></div>

                                    <div class="col-md-7">

                                        <select class="form-control" id="NewOwnerProvinceID" name="NewOwnerProvinceID"><option></option></select>



                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>City</label></div>

                                    <div class="col-md-7">

                                        <select class="form-control" id="NewOwnerCityID" name="NewOwnerCityID"><option></option></select>



                                    </div>

                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Mobile</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" data-inputmask="'mask':'\\929999999999'" placeholder="92xxxxxxxxxx" id="NewOwnerMobile" name="NewOwnerMobile" /></div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Transfer Date</label></div>

                                    <div class="col-md-7"><input type="date" class="form-control" data-inputmask="'mask':'\\929999999999'" placeholder="92xxxxxxxxxx" id="TransferDate" name="TransferDate" /></div>

                                </div>

                            </div>

                            <div class="col-md-6">
                                <div id="availableNumbersDiv" class="row form-group align-items-center" style="display: none;">
                                    <div class="col-md-5">
                                        <label class="fw-semibold mb-2">Available Numbers</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div id="availableNumbersList" class="border rounded p-2" style="max-height: 150px; overflow-y: auto;">
                                            <!-- Checkboxes will be appended here -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row form-group align-items-center">
                                    <div class="col-md-5">
                                        <label class="fw-semibold mb-0">Registration No</label>
                                    </div>
                                    <div class="col-md-7">

                                        {{-- Radio Buttons --}}
                                        <div class="d-flex align-items-center mb-3" style="gap: 20px;">
                                            <label class="mb-0">
                                                <input type="radio" name="reg_option" value="manual" checked onchange="toggleRegOption()"> Manual
                                            </label>
                                            <label class="mb-0">
                                                <input type="radio" name="reg_option" value="generate" onchange="toggleRegOption()"> Generate
                                            </label>
                                        </div>

                                        {{-- Manual Input --}}
                                        <div id="manualInputDiv">
                                            <input
                                                type="text"
                                                id="regNo"
                                                name="regNo"
                                                class="form-control"
                                                placeholder="Format = (ABC123)"
                                                maxlength="20"
                                                pattern="[A-Z]{3}[0-9]{3}"
                                                onkeypress="ValidateInputNA(this.id,event)" />
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="row form-group">

                            <div class="col-md-3">
                                <div id="RecordId1"></div>
                            </div>

                            <div class="col-md-6 text-center">



                                <button type="button" class="btn btnCancel">CANCEL</button>



                                <a onclick="SaveTranfer();" id="Operation" class="btn btnCustom">SUBMIT</a>

                            </div>

                        </div>



                        </form>

                    </div>

                </div>



                <input type="hidden" id="RecordId" />

                <script>
                    $(document).ready(function () {
                        $("#searchCnicBtn").on("click", function () {
                            var newCnic = $("#newCnic1").val().trim();

                            if (!newCnic) {
                                alert("Please enter a CNIC number!");
                                return;
                            }

                            $.ajax({
                                url: '/search-vehicle-cnic',  // ✅ Replace with your Laravel route
                                type: 'POST',
                                data: {
                                    _token: $('meta[name="csrf-token"]').attr('content'),
                                    cnic: newCnic
                                },
                                success: function(response) {
                                    if (response.Data2 && response.Data2.length > 0) {
                                        var html = `<div class="d-flex flex-wrap gap-3">`;

                                        response.Data2.forEach(function(item, index) {
                                            html += `
                            <div class="form-check d-flex align-items-center mb-1" style="gap: 6px;padding-right: 5px;">
                                <input
                                    class="form-check-input available-number"
                                    type="checkbox"
                                    name="available_numbers[]"
                                    id="num_${index}"
                                    value="${item.registration_no}">
                                <label class="form-check-label text-dark border px-3 py-2 rounded-3" for="num_${index}" style="cursor:pointer;">
                                    ${item.registration_no}
                                </label>
                            </div>
                        `;
                                        });

                                        html += `</div>`;
                                        $("#availableNumbersList").html(html);
                                        $("#availableNumbersDiv").show();

                                        // ✅ Checkbox click event
                                        $(".available-number").on("change", function () {
                                            $(".available-number").not(this).prop("checked", false);

                                            if ($(this).is(":checked")) {
                                                $("#regNo").val($(this).val()); // set in manual input
                                            } else {
                                                $("#regNo").val(""); // clear input if unchecked
                                            }
                                        });

                                    } else {
                                        $("#availableNumbersList").html('<span class="text-muted">No available numbers found.</span>');
                                        $("#availableNumbersDiv").show();
                                    }
                                },
                                error: function(xhr) {
                                    console.log(xhr.responseText);
                                    alert("Something went wrong. Please try again.");
                                }
                            });
                        });
                    });

                </script>

                <script>
                    function toggleRegOption() {
                        const option = document.querySelector('input[name="reg_option"]:checked').value;
                        document.getElementById('manualInputDiv').style.display = option === 'manual' ? 'block' : 'none';
                        document.getElementById('generateDiv').style.display = option === 'generate' ? 'block' : 'none';
                    }

                    document.getElementById('pattern_id').addEventListener('change', function() {
                        document.getElementById('generateBtn').disabled = !this.value;
                    });
                </script>

                <script>

                    $(document).ready(function () {

                        LoadETO();

                        LoadDivisions();

                        //LoadRegistrationMark();

                        LoadVehicleCategory();

                        LoadOwnerType();

                        LoadBodyType();

                        LoadColors();

                        LoadVehicleType();

                        LoadOldOwnerTitle();

                        LoadNewOwnerTitle();

                        LoadOldOWnerProvince();

                        LoadNewOWnerProvince();

                        NewLoadOwnerType();



                        var value = $('#RecordId').val();



                        if (value != "") {



                            GetData(value);

                            //GetDocumentData(value);

                            $("#Operation").attr("onclick", "SaveTranfer()").unbind("click");

                            $("#Operation").attr("onclick", "UpdateTranfer()").bind("click");

                            $("#Operation").text('Update');

                            $("#ETO_CODE").prop("disabled", true);

                            $("#DivisionID").prop("disabled", true);

                            $("#RegNo").prop("disabled", true);

                        }



                        $("#TranferCode").prop("disabled", true);

                        $("#CategoryID").prop("disabled", true);

                        $("#ClassID").prop("disabled", true);

                        $("#BodyTypeID").prop("disabled", true);

                        $("#ChassisNo").prop("disabled", true);
                        $("#govtDepart").prop("disabled", true);

                        $("#OwnerTypeID").prop("disabled", true);

                        $("#OldOwnerTitleID").prop("disabled", true);

                        $("#OwnerName").prop("disabled", true);

                        $("#oldCnic").prop("disabled", true);

                        $("#newCnic").prop("disabled", true);

                        $("#guardianName").prop("disabled", true);

                        $("#OldOwnerHouseNo").prop("disabled", true);

                        $("#OldOwnerProvinceID").prop("disabled", true);

                        $("#OldOwnerCityID").prop("disabled", true);



                        $("#OldOwnerMobile").prop("disabled", true);



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

                            + '                <input type="text" data-inputmask=""mask":"99999-9999999-9"" placeholder="xxxxx-xxxxxxx-x" class="form-control" id="oldCnic" name="oldCnic" />                    '

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

                            + '                <input type="text" class="form-control" data-inputmask=""mask":"99999 - 9999999 - 9"" placeholder="xxxxx-xxxxxxx-x" id="newCnic" name="newCnic" />                    '

                            + '                <span id="ExistnewCnic" style="color:red;display:none"></span>                                                                                                    '

                            + '            </div>                                                                                                                                                                '

                            + '        </div>                                                                                                                                                                    '

                            + '    </div>                                                                                                                                                                        '

                            + '    <div class="col-md-6">                                                                                                                                                        '

                            + '        <div class="row form-group">                                                                                                                                              '

                            + '            <div class="col-md-5"><label>Father or Husband Name</label></div>                                                                                                     '

                            + '            <div class="col-md-6"><input type="text" class="form-control" id="guardianName" name="guardianName" /></div>                                                          '

                            + '        </div>                                                                                                                                                                    '

                            + '    </div>                                                                                                                                                                        '

                            + '</div>                                                                                                                                                                            ';



                        $('#OwnersAppended').append(a);

                        ownerCounter++;



                    }



                    function RemoveOwner(a) {

                        $('#owner_' + a).remove();

                    }





                    var ownerCounter = 1;

                    function AddMoreOwner1() {

                        var a = '<div id="ownerno_' + ownerCounter + '">                                                                                                                                                                '

                            + '    <div class="col-md-6">                                                                                                                                                        '

                            + '        <div class="row form-group">                                                                                                                                              '

                            + '            <div class="col-md-5"><label>Name</label></div>                                                                                                                       '

                            + '            <div class="col-md-7"><input type="text" class="form-control" id="NewOwnerName" name="NewOwnerName" /></div>                                                                '

                            + '        </div>                                                                                                                                                                    '

                            + '    </div>                                                                                                                                                                        '

                            + '    <div class="col-md-6">                                                                                                                                                        '

                            + '        <div class="row form-group">                                                                                                                                              '

                            + '            <div class="col-md-5"><label>Old CNIC No</label></div>                                                                                                                '

                            + '            <div class="col-md-6">                                                                                                                                                '

                            + '                <input type="text" data-inputmask=""mask":"99999-9999999-9"" placeholder="xxxxx-xxxxxxx-x" class="form-control NewoldCnic" id="NewoldCnic" name="NewoldCnic" />                    '

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

                            + '                <input type="text" class="form-control newCnic1" data-inputmask=""mask":"99999 - 9999999 - 9"" placeholder="xxxxx-xxxxxxx-x" id="newCnic1" name="newCnic1" />                    '

                            + '                <span id="ExistnewCnic" style="color:red;display:none"></span>                                                                                                    '

                            + '            </div>                                                                                                                                                                '

                            + '        </div>                                                                                                                                                                    '

                            + '    </div>                                                                                                                                                                        '

                            + '    <div class="col-md-6">                                                                                                                                                        '

                            + '        <div class="row form-group">                                                                                                                                              '

                            + '            <div class="col-md-5"><label>Father or Husband Name</label></div>                                                                                                     '

                            + '            <div class="col-md-6"><input type="text" class="form-control" id="guardianName1" name="guardianName1" /></div>                                                          '

                            + '        </div>                                                                                                                                                                    '

                            + '    </div>                                                                                                                                                                        '

                            + '</div>                                                                                                                                                                            ';



                        $('#Owners1Appendeds').append(a);

                        ownerCounter++;



                    }



                    function RemoveOwner(a) {

                        $('#ownernew_' + a).remove();

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

                    function NewLoadOwnerType() {



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



                                        $('#NewOwnerTypeID').empty();

                                        $('#NewOwnerTypeID').append("<option value='0'>--Select OwnerType--</option>");

                                        $.each(response.Data, function (index, value) {

                                            $('<option value="' + value.id + '">' + value.owner_type + '</option>').appendTo('#NewOwnerTypeID');

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

                            /*data: { VehicleClassID: VehicleclassID, CategoryID: categoryID },*/

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







                    function SearchFor() {



                        var District = $('#DivisionID ').val();

                        var Regno = $('#RegNo').val().trim();

                        var ETO_CODE= $('#ETO_CODE').val();



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

                            //return false;



                        }



                        else {

                            var getVal = ValidateCode(District, Regno);

                            $("#TranferCode").val(getVal);





                            //$("#DivisionRegion").css("display", "None");

                            $('#RegNo').removeClass('error');

                            $('#DivisionID').removeClass('error');


                            $("#availableNumbersDiv").hide();
                            $.ajax({

                                type: "Get",

                                contentType: 'application/json; charset=utf-8',

                                url: "/DEO/getVehicleInfoagainstId",

                                dataType: 'json',

                                data: { RegNo: Regno, DistrictID: District , ETO_CODE : ETO_CODE , type: "Transfer"},


                                success: function (response) {

                                    if (response.Status == true) {
                                        $("#searchCnicBtn").prop("disabled", false);

                                        // if (response.Data2 && response.Data2.length > 0) {
                                        //     var html = `<div class="d-flex flex-wrap gap-3">`;
                                        //
                                        //     response.Data2.forEach(function (item, index) {
                                        //         html += `
                                        //                 <div class="form-check d-flex align-items-center mb-1" style="gap: 6px;padding-right: 5px;">
                                        //                     <input
                                        //                         class="form-check-input available-number"
                                        //                     type="checkbox"
                                        //                     name="available_numbers[]"
                                        //                     id="num_${index}"
                                        //                     value="${item.registration_no}">
                                        //                 <label class="form-check-label text-dark border px-3 py-2 rounded-3" for="num_${index}" style="cursor:pointer;">
                                        //                     ${item.registration_no}
                                        //                 </label>
                                        //             </div>
                                        //         `;
                                        //     });
                                        //
                                        //     html += `</div>`;
                                        //
                                        //     $("#availableNumbersList").html(html);
                                        //     $("#availableNumbersDiv").show();
                                        //
                                        //     // ✅ Checkbox click event
                                        //     $(".available-number").on("change", function () {
                                        //         // Uncheck all other checkboxes (only one can be selected)
                                        //         $(".available-number").not(this).prop("checked", false);
                                        //
                                        //         if ($(this).is(":checked")) {
                                        //             $("#regNo").val($(this).val()); // set in manual input
                                        //         } else {
                                        //             $("#regNo").val(""); // clear input if unchecked
                                        //         }
                                        //     });
                                        //
                                        // } else {
                                        //     $("#availableNumbersList").html('<span class="text-muted">No available numbers found.</span>');
                                        //     $("#availableNumbersDiv").show();
                                        // }


                                        if (response.Data.transfer_code > 0) {



                                            $('#TranferCode').val(parseInt(response.Data.transfer_code)+1)



                                        }
                                        else {



                                            $('#TranferCode').val(1)



                                        }

                                        $("#ChassisNo").val(response.Data.chassis_no)
                                        $("#govtDepart").val(response.Data.government_department)



                                        $("#OwnerTypeID").val(response.Data.owner_type_id)

                                        if (response.Data.owner_type_id == "1") {

                                            $("#AddOwners").hide();
                                            $("#HideNewCnic").show();
                                            $("#HideFatherDiv").show();
                                            $("#OwnerTitleDiv").show();
                                            $("#lblCnic").text("New CNIC No");

                                            $("#OwnerTypeID").val(response.Data.owner_type_id);
                                            $("#OwnerName").val(response.Data.name_);
                                            $('input[name="oldCnic"]').val(response.Data.old_cnic_no);
                                            $('#guardianName').val(response.Data.father_or_husband_name);

                                            $("#newCnic").show().val(response.Data.new_cnic_no);
                                            $("#NTN").hide().val("");
                                        }

                                        else if (response.Data.owner_type_id == "2") {

                                            $("#HideOldCnic").hide();
                                            $("#HideNewCnic").hide();
                                            $("#HideFatherDiv").hide();
                                            $("#OwnerTitleDiv").hide();

                                            $("#OwnerTypeID").val(response.Data.owner_type_id);
                                            $("#OwnerName").val(response.Data.name_);
                                            $('input[name="oldCnic"]').val(response.Data.old_cnic_no);
                                            $('#guardianName').val(response.Data.father_or_husband_name);

                                            $("#newCnic").val(response.Data.new_cnic_no).show();
                                            $("#NTN").hide().val("");
                                        }

                                        else if (response.Data.owner_type_id == "3") {

                                            $("#AddOwners").show();
                                            $("#HideOldCnic").show();
                                            $("#HideNewCnic").show();
                                            $("#HideFatherDiv").show();
                                            $("#OwnerTitleDiv").show();
                                            $("#lblCnic").text("New CNIC No");

                                            $("#OwnerTypeID").val(response.Data.owner_type_id);
                                            $("#OwnerName").val(response.Data.name_);
                                            $('input[name="oldCnic"]').val(response.Data.old_cnic_no);
                                            $('#guardianName').val(response.Data.father_or_husband_name);

                                            $("#newCnic").val(response.Data.new_cnic_no).show();
                                            $("#NTN").hide().val("");
                                        }

                                        else if (response.Data.owner_type_id == "4") {

                                            $("#HideNewCnic").show();
                                            $("#oldNTN").show();
                                            $("#OwnerTitleDiv").hide();
                                            $("#HideOldCnic").hide();
                                            $("#HideFatherDiv").hide();
                                            // $("#lblCnic").text("NTN No");

                                            $("#OwnerTypeID").val(response.Data.owner_type_id);
                                            $("#OwnerName").val(response.Data.name_);
                                            $('input[name="oldCnic"]').val(response.Data.old_cnic_no);
                                            $('#guardianName').val(response.Data.father_or_husband_name);

                                            $("#newCnic").hide().val("");
                                            $("#oldNTN").val(response.Data.ntn_no);
                                        }

                                        else { // agar blank ya invalid ho
                                            $("#AddOwners").hide();
                                            $("#HideOldCnic").show();
                                            $("#HideNewCnic").show();
                                            $("#HideFatherDiv").show();
                                            $("#OwnerTitleDiv").show();
                                            $("#lblCnic").text("New CNIC No");

                                            $("#OwnerTypeID").val(response.Data.owner_type_id || "");
                                            $("#OwnerName").val(response.Data.name_ || "");
                                            $('input[name="oldCnic"]').val(response.Data.old_cnic_no || "");
                                            $('#guardianName').val(response.Data.father_or_husband_name || "");

                                            $("#newCnic").show().val(response.Data.new_cnic_no || "");
                                            $("#NTN").hide().val("");
                                        }


                                        $("#OwnerName").val(response.Data.name_);

                                        $("#oldCnic").val(response.Data.old_cnic_no);

                                        $("#newCnic").val(response.Data.new_cnic_no);

                                        $("#guardianName").val(response.Data.father_or_husband_name);

                                        if (response.Data.owner_type_id == "3") {
                                            if (response.Data2 !=null) {

                                                for (var i = 0; i < response.Data2.length; i++) {





                                                    if (i > 0) {

                                                        $("#AddOwners").trigger('click');

                                                    }



                                                    $('#owner_' + i + ' #OwnerName').val(response.Data2[i].name);

                                                    $('#owner_' + i + ' #oldCnic').val(response.Data2[i].old_cnic_no);

                                                    $('#owner_' + i + ' #newCnic').val(response.Data2[i].new_cnic_no);

                                                    $('#owner_' + i + ' #guardianName').val(response.Data2[i].father_or_husband_name);

                                                    $('#owner_' + i + ' #OwnerName').prop("disabled", true);

                                                    $('#owner_' + i + ' #oldCnic').prop("disabled", true);

                                                    $('#owner_' + i + ' #newCnic').prop("disabled", true);

                                                    $('#owner_' + i + ' #guardianName').prop("disabled", true);


                                                }

                                            }
                                        }



                                        $("#OldOwnerTitleID").val(response.Data.title)

                                        $('#CategoryID').val(response.Data.category_of_vehicle_id)

                                        $('#ClassID').val(response.Data.class_of_vehicle_id);

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
                                        $('#CategoryID').val(response.Data.category_of_vehicle_id);

                                        // $.ajax({

                                        //     type: "Get",

                                        //     contentType: 'application/json; charset=utf-8',

                                        //     url: "{{url('/')}}/DEO/LoadcategoryTypeAgainstBody",

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

                                        //                 //    $('<option value="' + value.ID + '">' + value.Name + '</option>').appendTo('#CategoryID');

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



                                        $('#OldOwnerHouseNo').val(response.Data.house_no);



                                        $("#OldOwnerProvinceID").val(response.Data.Province_id);

                                        $.ajax({

                                            type: "Get",

                                            contentType: 'application/json; charset=utf-8',

                                            url: "/DEO/LoadCity",

                                            dataType: 'json',

                                            data: { ProvinceID: $("#OldOwnerProvinceID").val() },

                                            async: false,

                                            success: function (response) {



                                                //removeOptions(document.getElementById("slabID"));

                                                if (response.Status == true) {

                                                    if (typeof response != 'undefined' && response != null && response != 0) {



                                                        $('#OldOwnerCityID').empty();

                                                        $('#OldOwnerCityID').append("<option value='0'>--Select City--</option>");

                                                        $.each(response.Data, function (index, value) {

                                                            //$('<option value="' + value.ID + '">' + value.Name + '</option>').appendTo('#OldOwnerCityID');

                                                            $('<option value="' + value.city_code + '">' + value.cities + '</option>').appendTo('#OldOwnerCityID');

                                                        });



                                                    }

                                                    else {



                                                    }

                                                }

                                                else {



                                                }

                                            },

                                            error: function (response) {



                                            }

                                        });

                                        $("#OldOwnerCityID").val(response.Data.City_id);



                                        $("#OldOwnerMobile").val(response.Data.mobile_no);









                                        //$('#EngineNo').val(response.VehicleInfo.EngineNo);

                                        //$('#ColorID').val(response.VehicleInfo.ColorID);







                                    }

                                    else if(response.Status == false)
                                    {

                                        if(response.msg!=undefined)
                                            swal(response.msg);
                                        else
                                            swal("Record not Found.");
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





                    $("#NewOwnerTypeID").change(function () {



                        var OwnerTypeID = $("#NewOwnerTypeID").val();





                        if (OwnerTypeID == "1") {

                            $("#AddOwners1").hide();

                            $("#HideOldCnic1").show();

                            $("#HideNewCnic1").show();

                            $("#HideFatherDiv1").show();

                            $("#OwnerTitleDiv1").show();

                            $("#newCnic1").show();

                            $("#NTN").hide();

                            $("#lblCnic1").text("New CNIC No");

                        }

                        else if (OwnerTypeID == "2") {

                            $("#HideOldCnic1").hide();

                            $("#HideNewCnic1").hide();

                            $("#HideFatherDiv1").hide();

                            $("#OwnerTitleDiv1").hide();

                            $("#newCnic1").show();

                            $("#NTN").hide();

                        }

                        else if (OwnerTypeID == "3") {

                            $("#AddOwners1").show();

                            $("#HideOldCnic1").show();

                            $("#HideNewCnic1").show();

                            $("#HideFatherDiv1").show();

                            $("#OwnerTitleDiv1").show();

                            $("#newCnic1").show();

                            $("#NTN").hide();

                            $("#lblCnic1").text("New CNIC No");

                        }

                        else if (OwnerTypeID == "4") {

                            $("#HideNewCnic1").show();

                            $("#OwnerTitleDiv1").hide();

                            $("#HideOldCnic1").hide();

                            $("#HideFatherDiv1").hide();

                            $("#newCnic1").hide();

                            $("#NTN").show();


                            $("#lblCnic1").text("NTN No")

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

                    function LoadOldOwnerTitle() {



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



                                        $('#OldOwnerTitleID').empty();

                                        $('#OldOwnerTitleID').append("<option value='0'>--Select Owner Title--</option>");

                                        $.each(response.Data, function (index, value) {

                                            $('<option value="' + value.id + '">' + value.owner_title + '</option>').appendTo('#OldOwnerTitleID');

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

                    function LoadNewOwnerTitle() {



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



                                        $('#NewOwnerTitleID').empty();

                                        $('#NewOwnerTitleID').append("<option value='0'>--Select Owner Title--</option>");

                                        $.each(response.Data, function (index, value) {

                                            $('<option value="' + value.id + '">' + value.owner_title + '</option>').appendTo('#NewOwnerTitleID');

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

                    function LoadOldOWnerProvince() {

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



                                        $('#OldOwnerProvinceID').empty();

                                        $('#OldOwnerProvinceID').append("<option value='0'>--Select Province Name--</option>");

                                        $.each(response.Data, function (index, value) {

                                            $('<option value="' + value.id + '">' + value.province + '</option>').appendTo('#OldOwnerProvinceID');

                                        });



                                    }

                                    else {



                                    }

                                }

                                else {



                                }

                            },

                            error: function (response) {



                            }

                        });



                    }

                    function LoadNewOWnerProvince() {

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



                                        $('#NewOwnerProvinceID').empty();

                                        $('#NewOwnerProvinceID').append("<option value='0'>--Select ProvinceName--</option>");

                                        $.each(response.Data, function (index, value) {

                                            $('<option value="' + value.id + '">' + value.province + '</option>').appendTo('#NewOwnerProvinceID');

                                        });



                                    }

                                    else {



                                    }

                                }

                                else {



                                }

                            },

                            error: function (response) {



                            }

                        });



                    }



                </script>

                <script>

                    $("#OldOwnerProvinceID").change(function () {

                        var ProvinceID = $("#OldOwnerProvinceID").val();

                        $.ajax({

                            type: "Get",

                            contentType: 'application/json; charset=utf-8',

                            url: "/DEO/LoadCity",

                            dataType: 'json',

                            data: { ProvinceID: ProvinceID },

                            async: false,

                            success: function (response) {



                                //removeOptions(document.getElementById("slabID"));

                                if (response.Status == true) {

                                    if (typeof response != 'undefined' && response != null && response != 0) {



                                        $('#OldOwnerCityID').empty();

                                        $('#OldOwnerCityID').append("<option value='0'>--Select City--</option>");

                                        $.each(response.Data, function (index, value) {

                                            $('<option value="' + value.city_code + '">' + value.cities + '</option>').appendTo('#OldOwnerCityID');

                                        });



                                    }

                                    else {



                                    }

                                }

                                else {



                                }

                            },

                            error: function (response) {



                            }

                        });

                    });

                </script>

                <script>

                    $("#NewOwnerProvinceID").change(function () {

                        var ProvinceID = $("#NewOwnerProvinceID").val();

                        $.ajax({

                            type: "Get",

                            contentType: 'application/json; charset=utf-8',

                            url: "/DEO/LoadCity",

                            dataType: 'json',

                            data: { ProvinceID: ProvinceID },

                            async: false,

                            success: function (response) {



                                //removeOptions(document.getElementById("slabID"));

                                if (response.Status == true) {

                                    if (typeof response != 'undefined' && response != null && response != 0) {



                                        $('#NewOwnerCityID').empty();

                                        $('#NewOwnerCityID').append("<option value='0'>--Select City--</option>");
                                        console.log(response.Data);
                                        $.each(response.Data, function (index, value) {

                                            $('<option value="' + value.city_code + '">' + value.cities + '</option>').appendTo('#NewOwnerCityID');

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



                    $("#mobile").inputmask({ "mask": "\\929999999999" });

                    $("#NewOwnerMobile").inputmask({ "mask": "\\929999999999" });

                    $("#telephone").inputmask({ "mask": "\\929999999999" });

                    // $(".NewoldCnic").inputmask({ "mask": "\\99999-9999999-9" });
                    $(".NewoldCnic").inputmask({ "mask": "\\999-99-999999" });

                    $(".newCnic1").inputmask({ "mask": "\\99999-9999999-9" });

                    // $(".NTN").inputmask({"mask": "\\9999999-9"});



                    $("#Transferform").validate({

                        rules: {

                            "DivisionID": {

                                required: true,

                                Dropdown: true,

                            },

                            " ETO_CODE": {

                                required: true,

                                Dropdown: true,

                            },

                            "RegistrationMarkID": {

                                required: true,

                                Dropdown: true,

                            },

                            "TranferCode"            :{required:true,},

                            "OwnerName"              :{required:true,},

                            "CategoryID": {

                                required: true,

                                Dropdown: true,

                            },

                            "BodyTypeID": {

                                required: true,

                                Dropdown: true,

                            },

                            "ChassisNo"              :{required:true,},

                            "EngineNo"               :{required:true,},

                            "ColorID": {

                                required: true,

                                Dropdown: true,

                            },

                            "ClassID": {

                                required: true,

                                Dropdown: true,

                            },

                            "OldOwnerTitleID": {

                                required: true,

                                Dropdown: true,

                            },

                            "OldOwnerName"           :{required:true,},

                            "OldOwnerGuardian"       :{required:true,},

                            "OldOwnerCnic"           :{required:true,},

                            "OldOwnerHouseNo"        :{required:true,},

                            "OldOwnerProvinceID": {

                                required: true,

                                Dropdown: true,

                            },

                            "OldOwnerCityID"         :{required:true,},

                            "OldOwnerTelephone": {

                                required: true,

                                ContactNumberCheck: 12,

                            },

                            //"OldOwnerMobile": {

                            //    required: true,

                            //    ContactNumberCheck: 12,

                            //},

                            "RegNo": {

                                required: true,

                            },

                            "OldOwnerEmail": {

                                required: true,

                                email:true,

                            },

                            "NewOwnerTitleID": {

                                required: true,

                                Dropdown: true,

                            },

                            "NewOwnerName"           :{required:true,},

                            "NewOwnerGuardian"       :{required:true,},

                            "NewOwnerCnic"           :{required:true,},

                            "NewOwnerHouseNo"        :{required:true,},

                            "NewOwnerProvinceID": {

                                required: true,

                                Dropdown: true,

                            },

                            "NewOwnerCityID"         :{required:true,},

                            "NewOwnerTelephone": {

                                required: true,

                                ContactNumberCheck: 12,

                            },

                            "NewOwnerMobile": {

                                required: true,

                                ContactNumberCheck: 12,

                            },

                            "NewOwnerEmail": {

                                required: true,

                                email: true,

                            },



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







                    function SaveTranfer() {



                        var check=true;

                        // if (Transfervalitade) {









                        var DivisionID = $('#DivisionID').val();


                        var TranferCode = $('#TranferCode').val();

                        var ETO_CODE = $('#ETO_CODE').val();


                        var CategoryID = $('#CategoryID').val();

                        var BodyTypeID = $('#BodyTypeID').val();

                        var ChassisNo = $('#ChassisNo').val();


                        var ClassID = $('#ClassID').val();

                        var TransferDate = $('#TransferDate').val();



                        var Owners = $("input[name=OwnerName]");

                        var OldOwnerName = "";

                        if (Owners.length > 0) {

                            for (var i = 0; i < Owners.length; i++) {

                                if (OldOwnerName == "") {

                                    OldOwnerName = Owners[i].value;

                                } else {

                                    OldOwnerName = OldOwnerName + "," + Owners[i].value;

                                }

                            }

                        }

                        //OwnerName = ownerName;



                        var CNIC = $("input[name=newCnic]");

                        var OwnerCnic = "";

                        if (CNIC.length > 0) {

                            for (var i = 0; i < CNIC.length; i++) {

                                if (OwnerCnic == "") {

                                    OwnerCnic = CNIC[i].value;

                                } else {

                                    OwnerCnic = OwnerCnic + "," + CNIC[i].value;

                                }

                            }

                        }

                        var oldCNIC = $("input[name=oldCnic]");

                        var OldOwnerCnic = "";

                        if (oldCNIC.length > 0) {

                            for (var i = 0; i < oldCNIC.length; i++) {

                                if (OldOwnerCnic == "") {

                                    OldOwnerCnic = oldCNIC[i].value;

                                } else {

                                    OldOwnerCnic = OldOwnerCnic + "," + oldCNIC[i].value;

                                }

                            }

                        }

                        var Guradians = $("input[name=guardianName]");

                        var OldOwnerGuardian = "";

                        if (Guradians.length > 0) {

                            for (var i = 0; i < Guradians.length; i++) {

                                if (OldOwnerGuardian == "") {

                                    OldOwnerGuardian = Guradians[i].value;

                                } else {

                                    OldOwnerGuardian = OldOwnerGuardian + "," + Guradians[i].value;

                                }

                            }

                        }





                        var OwnerTypeID = $("#OwnerTypeID").val();

                        var OldOwnerTitleID = $('#OldOwnerTitleID').val();

                        var OldOwnerHouseNo = $('#OldOwnerHouseNo').val();

                        var OldOwnerProvinceID = $('#OldOwnerProvinceID').val();

                        var OldOwnerCityID = $('#OldOwnerCityID').val();


                        var OldOwnerMobile = $('#OldOwnerMobile').val();


                        var NewOwnerTitleID = $('#NewOwnerTitleID').val();

                        var NewOwnerTypeID = $("#NewOwnerTypeID").val();


                        if (NewOwnerTypeID == 0) {

                            $('#NewOwnerTypeID').addClass('error');

                            check = false;

                        }


                        if (NewOwnerTypeID == 1 || NewOwnerTypeID == 3) {

                            if (NewOwnerTitleID == 0) {

                                $('#NewOwnerTitleID').addClass('error');

                                check = false;

                            }

                        }






                        var NewOwners = $("input[name=NewOwnerName]");




                        var NewOwnerName = "";

                        if (NewOwners.length > 0) {

                            for (var i = 0; i < NewOwners.length; i++) {
                                if (NewOwners[i].value == 0) {

                                    $('#NewOwnerName').addClass('error');

                                    check = false;

                                }

                                if (NewOwnerName == "") {

                                    NewOwnerName = NewOwners[i].value;

                                } else {

                                    NewOwnerName = NewOwnerName + "," + NewOwners[i].value;

                                }

                            }

                        }

                        //OwnerName = ownerName;



                        var CNIC = $("input[name=newCnic1]");

                        var NewOwnerCnic = "";

                        if (CNIC.length > 0) {

                            for (var i = 0; i < CNIC.length; i++) {

                                if (NewOwnerCnic == "") {

                                    NewOwnerCnic = CNIC[i].value;

                                } else {

                                    NewOwnerCnic = NewOwnerCnic + "," + CNIC[i].value;

                                }

                            }

                        }

                        var oldCNIC = $("input[name=NewoldCnic]");

                        var NewOwnerOldCnic = "";

                        if (oldCNIC.length > 0) {

                            for (var i = 0; i < oldCNIC.length; i++) {

                                if (NewOwnerOldCnic == "") {

                                    NewOwnerOldCnic = oldCNIC[i].value;

                                } else {

                                    NewOwnerOldCnic = NewOwnerOldCnic + "," + oldCNIC[i].value;

                                }

                            }

                        }

                        var Guradians = $("input[name=guardianName1]");

                        var NewOwnerGuardian = "";

                        if (Guradians.length > 0) {

                            for (var i = 0; i < Guradians.length; i++) {

                                if (NewOwnerGuardian == "") {

                                    NewOwnerGuardian = Guradians[i].value;

                                } else {

                                    NewOwnerGuardian = NewOwnerGuardian + "," + Guradians[i].value;

                                }

                            }

                        }

                        var _token= $("input[name='_token']").val();


                        var NewOwnerHouseNo = $('#NewOwnerHouseNo').val();

                        var NewOwnerProvinceID = $('#NewOwnerProvinceID').val();

                        var NewOwnerCityID = $('#NewOwnerCityID').val();


                        var NewOwnerMobile = $('#NewOwnerMobile').val();


                        var RegistrationNo = $("#RegNo").val();






                        if (check == false) {

                            $("#RecordId1").css("display", "block");

                            $("#RecordId1").html(" *Fill the required field(s)");

                            return false;

                        }



                        $.ajax({


                            url: '/transfer',

                            contentType: "application/json; charset=utf-8",

                            type: "POST",

                            dataType: "JSON",

                            data: JSON.stringify({

                                _token: _token,

                                DivisionID: DivisionID,

                                //RegistrationMarkID: RegistrationMarkID,

                                TranferCode: TranferCode,

                                ETO_CODE: ETO_CODE,

                                TransferDate: TransferDate,

                                //OwnerName: OwnerName,

                                CategoryID: CategoryID,

                                BodyTypeID: BodyTypeID,

                                ChassisNo: ChassisNo,

                                //EngineNo: EngineNo,

                                //ColorID: ColorID,

                                ClassID: ClassID,

                                OwnerCnic: OwnerCnic,

                                OwnerTypeID: OwnerTypeID,

                                OldOwnerTitleID: OldOwnerTitleID,

                                OldOwnerName: OldOwnerName,

                                OldOwnerGuardian: OldOwnerGuardian,

                                OldOwnerCnic: OldOwnerCnic,

                                OldOwnerHouseNo: OldOwnerHouseNo,

                                OldOwnerProvinceID: OldOwnerProvinceID,

                                OldOwnerCityID: OldOwnerCityID,

                                //OldOwnerTelephone: OldOwnerTelephone,

                                OldOwnerMobile: OldOwnerMobile,

                                //OldOwnerEmail: OldOwnerEmail,

                                NewOwnerTypeID: NewOwnerTypeID,

                                NewOwnerTitleID: NewOwnerTitleID,

                                NewOwnerOldCnic: NewOwnerOldCnic,

                                NewOwnerName: NewOwnerName,

                                NewOwnerGuardian: NewOwnerGuardian,

                                NewOwnerCnic: NewOwnerCnic,

                                NewOwnerHouseNo: NewOwnerHouseNo,

                                NewOwnerProvinceID: NewOwnerProvinceID,

                                NewOwnerCityID: NewOwnerCityID,

                                //NewOwnerTelephone: NewOwnerTelephone,

                                NewOwnerMobile: NewOwnerMobile,

                                //NewOwnerEmail: NewOwnerEmail,

                                RegistrationNo: RegistrationNo,

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

                                            window.location.href = "/transfer";

                                            // LoadTable();

                                        })

                                }

                                else {

                                    console.log(response.msg);

                                    swal('Something went wrong');

                                }

                            },

                        });

                        // }

                        // else {

                        //     alert("plz fill required fields.");

                        // }

                    }







                    $("#Clear").click(function () {



                        // $('#DivisionID').val('0');

                        $('#ETO_CODE').val('0');

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

                        $("#TranferCode").val('');

                        $("#newCnic").val('');

                        $("#guardianName").val('');



                    });

                    //edit for check on transfer



                    function ValidateCode(DivisionID, Regno) {



                        var stat = null;

                        // $.ajax({

                        //     url: '{{url("/")}}/DEO/TransferCheckC',

                        //     type: "GET",

                        //     dataType: "JSON",

                        //     async: false, //int? DivisionID, string Regno

                        //     data: { DivisionID: DivisionID, Regno: Regno },

                        //     success: function (response) {

                        //         if (response.Status) {

                        //             //var msg = "";

                        //             if (response.TransferCode > 0) {



                        //                 // $("#RegistrationNo").css("display", "block");

                        //                 //$("#chassisNo").html(" chassis number exist");





                        //                 // console.log(response.msg);



                        //                 stat = response.TransferCode;

                        //             }





                        //             else {



                        //                 stat = 1;



                        //             }

                        //         }

                        //     }

                        // });

                        return stat;

                    }













                    var date = new Date();



                    var day = date.getDate();

                    var month = date.getMonth() + 1;

                    var year = date.getFullYear();



                    if (month < 10) month = "0" + month;

                    if (day < 10) day = "0" + day;



                    var today = year + "-" + month + "-" + day;





                    document.getElementById('TransferDate').value = today;



                </script>

            </div>

        </div>

    </div>

    </div>



    <!-- /page content -->





@endsection
