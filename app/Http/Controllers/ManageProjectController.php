<?php

namespace App\Http\Controllers;

use App\Encrypter;
use App\General;
use App\Project;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use const http\Client\Curl\PROXY_HTTP;

class ManageProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showProjectListPage()
    {

        $emplyee_id = Auth::user()->employee_id;
        $projects = Project::getEmployeeProjects($emplyee_id);

        return view('project_management.project_list', compact('projects'));
    }

    public function deleteProject($project_id)
    {

        $pid = Encrypter::decode($project_id);
        $res = 0;
        if (Project::isEmployeeProject($pid, Auth::user()->employee_id)) {
            $res = Project::deleteProjectById($pid);
        }

        $msg = General::getDangerAlert(trans('project.delete_failure'));
        if ($res > 0) {
            $msg = General::getSuccessAlert(trans('project.delete_success'));
        }

        return Redirect::to(trans('settings/routes.manage_project'))->with(['status' => $msg]);
    }

    public function showAddProjectPage()
    {
        return view('project_management.add_project');
    }

    public function createProject(Request $request)
    {
        $this->validate($request,
            ['name' => 'required', 'desc' => 'required',
                'start_date' => 'required', 'end_date' => 'required',
                'owner' => 'required']);

        $data = $request->all();
        $insert = [
            'project_name' => $data['name'],
            'project_des' => $data['desc'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'project_leader' => $data['owner'],
            'employees_employee_id' => Auth::user()->employee_id,
        ];
        $msg = General::getDangerAlert(trans('project.create_failure'));
        if (Project::saveProject($insert)) {
            $msg = General::getSuccessAlert(trans('project.create_success'));

        }

        return Redirect::to(trans('settings/routes.manage_project'))->with(['status' => $msg]);
    }

    public function showEditProjectPage($project_id){
        $pid = Encrypter::decode($project_id);
        if (Project::isEmployeeProject($pid, Auth::user()->employee_id)) {
            $project = Project::getProjectById($pid);
            return view('project_management.edit_project', compact('project'));
        }

        return Redirect::to(trans('settings/routes.project_list'))->with(['status' => General::getDangerAlert(trans('project.invalid_project'))]);

    }

    public function editProject(Request $request,$project_id)
    {
        $this->validate($request,
            ['name' => 'required', 'desc' => 'required',
                'start_date' => 'required', 'end_date' => 'required',
                'owner' => 'required']);

        $data = $request->all();
        $pid = Encrypter::decode($project_id);
        $insert = [
            'project_name' => $data['name'],
            'project_des' => $data['desc'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'project_leader' => $data['owner'],
        ];
        $msg = General::getDangerAlert(trans('project.edit_failure'));
        if (Project::saveProjectChanges($pid,$insert)) {
            $msg = General::getSuccessAlert(trans('project.edit_success'));

        }

        return Redirect::to(trans('settings/routes.manage_project'))->with(['status' => $msg]);
    }


    public function showProjectTaskListPage(){

        $project_id = Project::getFirstProjectId();
        $proj_opts = Project::getProjectsSelectOptions($project_id);

        $tasks =Task::getProjectTasks($project_id);
        $task_list = view('project_management.task_list_table',compact('tasks'));

        return view('project_management.project_task_list', compact('proj_opts','task_list'));
    }


    public function getProjectTaskList(Request $request){

        $this->validate($request,['project' => 'required|not_in:none']);


        $project_id = $request->get('project');
        $proj_opts = Project::getProjectsSelectOptions($project_id);

        $tasks =Task::getProjectTasks($project_id);
        $task_list = view('project_management.task_list_table',compact('tasks'));

        return view('project_management.project_task_list', compact('proj_opts','task_list'));
    }
}
