<?php

namespace App\Http\Controllers;

use App\Classes\SWAlertClass;
use Illuminate\Http\Request;

class ChangeActiveController extends Controller
{
    public function beforeActivation($id, $table, $route) {
        $view = 'layouts.show';
        $model_name = 'App\Models\\'.$table;
        $data = $model_name::find($id);
        SWAlertClass::choice($id, 'Biztosan változtatni akarja az aktívitás jelzőt?', '/'.$route, 'Kilép', '/Activation/'.$id.'/'.$table.'/'.$route, 'Váltás');

        return view($view)->with('table', $data);
    }

    public function Activation($id, $table, $route) {
        $route .= '.index';
        $model_name = 'App\Models\\'.$table;
        $partner = $model_name::find($id);

        if (empty($partner)) {
            return redirect(route($route));
        }

        $partner->active = $partner->active == 0 ? 1 : 0;
        $partner->save();

        return redirect(route($route));
    }

}
