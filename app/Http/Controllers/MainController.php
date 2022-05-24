<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;

class MainController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }
    public function index(){
        return view('main', [
            'title' => 'Shop thời trang ABC',
            'sliders' => $this->slider->show(),
        ]);
    }
}
