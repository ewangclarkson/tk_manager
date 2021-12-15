@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('template/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/flatpickr/flatpickr.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/vims-file-upload.css') }}">
@endsection

@section('title')
    @lang('project.project_list_title')
@endsection

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            @if(session('status'))
                {!! session('status') !!}
            @endif

                <form method="post" enctype="multipart/form-data"
                      action="{{ trans('settings/routes.project_task_list')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-2">
                        </div>

                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="project"
                                       style="color: black;">@lang('project.select_project')</label>
                                <select class="select2" name="project">
                                    {!! $proj_opts !!}
                                </select>
                            </div>
                        </div>
                            <div class="col-sm-5"><br>
                            <button type="submit" class="btn c-ewangclarks"
                                    style="width: 100%;">
                                <h6 class="text-white"><i
                                        class="zmdi zmdi-edit"></i>@lang('actions/action.task_list')</h6>
                            </button>
                            </div>
                            <br><br><br>
                        </div>
                </form>
            <br>
            {!! $task_list !!}
        </div>
    </div><br>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/jquery.tablednd.js') }}"></script>
    <script src="{{ asset('template/vendors/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('template/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendors/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/vendors/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/vendors/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template/vendors/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/jquery.battatech.excelexport.js') }}"></script>
    <script src="{{ asset('js/power-school.js') }}"></script>

    <script type="text/javascript">
        $('#project_task_list').addClass('navigation__active');

            $(document).ready(function () {
            // Initialise the table
            $("#data-table").tableDnD({
                onDrop: function (table, row) {
                    var rows = table.tBodies[0].rows;
                    for (var i = 0; i < rows.length; i++) {
                        $(rows[i].cells[0]).html((i+1));
                    }
                }
            });
        });

    </script>
@endsection
