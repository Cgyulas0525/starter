<?php
namespace App\Classes;

use DB;
use App\Models\Users;

Class myUserClass{

    /**
     * bejelentkezett USER adatai
     *
     * @return firebird->Employee
     */
    public static function user()
    {
        return Users::where('id', session('userId'))->first();
    }

    /**
     * van-e bejentkezett user
     *
     * @return bool
     */
    public static function check()
    {
        $user = Db::table('users')->where('id', session('userId'))->first();
        return !empty($user) ? true : false;

    }

}
