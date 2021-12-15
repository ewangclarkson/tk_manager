<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DB;

class Task extends Model
{
    //
    protected $primaryKey = 'task_id';
    //
    protected $guarded = ['task_id'];


    public static function getEmployeeTasks($emplyee_id)
    {
        $query = DB::table('tasks')
            ->select('task_id', 'task_name', 'start_date', 'end_date', 'name as priority', 'projects_project_id')
            ->join('priorities', 'priorities.id', '=', 'priority_id')
            ->where('employees_employee_id', $emplyee_id)
            ->orderBy('priority')
            ->get();

        return $query;
    }


    public static function getTaskOwner($owner_id)
    {
        $query = DB::table('priorities')
            ->where('employee_id', $owner_id)
            ->first();

        return $query;
    }

    public static function getTaskOwnerName($owner_id)
    {
        $query = DB::table('priorities')
            ->where('employee_id', $owner_id)
            ->first();

        $name = '';
        if (!empty($query)) {
            $name = $query->employee_name;
        }
        return $name;
    }

    public static function isEmployeeTask($task_id, $employee_id)
    {
        $query = DB::table('tasks')
            ->where('task_id', $task_id)
            ->where('employees_employee_id', $employee_id)
            ->first();

        $boolean = false;
        if (!empty($query)) {
            $boolean = true;
        }
        return $boolean;
    }

    public static function deleteTaskById($task_id)
    {
        $query = DB::table('tasks')
            ->where('task_id', $task_id)
            ->delete();

        return $query;
    }

    public static function getTaskById($task_id)
    {
        $query = DB::table('tasks')
            ->where('task_id', $task_id)
            ->first();

        return $query;
    }

    public static function saveTask($insert)
    {
        $query = DB::table('tasks')
            ->insert($insert);
        return $query;
    }

    public static function saveTaskChanges($pid, $insert)
    {
        $query = DB::table('tasks')
            ->where('task_id', $pid)
            ->update($insert);
        return $query;
    }

    public static function getPrioritySelectOptions($selected = 0)
    {
        $priorities = DB::table('priorities')
            ->get();

        $res = '<option selected disabled>' . trans('general.nothing_selected') . '</option>';
        foreach ($priorities as $priority) {
            if ($priority->id == $selected) {
                $res .= '<option value="' . $priority->id . '" selected>' . $priority->name . '</option>';
            } else {
                $res .= '<option value="' . $priority->id . '">' . $priority->name . '</option>';
            }
        }

        return $res;
    }

    public static function getProjectTasks($project_id)
    {
        $query = DB::table('tasks')
            ->select('task_id', 'task_name', 'start_date', 'end_date', 'name as priority', 'projects_project_id')
            ->join('priorities', 'priorities.id', '=', 'priority_id')
            ->where('projects_project_id', $project_id)
            ->orderBy('priority')
            ->get();

        return $query;
    }
}
