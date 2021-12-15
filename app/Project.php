<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DB;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    //
    protected $primaryKey = 'project_id';
    //
    protected $guarded = ['project_id'];

    //


    public static function getEmployeeProjects($emplyee_id)
    {
        $query = DB::table('projects')
            ->where('employees_employee_id', $emplyee_id)
            ->get();

        return $query;
    }


    public static function getProjectOwner($owner_id)
    {
        $query = DB::table('users')
            ->where('employee_id', $owner_id)
            ->first();

        return $query;
    }

    public static function getProjectOwnerName($owner_id)
    {
        $query = DB::table('users')
            ->where('employee_id', $owner_id)
            ->first();

        $name = '';
        if (!empty($query)) {
            $name = $query->employee_name;
        }
        return $name;
    }

    public static function isEmployeeProject($project_id, $employee_id)
    {
        $query = DB::table('projects')
            ->where('project_id', $project_id)
            ->where('employees_employee_id', $employee_id)
            ->first();

        $boolean = false;
        if (!empty($query)) {
            $boolean = true;
        }
        return $boolean;
    }

    public static function deleteProjectById($project_id)
    {
        $query = DB::table('projects')
            ->where('project_id', $project_id)
            ->delete();

        return $query;
    }

    public static function getProjectById($project_id)
    {
        $query = DB::table('projects')
            ->where('project_id', $project_id)
            ->first();

        return $query;
    }

    public static function saveProject($insert)
    {
        $query = DB::table('projects')
            ->insert($insert);
        return $query;
    }

    public static function saveProjectChanges($pid, $insert)
    {
        $query = DB::table('projects')
            ->where('project_id', $pid)
            ->update($insert);
        return $query;
    }

    public static function getProjectNameById($project_id)
    {
        $query = DB::table('projects')
            ->where('project_id', $project_id)
            ->first();

        $name = '';
        if (!empty($query)) {
            $name = $query->project_name;
        }
        return $name;
    }

    public static function getProjectSelectOptions($selected = 0)
    {
        $projects = DB::table('projects')
            ->where('employees_employee_id', Auth::user()->employee_id)
            ->get();

        $res = '<option selected disabled>' . trans('general.nothing_selected') . '</option>';
        foreach ($projects as $project) {
            if ($project->project_id == $selected) {
                $res .= '<option value="' . $project->project_id . '" selected>' . $project->project_name . '</option>';
            } else {
                $res .= '<option value="' . $project->project_id . '">' . $project->project_name . '</option>';
            }
        }

        return $res;
    }

    public static function getProjectsSelectOptions($selected)
    {
        $projects = DB::table('projects')
            ->get();
        $res = '<option selected disabled>' . trans('general.nothing_selected') . '</option>';
        foreach ($projects as $project) {
            if ($project->project_id == $selected) {
                $res .= '<option value="' . $project->project_id . '" selected>' . $project->project_name . '</option>';
            } else {
                $res .= '<option value="' . $project->project_id . '">' . $project->project_name . '</option>';
            }
        }

        return $res;
    }

    public static function getFirstProjectId()
    {
        $project = DB::table('projects')
            ->first();

        $id=0;
        if(!empty($project)){
            $id=$project->project_id;
        }

        return $id;
    }

}
