@extends('layout')

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Email</th>
                <th scope="col">Mã số SV</th>
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
                        <h5>Không có dữ liệu</h5>
                    </th>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <div style="display: flex;justify-content: end;">
        {{$students->links()}}
    </div>
@endsection
