<?php

namespace App\Observers;

use App\Models\Person;
use Illuminate\Support\Str;

class PersonObserver
{
    /**
     * Handle the team "created" event.
     *
     * @param  \App\Models\Person  $person
     * @return void
     */
    public function creating(Person $person)
    {
        $person->uuid = Str::uuid();
    }
}
