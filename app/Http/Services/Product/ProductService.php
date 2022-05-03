<?php
namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

    class ProductService 
    {
        public function getMenu(){
            return Menu::where('active', 1)->get();
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
                \Log::info($err->getMessage());
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
                \Log::info($err->getMessage());
                return false;
            }
            
            return true;
        }
    }
?>