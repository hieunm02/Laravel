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
}
