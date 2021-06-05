<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketProductController extends Controller
{
    protected $product, $basket;

    public function __construct(Product $product, Basket $basket)
    {
        $this->product    = $product;
        $this->basket = $basket;
        $this->middleware(['can:products']);
    }

    /**
     * Cestas que tenham o produto
    */
    public function baskets(Request $request, $idProduct)
    {   
        if( !$product = $this->product->find($idProduct) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $baskets = $product->baskets()->paginate();

        return view('admin.pages.products.baskets.index', compact('product', 'baskets'));
    }


    public function basketsAvailable(Request $request, $idProduct)
    {   
        if( !$product = $this->product->find($idProduct) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');
        
        $baskets = $product->basketsAvailable( $request->filter);

        return view('admin.pages.products.baskets.available', compact('product', 'baskets', 'filters'));
    }


    public function attachBasketsProduct(Request $request, $idProduct)
    {   
        if( !$product = $this->product->find($idProduct) )
        {
            return redirect()->back();
        }

        if( !$request->baskets || count($request->baskets) == 0 )
        {
            return redirect()
                        ->back()
                        ->with('info', 'A seleção de pelo menos uma cesta é obrigatório!');
        }

        $product->baskets()->attach($request->baskets);

        return redirect()->route('products.baskets', $product->id);
    }


    public function  detachBasketProduct($idProduct, $idBasket)
    {
        $product = $this->product->find($idProduct);
        $basket = $this->basket->find($idBasket);

        if(!$product || !$basket) {
            return redirect()->back();
        }

        $product->baskets()->detach($basket);

        return redirect()->route('products.baskets', $product->id);
    }
    
    
    /**
     * Produtos na cesta
    */

    public function products(Request $request, $idBasket)
    {   
        if( !$basket = $this->basket->find($idBasket) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $products = $basket->products()->paginate();

        return view('admin.pages.baskets.products.index', compact('basket', 'products'));
    }


    public function productsAvailable(Request $request, $idBasket)
    {   
        if( !$basket = $this->basket->find($idBasket) )
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');
        
        $products = $basket->productsAvailable( $request->filter);

        return view('admin.pages.baskets.products.available', compact('basket', 'products', 'filters'));
    }


    public function attachProductsBasket(Request $request, $idBasket)
    {   
        if( !$basket = $this->basket->find($idBasket) )
        {
            return redirect()->back();
        }

        if( !$request->products || count($request->products) == 0 )
        {
            return redirect()
                        ->back()
                        ->with('info', 'A seleção de pelo menos um produto é obrigatório!');
        }

        $basket->products()->attach($request->products);

        return redirect()->route('baskets.products', $basket->id);
    }


    public function  detachProductBasket($idBasket, $idProduct)
    {
        $product = $this->product->find($idProduct);
        $basket = $this->basket->find($idBasket);

        if(!$product || !$basket) {
            return redirect()->back();
        }

        $basket->products()->detach($product);

        return redirect()->route('baskets.products', $basket->id);
    }
}
