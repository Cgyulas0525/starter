<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use App\Models\Users;
use App\Http\Controllers\ChangeActiveController;
use App\Models\Logitems;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon;
use myUser;

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

        $user = Users::where('username', $name)
            ->where('password', md5($password))
            ->first();


        if (empty($user)) {
            Flash::error(__('Hibás név vagy jelszó!'))->important();
            return back();
        }

        session(['userId' => $user->id]);
        $logitem = new Logitems();
        $logitem->logitemtype_id = 1;
        $logitem->user_id = $user->id;
        $logitem->eventdatetime = Carbon\Carbon::now();
        $logitem->created_at = Carbon\Carbon::now();
        $logitem->save();

//        ChangeActiveController::deActivating();

        return view('home');
    }

    public static function myLogout() {
        $logitem = new Logitems();
        $logitem->logitemtype_id = 2;
        $logitem->user_id = myUser::user()->id;
        $logitem->eventdatetime = Carbon\Carbon::now();
        $logitem->created_at = Carbon\Carbon::now();
        $logitem->save();
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function settingIndex(Request $request)
    {
        return view('setting.edit');
    }


}

