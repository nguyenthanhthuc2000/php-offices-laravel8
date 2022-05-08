<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
