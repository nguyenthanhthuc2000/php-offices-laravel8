<?php

namespace App\Http\Controllers;

use App\Models\ClassList;
use Illuminate\Http\Request;

class ClassListController extends Controller
{
    private $model;
    public function __construct(ClassList $class)
    {
        $this->model = $class;
    }

    public function index (){

        $class = $this->model->paginate(8);
        return view('pages.class.index', compact('class'));
    }
}
