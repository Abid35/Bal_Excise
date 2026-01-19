@extends('layouts.dash')

@section('content')

    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default mb-50 addnewpanl">
                        <div class="panel-body">
                            <div class="card-header">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                                    <span id="card_title">
                                                        {{ __('Number Patterns') }}
                                                    </span>
                                    <div class="float-right">
                                        <a href="{{ route('number_patterns.create') }}" class="btn btn-primary btn-sm">
                                            {{ __('Create New') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success"><p>{{ $message }}</p></div>
                            @endif

                            <table class="table table-bordered mt-3">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>District</th>
                                    <th>Start Prefix</th>
                                    <th>End Prefix</th>
                                    <th>Start No</th>
                                    <th>End No</th>
                                    <th>Type</th>
                                    <th>is_Govt</th>
                                    <th>Last Generated</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($patterns as $pattern)
                                    <tr>
                                        <td>{{ $pattern->id }}</td>
                                        <td>{{ $pattern->district->eto_location ?? '-' }}</td>
                                        <td>{{ $pattern->start_prefix }}</td>
                                        <td>{{ $pattern->end_prefix }}</td>
                                        <td>{{ $pattern->start_no }}</td>
                                        <td>{{ $pattern->end_no }}</td>
                                        <td>
                                            @php
                                                $n = App\Models\type_of_body::where('tob_code', $pattern->type)
                                                    ->where('eto_location_id', $pattern->district_id)
                                                    ->first();
                                            @endphp
                                            {{ $n->type_of_body ?? 'N/A' }}
                                        </td>

                                        <td>{{ $pattern->is_government == 1 ? '1' : '0' }}</td>
                                        <td>
                                            {{ $pattern->last_generated_prefix ?? '-' }}
                                            {{ $pattern->last_generated_no ?? '' }}
                                        </td>
                                        <td>
                                            <span class="badge {{ $pattern->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $pattern->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('number_patterns.edit', $pattern->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                            <form action="{{ route('number_patterns.destroy', $pattern->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="8" class="text-center">No patterns found.</td></tr>
                                @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
