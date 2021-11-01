<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePerson;
use App\Models\Person;
use App\Services\AddressService;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    private $repository, $addressService;

    public function __construct(Person $person, AddressService $addressService)
    {
        $this->repository = $person;
        $this->addressService = $addressService;
        $this->middleware(['can:people']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = $this->repository->paginate();
        return view('admin.pages.people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.people.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePerson  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePerson $request)
    {
        $newId = $this->repository->create($request->all());

        //return redirect()->route('people.index');
        return redirect()->route('people.skills.attach', $newId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = $this->repository->find($id);
        if(!$person){
            return redirect()->back();
        }

        return view('admin.pages.people.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = $this->repository->find($id);
        if(!$person){
            return redirect()->back();
        }
        return view('admin.pages.people.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePerson  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePerson $request, $id)
    {
        $person = $this->repository->find($id);
        if(!$person){
            return redirect()->back();
        }
        //dd($request->all());
        $person->update( $request->all() );

        return redirect()->route('people.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = $this->repository->find($id);
        if(!$person){
            return redirect()->back();
        }

        $person->delete();

        return redirect()->route('people.index');
    }

    public function search(Request $request)
    {
        
        $filters = $request->only('filter');

        $people = $this->repository
                            ->where(function($query) use ($request){
                                if($request->filter){
                                    $query->where('name', 'like', "%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.people.index', compact('people', 'filters'));
    }

    public function apiPostal(string $postal)
    {
        $output = $this->addressService->apiPostal($postal);
        //dd($output);
        return $output;
    }
}
