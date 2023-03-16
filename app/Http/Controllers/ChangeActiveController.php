<?php

namespace App\Http\Controllers;

use App\Classes\Models\ModelPath;
use App\Classes\SWAlertClass;
use App\Classes\ToolsClass;
use Illuminate\Http\Request;
use App\Http\Controllers\VoucherToolController;
use PDF;
use Mail;
use QrCode;
use App\Models\Clientvouchers;
use App\Classes\LogitemClass;

class ChangeActiveController extends Controller
{
    public $logitem;

    function __construct() {
        $this->logitem = new LogitemClass();
    }

    public function beforeActivation($id, $table, $route) {
        $view = 'layouts.show';
        $model_name = ModelPath::makeModelPath($table);
        $data = $model_name::find($id);
        SWAlertClass::choice($id, 'Biztosan változtatni akarja az aktívitás jelzőt?', '/'.$route, 'Kilép', '/Activation/'.$id.'/'.$table.'/'.$route, 'Váltás');

        return view($view)->with('table', $data);
    }

    public function Activation($id, $table, $route) {
        $route .= '.index';
        $model_name = ModelPath::makeModelPath($table);
        $record = $model_name::find($id);

        if (empty($record)) {
            return redirect(route($route));
        }

        $record->active = $record->active == 0 ? 1 : 0;
        $record->save();
        $this->logitem->iudRecord($record->active == 1 ? 6 : 7, $record->getTable(), $record->id);


        return redirect(route($route));
    }

    public function beforeActivationWithParam($table, $id, $route, $param = null) {
        $view = 'layouts.show';
        $model_name = ModelPath::makeModelPath($table);
        $record = $model_name::find($id);

        SWAlertClass::choice($id, 'Biztosan változtatni akarja az aktívitás jelzőt?', '/'.$route. '/' . $param, 'Kilép', '/ActivationWithParam/'.$table.'/'.$id.'/'.$route. '/'.$param, 'Váltás');
        return view($view)->with('table', $record);
    }

    public function ActivationWithParam($table, $id, $route, $param) {
        $model_name = ModelPath::makeModelPath($table);
        $record = $model_name::find($id);

        if (empty($record)) {
            return redirect(route($route, $param));
        }

        $record->active = $record->active == 0 ? 1 : 0;
        $record->save();
        $this->logitem->iudRecord($record->active == 1 ? 6 : 7, $record->getTable(), $record->id);

        return redirect(route($route,  $param));
    }

    public static function changingActive($table) {
        $model_name = ModelPath::makeModelPath($table);
        $datas = $model_name::where('active', 1)
                        ->where('validityfrom', '<=', date('Y.m.d', strtotime('today')))
                        ->where('validityto', '<', date('Y.m.d', strtotime('today')))
                        ->get();
        if (!empty($datas)) {
            foreach ($datas as $data) {
                $data->active = 0;
                $data->save();
                self::$logitem->iudRecord(7, $data->getTable(), $data->id);
            }
        }
    }

    public static function deActivating() {
        self::changingActive('Vouchers');
        self::changingActive('Questionnaires');
        self::changingActive('Lotteries');
    }

}
