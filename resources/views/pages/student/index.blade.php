@extends('layout')
@section('title', 'Danh sách sinh viên')
@section('content')
    <div style="background-color: #fff;border-radius: 5px;margin: 0;   padding: 10px;">
        <div class="mb-3">
            <form >
                <div class="row">
                    <div class="col-md-3 mt-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Chọn lớp</option>
                            <option value="1">Quản trị mạng 18C</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-2">
                        <div  class="d-flex w-100" >
                            <input class="form-control" type="search" placeholder="Nhập thông tin tìm kiếm..." aria-label="Search">
                        </div>
                    </div>
                    <div class="col-md-1 mt-2">
                        <button class="btn btn-outline-success" type="submit" style="border-radius: 25px;"><i class="fa-solid fa-magnifying-glass" ></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div style="display: flex; align-items: center; justify-content: space-between">
            <h4>Danh sách sinh viên</h4>
            <a href="{{ route('register') }}" class="btn btn-primary btn-blue" style="border-radius: 25px;"><i class="fa-solid fa-plus"></i> Thêm mới</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mã số SV</th>
                    <th scope="col">Lớp</th>
                    <th scope="col">Niên khóa</th>
                    <th scope="col" class="text-end">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $no = getNo($students->perPage(), $students->currentPage());
                @endphp
                @if($students->count() > 0)
                    @foreach($students as $student)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->info->student_code}}</td>
                            <td>{{$student->info->class->name}}</td>
                            <td>{{$student->info->schoolYear->name}}</td>
                            <td class="text-end">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-mute text-warning" type="button">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </button>
                                    <button class="btn btn-mute text-danger" type="button">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5">
                            <h6>Không có dữ liệu</h6>
                        </th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div style="display: flex;justify-content: end;">
            {{$students->links()}}
        </div>
    </div>
@endsection
