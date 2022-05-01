<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    private $model;
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function listStudent (){

        $students = $this->model->where('role', '3')->paginate(10);
        return view('pages.student.index', compact('students'));
    }
}
