<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
            'level' => 2 //Tai khoan khach hang
        ];

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return 'Success';
        }
        else {
            return 'Fail';
        }
    }
}
