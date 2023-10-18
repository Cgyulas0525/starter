<?php

namespace App\Services;

use App\Models\Logitems;

class LogItemService
{
    public function newLogItem($type, $userId): void
    {
        $logitem = new Logitems();
        $logitem->logitemtype = $type;
        $logitem->user_id = $userId;
        $logitem->eventdatetime = now();
        $logitem->remoteaddress = (\Request::getClientIp() == '::1') ? '127.0.0.1' : \Request::getClientIp();
        $logitem->created_at = now();
        $logitem->save();
    }
}
