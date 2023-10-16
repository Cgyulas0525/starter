<?php

namespace App\Http\Controllers;

use App\Classes\LogitemClass;
use App\Classes\Models\ModelPath;
use App\Classes\SWAlertClass;
use App\Enums\LogTypeEnum;

class DestroysController extends Controller
{
    private $logitem;

    function __construct()
    {
        $this->logitem = new LogitemClass();
    }

    public function beforeDestroys($table, $id, $route): object
    {
        $view = 'layouts.show';
        $model_name = ModelPath::makeModelPath($table);
        $data = $model_name::find($id);
        SWAlertClass::choice($id, 'Biztos, hogy törli a tételt?', '/' . $route, 'Kilép', '/destroy/' . $table . '/' . $id . '/' . $route, 'Töröl');
        return view($view)->with('table', $data);
    }

    public function beforeDestroysWithParam($table, $id, $route, $param = NULL): object
    {
        $view = 'layouts.show';
        $model_name = ModelPath::makeModelPath($table);
        $data = $model_name::find($id);
        $text = 'Törlődik a tétel és a hozzá kapcsolódó adatok! Biztos, hogy törli a tételt?';
        SWAlertClass::choice($id, $text, '/' . $route . '/' . $param, 'Kilép', '/destroyWithParam/' . $table . '/' . $id . '/' . $route . '/' . $param, 'Töröl');
        return view($view)->with('table', $data);
    }

    public function beforeDestroysWithParamArray($table, $id, $route, $param = NULL): object
    {
        $view = 'layouts.show';
        $model_name = ModelPath::makeModelPath($table);
        $data = $model_name::find($id);
        $text = 'Törlődik a tétel és a hozzá kapcsolódó adatok! Biztos, hogy törli a tételt?';
        SWAlertClass::choice($id, $text, '/' . $route . '/' . $param, 'Kilép', '/destroyWithParam/' . $table . '/' . $id . '/' . $route . '/' . $param, 'Töröl');
        return view($view)->with('table', $data);
    }


    public function destroy($table, $id, $route): object
    {
        $route .= '.index';
        $model_name = ModelPath::makeModelPath($table);
        $data = $model_name::find($id);
        if (empty($data)) {
            return redirect(route($route));
        }
        $data->delete();
        $this->logitem->iudRecord(LogTypeEnum::DELETE->value, $data->getTable(), $data->id, $data->toJson());
        return redirect(route($route));
    }

    public function destroyWithParam($table, $id, $route, $param): object
    {
        $model_name = ModelPath::makeModelPath($table);
        $data = $model_name::find($id);
        if (empty($data)) {
            return redirect(route($route, $param));
        }
        switch (strtolower($table)) {
            case "contractannex":
                $this->deletingContractAnnex($data);
                break;
            case "contractdeadline":
                $this->deletingContractDeadLine($data);
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";
        }
        $data->delete();
        $this->logitem->iudRecord(LogTypeEnum::DELETE->value, $data->getTable(), $data->id, $data->toJson());
        return redirect(route($route, $param));
    }

}
