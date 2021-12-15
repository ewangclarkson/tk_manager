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
            <br>
            <a href="{{ URL::to(trans('settings/routes.add_project')) }}"
               class="btn btn-primary" style="float: right"><i class="zmdi zmdi-plus"></i></a><br>
            <div class="table-responsive">
                <table id="@lang('general.data_table')" class="table table-striped">
                    <thead class="thead-default c-ewangclarks text-white">
                    <tr>
                        <th>@lang('project.sn')</th>
                        <th>@lang('project.name')</th>
                        <th>@lang('project.des')</th>
                        <th>@lang('project.start_date')</th>
                        <th>@lang('project.end_date')</th>
                        <th>@lang('project.owner')</th>
                        <th>@lang('project.action')</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $sn=1
                    @endphp
                    @foreach($projects as $project)
                        <tr>
                            <td style="color: red">{{$sn++}}</td>
                            <td>{{$project->project_name }}</td>
                            <td>{{$project->project_des }}</td>
                            <td>{{date('d F Y',strtotime($project->start_date)) }}</td>
                            <td>{{date('d F Y',strtotime($project->end_date)) }}</td>
                            <td>{{ \App\Project::getProjectOwnerName($project->project_leader)  }}</td>
                            <td>
                                <a href="{{ URL::to(trans('settings/routes.manage_project') . trans('settings/routes.delete') . '/' . \App\Encrypter::encode($project->project_id)) }}"
                                   class="btn btn-danger"><i class="zmdi zmdi-delete"></i></a>
                                <a href="{{ URL::to(trans('settings/routes.edit_project') . '/' . \App\Encrypter::encode($project->project_id)) }}"
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
    <script src="{{ asset('template/vendors/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('template/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendors/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/vendors/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/vendors/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template/vendors/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/jquery.battatech.excelexport.js') }}"></script>

    <script type="text/javascript">
        $('#project').addClass('navigation__active');

    </script>
@endsection
