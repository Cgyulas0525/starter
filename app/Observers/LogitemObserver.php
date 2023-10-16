<?php

namespace App\Observers;

use App\Models\Logitems;

class LogitemObserver
{
    /**
     * Handle the Logitems "created" event.
     *
     * @param  \App\Models\Logitems  $logitems
     * @return void
     */
    public function created(Logitems $logitems)
    {
        //
    }

    /**
     * Handle the Logitems "updated" event.
     *
     * @param  \App\Models\Logitems  $logitems
     * @return void
     */
    public function updated(Logitems $logitems)
    {
        //
    }

    /**
     * Handle the Logitems "deleted" event.
     *
     * @param  \App\Models\Logitems  $logitems
     * @return void
     */
    public function deleted(Logitems $logitems)
    {
        //
    }

    /**
     * Handle the Logitems "restored" event.
     *
     * @param  \App\Models\Logitems  $logitems
     * @return void
     */
    public function restored(Logitems $logitems)
    {
        //
    }

    /**
     * Handle the Logitems "force deleted" event.
     *
     * @param  \App\Models\Logitems  $logitems
     * @return void
     */
    public function forceDeleted(Logitems $logitems)
    {
        //
    }
}
