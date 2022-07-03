<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function googleredirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback(Request $request)
    {
        
        $userdata = Socialite::driver('google')->user();
        
            if($user = User::where('email', $userdata->email)->where('auth_type', 'google')->where('active', 1)->first()){
                Session::flash('error', 'Tài khoản của bạn đã bị khóa, vui lòng liên hệ với quản trị viên để được hỗ trợ!');
                return redirect('/user_login');
    
                exit();
            }

            $user = User::where('email', $userdata->email)->where('auth_type', 'google')->where('active', 0)->first();

        if($user){
            //do login

            Auth::login($user);

            Session::put('user_name', $userdata->name);
            Session::put('user_email', $userdata->email);
            Session::put('user_id', $user->id);

            return redirect('/');
        }else{
            //register

            $uuid = Str::uuid()->toString();

            $user = new User();
            $user->name = $userdata->name;
            $user->email = $userdata->email;
            $user->password = Hash::make($uuid.now());
            $user->auth_type = 'google';
            $user->role = 2;
            $user->save();

            Auth::login($user);

            Session::put('user_name', $userdata->name);
            Session::put('user_email', $userdata->email);
            Session::put('user_id', $user->id);

            return redirect('/');

        }

    }   
}
