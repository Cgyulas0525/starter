<?php

namespace App\Http\Controllers;

use App\Classes\LogitemClass;
use App\Classes\Models\ModelPath;
use App\Classes\SWAlertClass;
use App\Enums\LogTypeEnum;
use App\Http\Controllers\VoucherToolController;
use App\Models\Clientvouchers;

class ChangeActiveController extends Controller
{
    public $logitem;

    function __construct()
    {
        $this->logitem = new LogitemClass();
    }

    public function beforeActivation($id, $table, $route): object
    {
        $view = 'layouts.show';
        $model_name = ModelPath::makeModelPath($table);
        $data = $model_name::find($id);
        SWAlertClass::choice($id, 'Biztosan változtatni akarja az aktívitás jelzőt?', '/' . $route, 'Kilép', '/Activation/' . $id . '/' . $table . '/' . $route, 'Váltás');
        return view($view)->with('table', $data);
    }

    public function Activation($id, $table, $route): object
    {
        $route .= '.index';
        $model_name = ModelPath::makeModelPath($table);
        $record = $model_name::find($id);
        $before = $record->toJson();
        if (empty($record)) {
            return redirect(route($route));
        }
        $record->active = $record->active == 0 ? 1 : 0;
        $record->save();
        $this->logitem->iudRecord($record->active == 1 ? LogTypeEnum::ACTIVATE->value : LogTypeEnum::DEACTIVATE->value, $record->getTable(), $record->id, $before, $record->toJson());
        return redirect(route($route));
    }

    public function beforeActivationWithParam($table, $id, $route, $param = null): object
    {
        $view = 'layouts.show';
        $model_name = ModelPath::makeModelPath($table);
        $record = $model_name::find($id);
        SWAlertClass::choice($id, 'Biztosan változtatni akarja az aktívitás jelzőt?', '/' . $route . '/' . $param, 'Kilép', '/ActivationWithParam/' . $table . '/' . $id . '/' . $route . '/' . $param, 'Váltás');
        return view($view)->with('table', $record);
    }

    public function ActivationWithParam($table, $id, $route, $param): object
    {
        $model_name = ModelPath::makeModelPath($table);
        $record = $model_name::find($id);
        $before = $record->toJson();
        if (empty($record)) {
            return redirect(route($route, $param));
        }
        $record->active = $record->active == 0 ? 1 : 0;
        $record->save();
        $this->logitem->iudRecord($record->active == 1 ? LogTypeEnum::ACTIVATE->value : LogTypeEnum::DEACTIVATE->value, $record->getTable(), $record->id, $before, $record->toJson());
        return redirect(route($route, $param));
    }

    public static function changingActive($table): void
    {
        $model_name = ModelPath::makeModelPath($table);
        $datas = $model_name::where('active', 1)
            ->where('validityfrom', '<=', date('Y.m.d', strtotime('today')))
            ->where('validityto', '<', date('Y.m.d', strtotime('today')))
            ->get();
        if (!empty($datas)) {
            foreach ($datas as $data) {
                $before = $data->toJson();
                $data->active = 0;
                $data->save();
                self::$logitem->iudRecord(LogTypeEnum::DEACTIVATE->value, $data->getTable(), $data->id, $before, $data->toJson());
            }
        }
    }

    public static function deActivating(): void
    {
        self::changingActive('Vouchers');
        self::changingActive('Questionnaires');
        self::changingActive('Lotteries');
    }

}
