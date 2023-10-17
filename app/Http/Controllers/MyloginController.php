<?php

namespace App\Http\Controllers;

use App\Enums\LogTypeEnum;
use Illuminate\Http\Request;
use Flash;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use myUser;
use App\Services\LogItemService;

class MyloginController extends Controller
{
    public static function login(Request $request)
    {

        $name = $request->name;
        $password = $request->password;

        if (empty($name)) {
            Flash::error(__('A név kötelező!'))->important();
            return back();
        }

        if (empty($password)) {
            return back();
        }

        $user = Users::where('name', $name)
            ->where('password', md5($password))
            ->first();


        if (empty($user)) {
            Flash::error(__('Hibás név vagy jelszó!'))->important();
            return back();
        }

        session(['userId' => $user->id]);

        $lis = new LogItemService();
        $lis->newLogItem(LogTypeEnum::INSERT->value, $user->id);

        return view('home');
    }

    public static function myLogout() {

        $lis = new LogItemService();
        $lis->newLogItem(1, myUser::user()->id);

        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function settingIndex(Request $request)
    {
        return view('setting.edit');
    }


}

