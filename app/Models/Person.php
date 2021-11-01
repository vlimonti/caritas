<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name', 'lastname', 'birth_date', 'gender', 'civil_status', 'phone', 'cell_phone',
        'email', 'street', 'number_house', 'district', 'postal_code', 'city', 'state', 'country'
    ];
  
    use TenantTrait;

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function teamsAvailable($filter = null)
    {
        $teams = Team::whereNotIn('teams.id', function($query){
            $query->select('person_team.team_id');
            $query->from('person_team');
            $query->whereRaw("person_team.person_id = {$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('teams.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $teams;
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function skillsAvailable($filter = null)
    {
        $people = Skill::whereNotIn('skills.id', function($query){
            $query->select('person_skill.skill_id');
            $query->from('person_skill');
            $query->whereRaw("person_skill.person_id = {$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('skills.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $people;
    }
}
