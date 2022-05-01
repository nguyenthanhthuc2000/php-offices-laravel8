@extends('layout')

@section('title', 'Danh sách người dùng')
@section('content')
    <div class="header-table mb-3 d-flex justify-content align-center">
        <a class="btn btn-primary" href="{{ route('register') }}">
            <i class="fa-solid fa-plus"></i> Thêm mới
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lstUsers as $index => $user)
                    <tr>
                        <th scope="row">{{ ++$index }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ getNameRole($user->role) }}</td>
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
    </div>
@endsection
