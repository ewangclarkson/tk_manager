
<aside class="sidebar">
    <div class="scrollbar-inner">
        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="{{asset(trans('img/img.coalition_logo'))}}" alt="">
                <div>
                    <div class="user__name">{{ strtok(ucfirst(strtolower(\Illuminate\Support\Facades\Auth::user()->employee_name)),' ') . ' ' . ucfirst(strtolower(strtok(' '))) }}</div>
                    <div class="user__email">{{ \Illuminate\Support\Facades\Auth::user()->email}}</div>
                </div>
            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ trans('settings/routes.logout') }}">@lang('general.logout')</a>
            </div>
        </div>

        <ul class="navigation">
            <li id="home"><a href="{{ trans('settings/routes.home') }}"><i class="zmdi zmdi-home"></i>@lang('general.home')</a></li>
            <li id="project"><a href="{{ trans('settings/routes.manage_project') }}"><i class="zmdi zmdi-pages"></i>@lang('general.manage_project')</a></li>
            <li id="task"><a href="{{trans('settings/routes.manage_task') }}"><i class="zmdi zmdi-palette"></i>@lang('general.manage_taks')</a></li>
            <li id="project_task_list"><a href="{{ trans('settings/routes.project_task_list') }}"><i class="zmdi zmdi-panorama-horizontal"></i>@lang('general.project_task_list')</a></li>

        </ul>
    </div>
</aside>

