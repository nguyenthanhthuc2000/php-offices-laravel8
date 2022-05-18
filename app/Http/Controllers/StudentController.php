<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\User;
use App\Models\ClassList;
use App\Models\Faculty;
use Illuminate\Support\Facades\Auth;
class StudentController extends Controller
{
    private $model;
    private $class;
    public function __construct(User $user, ClassList $class, Faculty $faculty)
    {
        $this->model = $user;
        $this->class = $class;
        $this->faculty = $faculty;
    }

    public function index (Request $request){
        $students =
            $this->model
            ->FilterEmail($request)
            ->Info($request)
            ->where('role', '3')
            ->select('users.*')
            ->paginate(8);
        $students->appends(['email' => $request->email]);
        $students->appends(['class_id' => $request->class_id]);
        $students->appends(['faculty_id' => $request->faculty_id]);

        $class = $this->class->get();
        $faculty = $this->faculty->get();


        return view('pages.student.index', compact('students', 'class', 'faculty'));
    }

    public function create(){
        return view('pages.student.register');
    }

    public function profile () {
        $student_id = Auth::id();
        if(getRole() == 2 || getRole() == 1) {
            $student_id = $id;
        }
        $student = $this->model->find($student_id);

        return view('pages.student.detail', compact('student'));
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
