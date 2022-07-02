<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use App\Models\Cart;
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

    public function order($id, $menu = null){
        if(!is_null($menu)){
            $carts = Cart::where('user_id', $id)->where('status', $menu)->with('product')->orderbyDesc('id')->paginate(5);
        }else{
            $carts = Cart::where('user_id', $id)->with('product')->orderbyDesc('id')->paginate(5);
        }
        return view('order', [
            'title' => 'Đơn hàng',
            'orders' => $carts,
        ]);
    }

    public function updateOrder(Request $request, Cart $cartService){
        $this->cartService->updateStatus($request, $cartService);
        return redirect()->back();

    }
}
