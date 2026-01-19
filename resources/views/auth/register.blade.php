@extends('layouts.dash')

@section('content')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.7/jquery.inputmask.min.js" integrity="sha512-x3zoB6e8YsZipoDoCTClRYkEpqucilZ8IYsaJFE0XUtUJQdO7v2xFzvd1zQKrb3ParCNpvdAE0C85msCw3NrLA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


            <!-- page content -->

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

        <div class="headingDiv wdth100">

            <h2>Add New User</h2>

        

        </div>

        </div>
        
       
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                            <option value="0">Select Eto Location</option>
                            @foreach($eto as $e)
                                <option value="{{$e->id}}">{{$e->eto_location}}</option>
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
                
                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                    
{{--                    <div class="col-md-1">--}}
{{--                        <input id="check" type="checkbox" class="" name="check" >--}}
{{--                        <label for="check" class="col-form-label text-md-end">New Role</label>--}}
{{--                    </div>--}}
                    <div class="col-md-6">

                    <input id="roletxt" type="roletxt" class=" form-control" name="roletxt" placeholder="Enter New Role" style="display:none">
                        @php($roles=App\Models\roles::all())

                        <select name="role" class="form-control @error('role') is-invalid @enderror" id="role" required>
                            <option value="0" selected disabled>Select Role</option>
                            @foreach($roles as $r)
                                <option value="{{$r->id}}">{{$r->role}}</option>
                            @endforeach
                           
                        </select>
                        
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
      


    </div>



</div>













                        </div>

                    </div>

                </div>

            </div>
<script>
    $(document).ready(function(){
        
        $('#check').click(function(){
            
            if($('#check').is(":checked"))
            {
                $('#roletxt').show();
                $('#role').hide();
            }
            else
            {
                $('#roletxt').hide();
                $('#role').show();
            }
              
          });
    });
</script>
         

    

@endsection