<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ ucfirst(config('app.name')) }} @lang('quickadmin.qa_login')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="login-asset/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="login-asset/util.css">
    <link rel="stylesheet" type="text/css" href="login-asset/main.css">
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{asset("login-asset/bg-01.jpg")}}');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" method="POST" action="{{ url('login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> @lang('quickadmin.qa_there_were_problems_with_input'):
                        <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <span class="login100-form-title p-b-49">
                        {{ ucfirst(config('app.name')) }} @lang('quickadmin.qa_login')
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">@lang('quickadmin.qa_email')</span>
                        <input class="input100" type="email" name="email" value="{{ old('email') }}">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">@lang('quickadmin.qa_password')</span>
                        <input class="input100" type="password" name="password" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="p-t-8 p-b-31" style="display: flex; justify-content: space-between;">
                        <a href="{{ route('auth.password.reset') }}">@lang('quickadmin.qa_forgot_password')</a>
                        <a href="{{ route('auth.register') }}">@lang('quickadmin.qa_registration')</a>
                    </div>
                    <div class="p-t-8 p-b-31" style="display: flex; justify-content: space-between;">
                        <label>
                            <input type="checkbox" name="remember"> @lang('quickadmin.qa_remember_me')
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                @lang('quickadmin.qa_login')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>