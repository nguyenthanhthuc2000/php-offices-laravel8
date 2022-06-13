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

    public function update (Request $request, $id) {
        $this->validate( $request,
            [
                'name' => [
                    'required',
                    'unique:App\Models\Faculty,name,'.$id,
                ],
                'sign' => [
                    'required',
                    'unique:App\Models\Faculty,sign,'.$id,
                ],
            ],
            [
                'name.required' => 'Tên khoa không để trống',
                'sign.required' => 'Kí hiệu không được bỏ trống'
            ]
        );

        $data = [
            'name' => $request->name,
            'sign' => $request->sign
        ];
        $query = $this->model->where('id', $id)->update($data);
        if($query) {
            return redirect()->route('faculty.index')->with('message', 'Cập nhật thành công!');
        }
        return redirect()->route('faculty.index')->with('message', 'Cập nhật thất bại!');
    }

    public function store (Request $request) {
        $this->validate( $request,
            [
                'name' => [
                    'required',
                    'unique:App\Models\Faculty,name',
                ],
                'sign' => [
                    'required',
                    'unique:App\Models\Faculty,sign',
                ],
            ],
            [
                'name.required' => 'Tên khoa không để trống',
                'sign.required' => 'Kí hiệu không được bỏ trống'
            ]
        );

        $data = [
            'name' => $request->name,
            'sign' => $request->sign
        ];
        $query = $this->model->insert($data);
        if($query) {
            return redirect()->route('faculty.index')->with('message', 'Thêm mới thành công!');
        }
        return redirect()->route('faculty.index')->with('message', 'Thêm mới thất bại!');
    }

    public function create () {

        return view('pages.faculty.add');
    }

    public function edit ($id) {
        $faculty = $this->model->where('id', $id)->first();
        if($faculty) {

            return view('pages.faculty.edit', compact('faculty'));
        }
        return back();
    }

    public function index (){

        $faculties = $this->model->orderBy('id', 'DESC')->paginate(8);
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

    public function delete($id){
        $faculty = $this->model->find($id);
        if (!$faculty){
            return back()->withErrors(['errorUpdate' => 'Xóa thất bại.']);
        }

        if($faculty->delete()){
            return back()->with(['deleteSuccess' => 'Xóa thành công.']);
        }

    }
}
