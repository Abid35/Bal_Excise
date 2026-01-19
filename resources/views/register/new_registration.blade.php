@extends('layouts.dash')

@section('content')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.7/jquery.inputmask.min.js" integrity="sha512-x3zoB6e8YsZipoDoCTClRYkEpqucilZ8IYsaJFE0XUtUJQdO7v2xFzvd1zQKrb3ParCNpvdAE0C85msCw3NrLA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


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

                        .Dropdown {

                            border: none;

                            background-color: #eee;

                        }

                        /*.btnCustom,.btnCancel{

                            width:20% !important;

                        }*/

                        .error {

                            border: 3px solid #C00000 !important;

                        }

                    </style>


                    <div class="panel panel-default mb-50 addnewpanl">

                        <span id="DivisionUpdate" style="color:red;display:none" class="text-center"></span>

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



                            <form id="Registration" >
                                @csrf
                                <div class="row form-group">

                                    <div class="col-md-6">

                                        <div class="row form-group ">

                                            <div class="col-md-5"><label>ETO Location</label></div>

                                            <div class="col-md-7">

                                                <select class="form-control" id="ETOLocation" name="ETOLocation" onchange="OnChangeETOLocation()"><option></option></select>



                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-md-6">

                                        <div class="row form-group ">

                                            <div class="col-md-5"><label>ETO</label></div>

                                            <div class="col-md-7">

                                                <select class="form-control" id="ETO" name="ETO"><option></option></select>



                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-md-6">

                                        <div class="row">

                                            <div class="col-md-5"><label>Jurisdiction</label></div>

                                            <div class="col-md-7">

                                                <select class="form-control" id="Division" name="Division"><option></option></select>

                                                <input type="hidden" id="RecordId" name="RecordId" value="@if(isset($id)){{$id}}@endif" />

                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>No Assign Type</label></div>

                                            <div class="col-md-7"> <select class="form-control" id="RegistrationMarkID" name="RegistrationMarkID"><option></option></select></div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Source of Procurement</label></div>
                                            @php($sop=App\Models\source_of_procurement::where('eto_location_id', auth()->user()->eto_location_id)->get())
                                            <div class="col-md-7"> <select class="form-control" id="sop" name="sop">
                                                    <option value=0 >Select Source of Procurement</option>
                                                    @foreach($sop as $s)
                                                        <option value="{{$s->id}}">{{$s->source_of_procurement}}</option>
                                                    @endforeach
                                                </select></div>

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

                                            <div class="col-md-5"><label>Book SerialNo</label></div>

                                            <div class="col-md-7"><input type="text" class="form-control" id="RegBookNo" maxlength="50" name="RegBookNo" /></div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Invoice Date</label></div>

                                            <div class="col-md-7"><input type="date" class="form-control" id="invoiceDate" name="invoiceDate" /></div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row">

                                            <div class="col-md-5"><label>Government Department</label></div>

                                            <div class="col-md-7">

                                                <select class="form-control" id="govtDeprt" name="govtDeprt"><option></option></select>

                                            </div>

                                        </div>

                                    </div>
                                    {{--                                            <div class="col-md-6">--}}

                                    {{--                                                <div class="row form-group">--}}

                                    {{--                                                    <div class="col-md-5"><label>Government Department</label></div>--}}

                                    {{--                                                    <div class="col-md-7"><input type="text" class="form-control" id="govtDeprt" name="govtDeprt" /></div>--}}

                                    {{--                                                </div>--}}

                                    {{--                                            </div>--}}

                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <div class="col-md-5">
                                                <label>AC Type</label>
                                            </div>
                                            <div class="col-md-7">
                                                <select class="form-control" id="ac_type" name="ac_type">
                                                    <option>Select AC Type</option>
                                                    <option value="AC">AC</option>
                                                    <option value="NON-AC">NON-AC</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                {{--                                            <div class="col-md-6">--}}

                                {{--                                                <div class="row form-group">--}}

                                {{--                                                    <div class="col-md-5"><label>Testing Date</label></div>--}}

                                {{--                                                    <div class="col-md-7"><input type="date" class="form-control" id="testDate" name="testDate" /></div>--}}

                                {{--                                                </div>--}}

                                {{--                                            </div>--}}

















                                <!--<div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>Vehicle Name</label></div>

                                    <div class="col-md-7"><input type="text" class="form-control" id="VehicleName" name="VehicleNamew" maxlength="50" /></div>-->



                                    <!--</div>

                        </div>-->



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

                                            <div class="col-md-7"><select class="form-control" id="OwnerTitle" name="OwnerTitle"><option></option></select></div>

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

                                                        <input type="text" data-inputmask="'mask':'999-99-999999'" placeholder="xxx-xx-xxxxxx" class="form-control oldCnic" name="oldCnic"  />

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

                                                        <input type="text" class="form-control newCnic" data-inputmask="'mask':'99999-9999999-9'" placeholder="xxxxx-xxxxxxx-x" id="newCnic" name="newCnic" />
                                                        <input type="text" class="form-control NTN" style="display:none" data-inputmask="'mask':'9999999-9'" placeholder="xxxxxxx-x" id="NTN" name="newCnic" />

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

                                    <div class="row form-group">

                                        <div class="col-md-12">

                                            <h4 class="prmnt">Permanent Address</h4>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>House No</label></div>

                                            <div class="col-md-7"><input type="text" class="form-control" id="houseNo" name="houseNo" /></div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Province</label></div>

                                            <div class="col-md-7">

                                                <select class="form-control" id="Province" name="Province"><option></option></select>



                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>City</label></div>

                                            <div class="col-md-7">

                                                <select class="form-control" id="City" name="City"><option value="none">--Select Province first--</option></select>



                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Mobile No</label></div>

                                            <div class="col-md-7">

                                                <input type="text" class="form-control mobile" data-inputmask="'mask':'\\929999999999'" placeholder="92xxxxxxxxxx" id="mobile" name="mobile" />

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

                                    GENERAL CHARACTERISTICS

                                </h4>



                                <div class="row form-group">



                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Category Of Vehicle</label></div>

                                            <div class="col-md-7"><select class="form-control" id="Category" name="Category"><option></option></select></div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Type Of Body</label></div>

                                            <div class="col-md-7"><select class="form-control" id="BodyType" name="BodyType"><option value="none">--Select Body Type--</option></select></div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Class Of Vehicle</label></div>

                                            <div class="col-md-7"><select class="form-control" id="VehicleClass" name="VehicleClass"><option></option></select></div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Maker's Name</label></div>

                                            <div class="col-md-7"><select class="form-control" id="Manufacturer" name="Manufacturer"><option></option></select></div>

                                        </div>

                                    </div>



                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Year Of Manufacture</label></div>

                                            <div class="col-md-7"><select class="form-control" id="Years" name="Years"><option>--Select Years--</option></select></div>

                                        </div>

                                    </div>







                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Chassis No</label></div>

                                            <div class="col-md-7"><input type="text" class="form-control" id="chassisNo" maxlength="40" name="chassisNo" onkeypress="ValidateInputNA(this.id,event)" /></div>

                                        </div>

                                    </div>



                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Engine No</label></div>

                                            <div class="col-md-7"><input type="text" class="form-control" maxlength="40" id="engineNo" name="engineNo" /></div>

                                        </div>

                                    </div>



                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Number Of Cylinder(S)</label></div>

                                            <div class="col-md-7"><input type="text" class="form-control" id="cylinders" name="cylinders" /></div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Seating Capacity <span style="font-size:10px">(including driver)</span></label></div>

                                            <div class="col-md-7 "><div class="input-group"><span class="input-group-addon">Seats</span><input type="text" class="form-control" id="seatingCapacity" maxlength="20" name="seatingCapacity" onkeypress="ValidateInputN(this.id,event)" /></div></div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Engine Capacity</label></div>

                                            <div class="col-md-7">

                                                <div class="input-group">

                                                    <div class="input-group-addon">

                                                        <select class="Dropdown" id="EUnit" name="EUnit"><option></option></select>

                                                    </div>

                                                    <input type="text" class="form-control" maxlength="20" id="EngineCapacity" name="EngineCapacity" onkeypress="ValidateInputN(this.id,event)" />

                                                </div>

                                            </div>

                                        </div>

                                    </div>





                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>unLaden Weight</label></div>

                                            <div class="col-md-7">

                                                <div class="input-group">

                                                    <div class="input-group-addon">

                                                        <select class="Dropdown" id="LUnit" onkeypress="ValidateInputN(this.id,event)" name="LUnit"><option></option></select>

                                                    </div>

                                                    <input type="text" class="form-control" id="unLadenWeight" maxlength="50" name="TrailerunLadenWeight" />

                                                </div>

                                            </div>






                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <div class="col-md-5"><label> Laden Weight</label></div>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <select class="Dropdown" id="LadUnit" onkeypress="ValidateInputN(this.id,event)" name="LadUnit">
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                    <input type="text" class="form-control" id="LadenWeight" maxlength="50" name="TrailerLadenWeight" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <div class="col-md-5"><label>Color Of Vehicle</label></div>
                                            <div class="col-md-7">
                                                <select class="form-control" id="Color" name="Color">
                                                    <option></option>
                                                </select>
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

                                                {{-- Generate Section --}}
                                                {{--                                                        <div id="generateDiv" style="display:none;">--}}
                                                {{--                                                            <div class="d-flex align-items-center gap-2" style="gap: 20px; padding-bottom: 20px">--}}
                                                {{--                                                                <select id="pattern_id" class="form-select" style="min-width: 250px;">--}}
                                                {{--                                                                    <option value="">Select Pattern</option>--}}
                                                {{--                                                                    @foreach($patterns as $pattern)--}}
                                                {{--                                                                        <option value="{{ $pattern->id }}">--}}
                                                {{--                                                                            {{ $pattern->start_prefix }} - {{ $pattern->end_prefix }} ({{ $pattern->start_no }} - {{ $pattern->end_no }})--}}
                                                {{--                                                                        </option>--}}
                                                {{--                                                                    @endforeach--}}
                                                {{--                                                                </select>--}}
                                                {{--                                                                <button--}}
                                                {{--                                                                    type="button"--}}
                                                {{--                                                                    class="btn btn-primary px-4"--}}
                                                {{--                                                                    id="generateBtn"--}}
                                                {{--                                                                    onclick="generateNumber()"--}}
                                                {{--                                                                    disabled>--}}
                                                {{--                                                                    Generate--}}
                                                {{--                                                                </button>--}}
                                                {{--                                                            </div>--}}


                                                {{--                                                            <input--}}
                                                {{--                                                                type="text"--}}
                                                {{--                                                                id="generatedRegNo"--}}
                                                {{--                                                                name="regNo"--}}
                                                {{--                                                                class="form-control mt-2 bg-light"--}}
                                                {{--                                                                readonly--}}
                                                {{--                                                                placeholder="Generated Number will appear here">--}}
                                                {{--                                                        </div>--}}

                                            </div>
                                        </div>
                                    </div>


                                {{--                                            <div class="col-md-6">--}}

                                {{--                                                <div class="row form-group">--}}

                                {{--                                                    <div class="col-md-5"><label>Registration No</label></div>--}}

                                {{--                                                    <div class="col-md-7"><input pattern="[A-Z]{3}[0-9]{3}" placeholder="Format = (ABC123)" type="text" class="form-control" id="regNo" name="regNo" maxlength="20" onkeypress="ValidateInputNA(this.id,event)" /></div>--}}

                                {{--                                                </div>--}}

                                {{--                                            </div>--}}

                                <!-- <div class="col-md-6">

                                                <div class="row form-group">

                                                    <div class="col-md-5"><label>Registration Mark</label></div>

                                                    <div class="col-md-7"><input type="text" class="form-control" id="regM" name="regM" maxlength="20" onkeypress="ValidateInputNA(this.id,event)" /></div>

                                                </div>

                                            </div> -->

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Remarks</label></div>

                                            <div class="col-md-7"><textarea class="form-control" rows="3" id="Remarks" name="Remarks"></textarea></div>

                                        </div>

                                    </div>



                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Registration Date</label></div>

                                            <div class="col-md-7"><input type="date" class="form-control" id="RegistrationDate" name="RegistrationDate" onblur="ValidateDateFormat(this.value, this.id)" /></div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row form-group">

                                            <div class="col-md-5"><label>Second Registration Date</label></div>

                                            <div class="col-md-7">
                                                <input type="date" class="form-control" id="SecondRegistrationDate"
                                                       name="SecondRegistrationDate" onblur="ValidateDateFormat(this.value, this.id)" /></div>

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

                                            <div class="col-md-5"><label>Trailer Vehicle<input type="checkbox" class="checkbox" id="IsTrailerVeh" name="IsTrailerVeh"  /></label> </div>

                                            <div class="col-md-5"></div>

                                        </div>

                                    </div>



                                </div>

                                <div id="ShowDiv">

                                    <h4 class="h4Vouchr">

                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="74" height="74" viewBox="0 0 74 74">

                                            <image id="additionaltralier" width="74" height="74" xlink:href="data:image/png;base64,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" />

                                        </svg>

                                        ADDITIONAL TRALIER

                                    </h4>

                                    <div class="row form-group">

                                        <div class="col-md-6">

                                            <div class="row form-group">

                                                <div class="col-md-5"><label>Type Of Body</label></div>

                                                <div class="col-md-7"><select class="form-control" id="TrailerBodyType" name="TrailerBodyType"><option></option></select></div>

                                            </div>

                                        </div>



                                        <div class="col-md-12">

                                            <h4 class="prmnt">Tyres</h4>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="row form-group">

                                                <div class="col-md-5"><label>Front Axle</label></div>

                                                <div class="col-md-7"><input type="text" class="form-control" id="frontAxle" maxlength="50" name="frontAxle" /></div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="row form-group">

                                                <div class="col-md-5"><label>Rear Axle</label></div>

                                                <div class="col-md-7"><input type="text" class="form-control" id="rearAxle" maxlength="50" name="rearAxle" /></div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="row form-group">

                                                <div class="col-md-5"><label>Any Other Axle</label></div>

                                                <div class="col-md-7"><input type="text" class="form-control" id="otherAxle" maxlength="50" name="otherAxle" /></div>

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

                                                <div class="col-md-5"><label>Max Laden Weight (Trailer)</label></div>

                                                <div class="col-md-7">

                                                    <div class="input-group">

                                                        <div class="input-group-addon">

                                                            <select class="Dropdown" id="AxleUnit" onkeypress="ValidateInputN(this.id,event)" name="AxleUnit"><option></option></select>

                                                        </div>

                                                        <input type="text" class="form-control" id="maxLadenWeight" maxlength="50" name="maxLadenWeight" onkeypress="ValidateInputN(this.id,event)" />

                                                    </div>

                                                </div>

                                            </div>



                                        </div>

                                        <div class="col-md-12">

                                            <h4 class="prmnt">Maximum Axle Weight</h4>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="row form-group">

                                                <div class="col-md-5"><label>Front Axle</label></div>

                                                <div class="col-md-7"><input type="text" id="AxleFrontAxle" maxlength="50" class="form-control" /></div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="row form-group">

                                                <div class="col-md-5"><label>Rear Axle</label></div>

                                                <div class="col-md-7"><input type="text" id="AxleRearAxle" maxlength="50" class="form-control" /></div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="row form-group">

                                                <div class="col-md-5"><label>Any Other Axle</label></div>

                                                <div class="col-md-7"><input type="text" id="AxleOtherAxle" maxlength="50" class="form-control" /></div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">



                                        </div>

                                        <div class="col-md-12">

                                            <h4 class="prmnt">Tyres</h4>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="row form-group">

                                                <div class="col-md-5"><label>Front Axle</label></div>

                                                <div class="col-md-7"><input type="text" id="TyresFrontAxle" maxlength="50" class="form-control" /></div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="row form-group">

                                                <div class="col-md-5"><label>Rear Axle</label></div>

                                                <div class="col-md-7"><input type="text" id="TyresRearAxle" maxlength="50" class="form-control" /></div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="row form-group">

                                                <div class="col-md-5"><label>Any Other Axle</label></div>

                                                <div class="col-md-7"><input type="text" id="TyreOtherAxle" maxlength="50" class="form-control" /></div>

                                            </div>

                                        </div>



                                    </div>

                                </div>






                                <ul id="main-error">

                                </ul>





                            </form>



                            <div class="row form-group">

                                <div class="col-md-3"><label type="" id="RecordId1" /></div>

                                <div class="col-md-6 text-center">

                                    <a href="{{url('/new_registration')}}" </a>  <button type="button" class="btn btnCancel">CANCEL</button>



                                    <a  class="btn btnCustom" id="Operation" onclick="SaveRegistraction();">REGISTER</a>



                                </div>

                            </div>

                        </div>



                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- /page content -->

    <script>
        function toggleRegOption() {
            const option = document.querySelector('input[name="reg_option"]:checked').value;
            document.getElementById('manualInputDiv').style.display = option === 'manual' ? 'block' : 'none';
            document.getElementById('generateDiv').style.display = option === 'generate' ? 'block' : 'none';
        }

        // document.getElementById('pattern_id').addEventListener('change', function() {
        //     document.getElementById('generateBtn').disabled = !this.value;
        // });

        {{--function generateNumber() {--}}
        {{--    const patternId = document.getElementById('pattern_id').value;--}}
        {{--    if (!patternId) return;--}}

        {{--    const url = `{{ url('number-patterns') }}/${patternId}/generate`;--}}
        {{--    fetch(url)--}}
        {{--        .then(res => res.json())--}}
        {{--        .then(data => {--}}
        {{--            if (data.success) {--}}
        {{--                document.getElementById('generatedRegNo').value = data.number;--}}
        {{--            } else {--}}
        {{--                alert(data.message);--}}
        {{--            }--}}
        {{--        })--}}
        {{--        .catch(err => alert('Error generating number.'));--}}
        {{--}--}}
    </script>
    <script>




        var ownerCounter = 1;

        $("#ShowDiv").hide();
        // $("#SecondRegistrationDate").val(moment(new Date()).format("YYYY-MM-DD"));

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

                + '                <input type="text" data-inputmask=""mask":"999-99-999999"" placeholder="xxx-xx-xxxxxx" class="form-control oldCnic' + ownerCounter + '" id="oldCnic" name="oldCnic" />                    '

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

                + '                <input type="text" class="form-control newCnic" data-inputmask=""mask":"99999-9999999-9"" placeholder="xxxxx-xxxxxxx-x" id="newCnic" name="newCnic" />                    '

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



        function SaveRegistraction() {

            // debugger

            //var registrationvalitade = $('#Registration').valid();

            //if (registrationvalitade) {
            var check_validity;
            var _token= $("input[name='_token']").val();

            var reg_option = $("input[name='reg_option']:checked").val();

            $("#DivisionUpdate").css("display", "None");



            var Division = $('#Division').val();

            var RegistrationMarkID = $('#RegistrationMarkID').val();
            // var regNo = $('#regNo').val();

            var regNo = $('#regNo').val().trim();
            // var generatedRegNo = $('#generatedRegNo').val().trim();
            var finalRegNo = regNo;


            var regM = $('#regM').val();
            var chassisNo = $('#chassisNo').val();
            var LUnit= $('#LUnit').val();
            var LadUnit= $('#LadUnit').val();



            var UnitID         ;

            var EngineCapacity;



            var unit= $("#EUnit").val();

            var cc =   $("#EngineCapacity").val();

            // if (unit == 1) {

            //     EngineCapacity = cc * 16;

            //     UnitID = 2;

            // }

            // else {

            var UnitID      =   $("#EUnit").val();

            var EngineCapacity =$("#EngineCapacity").val();

            // }





            //var OwnerTypeID = $('#OwnerTypeID').val();

            var OwnerTitle = $('#OwnerTitle').val();

            //var OwnerName = $('#OwnerName').val();

            var OwnerName = "";

            var sop = $('#sop').val();

            var FirstRegistration = $('#FirstRegistration').val();

            var FirstRegistrationDate = $('#FirstRegistrationDate').val();

            //var guardianName = $('#guardianName').val();
            var Rec_Id = $('#RecordId').val();
            var houseNo = $('#houseNo').val();

            var Province = $('#Province').val();

            var City = $('#City').val();

            var telephone = $('#telephone').val();

            var mobile = $('#mobile').val();

            var email = $('#email').val();

            var Remarks = $("#Remarks").html();

            var Category = $('#Category').val();

            var Manufacturer = $('#Manufacturer').val();

            var classification = $('#classification').val();

            var Years = $('#Years').val();

            var BodyType = $('#BodyType').val();

            var wheelbox = $('#wheelbox').val();

            var CC = $('#CC').val();

            var engineNo = $('#engineNo').val();



            var VehicleClass = $('#VehicleClass').val();

            var cylinders = $('#cylinders').val();

            var seatingCapacity = $('#seatingCapacity').val();


            var Color = $('#Color').val();



            var IsTrailerVeh = $('#IsTrailerVeh').prop("checked");

            var TrailerBodyType = $('#TrailerBodyType').val();

            var unLadenWeight = $('#unLadenWeight').val();

            var LadenWeight = $('#LadenWeight').val();

            var maxAxleWeight = $('#maxAxleWeight').val();

            /*var TrailerUnit = $('#TrailerUnit').val();*/

            var frontAxle = $('#frontAxle').val();

            var rearAxle = $('#rearAxle').val();

            var otherAxle = $('#otherAxle').val();

            var maxLadenWeight = $('#maxLadenWeight').val();

            //var Role = $('#Role').val();

            //var Name = $('#Name').val();

            //var inspectionDate = $('#inspectionDate').val();

            var remarks = $('#Remarks').val();

            //var verificationNo = $('#verificationNo').val();

            //var verificationDate = $('#verificationDate').val();

            var OwnerTypeID = $("#OwnerTypeID").val();



            var VehiclePrice = $("#VehiclePrice").val();

            var VehicleName = $("#VehicleName").val();

            var ETO = $("#ETO").val();

            var ETOLocation= $('#ETOLocation').val();

            var FueltypeID = $("#FueltypeID").val();

            var RegBookNo = $("#RegBookNo").val();
            var invoiceDate = $("#invoiceDate").val();
            var govtDeprt = $("#govtDeprt").val();
            var ac_type = $("#ac_type").val();
            // var testDate = $("#testDate").val();



            var AxleFrontAxle = $("#AxleFrontAxle").val();

            var AxleRearAxle = $("#AxleRearAxle").val();

            var AxleOtherAxle = $("#AxleOtherAxle").val();

            var AxleUnit = $("#AxleUnit").val();

            var TyresFrontAxle = $("#TyresFrontAxle").val();

            var TyresRearAxle = $("#TyresRearAxle").val();

            var TyreOtherAxle = $("#TyreOtherAxle").val();

            var RegistrationDate = $("#RegistrationDate").val();

            var SecondRegistrationDate = $('#SecondRegistrationDate').val();


            // debugger

            if (sop == 0) {

                $('#sop').addClass('error');

                check = false;

            } //edit by

            if (RegistrationDate != null && RegistrationDate != "") {



                RegistrationDate = RegistrationDate;

            }

            else {

                RegistrationDate = new Date();

            }

            if (SecondRegistrationDate != null && SecondRegistrationDate != "") {



                SecondRegistrationDate = SecondRegistrationDate;

            }

            else {

                SecondRegistrationDate = new Date();

            }


            var Owners = $("input[name=OwnerName]");

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
            var NTN = $("#NTN").val();

            var NewCnic = [];

            if (CNIC.length > 0) {

                for (var i = 0; i < CNIC.length; i++) {

                    NewCnic[i]=(CNIC[i].value.length==0) ? null : CNIC[i].value;


                }

            }

            NewCnic = NewCnic.filter(element => {
                return element !== null;
            });
            console.log(NewCnic);

            var oldCNIC = $("input[name=oldCnic]");

            var oldCnic = [];

            if (oldCNIC.length > 0) {

                for (var i = 0; i < oldCNIC.length; i++) {


                    oldCnic[i]=(oldCNIC[i].value.length==0) ? null : oldCNIC[i].value;
                    // if (oldCnic == "") {

                    //     oldCnic = (oldCNIC[i].value.length==0) ? "0" : oldCNIC[i].value;

                    // } else {

                    //     oldCnic = oldCnic + "," + (oldCNIC[i].value.length==0) ? "0" : oldCNIC[i].value;

                    // }

                }

            }


            var Guradians = $("input[name=guardianName]");

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



            //edit by   validation here

            var check = true;
            var old_tax= false;

            //edit by   start here
            if (unit == 0) {

                $('#EUnit').addClass('error');

                check = false;

            }

            if (check == false) {

                $("#RecordId1").css("display", "block");

                $("#RecordId1").html(" *Fill the required field(s)");

                return false;

            }     //edit by







            //edit by

            else {

                $("#RecordId1").css("display", "None");

            }//edit by



            //else {



            //    swal('Good');

            //}

            //}


            var fileData = new FormData();

            fileData.append("_token", _token,)

            fileData.append("old_tax", old_tax,)

            fileData.append("DivisionID", Division,)

            fileData.append("Record_id", Rec_Id,)

            fileData.append("wheelbox", wheelbox,)

            fileData.append("OwnerTitle", OwnerTitle,)

            fileData.append("ETO", ETO,)

            fileData.append("ETOLocation", ETOLocation,)
            fileData.append("sop", sop,)

            fileData.append("OwnerName", OwnerName)

            fileData.append("OldCNIC", oldCnic)

            fileData.append("NewCNIC", NewCnic)
            fileData.append("NTN", NTN)

            fileData.append("FatherHusband", guardianName)

            fileData.append("HouseNo", houseNo)

            fileData.append("ProvinceID", Province)

            fileData.append("CityID", City)

            fileData.append("Remarks", remarks)

            fileData.append("FirstRegistration", FirstRegistration)

            fileData.append("FirstRegistrationDate", FirstRegistrationDate)


            fileData.append("Mobile", mobile)

            fileData.append("Email", email)

            fileData.append("CategoryID", Category)

            fileData.append("ManufacturerID", Manufacturer)

            fileData.append("ManufacturerClassification", classification)

            fileData.append("BodyTypeID", BodyType)

            fileData.append("BodyTypeID", BodyType)

            fileData.append("EngineCC", CC)

            fileData.append("EngineNo", engineNo)

            fileData.append("ChassisNo", chassisNo)

            fileData.append("VehicleClassID", VehicleClass)

            fileData.append("NoOfCyliners", cylinders)

            fileData.append("SeatingCapacity", seatingCapacity)

            fileData.append("UnladenWeight", unLadenWeight)

            fileData.append("ladenWeight", LadenWeight)

            fileData.append("ColorID", Color)

            // fileData.append("RegNo", regNo)
            fileData.append("RegNo", finalRegNo)
            fileData.append("reg_option", reg_option)

            fileData.append("RegistrationMarkID", RegistrationMarkID)

            fileData.append("VehicleName", VehicleName)

            fileData.append("IsTrailer", IsTrailerVeh)

            fileData.append("TrailerBodyTypeID", TrailerBodyType)


            fileData.append("TrailerAxleWeight", maxAxleWeight)

            fileData.append("UnitID", UnitID)

            fileData.append("FrontAxle", frontAxle)

            fileData.append("RearAxle", rearAxle)

            fileData.append("AnyOtherAxle", otherAxle)

            fileData.append("MaxLadenWeight", maxLadenWeight)

            fileData.append("YearOfManufacture", Years)

            fileData.append("AxleFrontAxle", AxleFrontAxle)

            fileData.append("AxleRearAxle", AxleRearAxle)

            fileData.append("AxleOtherAxle", AxleOtherAxle)

            fileData.append("AxleUnit", AxleUnit)


            fileData.append("LUnit", LUnit)

            fileData.append("LadUnit", LadUnit)

            fileData.append("EUnit", unit)

            fileData.append("TyreOtherAxle", TyreOtherAxle)

            fileData.append("TyresRearAxle", TyresRearAxle)

            fileData.append("TyresFrontAxle", TyresFrontAxle)


            fileData.append("RegistrationDate", RegistrationDate)

            fileData.append("RegBookNo", RegBookNo)
            fileData.append("invoiceDate", invoiceDate)
            fileData.append("govtDeprt", govtDeprt)
            fileData.append("ac_type", ac_type)
            // fileData.append("testDate", testDate)


            // fileData.append("VerificationReportNo", verificationNo)

            // fileData.append("VerificationDate", verificationDate)

            // fileData.append("IsTribalVehicle", IsTribleVeh)

            // fileData.append("TribleVehicleDate", tribleDate)

            fileData.append("OwnerTypeID", OwnerTypeID)

            fileData.append("EngineCapacity", EngineCapacity)

            fileData.append("VehiclePrice", VehiclePrice)

            fileData.append("FueltypeID", FueltypeID)

            fileData.append("OwnerTitle", OwnerTitle)



            fileData.append("SecondRegistrationDate", SecondRegistrationDate)








            //if (getVal == 1) {

            //    return false;

            //}

            //else {

            if($('#RecordId').val()== "" || $('#RecordId').val()== null || $('#RecordId').val()==undefined)
            {
                $.ajax({

                    url: "/check_dup",

                    type: "GET",

                    dataType: "JSON",


                    data: {
                        DivisionID: $('#ETOLocation').val(),
                        RegNo: finalRegNo,
                        // eto_location_id: Division,
                        // registration_no: regNo,
                        chassisNo : chassisNo,
                        engineNo: engineNo ,
                        BookSerial:RegBookNo
                    },

                    success: function (response) {


                        if (response.Status) {

                            var msg="";
                            var check=0;
                            len=response.rem.length;
                            msglen=response.msg.length;
                            if(len==1)
                            {
                                $('#'+response.rem[0]).addClass('error');
                                msg = response.msg[0]+" Already Exist";
                            }
                            else
                            {
                                for (var j = 0; j < response.tit.length ; j++)
                                {
                                    check=0;
                                    for (var i = 0; i < len; i++) {

                                        $('#'+response.rem[i]).addClass('error');


                                        if(response.tit[j]!=response.rem[i])
                                        {
                                            check=1;
                                        }

                                    }

                                    if(check==1)
                                    {
                                        $('#'+response.tit[i]).removeClass('error');
                                    }


                                }

                                $(response.msg).each(function(index, value){


                                    if(index==(msglen-1) )
                                    {
                                        msg = msg + value ;
                                    }
                                    else
                                    {
                                        msg = msg + value + '/';
                                    }
                                });


                                msg = msg +" Already Exist";
                            }


                            swal({

                                title: msg,

                                type: "error",

                                showCancelButton: true,


                            });





                        }
                        else
                        {
                            // debugger

                            $.ajax({

                                url: "/new_registration",

                                type: "Post",

                                dataType: "JSON",

                                contentType: false, // Not to set any content header

                                processData: false, // Not to process data

                                data: fileData,

                                success: function (response) {



                                    if (response.Status) {

                                        //var msg = "";

                                        //swal("Record Registered")

                                        swal({

                                                title: "Record Registered!.",

                                                type: "success",

                                                showCancelButton: false,

                                                confirmButtonColor: "#DD6B55",

                                                confirmButtonText: "OK",

                                                closeOnConfirm: true

                                            },

                                            function (isConfirm) {

                                                window.location.href = "/new_registration";

                                                // LoadTable();

                                            })

                                    }





                                    else if (response.Status == false) {

                                        if(response.errors != null)
                                        {
                                            $.each(response.errors, function(key, value) {
                                                // Append the error message to the appropriate HTML element
                                                $('#main-error').append('<li> <h4 class="text-danger" >'+value+'</h4> </li>');
                                            });
                                        }

                                        if (response.Data == 1) {

                                            swal("ChassisNo  Already Exist");

                                            $('#chassisNo').addClass('error');

                                            // $('#RegNo').addClass('error');

                                        }

                                        else if (response.Data == 2) {

                                            swal(" RegNo Already Exist");

                                            // $('#ChassisNo').addClass('error');

                                            $('#regNo').addClass('error');



                                        }

                                    }



                                        //else if (response.Status == false) {

                                        //    //console.log(msg)

                                        //    if (response.Data == 1)

                                        //        swal("ChassisNo or RegNo Already Exist");

                                        //    $('#chassisNo').addClass('error');

                                        //    $('#regNo').addClass('error');



                                    //}

                                    else {

                                        //swal("something went wrong")

                                        swal(response.msg);

                                    }

                                },



                            });
                        }


                    },



                });







                //}
            }
            else
            {
                var id=$('#RecordId').val();
                $.ajax({

                    url: "/new_registration",

                    type: "POST",

                    dataType: "JSON",

                    contentType: false, // Not to set any content header

                    processData: false, // Not to process data

                    data: fileData,

                    success: function (response) {



                        if (response.Status) {

                            //var msg = "";

                            //swal("Record Registered")

                            swal({

                                    title: "Record Updated!.",

                                    type: "success",

                                    showCancelButton: false,

                                    confirmButtonColor: "#DD6B55",

                                    confirmButtonText: "OK",

                                    closeOnConfirm: true

                                },

                                function (isConfirm) {

                                    window.location.href = "/new_registration";

                                    // LoadTable();

                                })

                        }





                        else if (response.Status == false) {

                            if (response.Data == 1) {

                                swal("ChassisNo  Already Exist");

                                $('#chassisNo').addClass('error');

                                // $('#RegNo').addClass('error');

                            }

                            else if (response.Data == 2) {

                                swal(" RegNo Already Exist");

                                // $('#ChassisNo').addClass('error');

                                $('#regNo').addClass('error');



                            }

                        }



                            //else if (response.Status == false) {

                            //    //console.log(msg)

                            //    if (response.Data == 1)

                            //        swal("ChassisNo or RegNo Already Exist");

                            //    $('#chassisNo').addClass('error');

                            //    $('#regNo').addClass('error');



                        //}

                        else {

                            //swal("something went wrong")

                            swal(response.msg);

                        }

                    },



                });
            }
            //}

            //else {

            //    alert("plz fill the required fields:")

            //}

        }

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



        $("#OwnerTypeID").change(function () {



            var OwnerTypeID = $("#OwnerTypeID").val();



            if (OwnerTypeID == "1") {

                $("#AddOwners").hide();

                $("#HideOldCnic").show();

                $("#HideNewCnic").show();

                $("#HideFatherDiv").show();

                $("#OwnerTitleDiv").show();

                $("#lblCnic").text("New CNIC No");

                $(".NTN").hide();

                $(".newCnic").show();





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

                $(".NTN").hide();

                $(".newCnic").show();

            }

            else if (OwnerTypeID == "4") {

                $("#HideNewCnic").show();

                $("#OwnerTitleDiv").hide();

                $("#HideOldCnic").hide();

                $("#HideFatherDiv").hide();

                $("#lblCnic").text("NTN No");

                $(".newCnic").hide();

                $(".NTN").show();


            }

        });



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

            $('#LadenWeight').keyup(function(){
                $('#maxLadenWeight').val($('#LadenWeight').val());
            });

            $('#BodyType').change(function(){
                $('#TrailerBodyType').val($('#BodyType').val());
            });


            $("#AddOwners").hide();

            LoadETO();

            LoadBodytype();

            LoadUnits1();

            LoadETOLocation();

            LoadDivisions();

            LoadGovernmentDepartment();

            LoadRegistrationMark();

            LoadOwnerType();

            LoadOwnerTitle();

            LoadVehicleCategory();

            LoadManufacturers();

            LoadCCs();

            LoadFuelType();

            //LoadVehicleTitle();

            LoadVehicleType();

            LoadColors();

            LoadTrailerBodyType();

            LoadTrailerUnits();

            LoadRoles();

            LoadName();

            LoadYears();

            LoadProvince();

            LoadTrailerUnits1()



            var value = $('#RecordId').val();


            if (value != "") {

                GetData(value);

                //GetDocumentData(value);

                // $("#Operation").attr("onclick", "SaveRegistraction()").unbind("click");

                // $("#Operation").attr("onclick", "UpdateRegistration()").bind("click");

                $("#Operation").text('Update');







            }



            $('#IsTrailerVeh').click(function () {

                ;

                if ($(this).is(':checked')) {

                    $("#ShowDiv").css("display", "Block");

                } else {

                    $("#ShowDiv").css("display", "None");

                }

            });



            $('#IsTribleVeh').click(function () {

                ;

                if ($(this).is(':checked')) {

                    $("#TribleDiv").css("display", "Block");

                } else {

                    $("#TribleDiv").css("display", "None");

                }

            });





        });

        function LoadYears() {
            //Reference the DropDownList.
            var ddlYears = document.getElementById("Years");

            // Starting year (2025) and end year (1950).
            var startingYear = 2025;
            var endYear = 1950;

            // Loop and add the Year values to DropDownList.
            for (var i = startingYear; i >= endYear; i--) {
                var option = document.createElement("OPTION");
                option.innerHTML = i;
                option.value = i;
                ddlYears.appendChild(option);
            }
        }


        function LoadDivisions() {

            //var code =

            /*var eto_location = $('#ETOLocation').val();*/

            var E_code = $('#ETO').val();



            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadDivisions",

                dataType: 'json',

                data: { E_code: E_code},

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

        function LoadGovernmentDepartment() {

            $.ajax({
                type: "Get",
                contentType: 'application/json; charset=utf-8',
                url: "/DEO/LoadGovernmentDepartment",
                dataType: 'json',
                async: false,
                success: function (response) {
                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {

                            $('#govtDeprt').empty();
                            $('#govtDeprt').append("<option value='0'>--Select Government Department--</option>");

                            $.each(response.Data, function (index, value) {
                                $('<option value="' + value.id + '">' + value.department_name + '</option>').appendTo('#govtDeprt');
                            });
                        }
                    }
                },

                error: function (response) {
                    swal(response.msg);
                }
            });
        }

        function LoadRegistrationMark() {

            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadRegistrationMark",

                dataType: 'json',

                async:false,

                success: function (response) {



                    //removeOptions(document.getElementById("slabID"));

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {



                            $('#RegistrationMarkID').empty();

                            $('#RegistrationMarkID').append("<option value='0'>--Select Registration Mark--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.registration_mark + '</option>').appendTo('#RegistrationMarkID');

                            });

                            $('#RegistrationMarkID').val(2);

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

        //function LoadOwnerType() {



        //    $.ajax({

        //        type: "Get",

        //        contentType: 'application/json; charset=utf-8',

        //        url: "{{url('/')}}/DEO/LoadOwnerType",

        //        dataType: 'json',



        //        success: function (response) {



        //            //removeOptions(document.getElementById("slabID"));

        //            if (response.Status == true) {

        //                if (typeof response != 'undefined' && response != null && response != 0) {



        //                    $('#OwnerType').empty();

        //                    $('#OwnerType').append("<option value='0'>--Select Owner Type--</option>");

        //                    $.each(response.Data, function (index, value) {

        //                        $('<option value="' + value.ID + '">' + value.Name + '</option>').appendTo('#OwnerType');

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

        function LoadETOLocation() {

            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadETOLoction",

                dataType: 'json',

                async: false,

                success: function (response) {

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {



                            $('#ETOLocation').empty();

                            $('#ETOLocation').append("<option value='0'>--Select ETO Location--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.eto_location + '</option>').appendTo('#ETOLocation');

                            });

                            $('#ETOLocation').val({{auth()->user()->eto_location_id}});
                            $("#ETOLocation").prop('disabled', true);


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



        function OnChangeETOLocation() {





            LoadETO();

            LoadVehicleType();





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





        function LoadOwnerTitle() {



            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadOwnerTitle",

                dataType: 'json',

                async:false,

                success: function (response) {

                    //removeOptions(document.getElementById("slabID"));

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

                    //alert("Something Went Wrong Please Try Again Letter....!");

                    swal(response.msg);

                }

            });



        }

        $("#Category").change(function () {



            var CategoryID = $("#Category").val();



            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadBodyType",

                data: { CategoryID: CategoryID},

                dataType: 'json',

                async: false,

                success: function (response) {



                    //removeOptions(document.getElementById("slabID"));

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {



                            $('#BodyType').empty();

                            $('#BodyType').append("<option value='0'>--Select BodyType--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#BodyType');

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

                async: false,

                data: { "CategoryID": CategoryID },

                success: function (response) {



                    //removeOptions(document.getElementById("slabID"));

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {



                            $('#TrailerBodyType').empty();

                            $('#TrailerBodyType').append("<option value='0'>--Select Trailer Body Type--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#TrailerBodyType');

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



        });

        function LoadManufacturers() {



            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadManufacturer",

                dataType: 'json',

                async: false,

                success: function (response) {



                    //removeOptions(document.getElementById("slabID"));

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {



                            $('#Manufacturer').empty();

                            $('#Manufacturer').append("<option value='0'>--Select Manufacturer--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.code + '">' + value.manufacturer + '</option>').appendTo('#Manufacturer');

                            });



                        }

                        else {



                        }

                    }

                    else {



                    }

                },

                error: function (response) {

                    //  alert("Something Went Wrong Please Try Again Letter....!");

                    swal(response.msg);

                }

            });



        }

        function LoadCCs() {

            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadCC",

                dataType: 'json',

                async:false,

                success: function (response) {



                    //removeOptions(document.getElementById("slabID"));

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {



                            $('#CC').empty();

                            $('#CC').append("<option value='0'>--Select Engine Capacity--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.ID + '">' + value.CC + '</option>').appendTo('#CC');

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



                            $('#Category').empty();

                            $('#Category').append("<option value='0'>--Select Category--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.category_of_vehicle + '</option>').appendTo('#Category');

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

                async:false,

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

                    //alert("Something Went Wrong Please Try Again Letter....!");

                    swal(response.msg);

                }

            });



        }

        function LoadVehicleType() {

            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadVehicleClass",

                dataType: 'json',

                /*data: {Location_code: selectedETOLocation},*/

                async: false,

                success: function (response) {



                    //removeOptions(document.getElementById("slabID"));

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {



                            $('#VehicleClass').empty();

                            $('#VehicleClass').append("<option value='0'>--Select Vehicle Class--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.class_of_vehicle + '</option>').appendTo('#VehicleClass');

                                //$('<option value="' + value.VehicleClassId + '">' + value.Name + '</option>').appendTo('#VehicleClass');

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



                            $('#Color').empty();

                            $('#Color').append("<option value='0'>--Select Color--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.colors + '</option>').appendTo('#Color');

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



        }

        function LoadTrailerBodyType() {



            /*var CategoryId = $('Category').val();*/



            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadTrailerBodyType",

                dataType: 'json',

                async: false,

                /* data: { "CatergoryID": CategoryId },*/

                success: function (response) {



                    //removeOptions(document.getElementById("slabID"));

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {



                            $('#TrailerBodyType').empty();

                            $('#TrailerBodyType').append("<option value='0'>--Select Trailer Body Type--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#TrailerBodyType');

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



        }

        function LoadTrailerUnits() {



            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadUnit",

                dataType: 'json',

                async: false,

                success: function (response) {



                    //removeOptions(document.getElementById("slabID"));

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {



                            $('#TrailerUnit').empty();

                            $('#TrailerUnit').append("<option value='0'>--Select Trailer Unit--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.unit + '</option>').appendTo('#TrailerUnit');

                            });

                            $('#TrailerUnit').val(1);

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

        function LoadTrailerUnits1() {



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



                            $('#AxleUnit').empty();

                            $('#AxleUnit').append("<option value='0'>Unit</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.unit + '</option>').appendTo('#AxleUnit');

                            });

                            $('#LUnit').empty();

                            $('#LUnit').append("<option value='0'>Unit</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.unit + '</option>').appendTo('#LUnit');

                            });

                            $('#LadUnit').empty();

                            $('#LadUnit').append("<option value='0'>Unit</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.unit + '</option>').appendTo('#LadUnit');

                            });

                            $('#AxleUnit').val(1);
                            $('#LUnit').val(1);
                            $('#LadUnit').val(1);



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



        function LoadUnits1() {



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



                            $('#EUnit').empty();

                            $('#EUnit').append("<option value='0'>Unit</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.unit + '</option>').appendTo('#EUnit');

                            });
                            $('#EUnit').val(2);


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



                            $('#Role').empty();

                            $('#Role').append("<option value='0'>--Select Designation--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.ID + '">' + value.Title + '</option>').appendTo('#Role');

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



                            $('#Name').empty();

                            $('#Name').append("<option value='0'>--Select Name--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.ID + '">' + value.Name + '</option>').appendTo('#Name');

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



                            $('#Province').empty();

                            $('#Province').append("<option value='0'>--Select Province  Name--</option>"); //edit  by fadii

                            $.each(response.Data, function (index, value) {

                                //$('<option value="' + value.ID + '">' + value.Name + '</option>').appendTo('#Province');

                                $('<option value="' + value.id + '">' + value.province + '</option>').appendTo('#Province');

                            });

                            $('#Province').val(4);



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



    </script>

    <script>

        $("#Province").change(function () {

            var ProvinceID = $("#Province").val();

            $.ajax({
                type: "Get",
                contentType: 'application/json; charset=utf-8',
                url: "/DEO/LoadCity",
                dataType: 'json',
                data: { ProvinceID: ProvinceID },
                success: function (response) {
                    //removeOptions(document.getElementById("slabID"));
                    if (response.Status == true) {
                        if (typeof response != 'undefined' && response != null && response != 0) {
                            $('#City').empty();
                            $('#City').append("<option value='0'>--Select City Name--</option>");  //edit by fadii
                            $.each(response.Data, function (index, value) {
                                $('<option value="' + value.city_code + '">' + value.cities + '</option>').appendTo('#City');
                            });
                        }
                        else {
                        }
                    } else {
                    }
                },
                error: function (response) {
                    //alert("Something Went Wrong Please Try Again Letter....!");
                    swal(response.msg);
                }
            });

        });

        $.ajax({
            type: "Get",
            contentType: 'application/json; charset=utf-8',
            url: "/DEO/LoadCity",
            dataType: 'json',
            data: { ProvinceID: 4 },
            success: function (response) {
                //removeOptions(document.getElementById("slabID"));
                if (response.Status == true) {
                    if (typeof response != 'undefined' && response != null && response != 0) {
                        $('#City').empty();
                        $('#City').append("<option value='0'>--Select City Name--</option>");  //edit by fadii
                        $.each(response.Data, function (index, value) {
                            $('<option value="' + value.city_code + '">' + value.cities + '</option>').appendTo('#City');
                        });
                    }
                    else {
                    }
                } else {
                }
            },
            error: function (response) {
                //alert("Something Went Wrong Please Try Again Letter....!");
                swal(response.msg);
            }
        });

        $("#ETO").change(function () {

            var eto_location = $('#ETOLocation').val();

            var E_code = $('#ETO').val();



            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadDivisions",

                dataType: 'json',

                data: { code: eto_location, E_code: E_code },

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

        });



    </script>



    <script>



        /////////////////////////////////////////////////////////////////////////////jquery validation by Uzair///////////////////////////////////////////////////////////////////////////

        //$("#PrimaryNo").inputmask({ "mask": "\\929999999999" });

        $(".mobile").inputmask({ "mask": "\\929999999999" });

        $(".telephone").inputmask({ "mask": "\\929999999999" });

        $(".oldCnic").inputmask({"mask": "\\999-99-999999"});

        $(".newCnic").inputmask({"mask": "\\99999-9999999-9"});

        // $(".NTN").inputmask({"mask": "\\9999999-9"});

        $("#Registration").validate({

            rules: {

                "Division": {

                    required: true,

                    Dropdown:true,

                },

                "RegistrationMarkID": {

                    required: true,

                    Dropdown: true,

                },

                "OwnerType": {

                    required: true,

                    Dropdown: true,

                },

                "OwnerTitle": {

                    required: true,

                    Dropdown: true,

                },

                "OwnerName"          :{ required:true,},

                //"oldCnic": {

                //    required: true,

                //    CNICCheck:13,

                //},

                "newCnic": {

                    required: true,

                    CNICCheck: 13,

                },

                "guardianName"       :{ required:true,},

                "houseNo"            :{ required:true,},

                "Province": {

                    required: true,

                    Dropdown: true,

                },

                "City": {

                    required: true,

                    Dropdown: true,

                },

                "telephone": {

                    required: true,

                    ContactNumberCheck:12,

                },

                "mobile": {

                    required: true,

                    ContactNumberCheck: 12,

                },

                "email": {

                    required: true,

                    email: true,

                },

                "Category": {

                    required: true,

                    Dropdown: true,

                },

                "Manufacturer": {

                    required: true,

                    Dropdown: true,

                },

                "classification"     :{ required:true,},

                "Years"              :{ required:true,},

                "BodyType": {

                    required: true,

                    Dropdown: true,

                },

                "CC": {

                    required: true,

                    Dropdown: true,

                },

                "engineNo"           :{ required:true,},

                "chassisNo"          :{ required:true,},

                "VehicleClass": {

                    required: true,

                    Dropdown: true,

                },

                "cylinders"         :{ required:true,},

                "seatingCapacity"   :{ required:true,},

                "unLadenWeight"     :{ required:true,},

                "LadenWeight"     :{ required:true,},

                "Color": {

                    required: true,

                    Dropdown: true,

                },

                "regNo"             :{ required:true,},



                //"TrailerBodyType": {

                //    requiredIfChecked:true,

                //    CheckedDropdown: true,

                //},

                //"TrailerunLadenWeight": { requiredIfChecked: true,},

                //"maxAxleWeight": { requiredIfChecked: true,},

                //"TrailerUnit": {

                //    requiredIfChecked: true,

                //    CheckedDropdown: true,

                //},

                //"frontAxle": { requiredIfChecked: true,},

                //"rearAxle": { requiredIfChecked: true,},

                //"otherAxle": { requiredIfChecked: true,},

                //"maxLadenWeight": { requiredIfChecked: true,},

                //"Role": {

                //    required: true,

                //    Dropdown: true,

                //},

                //"Name": {

                //    required: true,

                //    Dropdown: true,

                //},

                // "inspectionDate"    :{ required:true,},

                // "remarks"           :{ required:true,},

                // "verificationNo"    :{ required:true,},

                // "verificationDate"  :{ required:true,},

                //"tribleDate": { requiredIfIsTribleVehChecked:true,},

                // "upload"            :{ required:true,},



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



        //$.validator.addMethod("CheckedDropdown", function (value, element) {

        //    if ($("#IsTrailerVeh").is(":checked")) { return value > 0; }

        //    return true;

        //}, "You must select at least one");



        //$.validator.addMethod("requiredIfChecked", function (val, ele, arg) {

        //    if ($("#IsTrailerVeh").is(":checked") && ($.trim(val) == '')) { return false; }

        //    return true;

        //}, "This field is required if IsTrailerVeh is checked...");



        //$.validator.addMethod("requiredIfIsTribleVehChecked", function (val, ele, arg) {

        //    if ($("#IsTribleVeh").is(":checked") && ($.trim(val) == '')) { return false; }

        //    return true;

        //}, "This field is required if IsTribleVeh is checked...");



        /////////////////////////////////////////////////////////////////////////////////////// end //////////////////////////////////////////////////////////////////////////////////////////////////



        //function SavedimgToData(input) {

        //

        //    if (input.length>0) {



        //        var length = input.length;

        //        $('#ImgesAttached').empty();

        //        if (length <= 3) {



        //            $.each(input, function (i, v) {

        //                var n = i + 1;

        //                var File = new FileReader();

        //                File.onload = function (event) {

        //                    $('<img/>').attr({

        //                        src: input[n].DocumentPath,

        //                        class: 'img',

        //                        id: 'img-' + n + '-preview',

        //                    }).appendTo('#ImgesAttached');



        //                    //$('<input/>').attr({

        //                    //    type: 'text',

        //                    //    value: event.target.result,

        //                    //    id: 'img-' + n + '-val'

        //                    //}).appendTo('ImgesAttached');

        //                };



        //                File.readAsDataURL(input.files[i]);

        //            });

        //        }

        //        else {

        //            alert('Only 3 images allowed!');

        //        }

        //    }

        //}





        function GetData(ID) {

            // var ID = ;

            console.log(ID);

            //  debugger

            $.ajax({

                url: '/DEO/GetRegistrationData',

                type: "GET",

                dataType: "JSON",

                data: {ID:ID},



                success: function (response) {

                    // debugger

                    if (response.Status) {
                        console.log(response);
                        $('#ETOLocation').val(response.Data.eto_location_id);

                        $("#ETO").val(response.Data.eto_name_id);

                        $('#Division').val(response.Data.Jurisdiction_id);

                        $('#RegistrationMarkID').val(response.Data.no_assign_type);

                        $('#OwnerTypeID').val(response.Data.owner_type_id);

                        $('#RegBookNo').val(response.Data.book_serialNo);

                        $('#VehicleName').val(response.Data.makers_name);

                        $("#VehiclePrice").val(response.Data.vehicle_price);

                        if (response.Data.owner_type_id == "1") {

                            $("#AddOwners").hide();

                            $("#HideOldCnic").show();

                            $("#HideNewCnic").show();

                            $("#HideFatherDiv").show();

                            $("#OwnerTitleDiv").show();

                            $("#lblCnic").text("New CNIC No");

                            $("#OwnerName").val(response.Data.name_);

                            $('input[name="oldCnic"]').val(response.Data.old_cnic_no);

                            $('#guardianName').val(response.Data.father_or_husband_name);

                            $('#newCnic').val(response.Data.new_cnic_no);

                        }

                        else if (response.Data.owner_type_id == "2") {

                            $("#HideOldCnic").hide();

                            $("#HideNewCnic").hide();

                            $("#HideFatherDiv").hide();

                            $("#OwnerTitleDiv").hide();

                            $("#OwnerName").val(response.Data.name_);

                            $('input[name="oldCnic"]').val(response.Data.old_cnic_no);

                            $('#guardianName').val(response.Data.father_or_husband_name);

                            $('#newCnic').val(response.Data.new_cnic_no);

                        }

                        else if (response.Data.owner_type_id == "3") {

                            $("#AddOwners").show();

                            $("#HideOldCnic").show();

                            $("#HideNewCnic").show();

                            $("#HideFatherDiv").show();

                            $("#OwnerTitleDiv").show();

                            $("#lblCnic").text("New CNIC No");





                        }

                        else if (response.Data.owner_type_id == "4") {

                            $("#HideNewCnic").show();

                            $("#OwnerTitleDiv").hide();

                            $("#HideOldCnic").hide();

                            $("#HideFatherDiv").hide();

                            $("#lblCnic").text("NTN No");

                            $("#newCnic").val(response.Data.ntn_no);

                            $("#OwnerName").val(response.Data.name_);


                        }

                        $('#OwnerTitle').val(response.Data.owner_type_id);

                        //$('#OwnerName').val(response.Data.OwnerName);



                        if (response.Data2.length != 0) {
                            $('#TrailerBodyType').val(response.Data2.type_of_body);

                            /*$('#unLadenWeight').val(response.Data.TrailerunladenWeight);*/


                            $('#frontAxle').val(response.Data2.front_axle);

                            $('#rearAxle').val(response.Data2.rear_axle);

                            $('#otherAxle').val(response.Data2.any_other_axle);

                        }

                        if (response.Data4.length != 0) {

                            for (var i = 0; i < response.Data4.length; i++) {





                                if (i > 0) {

                                    $("#AddOwners").trigger('click');

                                }

                                console.log(response.Data4[i].name);

                                $('#owner_' + i + ' #OwnerName').val(response.Data4[i].name);

                                $('#owner_' + i + ' #oldCnic').val(response.Data4[i].old_cnic_no);

                                $('#owner_' + i + ' #newCnic').val(response.Data4[i].new_cnic_no);

                                $('#owner_' + i + ' #guardianName').val(response.Data4[i].father_or_husband_name);



                            }

                        }



                        $('#houseNo').val(response.Data.house_no);

                        $('#FirstRegistration').val(response.Data.registration_no);



                        var tem = response.Data.registration_date;

                        if (tem == null)

                        {

                            $('#registration_date').val('YYYY-MM-DD');

                        }

                        else {

                            $('#registration_date').val(moment(response.Data.registration_date).format("YYYY-MM-DD"));

                        }

                        $('#Province').val(response.Data.Province_id);

                        $.ajax({

                            type: "Get",

                            contentType: 'application/json; charset=utf-8',

                            url: "/DEO/LoadCity",

                            dataType: 'json',

                            data: { ProvinceID: $('#Province').val() },

                            async:false,

                            success: function (response) {



                                //removeOptions(document.getElementById("slabID"));

                                if (response.Status == true) {

                                    if (typeof response != 'undefined' && response != null && response != 0) {



                                        $('#City').empty();

                                        $('#City').append("<option value='0'>--Select Name--</option>");

                                        $.each(response.Data, function (index, value) {

                                            $('<option value="' + value.city_code + '">' + value.cities + '</option>').appendTo('#City');

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

                        $('#City').val(response.Data.City_id);

                        $('#telephone').val(response.Data.mobile_no);

                        $('#mobile').val(response.Data.mobile_no);

                        $('#email').val(response.Data.Email);

                        $('#Manufacturer').val(response.Data.makers_name);

                        $('#classification').val(response.Data.category_of_vehicle_id);

                        $('#Years').val(response.Data.year_of_manufacture);

                        $("#EngineCapacity").val(response.Data.engine_capacity);

                        $("#wheelbox").val(response.Data.wheelbox);

                        $("#FueltypeID").val(response.Data.fuel_type_id);

                        $('#CC').val(response.Data.engine_capacity);

                        $('#EUnit').val(response.lunit);

                        $('#LUnit').val(response.cunit);

                        $('#engineNo').val(response.Data.engine_no);

                        $('#chassisNo').val(response.Data.chassis_no);

                        $('#VehicleClass').val(response.Data.class_of_vehicle_id);

                        $('#IsTrailerVeh').prop("checked", response.Data.trailer_vehicle);


                        if(response.Data.trailer_vehicle)
                        {
                            $("#ShowDiv").css("display", "Block");

                        }


                        $('#BodyType').val(response.Data.type_of_body);

                        $.ajax({

                            type: "Get",

                            contentType: 'application/json; charset=utf-8',

                            url: "/DEO/LoadcategoryTypeAgainstBody",

                            dataType: 'json',

                            data: { BodyTypeID: $('#BodyType').val() },

                            async: false,

                            success: function (response) {



                                //removeOptions(document.getElementById("slabID"));

                                if (response.Status == true) {

                                    if (typeof response != 'undefined' && response != null && response != 0) {

                                        console.log(response.Data);

                                        $('#Category').val(response.Data.category_of_vehicle_id);



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



                        $('#cylinders').val(response.Data.number_of_cylinder);

                        $('#seatingCapacity').val(response.Data.seating_capacity);

                        // debugger

                        $('#unLadenWeight').val(response.Data.unladen_weight);

                        $('#LUnit').val(response.Data.unladen_unit);

                        $('#LadUnit').val(response.Data.laden_unit);

                        $('#LadenWeight').val(response.Data.laden_weight);

                        $('#Color').val(response.Data.color_of_vehicle_id);

                        $('#regNo').val(response.Data.registration_no);

                        if(response.Data3!=null)
                        {


                            $('#maxAxleWeight').val(response.Data3.max_lan_weight);


                            $('#maxLadenWeight').val(response.Data3.max_lan_weight);

                            $('#AxleFrontAxle').val(response.Data3.max_lan_weight_front_axle);

                            $('#AxleRearAxle').val(response.Data3.max_lan_weight_rear_axle);

                            $('#AxleOtherAxle').val(response.Data3.max_lan_weight_any_other_axle);

                            $('#AxleUnit').val(response.Data3.axleunit);

                            $('#TyresFrontAxle').val(response.Data3.tyre_front_axle);

                            $('#TyresRearAxle').val(response.Data3.tyre_rear_axle);

                            $('#TyreOtherAxle').val(response.Data3.tyre_any_other_axle);

                        }




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



                                        $('#EUnit').empty();

                                        $('#EUnit').append("<option value='0'>Unit</option>");

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

                        $('#EUnit').val(response.cunit);

                        $("#ETO").val(response.Data.eto_name_id);

                        var eto_location = $('#ETOLocation').val();

                        var E_code = $('#ETO').val();








                        $('#Division').val(response.Data.Jurisdiction_id);













                        $('#Remarks').text(response.Data.remarks);


                        $("#RegistrationDate").val(moment(response.Data.registration_date).format("YYYY-MM-DD"));
                        $("#SecondRegistrationDate").val(moment(response.Data.secondregistration_date).format("YYYY-MM-DD"));

                    }

                    else {

                        //swal("something went wrong")

                        swal(response.msg);

                    }

                }

            });



        }





        function ValidateDate(newCnic, mobile, email) {

            var stat = null;

            $.ajax({

                url: '/DEO/CheckExist',

                type: "GET",

                dataType: "JSON",

                async: false,

                data: { NewCNIC: newCnic, Mobile: mobile, Email: email, tableName: 'Registration', key: 'Phone', KeyCNIC: 'NewCNIC' },

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





        //var CategoryID = $("#Category").val();

        ////var VehicleClassID = $("#VehicleClass").val();

        //var selectedETOLocation = $('#ETOLocation').val();

        function LoadBodytype() {



            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadBodyType",

                dataType: 'json',

                async: false,

                data: { CategoryID: 0 },

                //async: false,

                success: function (response) {



                    //removeOptions(document.getElementById("slabID"));

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {



                            $('#BodyType').empty();

                            $('#BodyType').append("<option value='0'>--Select Body Type--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#BodyType');

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





        }





        $("#BodyType").change(function () {

            // debugger

            var RegistrationMarkID = $("#RegistrationMarkID").val();



            if (RegistrationMarkID == 11) {



                var BodyTypeID = $('#BodyType').val();



                $.ajax({

                    type: "Get",

                    contentType: 'application/json; charset=utf-8',

                    url: "/DEO/LoadRegNo",

                    dataType: 'json',

                    data: { BodyTypeID: BodyTypeID },

                    // async: false,

                    success: function (response) {

                        // debugger

                        //removeOptions(document.getElementById("slabID"));

                        if (response.Status == true) {

                            if (typeof response != 'undefined' && response != null && response != 0) {



                                $("#regNo").val(response.Data.RegNo);



                            }

                            else {



                            }

                        }

                        else {

                            swal(response.msg);



                        }

                    },

                    error: function (response) {

                        //alert("Something Went Wrong Please Try Again Letter....!");

                        swal(response.msg);

                    }

                });

            }

        });



        //edit by fadii

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





        }//end by fadii

        var date = new Date();



        var day = date.getDate();

        var month = date.getMonth() + 1;

        var year = date.getFullYear();



        if (month < 10) month = "0" + month;

        if (day < 10) day = "0" + day;



        var today = year + "-" + month + "-" + day;





        document.getElementById('RegistrationDate').value = today;





        function ValidateDateFormat(value, id) {

            re = /^(\d{4})-(\d{1,2})-(\d{1,2})/;

            var inputText = $("#" + id).val();

            if (inputText != '') {

                if (regs = inputText.match(re)) {

                    // day value between 1 and 31

                    if (regs[3] < 1 || regs[3] > 31) {

                        if (id == "fromDate" || id == "toDate" || id == "LastPaidAmountUpTo") {

                            $('#' + id).val('');

                            //$('#' + id).prop('required', false);

                            $("#" + id).addClass('error');

                            $('#DivisionRegion').css('display', 'block')

                            $('#DivisionRegion').html('<p style="color:red">Invalid date format.</p>');

                            return false;

                        }



                    }

                    // month value between 1 and 12

                    if (regs[2] < 1 || regs[2] > 12) {

                        if (id == "fromDate" || id == "toDate" || id == "LastPaidAmountUpTo") {

                            $('#' + id).val('');

                            //$('#' + id).prop('required', false);

                            $("#" + id).addClass('error');

                            $('#DivisionRegion').css('display', 'block')

                            $('#DivisionRegion').html('<p style="color:red">Invalid date format.</p>');

                            return false;

                        }



                        return false;

                    }

                    // year value between 1902 and 2020

                    if (regs[1] < 1902) {

                        if (id == "fromDate" || id == "toDate" || id == "LastPaidAmountUpTo") {

                            $('#' + id).val('');

                            //$('#' + id).prop('required', true);

                            $("#" + id).addClass('error');

                            $('#DivisionRegion').css('display', 'block')

                            $('#DivisionRegion').html('<p style="color:red">Invalid date format.</p>');

                            return false;

                        }



                        return false;

                    }

                } else {

                    if (id == "fromDate" || id == "toDate" || id == "LastPaidAmountUpTo") {

                        $('#' + id).val('');

                        //$('#' + id).prop('required', true);

                        $("#" + id).addClass('error');

                        $('#DivisionRegion').html('<p style="color:red">Invalid date format.</p>');

                        return false;

                    }



                    return false;

                }

            }

            //$('#' + id).prop('required', false);

            $("#" + id).remove('error');

            return true;

        }







    </script>



@endsection
