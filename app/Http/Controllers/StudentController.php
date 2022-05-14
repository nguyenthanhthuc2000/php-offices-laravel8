<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    private $model;
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index (){
        $students = $this->model->where('role', '3')->paginate(8);

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
