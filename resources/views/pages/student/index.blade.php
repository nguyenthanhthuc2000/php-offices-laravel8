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
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div style="display: flex;justify-content: end;">
        {{$students->links()}}
    </div>
@endsection
