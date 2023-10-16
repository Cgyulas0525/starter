<?php

namespace App\Classes;

use App\Models\Logitems;
use myUser;

class LogitemClass
{

    public function iudRecord($logitemtype, $datatable, $record, $before, ?string $after = NULL): void
    {
        $logitem = new Logitems();
        $logitem->logitemtype_id = $logitemtype;
        $logitem->user_id = myUser::user()->id;
        $logitem->datatable = $datatable;
        $logitem->record = $record;
        $logitem->before = $before;
        $logitem->after = $after;
        $logitem->eventdatetime = now();
        $logitem->created_at = now();
        $logitem->save();
    }
}
