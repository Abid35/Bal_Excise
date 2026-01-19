@extends('layouts.dash')



@section('content')



<style>

    /* .table {

   display: block !important;

} */



.main {

 width: 80%;

 align-content: center;

 align-items: center;

 float: right;

}

@media (max-width: 992px) {

    .main {

 width: 100%;



 float: none;

}

}

.strong {

    font-weight: bold;

    color: black;

}



.has-search .form-control {

    padding-left: 2.375rem;

}



.has-search .form-control-feedback {

    position: absolute;

    z-index: 2;

    display: block;

    width: 2.375rem;

    height: 2.375rem;

    line-height: 1.75rem;

    padding-right: 15%;

    text-align: center;

    pointer-events: none;

    color: #aaa;

}

.headings {

    border-bottom: solid 2px black;

}

td {

    padding-left: 3rem;

}



.over {

    overflow: hidden;

}

</style>



<div id="maindiv" class="container main over">



    <div class="row">

        <div class="col-md-5 ">

            <h2 class="strong"> Data Update </h2>

        </div>

        <div class="col-md-2">

        </div>

        <div class="col-md-2">

        </div>

        <!--<div class="col-md-3" style="margin-top: 1%">-->

        <!--    <div class="form-group has-search">-->

        <!--        <span class="fa fa-search form-control-feedback"></span>-->

        <!--        <input type="text" class="form-control" placeholder="Search">-->

        <!--      </div>            -->

        <!--</div>   -->

        <!--<div class="col-md-3" style="margin-top: 1%">-->

        <!--    {{-- <a href="#" type="button" class="btn  btn-dark">Old record</a>         --}}-->

        <!--    <a href="{{url('/new_registration/create')}}" type="button" class="btn  btn-dark">Add New</a>        -->

        <!--</div>    -->
    </div>

    <div class="row">

        <div class="col-md-4" style="margin-top: 1%">

                <input type="date" class="form-control" id="Excelto" placeholder="Search">

        </div>

        <div class="col-md-4" style="margin-top: 1%">

            <input type="date" class="form-control" id="Excelform" placeholder="Search">

    </div>

        @if(auth()->user()->role_id!=7)
            <div class="col-md-4" style="margin-top: 1%">
                {{-- <a href="#" type="button" class="btn  btn-dark">Old record</a>         --}}
                <a href="#" type="button" class="btn btnCustom2" onclick="ExportToExcel()">Export to excel</a>
                <a href="{{url('/NOC/create')}}" type="button" class="btn btnCustom2">Add New</a>
            </div>
        @endif





    </div>

    <div class="row">

    <div class="col-sm-12" style="width: 100%; font-size:15px; margin-top:1%">

    <table class="table table-responsive over"  id="dtable">

        {{-- <colgroup>

            <col span="1" style="width: 25%;">

            <col span="1" style="width: 25%;">

            <col span="1" style="width: 25%;">

            <col span="1" style="width: 25%;">



         </colgroup> --}}

        <thead class="thead-dark" style="border: 1px black; color:black; " >

        <tr class="headings">



        <th scope="col">Jurisdiction</th>

        <th scope="col">Owner</th>

        <th scope="col">District</th>

        <th scope="col">Registration Number</th>

        @if(auth()->user()->role_id!=7)
            <th scope="col">Actions</th>
        @endif



        </tr>

        </thead>

        <tbody>

        @foreach( $data as $x)
          <tr>


            @php($j= App\Models\jurisdiction::where('eto_location_id', $x->eto_location_id)->where('Jurisdiction_code', $x->Jurisdiction_id)->first() )
            @if($j!=null)
                <td>{{$j->Jurisdiction}}</td>
            @else
                <td>Not Assigned</td>
            @endif
            @if($x->name_!='')

            <td>{{$x->name_}}</td>
            @else
                @php($n= App\Models\nocowner::where('reg_id', $x->id)->first() )
                @if($n!=null)
                    <td>{{$n->name}}</td>
                @else

                    <td>Not Assigned</td>
                @endif
            @endif
            @php($e= App\Models\eto_location::where('id', $x->eto_location_id)->first() )
            @if($e!=null)
                <td>{{$e->eto_location}}</td>
            @else
                <td></td>
            @endif



           @if($x->registration_no!='')
            <td>{{$x->registration_no}}</td>
           @else
             <td>Not Assigned</td>
           @endif


              @if(auth()->user()->role_id!=7)
            <td>

                <div class="row">

                    <!-- <div class="col-sm-6">

                        <a href="{{url('/')}}/new_registration/{{$x->registration_no}}/edit" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="fas fa-edit"></i></a>

                    </div> -->

                    <div class="col-sm-6">
                        <a href="#" class="btn btn-sm btn-clean btn-icon" title="Delete"

                            onclick="DltUser({{$x->id}});"


                        ><i class="fas fa-trash"></i></a>

                        <form id="del-form{{$x->id}}" action="{{url('/')}}/NOC/{{$x->id}}" method="POST">
                        @csrf

                        @method('DELETE')

                    </form>



                    </div>

                </div>

            </td>

          </tr>
          @endif

          @endforeach






        </tbody>

      </table>

    </div>

    </div>

</div>
<script>

    function ExportToExcel() {
        // debugger
        var exceldateto = $("#Excelto").val();
        var excelDateform = $("#Excelform").val();

        if (excelDateform != '' || exceldateto != '') {

            $.ajax({
                type: "Post",
                url: "/DEO/ExportExcel",
                datatype: 'json',
                data: { exceldateto: exceldateto, excelDateform: excelDateform },
                success: function (response) {
                    debugger
                    if (response.Status) {

                        DownlaodDoc(response.Path)

                        //var bytes = new Uint8Array(response.robj.FileContents);
                        //var blob = new Blob([bytes], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" });
                        //var link = document.createElement('a');
                        //link.href = window.URL.createObjectURL(blob);
                        //link.download = response.robj.FileDownloadName;
                        //link.click();

                        swal("Download Successfully!");
                    }
                    else {
                        swal("Records Not Found!");
                    }
                },
                error: function (response) {
                    alert("Internet Issue Please Try Again!...");
                }
            });
        }
        else {
            swal("Please Select Date!");
        }
    }


    function DownlaodDoc(path) {
        // debugger
        if (path != "" && path != null && path != 'null' && path != "undefined") {
            var idxDot = path.lastIndexOf(".") + 1;
            var extFile = path.substr(idxDot, path.length).toLowerCase();
            if (extFile == "xlsx" || extFile == "jpeg" || extFile == "png") {

                var res = (path).charAt(0);

                if (res === '~') {
                    path = (path).substr(1);



                } else {
                    path = path;
                }

                $('#ImgModal').modal('show');
                $('#imgToShow').attr("src", path);
                $('#DowndloadImage').attr("href", path);
                window.location.href = path;
            }
            else {
                window.location.href =  path;
            }

        }
        else {
            swal({
                title: "No File Found",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "OK",
                closeOnConfirm: true
            })
        }
    }


    function RedirecttoNewRegistraion() {
        $.ajax({
            type: "GET",
            url: "/DEO/SetRecordIDtoNULL",
            dataType: 'json',
            async: false,
            success: function (response) {
                ;
                if (response.Status) {
                    window.location.href = "/DEO/NewRegistration";
                }
            }
        });
    }
</script>




@endsection
