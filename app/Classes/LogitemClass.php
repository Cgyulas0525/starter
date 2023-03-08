<?php

namespace App\Classes;

use App\Models\Logitems;

class LogitemClass
{

    public function iudRecord($logitemtype_id, $datatable, $record) {

        $logitem = new Logitems();
        $logitem->logitemtype_id = $logitemtye_id;
        $logitem->user_id = myUser::user()->id;
        $logitem->datatable = $datatable;
        $logitem->record = $record;
        $logitem->eventdatetime = Carbon\Carbon::now();
        $logitem->created_at = Carbon\Carbon::now();

        $logitem->save();
    }

}
