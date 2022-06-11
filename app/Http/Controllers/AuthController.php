<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpWord\Writer\Word2007\Part\Rels;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index(){
        return view('pages.auth.login');
    }

    public function changePassword(){
        return view('pages.auth.change_password');
    }


    public function updatePassword (Request $request) {
        $this->validate( $request,
            [
                'current_password' => 'required',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password',
            ],
            [
                'current_password.required' => 'Mật khẩu cũ không được để trống',
                'new_password.required' => 'Mật khẩu mới không được để trống',
                'confirm_password.required' => 'Mật khẩu xác nhận không để trống',
                'confirm_password.same' => 'Mật khẩu xác nhận không đúng',
            ]
        );
        if (Hash::check($request->current_password, Auth::user()->password))
        {
            $update = DB::table('users')->where('id', Auth::id())->update(['password' => Hash::make($request->new_password)]);
            if($update){
                $request->session()->flush();
                Auth::logout();
                return redirect()->route('login')->with('updatePasswordSuccess', 'Đổi mật khẩu thành công, vui lòng đăng nhập lại!');
            }
            return back()->with('updatePasswordError', 'Lỗi, vui lòng thử lại!');
        }
        return back()->with('updatePasswordError', 'Sai mật khẩu hiện tại!');
    }

    public function login(Request $request){
        $remember = $request->remember ? true : false;

        $credentials = $this->validate($request,
        [
            'email' => ['bail', 'required', 'email'],
            'password' => ['bail', 'required'],
        ],
        [
            'email.required' => 'Emai không được bỏ trống.',
            'email.email' => 'Emai không đúng định dạng.',
            'password.required' => 'Mật khẩu không được bỏ trống.'
            ]
        );

        if (Auth::attempt($credentials, $remember)) {

                return redirect()->route('home');

        }

        return back()->withErrors(
            ['userNotExist' => 'Email hoặc mật khẩu không chính xác']
        )->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
