@extends('layouts.dash')

@section('template_title')
    Change Password
@endsection

@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default mb-50">
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <span id="card_title">
                                                    {{ __('Change Password for: ') }} {{ $etauser->name }}
                                                </span>
                                                <div class="float-right">
                                                    <a href="{{ route('etausers.index') }}" class="btn btn-primary btn-sm float-right">
                                                        {{ __('Back') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('etausers.changePassword', $etauser->id) }}">
                                                @csrf
                                                
                                                <div class="form-group">
                                                    <label for="password">New Password</label>
                                                    <input type="password" 
                                                           class="form-control @error('password') is-invalid @enderror" 
                                                           id="password" 
                                                           name="password" 
                                                           required 
                                                           minlength="8">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <small class="form-text text-muted">Password must be at least 8 characters long.</small>
                                                </div>

                                                <div class="form-group">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <input type="password" 
                                                           class="form-control" 
                                                           id="password_confirmation" 
                                                           name="password_confirmation" 
                                                           required 
                                                           minlength="8">
                                                </div>

                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-save"></i> Change Password
                                                    </button>
                                                    <a href="{{ route('etausers.index') }}" class="btn btn-secondary">
                                                        <i class="fa fa-times"></i> Cancel
                                                    </a>
                                                </div>
                                            </form>
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
</div>

@endsection