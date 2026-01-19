<div class="box box-info padding-1">
    <div class="box-body">
        
    <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $etauser->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $etauser->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('District') }}</label>

                    <div class="col-md-6">
                        @php($eto=App\Models\eto_location::all())
                        <select name="eto_location_id" class="form-control @error('eto_location_id') is-invalid @enderror" id="eto_location_id">
                            @foreach($eto as $e)
                                <option @if($etauser->eto_location_id==$e->id) selected @endif value="{{$e->id}}">{{$e->eto_location}}</option>
                            @endforeach
                        </select>
                        @error('eto_location_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                
                    <label for="role" class="col-md-3 col-form-label text-md-end">{{ __('Role') }}</label>
                    
                    
                    <div class="col-md-6">

                        @php($roles=App\Models\roles::all())

                        <select name="role" class="form-control @error('role') is-invalid @enderror" id="role" required>
                            <option value="0" selected disabled>Select Role</option>
                            @foreach($roles as $r)
                                <option @if($etauser->role_id==$r->id) selected @endif value="{{$r->id}}">{{$r->role}}</option>
                            @endforeach
                           
                        </select>
                        
                    </div>
                </div>

               


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>