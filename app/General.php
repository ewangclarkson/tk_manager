<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{

    public static function getDangerAlert($msg){
        return '<div class="alert alert-danger" role="alert">' .$msg .
        '</div>';
    }

    public static function getSuccessAlert($msg){
        return '<div class="alert alert-success" role="alert">' .$msg .
            '</div>';
    }
}
