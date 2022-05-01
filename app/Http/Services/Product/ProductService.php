<?php
namespace App\Http\Services\Product;

use App\Models\Menu;

    class ProductService 
    {
        public function getMenu(){
            return Menu::all();
        }
    }
?>