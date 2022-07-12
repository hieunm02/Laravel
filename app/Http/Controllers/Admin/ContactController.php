<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderbyDesc('id')->paginate(20);

        return view('admin.contact.list', [
            'title' => 'Danh sách liên hệ của người dùng',
            'contacts' => $contacts
        ]);
    }
}
