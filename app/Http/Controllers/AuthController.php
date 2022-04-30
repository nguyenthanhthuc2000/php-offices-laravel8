<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $remember = $request->remember ? true : false;

        $credentials = $request->validate([
            'email' => ['bail', 'required', 'email'],
            'password' => ['bail', 'required'],
        ],
        [
            'email.required' => 'Emai không được bỏ trống.',
            'email.email' => 'Emai không đúng định dạng.',
            'password.required' => 'Mâth khẩu không được bỏ trống.'
        ]
        );
        if (Auth::attempt($credentials, $remember)) {
            return route('dashboard');
        }

        return back()->withErrors([
            'err' => 'Email hoặc mật khẩu không chính xác',
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
