<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if($result === false){
            return redirect()->back();
        }

        return redirect('/carts');
    }

    public function show(){

        $products = $this->cartService->getProduct();
        return view('cart.list', [
            'title' => 'Giỏ hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function update(Request $request){
        $this->cartService->update($request);
        return redirect('/carts');

    }

    public function remove($id = 0){
        $this->cartService->remove($id);
        return redirect('/carts');

    }

    public function addCart(Request $request){
        $this->cartService->addCart($request);
        return redirect()->back();

    }

    public function order(Customer $customer){
        return view('order', [
            'title' => 'Đơn hàng' . $customer->name,
            'customer' => $customer,
            'carts' => $customer->carts()->with('product')->get(),
        ]);
    }
}
