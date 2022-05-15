<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    private $model;
    private $info;
    public function __construct(User $user, Info $info)
    {
        $this->model = $user;
        $this->info = $info;
    }

    public function index (Request $request){
        $students = $this->model->where('role', '3')->orderBy('created_at', 'desc');
        if($request->class && $request->class != ''){
            $students = $students->where('email','like', $request->email);
        }
        // if($request->email && $request->email != ''){
        //     $students = $this->info->where('class_id', $request->class)->st;
        // }

        $students = $students->paginate(8);
        return view('pages.student.index', compact('students'));
    }

    public function create(){
        return view('pages.student.register');
    }

    public function profile () {
        $student_id = Auth::id();
        $student = $this->model->find($student_id);

        return view('pages.student.profile', compact('student'));
    }

    public function detail ($id) {
        $student_id = Auth::id();
        if(getRole() == 2 || getRole() == 1) {
            $student_id = $id;
        }
        $student = $this->model->find($student_id);

        return view('pages.student.detail', compact('student'));
    }

    public function edit ($id) {
        $student_id = Auth::id();
        if(getRole() == 2 || getRole() == 1) {
            $student_id = $id;
        }
        $student = $this->model->find($student_id);

        return view('pages.student.edit', compact('student'));
    }
}
