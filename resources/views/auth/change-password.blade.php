<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Change Password - Customer Relationship Management System</title>
    <link rel="icon" href="{{asset('img/BALOCH EXCISE.png')}}" type="image/gif" sizes="48x48" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('asset/login.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="login">
    <div class="container" style="margin-top: 5%;">
        <div class="container-fluid">
            <div class="col-md-12 topLogo" style="float:none !important;">
                <img class="img-responsive" src="{{asset('img/logo.png')}}">
                <h3>Customer Relationship Management System</h3>
            </div>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <h1>CHANGE PASSWORD</h1>
                            <div class="pad_left_right">

                                {{-- Show success or error messages --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger text-left">
                                        <strong>Whoops!</strong> Please fix the following errors:
                                        <ul style="margin-top:10px;">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (session('status'))
                                    <div class="alert alert-success text-center">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div>
                                    <input placeholder="Old Password" id="old_password" type="password"
                                        class="form-control @error('old_password') is-invalid @enderror"
                                        name="old_password" required>
                                </div>

                                <div>
                                    <input placeholder="New Password" id="new_password" type="password"
                                        class="form-control @error('new_password') is-invalid @enderror"
                                        name="new_password" required>
                                </div>

                                <div>
                                    <input placeholder="Confirm New Password" id="new_password_confirmation"
                                        type="password" class="form-control" name="new_password_confirmation" required>
                                </div>

                                <div class="form-group text-center" style="margin-top:20px;">
                                    <input type="submit" value="Update Password" class="btn btn-default loginBtn submit" />
                                </div>

                                <div class="clearfix"></div>
                                <div class="separator text-center" style="margin-top:20px;">
                                    <a href="{{ route('logout') }}" class="btn btn-link">Cancel & Go Back</a>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
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

        /* Slight enhancement for spacing and form look */
        .login_content input.form-control {
            height: 42px;
            margin-bottom: 15px;
            font-size: 14px;
            padding-left: 12px;
            border-radius: 5px;
        }

        .login_content h1 {
            font-weight: 600;
            color: #2a3f54;
            margin-bottom: 20px;
        }

        .loginBtn {
            width: 100%;
            padding: 5px;
            font-size: 16px;
        }

        .login_content .loginBtn.submit {
        background-color: #2A3F54;
        color: white !important;
        width: 60%;
        border: none;
        border-radius: 5px;
       }
    </style>
</body>
</html>