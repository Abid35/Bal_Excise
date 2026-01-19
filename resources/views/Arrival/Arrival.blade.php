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

        <div class="col-md-4 ">

            <h2 class="strong"> Arrival </h2>

        </div>

        <div class="col-md-1">

        </div>

        <div class="col-md-1">

        </div>

        <div class="col-md-3" style="margin-top: 1%">

            <div class="form-group has-search">

                <span class="fa fa-search form-control-feedback"></span>

                <input type="text" class="form-control" placeholder="Search">

              </div>

        </div>

        @if(auth()->user()->role_id!=7)
        <div class="col-md-3" style="margin-top: 1%">

            {{-- <a href="#" type="button" class="btn  btn-dark">Old record</a>         --}}

            <a href="{{url('/Arrival/create')}}" type="button" class="btn  btn-dark">Add New</a>

        </div>
        @endif





    </div>

    <div class="row">

    <div class="col-sm-12" style="width: 100%; font-size:15px; margin-top:1%">

    <table class="table table-responsive over" id="dtable" >

        {{-- <colgroup>

            <col span="1" style="width: 35%;">

            <col span="1" style="width: 35%;">

            <col span="1" style="width: 30%;">



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
                @php($n= App\Models\regowner::where('reg_id', $x->id)->first() )
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



                    <div class="col-sm-6">
                        <a href="#" class="btn btn-sm btn-clean btn-icon" title="Delete"

                                onclick="DltUser({{$x->id}});"


                            ><i class="fas fa-trash"></i></a>

                            <form id="del-form{{$x->id}}" action="{{url('/')}}/Arrival/{{$x->id}}" method="POST">
                            @csrf

                            @method('DELETE')

                        </form>



                    </div>

                </div>

            </td>
              @endif

          </tr>

          @endforeach


        </tbody>

      </table>
      <div style="float:right !important;">{{ $data->links('') }}</div>


    </div>

    </div>

</div>





@endsection
