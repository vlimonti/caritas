<?php

namespace App\Observers;

use App\Models\Ministry;
use Illuminate\Support\Str;

class MinistryObserver
{
    /**
     * Handle the team "created" event.
     *
     * @param  \App\Models\Ministry  $ministry
     * @return void
     */
    public function creating(Ministry $ministry)
    {
        $ministry->uuid = Str::uuid();
    }
}
