<div class="table-responsive"><br>
    <h4 style="text-align: center">@lang('task.list_title')</h4>
    <table id="@lang('general.data_table')" class="table table-striped">
        <thead class="thead-default c-ewangclarks text-white">
        <tr>
            <th>@lang('task.sn')</th>
            <th>@lang('task.name')</th>
            <th>@lang('task.priority')</th>
            <th>@lang('task.start_date')</th>
            <th>@lang('task.end_date')</th>
        </tr>
        </thead>
        <tbody>
        @php
            $sn=1
        @endphp
        @foreach($tasks as $task)
            <tr id="{{ $task->task_id }}">
                <td style="color: red" >{{$sn++}}</td>
                <td>{{$task->task_name }}</td>
                <td>{{$task->priority}}</td>
                <td>{{date('d F Y',strtotime($task->start_date)) }}</td>
                <td>{{date('d F Y',strtotime($task->end_date)) }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>

