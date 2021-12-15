<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \DB;


class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'employee_id';

    protected $guarded = ['employee_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



  public static function getEmployeesSelectOptions($selected=0){
      $users = DB::table('users')
           ->get();

      $res = '<option selected disabled>' . trans('general.nothing_selected') . '</option>';
      foreach ($users as $user) {
          if($user->employee_id ==$selected ) {
              $res .= '<option value="' . $user->employee_id . '" selected>' . $user->employee_name . '</option>';
          }else{
              $res .= '<option value="' . $user->employee_id . '">' . $user->employee_name . '</option>';
          }
      }

      return $res;
  }

}


