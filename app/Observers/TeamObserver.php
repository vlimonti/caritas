<?php

namespace App\Observers;

use App\Models\Team;
use Illuminate\Support\Str;

class TeamObserver
{
    /**
     * Handle the team "created" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function creating(Team $team)
    {
        $team->url = Str::kebab($team->name);
        $team->uuid = Str::uuid();
    }

    /**
     * Handle the team "updated" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function updating(Team $team)
    {
        $team->url = Str::kebab($team->name);
    }
}
