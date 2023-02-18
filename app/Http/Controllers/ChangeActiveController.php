<?php

namespace App\Http\Controllers;

use App\Classes\SWAlertClass;
use Illuminate\Http\Request;
use App\Http\Controllers\ClientToolsController;

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
        $record = $model_name::find($id);

        if (empty($record)) {
            return redirect(route($route));
        }

        $record->active = $record->active == 0 ? 1 : 0;
        $record->save();

        return redirect(route($route));
    }

    public function beforeActivationWithParam($table, $id, $route, $param = null) {
        $view = 'layouts.show';
        $model_name = 'App\Models\\'.$table;
        $record = $model_name::find($id);

        SWAlertClass::choice($id, 'Biztosan változtatni akarja az aktívitás jelzőt?', '/'.$route. '/' . $param, 'Kilép', '/ActivationWithParam/'.$table.'/'.$id.'/'.$route. '/'.$param, 'Váltás');
        return view($view)->with('table', $record);
    }

    public function ActivationWithParam($table, $id, $route, $param) {
        $model_name = 'App\Models\\'.$table;
        $record = $model_name::find($id);

        if (empty($record)) {
            return redirect(route($route, $param));
        }

        $record->active = $record->active == 0 ? 1 : 0;
        $record->save();

        return redirect(route($route,  $param));
    }

    public function beforeValidation($id, $table, $route) {
        $view = 'layouts.show';
        $model_name = 'App\Models\\'.$table;
        $data = $model_name::find($id);
        SWAlertClass::choice($id, 'Biztosan Validálja az ügyfelet?', '/'.$route, 'Kilép', '/Validation/'.$id.'/'.$table.'/'.$route, 'Váltás');

        return view($view)->with('table', $data);
    }

    public function Validation($id, $table, $route) {
        $route .= '.index';
        $model_name = 'App\Models\\'.$table;
        $record = $model_name::find($id);

        if (empty($record)) {
            return redirect(route($route));
        }

        $record->validated = $record->validated == 0 ? 1 : 0;
        $record->local = ClientToolsController::localCheck($record->postcode);
        $record->save();

        return redirect(route($route));
    }


}
