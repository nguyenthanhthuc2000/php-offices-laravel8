@extends('layout')
@section('title', 'Danh sách lớp học')
@section('content')

<div  style="background-color: #fff;border-radius: 5px;margin: 0;      padding: 10px;">
    <div style="display: flex; align-items: center; justify-content: space-between">
        <h4>Danh sách khoa</h4>
        @if (getRole() == IS_ADMIN)
        <a href="{{ route('faculty.create') }}" class="btn btn-primary btn-blue" style="border-radius: 25px;"><i class="fa-solid fa-plus"></i> Thêm mới</a>
        @endif
    </div>
    @if(session()->has('message'))
    <br>
        <div class="alert alert-success" role="alert"
         style="justify-content: center">
        <strong>{{ session()->get('message') }}</strong>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên khoa</th>
                <th scope="col">Kí hiệu</th>
                <th scope="col" class="text-end">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @php
                $no = getNo($faculties->perPage(), $faculties->currentPage());
            @endphp
            @if($faculties->count() > 0)
                @foreach($faculties as $f)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{$f->name}}</td>
                        <td>{{$f->sign}}</td>
                        <td class="text-end">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a  class="btn btn-mute text-warning" title="Chỉnh sửa" href={{ route('faculty.edit', $f->id) }}>
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                                <button class="btn btn-mute text-danger" title="Xóa" type="button">
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
        {{$faculties->links()}}
    </div>
</div>
@endsection
