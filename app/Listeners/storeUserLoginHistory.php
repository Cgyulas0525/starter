<?php

namespace App\Listeners;

use App\Enums\LogTypeEnum;
use App\Events\LoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
use DB;

class storeUserLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\LoginHistory  $event
     * @return void
     */
    public function handle(LoginHistory $event)
    {
        $current_timestamp = Carbon::now();

        $user = $event->user;

        $saveHistory = DB::table('logitems')->insert(
                    ['user_id' => $user->id,
                     'logitemtype' => LogTypeEnum::INSERT->value,
                     'eventdatetime' => $current_timestamp,
                     'created_at' => $current_timestamp,
                     'updated_at' => $current_timestamp
                    ]
        );
        return $saveHistory;
    }
}
