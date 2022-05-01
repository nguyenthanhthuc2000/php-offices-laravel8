<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    public function listStudent (){
        $lstUsers = User::get();

        return view('pages.student.index', compact('lstUsers'));
    }
}
