<?php

namespace App\Observers;

use App\Models\Music;
use Illuminate\Support\Str;

class MusicObserver
{
    /**
     * Handle the music "created" event.
     *
     * @param  \App\Models\Music  $music
     * @return void
     */
    public function creating(Music $music)
    {
        $music->url = Str::kebab($music->name);
        $music->uuid = Str::uuid();
    }

    /**
     * Handle the music "updated" event.
     *
     * @param  \App\Models\Music  $music
     * @return void
     */
    public function updating(Music $music)
    {
        $music->url = Str::kebab($music->name);
    }
}
