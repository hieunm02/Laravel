<?php
namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

    class ProductService 
    {
        public function getMenu(){
            return Menu::where('active', 0)->get();
        }

        protected function isValidPrice($request){
            if($request->input('price') != 0 && $request->input('price_sale') != 0 && $request->input('price_sale') >= $request->input('price'))
            {
                Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
                return false;
            }

            if($request->input('price_sale') != 0 && $request->input('price') == 0)
            {
                Session::flash('error', 'Vui lòng nhập giá gốc');
                return false;
            }

            return true;
        }

        public function insert($request){
            $isValidPrice = $this->isValidPrice($request);
            if($isValidPrice == false) return false;
            
            try{
                $request->except('_token');
                Product::create($request->all());
                Session::flash('success', 'Thêm mới thành công');
            } catch (\Exception $err) {
            Session::flash('error', 'Lỗi thêm mới sản phẩm');
                Log::info($err->getMessage());
                return false;
            }
            return true;
        }

        public function get(){
            return Product::with('menu')
            ->orderByDesc('id')->paginate(15);
        }

        public function update($request, $product)
        {
            $isValidPrice = $this->isValidPrice($request);
            if($isValidPrice == false) return false;

            try{
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Cập nhật thành công');

            } catch (\Exception $err) {
                Session::flash('error', 'Lỗi cập nhật sản phẩm');
                Log::info($err->getMessage());
                return false;
            }
            
            return true;
        }
        
        public function delete($request)
        {
            $product = Product::where('id', $request->input('id'))->first();
            if($product){
                $product->delete();
                return true;
            }

            return false;
        }

        public function show($id){
            return Product::where('id', $id)
                            ->where('active', 0)
                            ->with('menu')
                            ->firstOrFail();
        }

        public function more($id){
            return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
                            ->where('active', 0)
                            ->where('id', '!=', $id)
                            ->limit(8)
                            ->get();
        }

        public function review($request){
            try {
                ProductReview::create($request->all());
                Session::flash('success', 'Đánh giá thành công');
            } catch (\Exception $err) {
                Session::flash('error', "Đánh giá không thành công");
                Log::info($err->getMessage());
                return false;
            }               
            return true;
        }

        public function showReview($id){
            return DB::table('product_reviews')
                        ->join('users', 'users.id', '=', 'product_reviews.user_id')
                        ->where('product_id', $id)
                        ->select('product_reviews.content as content', 'users.name as user_name', 'product_reviews.created_at as created_at')
                        ->get();

        }
    }
?>