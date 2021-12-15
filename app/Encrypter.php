<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Crypt;

class Encrypter extends Model
{

    public static function encode($data)
    {
        return Crypt::encrypt($data);
    }

    /**
     * decode url ids
     * @param $id
     * @return mixed
     */
    public static function decode($data)
    {
        try {
            return Crypt::decrypt($data);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

}
