<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Skill;
use Illuminate\Http\Request;

class PersonSkillController extends Controller
{
    protected $skill, $person;

    public function __construct(Skill $skill, Person $person)
    {
        $this->skill    = $skill;
        $this->person = $person;
        $this->middleware(['can:skills']);
    }

    public function people(Request $request, $idSkill)
    {   
        if( !$skill = $this->skill->find($idSkill) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $people = $skill->people()->paginate();

        return view('admin.pages.skills.people.index', compact('skill', 'people'));
    }


    public function peopleAvailable(Request $request, $idSkill)
    {   
        if( !$skill = $this->skill->find($idSkill) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');
        
        $people = $skill->peopleAvailable( $request->filter);

        return view('admin.pages.skills.people.available', compact('skill', 'people', 'filters'));
    }


    public function attachPeopleSkill(Request $request, $idSkill)
    {   
        if( !$skill = $this->skill->find($idSkill) )
        {
            return redirect()->back();
        }

        if( !$request->people || count($request->people) == 0 )
        {
            return redirect()
                        ->back()
                        ->with('info', 'A seleção de pelo menos uma pessoa é obrigatório!');
        }

        $skill->people()->attach($request->people);

        return redirect()->route('skills.people', $skill->id);
    }


    public function  detachPersonSkill($idSkill, $idPerson)
    {
        $skill = $this->skill->find($idSkill);
        $person = $this->person->find($idPerson);

        if(!$skill || !$person) {
            return redirect()->back();
        }

        $skill->people()->detach($person);

        return redirect()->route('skills.people', $skill->id);
    }
    



    public function skills(Request $request, $idPerson)
    {   
        if( !$person = $this->person->find($idPerson) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');
        
        $skills = $person->skills()->paginate();
        
        return view('admin.pages.people.skills.index', compact('person', 'skills'));
    }


    public function skillsAvailable(Request $request, $idPerson)
    {   
        if( !$person = $this->person->find($idPerson) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');
        
        $skills = $person->skillsAvailable( $request->filter);

        return view('admin.pages.people.skills.available', compact('person', 'skills', 'filters'));
    }


    public function attachSkillsPeople(Request $request, $idPerson)
    {   
        if( !$person = $this->person->find($idPerson) )
        {
            return redirect()->back();
        }

        if( !$request->skills || count($request->skills) == 0 )
        {
            return redirect()
                        ->back()
                        ->with('info', 'A seleção de pelo menos uma habilidade é obrigatório!');
        }

        $person->skills()->attach($request->skills);

        return redirect()->route('people.skills', $person->id);
    }


    public function  detachSkillPerson($idPerson, $idSkill)
    {
        $skill = $this->skill->find($idSkill);
        $person = $this->person->find($idPerson);

        if(!$skill || !$person) {
            return redirect()->back();
        }

        $person->skills()->detach($skill);

        return redirect()->route('people.skills', $person->id);
    }
}
