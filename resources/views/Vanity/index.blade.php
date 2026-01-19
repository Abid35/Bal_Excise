@extends('layouts.dash')

@section('template_title')
    Vanity Plates
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
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
                                                        {{ __('Vanity Plates List') }}
                                                    </span>
                                                        <div class="float-right">
                                                            <a href="{{ route('vanity.create') }}" class="btn btn-primary btn-sm">
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
                                                                <th>District</th>
                                                                <th>Owner Identifier</th>
                                                                <th>Plate Number</th>
                                                                <th>Design Type</th>
                                                                <th>Cost</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($vanityPlates as $key => $plate)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $plate->district->eto_location ?? '-' }}</td>
                                                                    <td>{{ $plate->owner_identifier }}</td>
                                                                    <td>{{ $plate->plate_number }}</td>
                                                                    <td>{{ $plate->design_type ?? 'N/A' }}</td>
                                                                    <td>{{ $plate->cost ? 'PKR ' . number_format($plate->cost) : 'N/A' }}</td>
                                                                    <td>
                                                                        <span class="badge
                                                                            @if($plate->status == 'approved') bg-success
                                                                            @elseif($plate->status == 'rejected') bg-danger
                                                                            @elseif($plate->status == 'issued') bg-primary
                                                                            @else bg-warning @endif">
                                                                            {{ ucfirst($plate->status) }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-sm btn-info" href="{{ route('vanity.edit', $plate->id) }}">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                        <form action="{{ route('vanity.destroy', $plate->id) }}" method="POST" style="display:inline;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                                                <i class="fa fa-trash"></i>
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
                                            {!! $vanityPlates->links() !!}
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
