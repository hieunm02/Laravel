<?php
    namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
    class MenuService
    {
        public function getParent(){
            return Menu::where('parent_id', 0)->get();
        }

        public function getAll(){
            return Menu::orderbyDesc('id')->paginate(20);
        }

        public function create($request){
            try {
                Menu::create([
                    'name' => (string) $request->input('name'),
                    'parent_id' => (int) $request->input('parent_id'),
                    'description' => (string) $request->input('description'),
                    'content' => (string) $request->input('content'),
                    'thumb' => (string) $request->input('thumb'),
                    'active' => (string) $request->input('active'),
                    'slug' => Str::slug($request->input('name'), '-')
                ]);

                Session::flash('success', 'Tạo danh mục thành công');
            } catch (\Exception $err) {
                Session::flash('error', $err->getMessage());
                return false;
            }

            return true;
        }

        public function destroy($request){
            $id = $request->input('id');

            $menu = Menu::where('id', $id)->first();
            if($menu){
                return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
            }
            return false;
        }

        public function update($request, $menu) : bool
        {
            // $menu->fill($request->input());

            if($request->input('parent_id') != $menu->id){
                $menu->parent_id = (int) $request->input('parent_id');
            }
            $menu->name = (string) $request->input('name');
            $menu->description = (string) $request->input('description');
            $menu->content = (string) $request->input('content');
            $menu->active = (string) $request->input('active');
            $menu->thumb = (string) $request->input('thumb');

            $menu->save();

            Session::flash('success','Cập nhật danh mục thành công !');
            return true;
        }

        public function show(){
            return Menu::where('parent_id', '!=' , 0)->get();
        }

        public function getId($id)
        {
            return Menu::where('id', $id)->where('active', 0)->firstOrFail();

        }

        public function getProduct($menu)
        {
            return $menu->products()->select('id', 'name', 'price', 'price_sale', 'thumb')
                        ->where('active', 0)
                        ->orderbyDesc('id')
                        ->paginate(12);
        }
    }

?>