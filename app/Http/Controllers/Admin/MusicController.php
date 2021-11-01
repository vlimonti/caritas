<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMusic;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{
    private $repository;

    public function __construct(Music $music)
    {
        $this->repository = $music;

        $this->middleware(['can:musics']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $musics = $this->repository->paginate();

        return view('admin.pages.musics.index', compact('musics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.musics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateMusic  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMusic $request)
    {
        $data = $request->all();

        $tenant = auth()->user()->tenant;

        if($request->hasFile('archive') && $request->archive->isValid()) { 
            $data['archive'] = $request->archive->store("tenants/{$tenant->uuid}/musics");
        }

        $this->repository->create($data);

        return redirect()->route('musics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $music = $this->repository->find($id);
        if(!$music){
            return redirect()->back();
        }

        $categories = $music->categories()
                            ->paginate();

        return view('admin.pages.musics.show', compact('music', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $music = $this->repository->find($id);
        if(!$music){
            return redirect()->back();
        }
        return view('admin.pages.musics.edit', compact('music'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateMusic  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateMusic $request, $id)
    {
        if(!$music = $this->repository->find($id)){
            return redirect()->back();
        }

        $data = $request->all();
        //$data = $request->only(['name', 'description', 'price']);

        $tenant = auth()->user()->tenant;

        if($request->hasFile('archive') && $request->archive->isValid()){          
            if (Storage::exists($music->archive)) {
                Storage::delete($music->archive);
            }  
            $data['archive'] = $request->archive->store("tenants/{$tenant->uuid}/musics");
        }
        $music->update( $data );

        return redirect()->route('musics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $music = $this->repository->find($id);
        if(!$music){
            return redirect()->back();
        }

        if (Storage::exists($music->archive)) {
            Storage::delete($music->archive);
        }  

        $music->delete();

        return redirect()->route('musics.index');
    }

    public function search(Request $request)
    {
        
        $filters = $request->only('filter');

        $musics = $this->repository
                            ->where(function($query) use ($request){
                                if($request->filter){
                                    $query->where('name', 'like', "%{$request->filter}%");
                                    $query->orWhere('description', 'like', "%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.musics.index', compact('musics', 'filters'));
    }
}
