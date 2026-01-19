@extends('layouts.dash')

@section('template_title')
    Smart Card Requests
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">

                <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <style>
                        body .container.body .right_col {
                            background: #ffffff !important;
                        }
                        .snapshot-box {
                            max-width: 250px;
                            max-height: 150px;
                            overflow: auto;
                            background: #f7f7f7;
                            border: 1px solid #ddd;
                            padding: 5px;
                            font-size: 12px;
                            white-space: pre-wrap;
                        }
                    </style>

                    <div class="panel panel-default mb-50 addnewpanl">
                        <div class="panel-body">
                            <div class="topTabsSection">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                                        <span id="card_title">
                                                            {{ __('Smart Card Requests') }}
                                                        </span>
                                                        <div class="float-right">
                                                            <a href="{{ route('smart-cards.create') }}" class="btn btn-primary btn-sm">
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
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Reg No</th>
                                                                <th>Status</th>
                                                                <th>ETO Location</th>
                                                                <th>Requested by</th>
                                                                <th>Remarks</th>
{{--                                                                <th>Vehicle Snapshot</th>--}}
                                                                <th>Request Date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($smartCardRequests as $key => $request)
                                                                <tr>
                                                                    <td>{{ ++$key }}</td>
                                                                    <td>{{ $request->reg_no }}</td>
                                                                    <td>{{ ucfirst($request->status) }}</td>
                                                                    @php
                                                                        $district = \App\Models\eto_location::find($request->district_id);
                                                                        $eto = \App\Models\eto_name::find($request->eto_id);
                                                                    @endphp
                                                                    <td>{{ $district?->eto_location ?? 'N/A' }}</td>
                                                                    <td>{{ $eto?->eto_name ?? 'N/A' }}</td>
                                                                    <td>{{ $request->remarks ?? '-' }}</td>
{{--                                                                    <td>--}}
{{--                                                                        @php--}}
{{--                                                                            $snapshot = $request->vehicle_snapshot;--}}
{{--                                                                            if (is_string($snapshot)) {--}}
{{--                                                                                $snapshot = json_decode($snapshot, true);--}}
{{--                                                                            }--}}
{{--                                                                        @endphp--}}

{{--                                                                        @if (is_array($snapshot))--}}
{{--                                                                            <table class="table table-bordered table-sm mb-0">--}}
{{--                                                                                @foreach ($snapshot as $key => $value)--}}
{{--                                                                                    <tr>--}}
{{--                                                                                        <th style="text-transform: capitalize; background: #f8f9fa; width: 150px;">--}}
{{--                                                                                            {{ str_replace('_', ' ', $key) }}--}}
{{--                                                                                        </th>--}}
{{--                                                                                        <td>{{ $value }}</td>--}}
{{--                                                                                    </tr>--}}
{{--                                                                                @endforeach--}}
{{--                                                                            </table>--}}
{{--                                                                        @else--}}
{{--                                                                            <span>-</span>--}}
{{--                                                                        @endif--}}
{{--                                                                    </td>--}}

                                                                    <td>{{ $request->created_at->format('Y-m-d') }}</td>
                                                                    <td>
                                                                        <form action="{{ route('smart-cards.destroy', $request->id) }}" method="POST">
{{--                                                                            <a class="btn btn-sm btn-success" href="{{ route('smart-cards.edit', $request->id) }}">--}}
{{--                                                                                <i class="fa fa-fw fa-edit"></i> Edit--}}
{{--                                                                            </a>--}}
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                                <i class="fa fa-fw fa-trash"></i> Delete
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            {!! $smartCardRequests->links() !!}
                                        </div>
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
