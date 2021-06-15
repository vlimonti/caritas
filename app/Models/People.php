<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use TenantTrait;

    protected $fillable = ['name', 'cpf', 'rg', 'familyResponsible'];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
