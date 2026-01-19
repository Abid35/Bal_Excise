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

            <h2 class="strong"> Conversion </h2>

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

            <a href="{{url('/add_conversion')}}" type="button" class="btn  btn-dark">Add New</a>

        </div>
            @endif





    </div>

    <div class="row">

    <div class="col-sm-12" style="width: 100%; font-size:15px; margin-top:1%">

    <table class="table table-responsive over" id="dtable" >

        {{-- <colgroup>

            <col span="1" style="width: 20%;">

            <col span="1" style="width: 20%;">

            <col span="1" style="width: 20%;">

            <col span="1" style="width: 20%;">

            <col span="1" style="width: 20%;">





         </colgroup> --}}

        <thead class="thead-dark" style="border: 1px black; color:black; " >

          <tr class="headings">



            <th scope="col">District</th>

            <th scope="col">New ETO_Name</th>

            <th scope="col">New Category Type</th>

            <th scope="col">New Body Type</th>

            <th scope="col">Registraion No.</th>

              @if(auth()->user()->role_id!=7)
            <th scope="col">Actions</th>
                  @endif



          </tr>

        </thead>

        <tbody>

        @foreach($data as $x)
          <tr>
            @php( $tob=App\Models\type_of_body::where('tob_code', $x->new_type_of_body)->where('eto_location_id',$x->eto_location_id)->first())
            @php( $cat=App\Models\category_of_vehicle::where('categ_code', $x->new_category_vehicle)->first())

            @php($eto=App\Models\eto_location::find($x->eto_location_id))
            <td>{{ $eto==null ? 'N/A' : $eto->eto_location }}</td>

            @php($eton=App\Models\eto_name::where('eto_code',$x->eto_name_id)->where('eto_location_id',$x->eto_location_id)->first())

            <td>{{$eton==null ? "Not Assinged" : $eton->eto_name}}</td>

            <td>{{ $cat ==null ? "Not Assinged" :  $cat->category_of_vehicle}}</td>

            <td> {{$tob ==null ? "Not Assinged" : $tob->type_of_body}}</td>

            <td>{{$x->reg_no}}</td>

              @if(auth()->user()->role_id!=7)
            <td>

                <div class="row">

                <!-- <div class="col-sm-6">

                    <a href="{{url('/')}}/alteration/{{$x->id}}/edit" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="fas fa-edit"></i></a>

                    </div> -->

                    <div class="col-sm-6">
                    <a href="#" class="btn btn-sm btn-clean btn-icon" title="Delete"

                        onclick="DltUser({{$x->id}});"

                    ><i class="fas fa-trash"></i></a>

                    <form id="del-form{{$x->id}}" action="{{url('/')}}/alteration/{{$x->id}}" method="POST">
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
