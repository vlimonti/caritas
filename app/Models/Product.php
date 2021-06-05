<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use TenantTrait;

    protected $fillable = ['name', 'url', 'price', 'description'];

    public function baskets()
    {
        return $this->belongsToMany(Basket::class);
    }

    /**
     * Baskets not linked with this product
    */
    public function basketsAvailable( $filter = null )
    {
        $baskets = Basket::whereNotIn('baskets.id', function($query){
            $query->select('basket_product.basket_id');
            $query->from('basket_product');
            $query->whereRaw("basket_product.product_id = {$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('baskets.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $baskets;
    }
}
