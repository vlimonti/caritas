<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMinistry;
use App\Models\Ministry;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinistryController extends Controller
{
    private $repository, $person;

    public function __construct(Ministry $ministry, Person $person)
    {
        $this->repository = $ministry;
        $this->person = $person;
        $this->middleware(['can:ministries']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ministries = $this->repository::addSelect(['person_name' => function($query){
                                        $query->select('name')
                                            ->from('people')
                                            ->whereColumn('id', 'ministries.person_id')
                                            ->limit(1);
                                    }
                                ])
                                ->paginate();

        return view('admin.pages.ministries.index', compact('ministries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $people = $this->person
                            ->latest()
                            ->paginate();

        return view('admin.pages.ministries.create', compact('people'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateMinistry  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMinistry $request)
    {
        $data = $request->only('name', 'description');
        $data['person_id'] = $request->person;
        $this->repository->create($data);

        return redirect()->route('ministries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ministry = $this->repository::addSelect(['person_name' => function($query){
                                    $query->select('name')
                                        ->from('people')
                                        ->whereColumn('id', 'ministries.person_id')
                                        ->limit(1);
                                }
                            ])
                            ->find($id);
        if(!$ministry){
            return redirect()->back();
        }

        return view('admin.pages.ministries.show', compact('ministry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ministry = $this->repository->find($id);
        if(!$ministry){
            return redirect()->back();
        }

        $people = $this->person
                        ->latest()
                        ->paginate();

        return view('admin.pages.ministries.edit', compact('ministry', 'people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateMinistry  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateMinistry $request, $id)
    {
        $ministry = $this->repository->find($id);
        if(!$ministry){
            return redirect()->back();
        }
        
        $data = $request->only('name', 'description');
        $data['person_id'] = $request->person;

        $ministry->update($data);

        return redirect()->route('ministries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ministry = $this->repository->find($id);
        if(!$ministry){
            return redirect()->back();
        }

        $ministry->delete();

        return redirect()->route('ministries.index');
    }

    public function search(Request $request)
    {
        
        $filters = $request->only('filter');

        $ministries = $this->repository
                            ->where(function($query) use ($request){
                                if($request->filter){
                                    $query->where('name', 'like', "%{$request->filter}%");
                                    $query->orWhere('description', 'like', "%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.ministries.index', compact('ministries', 'filters'));
    }
}
