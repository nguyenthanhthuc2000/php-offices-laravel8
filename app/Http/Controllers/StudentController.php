<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    private $model;
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function listStudent (){

        $students = $this->model->where('role', '3')->paginate(8);
        return view('pages.student.index', compact('students'));
    }

    public function profile () {
        $auth_id = Auth::id();
        $student = $this->model->find($auth_id);
        return view('pages.student.profile', compact('student'));
    }
}
