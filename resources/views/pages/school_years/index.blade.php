@extends('layout')
@section('title', 'Niên khóa')
@section('content')

<div  style="background-color: #fff;border-radius: 5px;margin: 0;      padding: 10px;">
    <div style="display: flex; align-items: center; justify-content: space-between">
        <h4>Danh niên khóa</h4>
        @if (getRole() == IS_ADMIN)
        <a href="#" class="btn btn-primary btn-blue" style="border-radius: 25px;"><i class="fa-solid fa-plus"></i> Thêm mới</a>
        @endif
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Niên khóa</th>
                <th scope="col" class="text-end">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @php
                $no = getNo($years->perPage(), $years->currentPage());
            @endphp
            @if($years->count() > 0)
                @foreach($years as $y)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{$y->name}}</td>
                        <td class="text-end">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-mute text-warning" title="Chỉnh sửa" type="button">
                                    <i class="fa-solid fa-user-pen"></i>
                                </button>
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
        {{$years->links()}}
    </div>
</div>
@endsection
