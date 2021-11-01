<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTeam;
use App\Models\Ministry;
use App\Models\Person;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    private $repository, $ministry, $person;

    public function __construct(
        Team $team, 
        Ministry $ministry,
        Person $person
    ) {
        $this->repository = $team;
        $this->ministry = $ministry;
        $this->person = $person;
        $this->middleware(['can:teams']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = $this->repository::addSelect(['person_name' => function($query){
                                $query->select('name')
                                    ->from('people')
                                    ->whereColumn('id', 'teams.person_id')
                                    ->limit(1);
                            }
                        ])
                        ->with('ministry')
                        ->paginate();

        return view('admin.pages.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ministries = $this->ministry
                                ->latest()
                                ->paginate();
        
        $people = $this->person
                            ->latest()
                            ->paginate();

        return view('admin.pages.teams.create', compact('ministries', 'people'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateTeam  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTeam $request)
    {        
        $data = $request->only('name', 'description');
        $data['ministry_id'] = $request->ministry;
        $data['person_id'] = $request->person;

        $newId = $this->repository->create($data);

        //return redirect()->route('teams.index');
        return redirect()->route('teams.people.attach', $newId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = $this->repository::addSelect(['person_name' => function($query){
                                $query->select('name')
                                    ->from('people')
                                    ->whereColumn('id', 'teams.person_id')
                                    ->limit(1);
                            }
                        ])
                        ->with('ministry')
                        ->find($id);
        if(!$team){
            return redirect()->back();
        }

        return view('admin.pages.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = $this->repository->find($id);
        if(!$team){
            return redirect()->back();
        }

        $ministries = $this->ministry
                                ->latest()
                                ->paginate();

        $people = $this->person
                                ->latest()
                                ->paginate();

        return view('admin.pages.teams.edit', compact('team', 'ministries', 'people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateTeam  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTeam $request, $id)
    {
        $team = $this->repository->find($id);
        if(!$team){
            return redirect()->back();
        }

        $data = $request->only('name', 'description');
        $data['ministry_id'] = $request->ministry;
        $data['person_id'] = $request->person;

        $team->update($data);

        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = $this->repository->find($id);
        if(!$team){
            return redirect()->back();
        }

        $team->delete();

        return redirect()->route('teams.index');
    }

    public function search(Request $request)
    {
        
        $filters = $request->only('filter');

        $teams = $this->repository
                            ->where(function($query) use ($request){
                                if($request->filter){
                                    $query->where('name', 'like', "%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.teams.index', compact('teams', 'filters'));
    }
}
