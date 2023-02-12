<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
use App\Models\Users;


class MyloginController extends Controller
{
    public static function myLogin(Request $request)
    {

        $name = $request->name;
        $password = $request->password;

        if (empty($name)) {
            Flash::error('A név kötelező!')->important();
            return back();
        }

        if (empty($password)) {
            Flash::error('A jelszó kötelező!')->important();
            return back();
        }

        $user = Users::where('name', $name)
            ->where('password', md5($password))
            ->first();

        if (empty($user)) {
            Flash::error('Hibás név vagy jelszó!')->important();
            return back();
        }

        return view('home');
    }
}
