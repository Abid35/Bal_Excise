@extends('layouts.app')

@section('template_title')
    {{ $etauser->name ?? 'Show Etauser' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Etauser</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('etausers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $etauser->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $etauser->email }}
                        </div>
                        <div class="form-group">
                            <strong>Role:</strong>
                            {{ $etauser->role }}
                        </div>
                        <div class="form-group">
                            <strong>Role Id:</strong>
                            {{ $etauser->role_id }}
                        </div>
                        <div class="form-group">
                            <strong>Eto Location Id:</strong>
                            {{ $etauser->eto_location_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
