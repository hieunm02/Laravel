<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    public function __construct(UserService $userService)
    {
        $this->user = $userService;
    }

    public function index()
    {
        return view('admin.users.list', [
            'title' => 'Danh sách tài khoản người dùng',
            'users' => $this->user->get(),
        ]);
    }

    public function lock(Request $request)
    {
        $this->user->lockAccount($request);
        return redirect()->back();
    }

    public function unLock(Request $request)
    {
        $this->user->unLockAccount($request);
        return redirect()->back();
    }
}
