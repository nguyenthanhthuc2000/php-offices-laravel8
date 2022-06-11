<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\ClassList;

class FacultyController extends Controller
{
    private $model;
    private $class;
    public function __construct(Faculty $faculty, ClassList $class)
    {
        $this->model = $faculty;
        $this->class = $class;
    }


    public function index (){
        $faculties = $this->model->paginate(8);
        return view('pages.faculty.index', compact('faculties'));
    }

    public function getFaculty($id_faculty){
        $class_list = '';
        if($id_faculty === 0){
            return $class_list;
        }
        $class_list = $this->class->where('faculty_id', $id_faculty)->get();
        return json_decode($class_list);
    }
}
