<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    private $model;
    public function __construct(Faculty $faculty)
    {
        $this->model = $faculty;
    }


    public function index (){

        $faculties = $this->model->paginate(8);
        return view('pages.faculty.index', compact('faculties'));
    }
}
