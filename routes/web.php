<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Entract routes from language files
 *  This help in code maintainance without application break down
 */
$home = trans('settings/routes.home');
$logout = trans('settings/routes.logout');
$manage_project = trans('settings/routes.manage_project');
$add_project = trans('settings/routes.add_project');
$edit_project = trans('settings/routes.edit_project');
$project_task_list = trans('settings/routes.project_task_list');

$manage_task = trans('settings/routes.manage_task');
$add_task = trans('settings/routes.add_task');
$edit_task = trans('settings/routes.edit_task');
$delete = trans('settings/routes.delete');

$path_var = '/{id}';


/**
 * End of routes assignment
 */


Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();



Route::get($home, 'HomeController@index')->name('home');
Route::get($logout, 'Auth\LogoutController@logout')->name('logout');


/**
 * Routes to Manage Projects
 */
Route::get($manage_project, 'ManageProjectController@showProjectListPage');
Route::get($manage_project . $delete . $path_var, 'ManageProjectController@deleteProject');
Route::get($edit_project . $path_var, 'ManageProjectController@showEditProjectPage');
Route::post($edit_project . $path_var, 'ManageProjectController@editProject');
Route::get($add_project, 'ManageProjectController@showAddProjectPage');
Route::post($add_project, 'ManageProjectController@createProject');

Route::get($project_task_list, 'ManageProjectController@showProjectTaskListPage');
Route::post($project_task_list, 'ManageProjectController@getProjectTaskList');

/**
 * Routes to Manage Tasks
 */

Route::get($manage_task, 'ManageTaskController@showTaskListPage');
Route::get($manage_task . $delete . $path_var, 'ManageTaskController@deleteTask');
Route::get($edit_task . $path_var, 'ManageTaskController@showEditTaskPage');
Route::post($edit_task . $path_var, 'ManageTaskController@editTask');
Route::get($add_task, 'ManageTaskController@showAddTaskPage');
Route::post($add_task, 'ManageTaskController@createTask');




