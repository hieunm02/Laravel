<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SliderService
{
    public function insert($request){
        try {
            Slider::create($request->input());
            Session::flash('success', 'Thêm mới slider thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm mới slider không thành công !');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function get(){
        return Slider::orderbyDesc('id')->paginate(15);
    }

    public function delete($request){
        $slider = Slider::where('id', $request->input('id'))->first();

        if($slider){
            $slider->delete();
            return true;
        }
        return false;
    }

    public function update($request, $slider){
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Cập nhật slider thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật slider không thành công');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }
}
