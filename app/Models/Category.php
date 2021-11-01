<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use TenantTrait;

    protected $fillable = ['name', 'url', 'description'];

    public function musics()
    {
        return $this->belongsToMany(Music::class);
    }

    /**
     * Musics not linked with this category
    */
    public function musicsAvailable( $filter = null )
    {
        $musics = Music::whereNotIn('musics.id', function($query){
            $query->select('category_music.music_id');
            $query->from('category_music');
            $query->whereRaw("category_music.category_id = {$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('musics.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $musics;
    }
}
