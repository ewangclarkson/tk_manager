@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('template/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/flatpickr/flatpickr.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/vims-file-upload.css') }}">
@endsection

@section('title')
    @lang('task.task_list_title')
@endsection

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            @if(session('status'))
                {!! session('status') !!}
            @endif
            <br>
            <a href="{{ URL::to(trans('settings/routes.add_task')) }}"
               class="btn btn-primary" style="float: right"><i class="zmdi zmdi-plus"></i></a><br>
            <div class="table-responsive">
                <table id="@lang('general.data_table')" class="table table-striped">
                    <thead class="thead-default c-ewangclarks text-white">
                    <tr>
                        <th>@lang('task.sn')</th>
                        <th>@lang('task.name')</th>
                        <th>@lang('task.priority')</th>
                        <th>@lang('task.start_date')</th>
                        <th>@lang('task.end_date')</th>
                        <th>Project @lang('project.name')</th>
                        <th>@lang('task.action')</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $sn=1
                    @endphp
                    @foreach($tasks as $task)
                        <tr id="{{ $task->task_id }}">
                            <td style="color: red">{{$sn++}}</td>
                            <td>{{$task->task_name }}</td>
                            <td>{{$task->priority}}</td>
                            <td>{{date('d F Y',strtotime($task->start_date)) }}</td>
                            <td>{{date('d F Y',strtotime($task->end_date)) }}</td>
                            <td>{{ \App\Project::getProjectNameById($task->projects_project_id)  }}</td>
                            <td>
                                <a href="{{ URL::to(trans('settings/routes.manage_task') . trans('settings/routes.delete') . '/' . \App\Encrypter::encode($task->task_id)) }}"
                                   class="btn btn-danger"><i class="zmdi zmdi-delete"></i></a>
                                <a href="{{ URL::to(trans('settings/routes.edit_task') . '/' . \App\Encrypter::encode($task->task_id)) }}"
                                   class="btn btn-primary"><i class="zmdi zmdi-edit"></i></a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
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

    <script type="text/javascript">
        $('#task').addClass('navigation__active');

    </script>
    <script type="text/javascript">
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
