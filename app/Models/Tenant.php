<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['cnpj', 'name', 'url', 'email', 'logo', 
                        'active', 'subscription', 'expires_at', 'subscription_id', 
                        'subscription_active', 'subscription_suspended'];
    
    /**
     * Scope a query to only users by tenant.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeUserTenant(Builder $query)
    {
        if (in_array(auth()->user()->email, config('tenant')['admins'])) {
            $scope = $query;
        }else{
            $scope = $query->where('id', auth()->user()->tenant_id);
        }
        return $scope;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
