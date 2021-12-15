@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('template/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/flatpickr/flatpickr.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/vims-file-upload.css') }}">
@endsection

@section('title')
    @lang('project.add_project_title')
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('status'))
        {!! session('status') !!}
    @endif

    <br>
    <div class="card">
        <div class="profile__info" style="width: 100%;">
            <div class="profile__info" style="width: 100%;">
                <div class="card-demo">
                    <div class="card bg-green card--inverse">
                        <div class="card-body c-ewangclarks ">
                            <h3 class="card-text text-white text-center">
                                {{ trans('project.add_project_title') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="profile">
                    <div class="profile__img">

                    </div>
                    <form method="post" enctype="multipart/form-data"
                          action="{{ trans('settings/routes.add_project')}}">
                        @csrf
                        <ul class="icon-list">
                            <li>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group" style="position: relative;top: 14px;">
                                            <label for="name"
                                                   style="color: black;">@lang('project.name')</label>
                                            <input type="text" name="name" class="form-control" id="name">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group" style="position: relative;top: 14px;">
                                            <label for="desc"
                                                   style="color: black;">@lang('project.desc')</label>
                                            <input type="text" name="desc" class="form-control"
                                                   id="desc">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label class="p-2" style="color: black;"
                                               for="admission-date">@lang('project.start_date')
                                            <br></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                            </div>
                                            <input type="date" class="form-control hidden-md-up"
                                                   placeholder="@lang('project.pick_a_date')">
                                            <input type="text" class="form-control date-picker hidden-sm-down"
                                                   name="start_date" id="start_date"
                                                   placeholder="@lang('project.pick_a_date')">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="p-2" style="color: black;"
                                               for="end_date">@lang('project.end_date')
                                            <br></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                            </div>
                                            <input type="date" class="form-control hidden-md-up"
                                                   placeholder="@lang('project.pick_a_date')">
                                            <input type="text" class="form-control date-picker hidden-sm-down"
                                                   name="end_date" id="end_date"
                                                   placeholder="@lang('project.pick_a_date')">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label for="program"
                                                   style="color: black;">@lang('project.owner')</label>
                                            <select class="select2" name="owner">
                                                {!! \App\User::getEmployeesSelectOptions()!!}
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <button type="submit" class="btn c-ewangclarks"
                                        style="width: 50%;position: relative;left: 16%;">
                                    <h6 class="text-white"><i
                                            class="zmdi zmdi-file-add"></i>@lang('actions/action.submit')</h6>
                                </button>
                                <br><br><br>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>

            @endsection

            @section('script')
                <script src="{{ asset('template/vendors/select2/js/select2.full.min.js') }}"></script>
                <script src="{{ asset('template/vendors/datatables/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('template/vendors/datatables-buttons/dataTables.buttons.min.js') }}"></script>
                <script src="{{ asset('template/vendors/datatables-buttons/buttons.print.min.js') }}"></script>
                <script src="{{ asset('template/vendors/jszip/jszip.min.js') }}"></script>
                <script src="{{ asset('template/vendors/datatables-buttons/buttons.html5.min.js') }}"></script>

                <script src="{{ asset('template/vendors/flatpickr/flatpickr.min.js') }}"></script>
                <script src="{{ asset('js/power-school.js') }}"></script>




                <script type="text/javascript">
                    $('#project').addClass('navigation__active');
                </script>
@endsection
