<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use TenantTrait;

    protected $fillable = ['familyName', 'description', 'street', 'district', 'number', 
                            'complement', 'zipCode', 'city', 'state', 'active'];

    public function people()
    {
        return $this->hasMany(People::class);
    }
}
