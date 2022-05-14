<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    private $model;
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index (){

        $teachers = $this->model->where('role', '2')->paginate(8);
        return view('pages.teacher.index', compact('teachers'));
    }


    public function create(){
        return view('pages.teacher.register');
    }

    public function edit ($id) {
        $user_id = Auth::id();
        $lstEthnic  = DB::table('ethnic')->get();
        if(getRole() == 2 || getRole() == 1) {
            $user_id = $id;
        }
        $teacher = $this->model->find($user_id);

        return view('pages.teacher.edit', compact('teacher', 'lstEthnic'));
    }
}
