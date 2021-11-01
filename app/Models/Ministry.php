<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    protected $fillable = ['name', 'description', 'person_id'];

    use TenantTrait;

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
