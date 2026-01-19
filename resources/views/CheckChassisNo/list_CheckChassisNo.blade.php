@extends('layouts.dash')



@section('content')



<style>

     .table {

   display: block !important;

}



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

</style>



<div id="maindiv" class="container main">



    <div class="row">

        <div class="col-md-4 ">

            <h2 class="strong"> Check Chassis No </h2>

        </div>

        <div class="col-md-2">

        </div>

        <div class="col-md-2">

        </div>



        <div class="col-md-1">

        </div>





    </div>

    <div class="row">
    <div class="col-md-2">

    </div>

    <div class="col-md-8" style="margin-top: 1%">
      <form action="{{url('Search')}}" method="post">
        @csrf
        <div class="form-group has-search">

            <span class="fa fa-search form-control-feedback"></span>

            <input type="text" class="form-control" name="search" @if(isset($ser)) value="{{ $ser }}"   @endif placeholder="Chassis No. / Registration No.">

            <input type="hidden" name="table" value="register" />

          </div>
        </form>
    </div>

        <!-- ultrasoft changes  -->
        <div class="text-right mb-3">
            <button id="exportBtn" class="btn btn-success">
                <i class="fa fa-file-excel-o"></i> Export to Excel
            </button>
        </div>

    <div class="col-md-2">

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

    <div style="width: 100%; font-size:15px; margin-top:1% ; ">

    <table class="table table-responsive" id="dtable">

        <thead class="thead-dark" style="border: 1px black; color:black; " >

          <tr class="headings">

            <th scope="col">OwnerName</th>

            <th scope="col">CNIC</th>
            <th scope="col">NTN</th>

            <th scope="col">District</th>

            <th scope="col">Type of Body</th>

            <th scope="col">Category of Vehicle</th>

            <th scope="col">Remarks</th>

            <th scope="col">Engine No.</th>

            <th scope="col">Chassis No.</th>

            <th scope="col">Year</th>

            <th scope="col">Maker</th>

            <th scope="col">Reg No.</th>

            <th scope="col">Book No</th>

            <th scope="col">ETO_NAME</th>

            <th scope="col">Active Status</th>





          </tr>

        </thead>

        <tbody>
      @if(isset($data))
        @foreach($data as $x)

        @if($x->vehicle_status==0)
          <tr style="
          background-color: #FBEC5D;
            ">
        @elseif($x->vehicle_status==-2)
          <tr style="
          background-color: #DC143C;
          color: white;
            ">
        @else
          <tr>

        @endif
            @if($x->name_!=null)
                @if($x->name_!='')

                <td>{{$x->name_}}</td>
                @else
                    @php($n= App\Models\regowner::where('reg_id', $x->id)->first() )
                    @if($n!=null)
                        <td>{{$n->name}}</td>
                    @else

                        <td>N/A</td>
                    @endif
                @endif
          @else
                <td>N/A</td>
          @endif

          @if($x->new_cnic_no!=null)
                @if($x->new_cnic_no!='')

                <td>{{$x->new_cnic_no}}</td>
                @else

                <td>{{ $x->old_cnic_no }}</td>

                @endif
          @else
                <td>N/A</td>
          @endif

              @if($x->ntn_no!=null)
                  <td>{{$x->ntn_no}}</td>
              @else
                  <td>N/A</td>
              @endif


            @if($x->eto_location!=null)
            <td>{{$x->eto_location}}</td>
              @else
              <td>N/A</td>
            @endif

            @if($x->type_of_body!=null)
            <td>{{$x->type_of_body==null ? 'N/A' : $x->type_of_body}}</td>
            <td>

             {{$x->category_of_vehicle==null ? 'N/A' : $x->category_of_vehicle }}



            </td>
              @else
              <td>N/A</td>
              <td>N/A</td>
            @endif


            <td>{{$x->remarks==null ? 'N/A' : $x->remarks}}</td>

            <td>{{$x->engine_no==null ? 'N/A' : $x->engine_no}}</td>


            <td>{{$x->chassis_no==null ? 'N/A' : $x->chassis_no}}</td>

            <td>{{$x->year_of_manufacture}}</td>

              <td>{{$x->makers_name}}</td>
{{--            @php($m= App\Models\manufacturer::where('eto_location_id', $x->eto_location_id)->where('code',$x->makers_name)->first() )--}}
{{--            @if($m!=null)--}}
{{--            <td>{{$m->manufacturer}}</td>--}}
{{--            @else--}}
{{--            <td>{{$x->makers_name}}</td>--}}
{{--            @endif--}}
{{--              <td>{{ $x->makers_name }}</td>--}}
            <td>{{$x->registration_no}}</td>
            <td>{{$x->book_serialNo==null ? 'N/A' : $x->book_serialNo}}</td>
            @php($e= App\Models\eto_name::where('eto_code',$x->eto_name_id)->where('eto_location_id', $x->eto_location_id)->first() )
            @if($e!=null)
            <td>{{$e->eto_name}}</td>
            @else
            <td>N/A</td>
            @endif


              <td>{{ $x->active_status }}</td>
          </tr>


        @endforeach


      @endif




        </tbody>
      </table>
      @if(!isset($pagi))
        @if(isset($data))
          <div style="float:right !important;">{{ $data->render() }}</div>
        @endif
        @endif

    </div>

</div>


<!-- ultrasoft changes  -->
<script>
    document.getElementById('exportBtn').addEventListener('click', function() {
        var table = document.getElementById('dtable');
        var html = table.outerHTML;
        var url = 'data:application/vnd.ms-excel,' + escape(html); // Excel MIME type
        var link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'vehicles_chassis_data.xls');
        link.click();
    });
</script>






@endsection
