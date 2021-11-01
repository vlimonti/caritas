<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Music;
use Illuminate\Http\Request;

class CategoryMusicController extends Controller
{
    protected $music, $category;

    public function __construct(Music $music, Category $category)
    {
        $this->music    = $music;
        $this->category = $category;
        $this->middleware(['can:musics']);
    }

    public function categories(Request $request, $idMusic)
    {   
        if( !$music = $this->music->find($idMusic) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $categories = $music->categories()->paginate();

        return view('admin.pages.musics.categories.index', compact('music', 'categories'));
    }


    public function categoriesAvailable(Request $request, $idMusic)
    {   
        if( !$music = $this->music->find($idMusic) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');
        
        $categories = $music->categoriesAvailable( $request->filter);

        return view('admin.pages.musics.categories.available', compact('music', 'categories', 'filters'));
    }


    public function attachCategoriesMusic(Request $request, $idMusic)
    {   
        if( !$music = $this->music->find($idMusic) )
        {
            return redirect()->back();
        }

        if( !$request->categories || count($request->categories) == 0 )
        {
            return redirect()
                        ->back()
                        ->with('info', 'A seleção de pelo menos uma categoria é obrigatório!');
        }

        $music->categories()->attach($request->categories);

        return redirect()->route('musics.categories', $music->id);
    }


    public function  detachCategoryMusic($idMusic, $idCategory)
    {
        $music = $this->music->find($idMusic);
        $category = $this->category->find($idCategory);

        if(!$music || !$category) {
            return redirect()->back();
        }

        $music->categories()->detach($category);

        return redirect()->route('musics.categories', $music->id);
    }
    

    public function musics(Request $request, $idCategory)
    {   
        if( !$category = $this->category->find($idCategory) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $musics = $category->musics()->paginate();

        return view('admin.pages.categories.musics.index', compact('category', 'musics'));
    }


    public function musicsAvailable(Request $request, $idCategory)
    {   
        if( !$category = $this->category->find($idCategory) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');
        
        $musics = $category->musicsAvailable( $request->filter);

        return view('admin.pages.categories.musics.available', compact('category', 'musics', 'filters'));
    }


    public function attachMusicsCategory(Request $request, $idCategory)
    {   
        if( !$category = $this->category->find($idCategory) )
        {
            return redirect()->back();
        }

        if( !$request->musics || count($request->musics) == 0 )
        {
            return redirect()
                        ->back()
                        ->with('info', 'A seleção de pelo menos uma música é obrigatório!');
        }

        $category->musics()->attach($request->musics);

        return redirect()->route('categories.musics', $category->id);
    }


    public function  detachMusicCategory($idCategory, $idMusic)
    {
        $music = $this->music->find($idMusic);
        $category = $this->category->find($idCategory);

        if(!$music || !$category) {
            return redirect()->back();
        }

        $category->musics()->detach($music);

        return redirect()->route('categories.musics', $category->id);
    }
}
