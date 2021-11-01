<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Team;
use Illuminate\Http\Request;

class PersonTeamController extends Controller
{
    protected $person, $team;

    public function __construct(Person $person, Team $team)
    {
        $this->person    = $person;
        $this->team = $team;
        $this->middleware(['can:people']);
    }

    public function teams(Request $request, $idPerson)
    {   
        if( !$person = $this->person->find($idPerson) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $teams = $person->teams()->paginate();

        return view('admin.pages.people.teams.index', compact('person', 'teams'));
    }


    public function teamsAvailable(Request $request, $idPerson)
    {   
        if( !$person = $this->person->find($idPerson) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');
        
        $teams = $person->teamsAvailable( $request->filter);

        return view('admin.pages.people.teams.available', compact('person', 'teams', 'filters'));
    }


    public function attachTeamsPerson(Request $request, $idPerson)
    {   
        if( !$person = $this->person->find($idPerson) )
        {
            return redirect()->back();
        }

        if( !$request->teams || count($request->teams) == 0 )
        {
            return redirect()
                        ->back()
                        ->with('info', 'A seleção de pelo menos uma equipe é obrigatório!');
        }

        $person->teams()->attach($request->teams);

        return redirect()->route('people.teams', $person->id);
    }


    public function  detachTeamPerson($idPerson, $idTeam)
    {
        $person = $this->person->find($idPerson);
        $team = $this->team->find($idTeam);

        if(!$person || !$team) {
            return redirect()->back();
        }

        $person->teams()->detach($team);

        return redirect()->route('people.teams', $person->id);
    }
    



    public function people(Request $request, $idTeam)
    {   
        if( !$team = $this->team->find($idTeam) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');
        
        $people = $team->people()->paginate();
        
        return view('admin.pages.teams.people.index', compact('team', 'people'));
    }


    public function peopleAvailable(Request $request, $idTeam)
    {   
        if( !$team = $this->team->find($idTeam) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');
        
        $people = $team->peopleAvailable( $request->filter);

        return view('admin.pages.teams.people.available', compact('team', 'people', 'filters'));
    }


    public function attachPeopleTeam(Request $request, $idTeam)
    {   
        if( !$team = $this->team->find($idTeam) )
        {
            return redirect()->back();
        }

        if( !$request->people || count($request->people) == 0 )
        {
            return redirect()
                        ->back()
                        ->with('info', 'A seleção de pelo menos uma pessoa é obrigatório!');
        }

        $team->people()->attach($request->people);

        return redirect()->route('teams.people', $team->id);
    }


    public function  detachPersonTeam($idTeam, $idPerson)
    {
        $person = $this->person->find($idPerson);
        $team = $this->team->find($idTeam);

        if(!$person || !$team) {
            return redirect()->back();
        }

        $team->people()->detach($person);

        return redirect()->route('teams.people', $team->id);
    }
}
