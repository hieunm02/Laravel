<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login.form', [
            'title' => 'Đăng nhập',
        ]);
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

}
