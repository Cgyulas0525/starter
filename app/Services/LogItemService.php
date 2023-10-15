<?php

namespace App\Services;

use App\Models\Logitems;
use Carbon\Carbon;

class LogItemService
{
    public function newLogItem($type, $userId) {

        $logitem = new Logitems();

        $logitem->logitemtype_id = $type;
        $logitem->user_id = $userId;
        $logitem->eventdatetime = Carbon::now();
        $logitem->created_at = Carbon::now();

        $logitem->save();

    }
}
