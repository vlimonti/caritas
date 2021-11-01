<?php

namespace App\Observers;

use App\Models\Skill;
use Illuminate\Support\Str;

class SkillObserver
{
    /**
     * Handle the team "created" event.
     *
     * @param  \App\Models\Skill  $skill
     * @return void
     */
    public function creating(Skill $skill)
    {
        $skill->uuid = Str::uuid();
    }
}
