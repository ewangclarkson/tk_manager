<?php

namespace App\Http\Controllers;

use App\Encrypter;
use App\General;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class ManageTaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showTaskListPage()
    {

        $emplyee_id = Auth::user()->employee_id;
        $tasks = Task::getEmployeeTasks($emplyee_id);

        return view('task_management.task_list', compact('tasks'));
    }

    public function deleteTask($task_id)
    {

        $pid = Encrypter::decode($task_id);
        $res = 0;
        if (Task::isEmployeeTask($pid, Auth::user()->employee_id)) {
            $res = Task::deleteTaskById($pid);
        }

        $msg = General::getDangerAlert(trans('task.delete_failure'));
        if ($res > 0) {
            $msg = General::getSuccessAlert(trans('task.delete_success'));
        }

        return Redirect::to(trans('settings/routes.manage_task'))->with(['status' => $msg]);
    }

    public function showAddTaskPage()
    {
        return view('task_management.add_task');
    }

    public function createTask(Request $request)
    {
        $this->validate($request,
            ['name' => 'required', 'priority' => 'required',
                'start_date' => 'required', 'end_date' => 'required',
                'project' => 'required']);

        $data = $request->all();
        $insert = [
            'task_name' => $data['name'],
            'priority_id' => $data['priority'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'projects_project_id' => $data['project'],
            'employees_employee_id' => Auth::user()->employee_id,
        ];
        $msg = General::getDangerAlert(trans('task.create_failure'));
        if (Task::saveTask($insert)) {
            $msg = General::getSuccessAlert(trans('task.create_success'));

        }

        return Redirect::to(trans('settings/routes.manage_task'))->with(['status' => $msg]);
    }

    public function showEditTaskPage($task_id){
        $pid = Encrypter::decode($task_id);
        if (Task::isEmployeeTask($pid, Auth::user()->employee_id)) {
            $task = Task::getTaskById($pid);
            return view('task_management.edit_task', compact('task'));
        }

        return Redirect::to(trans('settings/routes.task_list'))->with(['status' => General::getDangerAlert(trans('task.invalid_task'))]);

    }

    public function editTask(Request $request,$task_id)
    {
        $this->validate($request,
            ['name' => 'required', 'priority' => 'required',
                'start_date' => 'required', 'end_date' => 'required',
                'project' => 'required']);

        $data = $request->all();
        $pid = Encrypter::decode($task_id);
        $insert = [
            'task_name' => $data['name'],
            'priority_id' => $data['priority'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'projects_project_id' => $data['project'],
        ];
        $msg = General::getDangerAlert(trans('task.edit_failure'));
        if (Task::saveTaskChanges($pid,$insert)) {
            $msg = General::getSuccessAlert(trans('task.edit_success'));

        }

        return Redirect::to(trans('settings/routes.manage_task'))->with(['status' => $msg]);
    }
}
