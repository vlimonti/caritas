<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use TenantTrait;

    protected $fillable = ['name', 'url', 'description'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Products not linked with this basket
    */
    public function productsAvailable( $filter = null )
    {
        $products = Product::whereNotIn('products.id', function($query){
            $query->select('basket_product.product_id');
            $query->from('basket_product');
            $query->whereRaw("basket_product.basket_id = {$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('products.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $products;
    }
}
