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

    public function update (Request $request, $id) {
        $this->validate( $request,
            [
                'name' => [
                    'required',
                    'unique:App\Models\SchoolYear,name,'.$id,
                ]
            ]
        ); 

        $data = [
            'name' => $request->name
        ];
        $query = $this->model->where('id', $id)->update($data);
        if($query) {
            return redirect()->route('school.year.index')->with('message', 'Cập nhật thành công!');
        }
        return redirect()->route('school.year.index')->with('message', 'Cập nhật thất bại!');
    }

    public function store (Request $request) {
        $this->validate( $request,
            [
                'name' => [
                    'required',
                    'unique:App\Models\SchoolYear,name',
                ],
            ]
        ); 

        $data = [
            'name' => $request->name,
        ];
        $query = $this->model->insert($data);
        if($query) {
            return redirect()->route('school.year.index')->with('message', 'Thêm mới thành công!');
        }
        return redirect()->route('school.year.index')->with('message', 'Thêm mới thất bại!');
    }

    public function create () {

        return view('pages.school_years.add');
    }

    public function edit ($id) {
        $school_year = $this->model->where('id', $id)->first();
        if($school_year) {
            return view('pages.school_years.edit', compact('school_year'));
        }
        return back();
    }

    public function index (){

        $years = $this->model->orderBy('id', 'DESC')->paginate(8);
        return view('pages.school_years.index', compact('years'));
    }
}
