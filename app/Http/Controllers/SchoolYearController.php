<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    private $model;
    public function __construct(SchoolYear $year)
    {
        $this->model = $year;
    }

    public function index (){

        $years = $this->model->paginate(8);
        return view('pages.school_years.index', compact('years'));
    }
}
