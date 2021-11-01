<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name'];

    use TenantTrait;

    public function people()
    {
        return $this->belongsToMany(Person::class);
    }

    public function peopleAvailable($filter = null)
    {
        $skills = Person::whereNotIn('people.id', function($query){
            $query->select('person_skill.person_id');
            $query->from('person_skill');
            $query->whereRaw("person_skill.skill_id = {$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('people.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $skills;
    }
}
