<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return 'list user';
    }

    public function create(){
        return view('pages.auth.register');
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'email' => 'bail|required|email',
                'password' => 'required',
                'password_confirm' => 'bail|required|same:password',
                'role' => 'required',
            ],
            [
                '*.required' => ':attribute không được bỏ trống.',
                'email.email' => ':attribute không đúng định dạng',
                'password_confirm.same' => ':attribute không trùng khớp với Mật khẩu'
            ],
            [
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'password_confirm' => 'Mật khẩu xác nhận',
                'role' => 'Vài trò',
            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];

        $user = User::where('email', $data['email'])->first('email');

        if($user) {
            return back()->withErrors(['email' => 'Email đã tồn tại.']);
        }

        if(User::create($data)){
            return redirect()->route('listStudent');
        }
    }

    public function edit($id){
        return $id;
    }

    public function update(Request $request, $id){}

    public function delete($id){}

    public function changeStatus($id){}
}
