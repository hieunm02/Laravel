<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductService;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }


    public function index($id = '', $slug = ''){
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);

        return view('product.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore,
            'reviews' => $this->productService->showReview($id),
        ]);
    }

    public function review(Request $request){
        $this->productService->review($request);
        return redirect()->back();
    }
}
