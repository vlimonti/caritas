<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use TenantTrait;

    protected $table = 'musics';
    protected $fillable = ['name', 'author', 'url', 'archive', 'tone', 'music_link', 'description'];
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Categories not linked with this music
    */
    public function categoriesAvailable( $filter = null )
    {
        $categories = Category::whereNotIn('categories.id', function($query){
            $query->select('category_music.category_id');
            $query->from('category_music');
            $query->whereRaw("category_music.music_id = {$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('categories.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $categories;
    }
}
