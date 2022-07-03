<?php

namespace App\Http\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserService
{
    public function get()
    {
        return User::where('role', 2)->orderbyDesc('id')->paginate(15);
    }

    public function lockAccount($request)
    {
        try{
            DB::table('users')->where('id', $request->input('user_id'))->update(['active' => $request->input('active')]);
            Session::flash('success', 'Đã khóa tài khoản!');

            } catch (\Exception $err) {
                Session::flash('error', 'Lỗi cập nhật trạng thái');
                Log::info($err->getMessage());
                return false;
            }
            
            return true;
    }

    public function unLockAccount($request)
    {
        try{
            DB::table('users')->where('id', $request->input('user_id'))->update(['active' => $request->input('active')]);
            Session::flash('success', 'Đã mở khóa tài khoản!');

            } catch (\Exception $err) {
                Session::flash('error', 'Lỗi cập nhật trạng thái');
                Log::info($err->getMessage());
                return false;
            }
            
            return true;
    }
}
?>