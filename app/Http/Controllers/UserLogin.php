<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request, DB;

class UserLogin extends Controller
{
    // logIn
    public function login(Request $req)
    {
        $userInfo = DB::table('user_table')
        ->where('email','=', $req->email)
        ->where('password','=', $req->password)
        ->first();

        if($userInfo)
        {
            if($userInfo->password == $req->password)
            {
                DB::table('login_activity')->insert([
                    'user_id' => $req->email,
                    'activity_type' => 1
                ]);
                session()->put('userId', $userInfo->email);
                session()->put('userName', $userInfo->username);
                session()->put('userType', $userInfo->user_type);
                session()->put('theme', $userInfo->theme);
                return true;
            }
            else
            { 
                return false;
            }
        }
        else{
            return false;
        }
    }
}
