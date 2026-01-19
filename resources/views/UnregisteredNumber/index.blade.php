@extends('layouts.dash')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default mb-50 addnewpanl">
                        <div class="panel-body">
                            <div class="topTabsSection">
                                <div class="headingDiv wdth100">
                                    <h2>Unregistered Numbers Lookup</h2>
                                </div>
                            </div>

                            <form method="GET" action="{{ route('unregistered.index') }}">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label text-md-end">Enter CNIC or NTN</label>
                                    <div class="col-md-6">
                                        <input type="text" name="identifier" value="{{ request('identifier') }}" class="form-control" placeholder="e.g. 35202-1234567-1 or 1234567-8">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>

                            @if(request('identifier'))
                                <hr>
                                <h4>Results for: <strong>{{ request('identifier') }}</strong></h4>
                                @if($records->count())
                                    <table class="table table-bordered mt-3">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Registration No</th>
                                            <th>Owner CNIC</th>
                                            <th>Owner NTN</th>
                                            <th>Assigned</th>
                                            <th>Expired At</th>
                                            <th>Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($records as $index => $record)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $record->registration_no }}</td>
                                                <td>{{ $record->owner_cnic ?? '-' }}</td>
                                                <td>{{ $record->owner_ntn ?? '-' }}</td>
                                                <td>
                                                    @if($record->is_assigned)
                                                        <span class="badge bg-success">Yes</span>
                                                    @else
                                                        <span class="badge bg-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($record->expired_at)
                                                        <span class="badge bg-secondary">{{ \Carbon\Carbon::parse($record->expired_at)->format('d M Y') }}</span>
                                                    @else
                                                        <span class="text-muted">Active</span>
                                                    @endif
                                                </td>
                                                <td>{{ $record->created_at->format('d M Y') }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                @else
                                    <p class="text-danger">No unregistered numbers found for this identifier.</p>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
