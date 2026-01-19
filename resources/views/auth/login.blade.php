<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Customer Relationship Management System</title>
    <link rel="icon" href="{{asset('img/BALOCH EXCISE.png')}}" type="image/gif" sizes="48x48" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ url('asset/login.css') }}" rel="stylesheet">
    <link href="{{ url('asset/custom.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
</head>


<div class="container" style="margin-top: 5%;">
    <body class="login">
    <div class="container-fluid">

        <div class="col-md-12 topLogo" style="float:none !important;">
            <img class="img-responsive" src="{{asset('img/logo.png')}}">
            <h3>Customer Relationship Management System</h3>
        </div>
        <div class="login_wrapper">

            <div class="animate form login_form">
                <section class="login_content">


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1>LOGIN</h1>
                        <div class="pad_left_right">
                            <div>
                                <input placeholder="Email" id="email" type="email" class="usrName form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <input placeholder="password" id="password" type="password" class="passwrd form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror                            </div>
                            <div class="row mb-30">
                                <div class="col-md-6 text-left clrDarkBlue">
                                    <input type="checkbox" />&nbsp;Remember me
                                </div>
                                <div class="col-md-6 text-right clrRed" style="margin-left: 50px;">
                                    <a href="#signup" class="reset_pass">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Login"  class="btn btn-default loginBtn submit" href="index.html" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </section>
            </div>
            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form>
                        <h1 style="margin: 15px 0 25px;">FORGOT PASSWORD</h1>
                        <h6>Enter your email below we will get you back on track</h6>
                        <div class="pad_left_right">
                            <div>
                                <input type="email" class="form-control usrName" placeholder="Email" required="" />
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group text-center">
                                <input type="button" id="buttonLogin" style="width: 215px;padding: 6px 0px;" value="Request Reset Link" class="btn btn-default loginBtn submit" onclick="login();" />
                            </div>
                            <div class="form-group text-center">
                                <a href="#signin" class="backToLogin btn btn-default loginBtn submit">Back To Sign In</a>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>


    </div>
    <div id="dvblackoutall" style="z-index: 999;display:none" class="ui-widget-overlay ui-front custom-overlay">
        <div id="dvloading" style="display: inline-block;">
            <div style="top: 48%; left: 49%; position: absolute;">


            </div>
        </div>
    </div>
    </body>
</div>

<footer>
    <div class="footer-content">
        Powered by <a href="https://www.nano-softs.com/">Nanosofts</a> &copy;
    </div>
</footer>
<style>
    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: black;
        border-top: 1px solid #ccc;
        padding: 10px 0;
    }

    .footer-content {
        text-align: center;
        font-size: 12px;
        color: white;
    }

    .footer-content a {
        color: white;
        text-decoration: none;
        border-bottom: 1px solid #777;
    }

    .footer-content a:hover {
        color: #333;
        border-bottom-color: #333;
    }

</style>

