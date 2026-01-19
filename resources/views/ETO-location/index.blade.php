@extends('layouts.dash')

@section('template_title')
    Etauser
@endsection

@section('content')

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

                body .container.body .right_col {
                background: #FfFfFF  !important;
                }


            </style>
            <div class="panel panel-default mb-50 addnewpanl">

                <span id="DivisionUpdate" style="color:red;display:none" class="text-center"></span>

                <div class="panel-body">

                    <div class="topTabsSection">

                        <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div style="display: flex; justify-content: space-between; align-items: center;">

                                                    <span id="card_title">
                                                        {{ __('ETO Location') }}
                                                    </span>

                                                    <div class="float-right">
                                                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                                        {{ __('Create New') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($message = Session::get('success'))
                                                <div class="alert alert-success">
                                                    <p>{{ $message }}</p>
                                                </div>
                                            @endif

                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover">
                                                        <thead class="thead">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Eto Location</th>

                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($eto_location as $key => $eto_locations)
                                                                <tr>
                                                                    <td>{{ $key+1 }}</td>

                                                                    <td>{{ $eto_locations->eto_location }}</td>

                                                                    <td>
                                                                        <a class="btn btn-sm btn-success" href="{{ route('eto.location.create',$eto_locations->id) }}">
                                                                            <i class="fa fa-fw fa-plus"></i>
                                                                            Add
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        {!! $eto_location->links() !!}
                                    </div>
                                </div>
                            </div>



                        </div>



                    </div>







                </div>

        </div>

    </div>

</div>

@endsection
