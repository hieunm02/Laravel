<?php
    namespace App\Http\Services;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

    class CartService {
        public function create($request)
        {
            $qty = (int)$request->input('num_product');
            $product_id = (int)$request->input('product_id');

            if( $qty <= 0 || $product_id <= 0){
                Session::flash('error', 'Hãy chọn ít nhất một sản phẩm!');
                return false;
            }

            $carts = Session::get('carts');
            if (is_null($carts)) {
                Session::put('carts', [
                    $product_id => $qty
                ]);
                return true;
            }

            $exists = Arr::exists($carts, $product_id);
            if($exists){
                $carts[$product_id] = $carts[$product_id] + $qty;
                Session::put('carts', $carts);
                return true;
            }

            $carts[$product_id] = $qty;
            Session::put('carts', $carts);

            return true;
        }

        public function getProduct(){
            $carts = Session::get('carts');
            if(is_null($carts)) return [];

            $productId = array_keys($carts);
            return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
                            ->where('active', 0)
                            ->whereIn('id', $productId)
                            ->get();
        }


        public function update($request){
            Session::put('carts', $request->input('num_product'));
            return true;

        }

        public function remove($id){
            $carts = Session::get('carts');
            unset($carts[$id]);
            
            Session::put('carts', $carts);
            return true;

        }

        public function addCart($request){
            try {
                DB::beginTransaction();
                $carts = Session::get('carts');
                if(is_null($carts)) 
                return false;

                $customer = Customer::create([
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'email' => $request->input('email'),
                    'content' => $request->input('content'),

                ]);

                $this->infoProductCart($carts, $customer->id);
                
                DB::commit();
                Session::flash('success', 'Đặt hàng thành công');
                Session::forget('carts');
            } catch (\Exception $err) {
                DB::rollBack();
                Session::flash('error', 'Đặt hàng không thành công, vui lòng kiểm tra lại thông tin và thử lại!');
                return false;
            }
            return true;
        }

        protected function infoProductCart($carts, $customer_id){
            $productId = array_keys($carts);
            $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
                            ->where('active', 0)
                            ->whereIn('id', $productId)
                            ->get();

            $data = [];
            foreach($products as $product){
                $data[] = [
                    'customer_id' => $customer_id,
                    'product_id' => $product->id,
                    'qty' => $carts[$product->id],
                    'price' => $product->price_sale != 0 ? $product->price_sale : $product->price,
                ];
            }

            return Cart::insert($data);
        }
    }
?>