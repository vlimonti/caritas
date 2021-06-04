<?php

namespace App\Observers;

use App\Models\Basket;
use Illuminate\Support\Str;

class BasketObserver
{
    /**
     * Handle the plan "created" event.
     *
     * @param  \App\Models\Basket  $basket
     * @return void
     */
    public function creating(Basket $basket)
    {
        $basket->url = Str::kebab($basket->name);
    }

    /**
     * Handle the plan "updated" event.
     *
     * @param  \App\Models\Basket  $basket
     * @return void
     */
    public function updating(Basket $basket)
    {
        $basket->url = Str::kebab($basket->name);
    }
}
