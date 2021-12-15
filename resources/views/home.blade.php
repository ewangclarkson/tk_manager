@extends('layouts.app')


@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/vims-file-upload.css') }}">
@endsection

@section('title')
    @lang('general.profile')
@endsection

@section('content')

    <div class="card profile">
        <div class="profile__img">
            <img src="{{asset(trans('img/img.coalition_logo'))}}" alt="" height="150" width="200">
            <form enctype="multipart/form-data" method="post"
                  action="{{ trans('settings/routes.home')}}"
                  id="change-profile">
                @csrf()
                    <label for="profile"
                           style="padding-top:5px;padding-bottom: 0px;padding-left:15px;margin: 0px;color: red;font-size: 10px;"
                    ><i class="zmdi zmdi-camera profile__img__edit"></i></label>
                <input type="file" class="vims-file-input" name="profile-picture" value=""
                       id="profile">
            </form>
        </div>

        <div class="profile__info">
            <p style="color: #0D0A0A;"><b></b></p>
            <ul class="icon-list">
                <li><i class="zmdi zmdi-graduation-cap"></i> {{ \Illuminate\Support\Facades\Auth::user()->employee_name }}
                </li>
                <li><i class="zmdi zmdi-phone"></i> {{ \Illuminate\Support\Facades\Auth::user()->phone_number }}</li>
                <li><i class="zmdi zmdi-email"></i> {{ \Illuminate\Support\Facades\Auth::user()->email }}</li>
            </ul>
        </div>
    </div>

    <div class="toolbar">
        <nav class="toolbar__nav">
            <h6 class="active">@lang('general.general_info')</h6>
        </nav>

        <div class="actions">
            <i class="actions__item zmdi zmdi-search" data-ma-action="toolbar-search-open"></i>
        </div>

        <div class="toolbar__search">
            <input type="text" placeholder="Search...">

            <i class="toolbar__search__close zmdi zmdi-long-arrow-left" data-ma-action="toolbar-search-close"></i>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/power-school.js') }}"></script>

    <script type="text/javascript">
        $('#home').addClass('navigation__active')
    </script>
@endsection
