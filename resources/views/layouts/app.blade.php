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
@yield('stylesheets')
<!-- App styles -->
    <link rel="stylesheet" href="{{ asset('template/css/app.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('template/vendors/jquery/jquery.min.js') }}"></script>
</head>

<body data-ma-theme="{{ trans('settings/theme.app_theme') }}">
<main class="main">
    <div class="page-loader">
        <div class="page-loader__spinner">
            <svg viewBox="25 25 50 50">
                <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
            </svg>
        </div>
    </div>

    <header class="header">
        <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
            <div class="navigation-trigger__inner">
                <i class="navigation-trigger__line"></i>
                <i class="navigation-trigger__line"></i>
                <i class="navigation-trigger__line"></i>
            </div>
        </div>

        <div class="header__logo hidden-sm-down">
            <h1 class="container"><a href="#">@lang('settings/setting.company_name')</a></h1>
            <br>
        </div>
        @auth
            <form class="search">
                <div class="search__inner">
                    <input type="text" class="search__text" placeholder="Search for people, files, documents...">
                    <i class="zmdi zmdi-search search__helper" data-ma-action="search-close"></i>
                </div>
            </form>
        @endauth

        @guest
            <form class="search">
                <div class="search__inner">
                    <input type="text" class="search__text" placeholder="Search for restults, student academic settings, student information...">
                    <i class="zmdi zmdi-search search__helper" data-ma-action="search-close"></i>
                </div>
            </form>
        @endguest

        <ul class="top-nav">
            <li class="hidden-xl-up"><a href="" data-ma-action="search-open"><i class="zmdi zmdi-search"></i></a></li>

            @auth
                <li class="dropdown top-nav__notifications">

                </li>
            @endauth
            <li class="dropdown hidden-xs-down">
                <a href="#"><i class="zmdi zmdi-help"></i></a>

            </li>

            <li class="dropdown hidden-xs-down">
                <a href="" data-toggle="dropdown"><i class="zmdi zmdi-apps"></i></a>

                <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                    <div class="row app-shortcuts">

                        <a class="col-5 app-shortcuts__item" href="#">
                            <i class="zmdi zmdi-help"></i>
                            <small class="">@lang('general.help')</small>
                            <span class="app-shortcuts__helper bg-blue"></span>
                        </a>
                    </div>
                </div>
            </li>
            <br>
            @auth
                <br>
                <small></small>
            @endauth
            @guest
                <a  class="text-white" href="{{ trans('settings/routes.login') }}" title="@lang('general.tooltip_text')" data-toggle="tooltip" data-placement="left">
              <i class="zmdi zmdi-arrow-back"></i> @lang('general.main_portal')
                </a>
                <br>
                <small></small>
            @endguest
        </ul>
    </header>
    @auth
    @section('layouts.side_menu')
        @include('layouts.side_menu')
    @show
    @endauth
    <section class="content">
        <div class="content__inner">
            <br><br>
            @yield('content')
        </div>
    </section>
</main>
<style type="text/css">
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
@section('footer')
    @include('layouts.footer')
@show

</body>
</html>
