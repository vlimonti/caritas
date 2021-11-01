<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'ministry_id', 'description', 'person_id'];

    use TenantTrait;

    public function ministry()
    {
        return $this->belongsTo(Ministry::class);
    }

    public function people()
    {
        return $this->belongsToMany(Person::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    
    public function peopleAvailable($filter = null)
    {
        $teams = Person::whereNotIn('people.id', function($query){
            $query->select('person_team.person_id');
            $query->from('person_team');
            $query->whereRaw("person_team.team_id = {$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('people.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $teams;
    }
}
