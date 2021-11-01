<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSkill;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    private $repository;

    public function __construct(Skill $skill)
    {
        $this->repository = $skill;
        $this->middleware(['can:skills']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = $this->repository->paginate();
        return view('admin.pages.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateSkill  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateSkill $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('skills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skill = $this->repository->find($id);
        if(!$skill){
            return redirect()->back();
        }

        return view('admin.pages.skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = $this->repository->find($id);
        if(!$skill){
            return redirect()->back();
        }
        return view('admin.pages.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateSkill  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateSkill $request, $id)
    {
        $skill = $this->repository->find($id);
        if(!$skill){
            return redirect()->back();
        }
        //dd($request->all());
        $skill->update( $request->all() );

        return redirect()->route('skills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = $this->repository->find($id);
        if(!$skill){
            return redirect()->back();
        }

        $skill->delete();

        return redirect()->route('skills.index');
    }

    public function search(Request $request)
    {
        
        $filters = $request->only('filter');

        $skills = $this->repository
                            ->where(function($query) use ($request){
                                if($request->filter){
                                    $query->where('name', 'like', "%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.skills.index', compact('skills', 'filters'));
    }
}
