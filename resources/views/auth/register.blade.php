<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', trans('settings/setting.app_name')) }}</title>


    <!-- Vendor styles -->
    <link rel="stylesheet"
          href="{{ asset('template/vendors/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/jquery-scrollbar/jquery.scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/select2/css/select2.min.css') }}">
    <script src="{{ asset('template/vendors/jquery/jquery.min.js') }}"></script>

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('template/css/app.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body data-ma-theme="{{ trans('settings/theme.app_theme') }}">
<header class="header" style="height: 100px;position: static;" id="header">
    <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
        <div class="navigation-trigger__inner">
            <i class="navigation-trigger__line"></i>
            <i class="navigation-trigger__line"></i>
            <i class="navigation-trigger__line"></i>
        </div>
    </div>

    <div class="header__logo hidden-sm-down" style="position: absolute;left: 1%;">
        <img class="img-circle" src="{{ asset( trans('img/img.coalition_logo')) }}" alt="" height="70px" width="80px"
             style="border-radius: 10%"/>
    </div>
    <div>

    </div>

    <ul class="top-nav">
        @guest
            <a href="{{ trans('settings/routes.login') }}" data-placement="left">
                <h5 class="text-white">@lang('general.login')</h5>
            </a>
        @endguest
        @auth
            <a href="{{ trans('settings/routes.home') }}" data-placement="left">
                <h5 class="text-white">@lang('general.home')</h5>
            </a>

        @endauth
    </ul>
</header>
    <main class="main" style="padding-top: 1%">
        <div class="container">
                <div class="card">
                    <div class="card-header c-ewangclarks" style="height: 56%;">
                        <div class="text-center">
                            <h2 class=" text-white"><b>@lang('general.signup')</b></h2>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" required autocomplete="new-password">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <br><br>
                    </div>
                </div>
            </div>
    </main><br><br><br>


<style type="text/css">
    #footer {
        position: relative;
        top: 5%;
        color: #a9adb1;
    }

    .widget-profile__img {
        width: 90px;
        height: 80px;
        border-radius: 100%;
        margin-bottom: 1rem;
    }

    .c-ewangclarks {
        background-color: @lang('settings/theme.c-ewangclarks');
        color: white;
    }

    .c-ewangclarks:hover {
        background-color: @lang('settings/theme.c-ewangclarks');
        color: white;
    }

    .c-ewangclarks:active {
        background-color: @lang('settings/theme.c-ewangclarks');
        color: white;
    }

    .c-ewangclarks:focus {
        background-color: @lang('settings/theme.c-ewangclarks');
        color: white;
    }
</style>


<!-- Javascript -->
<!-- Vendors -->
<script src="{{ asset('template/vendors/popper.js/popper.js') }}"></script>
<script src="{{ asset('template/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/vendors/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('template/vendors/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>
<script src="{{ asset('template/vendors/select2/js/select2.full.min.js') }}"></script>

<!-- App functions and actions -->
<script src="{{ asset('template/js/app.min.js') }}"></script>
</body>
</html>
