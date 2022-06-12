<?php

namespace App\Http\Controllers;

use App\Models\ClassList;
use Illuminate\Http\Request;
use App\Models\Faculty;

class ClassListController extends Controller
{
    private $model;
    public function __construct(ClassList $class)
    {
        $this->model = $class;
    }

    public function update (Request $request, $id) {
        $this->validate( $request,
            [
                'name' => [
                    'required',
                    'unique:App\Models\ClassList,name,'.$id,
                ],
                'sign' => [
                    'required',
                    'unique:App\Models\ClassList,sign,'.$id,
                ],
            ],
            [
                'name.required' => 'Tên lớp không để trống',
                'sign.required' => 'Kí hiệu không được bỏ trống'
            ]
        ); 

        $data = [
            'name' => $request->name,
            'sign' => $request->sign
        ];
        $query = $this->model->where('id', $id)->update($data);
        if($query) {
            return redirect()->route('class.index')->with('message', 'Cập nhật thành công!');
        }
        return redirect()->route('class.index')->with('message', 'Cập nhật thất bại!');
    }

    public function store (Request $request) {
        $this->validate( $request,
            [
                'name' => [
                    'required',
                    'unique:App\Models\ClassList,name',
                ],
                'sign' => [
                    'required',
                    'unique:App\Models\ClassList,sign',
                ],
                'faculty_id' => [
                    'required',
                    'exists:App\Models\Faculty,id'
                ],
            ],
            [
                'name.required' => 'Tên lớp không để trống',
                'sign.required' => 'Kí hiệu không được bỏ trống',
                'faculty_id.required' => 'Vui lòng chọn khoa'
            ]
        ); 

        $data = [
            'name' => $request->name,
            'sign' => $request->sign,
            'faculty_id' => $request->faculty_id
        ];
        $query = $this->model->insert($data);
        if($query) {
            return redirect()->route('class.index')->with('message', 'Thêm mới thành công!');
        }
        return redirect()->route('class.index')->with('message', 'Thêm mới thất bại!');
    }

    public function create () {
        $faculty =  Faculty::orderBy('id', 'DESC')->get();
        return view('pages.class.add', compact('faculty'));
    }

    public function edit ($id) {
        $class = $this->model->where('id', $id)->first();
        if($class) {
            $faculty =  Faculty::orderBy('id', 'DESC')->get();
            return view('pages.class.edit', compact('class', 'faculty'));
        }
        return back();
    }

    public function index (){

        $class = $this->model->orderBy('id', 'DESC')->paginate(8);
        return view('pages.class.index', compact('class'));
    }
}
