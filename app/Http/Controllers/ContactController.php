<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact', [
            'title' => 'Liên hệ',
        ]);
    }

    public function post(Request $request)
    {
    try {
        Contact::create($request->all());
        Session::flash('success', "Đã liên hệ với quản trị viên, vui lòng chờ phản hồi!");
        return redirect()->back();
    } catch (\Exception $err) {
        Session::flash('error', "Liên hệ không thành công, hãy thử lại!");
    }        

    }
}
