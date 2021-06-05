<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateBasket;
use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
 
    private $repository;

    public function __construct(Basket $basket)
    {
        $this->repository = $basket;
        $this->middleware(['can:baskets']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baskets = $this->repository->paginate();
        return view('admin.pages.baskets.index', compact('baskets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.baskets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateBasket  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateBasket $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('baskets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $basket = $this->repository->find($id);
        if(!$basket){
            return redirect()->back();
        }

        $products = $basket->products()->paginate();

        return view('admin.pages.baskets.show', compact('basket','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $basket = $this->repository->find($id);
        if(!$basket){
            return redirect()->back();
        }
        return view('admin.pages.baskets.edit', compact('basket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateBasket  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateBasket $request, $id)
    {
        $basket = $this->repository->find($id);
        if(!$basket){
            return redirect()->back();
        }
        //dd($request->all());
        $basket->update( $request->all() );

        return redirect()->route('baskets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $basket = $this->repository->find($id);
        if(!$basket){
            return redirect()->back();
        }

        $basket->delete();

        return redirect()->route('baskets.index');
    }

    public function search(Request $request)
    {
        
        $filters = $request->only('filter');

        $baskets = $this->repository
                            ->where(function($query) use ($request){
                                if($request->filter){
                                    $query->where('name', 'like', "%{$request->filter}%");
                                    $query->orWhere('description', 'like', "%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.baskets.index', compact('baskets', 'filters'));
    }
}
