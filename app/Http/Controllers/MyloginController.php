<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use App\Models\Users;

class MyloginController extends Controller
{
    public static function login(Request $request)
    {

        $name = $request->name;
        $password = $request->password;

//        dd($name, $password);

        if (empty($name)) {
            Flash::error(__('A név kötelező!'))->important();
            return back();
        }

        if (empty($password)) {
            return back();
        }

        $user = Users::where('username', $name)
            ->where('password', md5($password))
            ->first();


        if (empty($user)) {
            Flash::error(__('Hibás név vagy jelszó!'))->important();
            return back();
        }

        session(['userId' => $user->id]);

        return view('home');
    }

    public function settingIndex(Request $request)
    {
        return view('setting.edit');
    }


}
