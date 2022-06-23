<?php

namespace App\Http\View\Composers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartComposer 
{
   
    public function __construct()
    {
    }
 
    
    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if(is_null($carts)) {
            $products =[];
        }
        else{
            $productId = array_keys($carts);
            $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
                            ->where('active', 0)
                            ->whereIn('id', $productId)
                            ->get();
            }
        $view->with('products', $products);

        
    }
}