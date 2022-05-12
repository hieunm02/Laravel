<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }


    public function create(){
        return view('admin.slider.add', [
            'title' => 'Thêm mới slider',
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required',
        ]);

        $this->slider->insert($request);

        return redirect()->back();
    }

    public function index(){
        return view('admin.slider.list', [
            'title' => 'Danh sách slider',
            'sliders' => $this->slider->get(),
        ]);
    }

    public function destroy(Request $request){
        $result = $this->slider->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => "Xóa slider thành công",
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => "Xóa slider không thành công",
        ]);
    }

    public function show(Slider $slider){
        return view('admin.slider.edit', [
            'title' => 'Cập nhật slider',
            'slider' => $slider,
        ]);
    }

    public function update(Request $request, Slider $slider){
        $result = $this->slider->update($request, $slider);

        if($result){
            return redirect('/admin/sliders/list');
        }
        return redirect()->back();

    }
}
