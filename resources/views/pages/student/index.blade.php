@extends('layout')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Email</th>
            <th scope="col">Mã số SV</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <th scope="row">1</th>
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->info->student_code}}</td>
                <td>
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
        </tbody>
    </table>
    <div style="display: flex;justify-content: end;">
        {{$students->links()}}
    </div>
@endsection
