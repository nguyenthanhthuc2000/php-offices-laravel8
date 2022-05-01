@extends('layout')

@section('title', 'Đăng ký')
@section('content')
    <div class="card border-0 shadow rounded-3 my-5 w-lg-50 mx-auto">
        <div class="card-body p-4 p-sm-5">
        <h3 class="card-title text-center text-uppercase">Tạo mới</h3>
        <hr class="my-4">
        <form action="{{ route('register.post') }}" method="POST" class="needs-validation" novalidate>
            @method('post')
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="floatingName" placeholder="Họ tên" required>
                <label for="floatingName">Họ tên</label>
                @if ($errors->name)
                <div class="invalid-text">
                    {{ $errors->first('name') }}
                </div>
                @endif
            </div>
            <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="name@example.com" required>
            <label for="floatingEmail">Email</label>
            @if ($errors->email || $errors->has('email'))
                <div class="invalid-text">
                    {{ $errors->first('email') }}
                </div>
            @endif
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Mâth khẩu" name="password" required>
                <label for="floatingPassword">Mật khẩu</label>
                @if ($errors->password)
                    <div class="invalid-text">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Xác nhận mật khẩu" name="password_confirm" required>
                <label for="floatingPassword">Xác nhận mật khẩu</label>
                @if ($errors->password_confirm)
                    <div class="invalid-text">
                        {{ $errors->first('password_confirm') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <select name="role" class="form-select">
                    <option lable="Chọn vai trò">Chọn vai trò</option>
                    @foreach (config('role') as $key => $role)
                        <option value="{{ $key }}">{{ $role }}</option>
                    @endforeach
                </select>
                @if ($errors->role)
                    <div class="invalid-text">
                        {{ $errors->first('role') }}
                    </div>
                @endif
            </div>
            <div class="d-grid justify-content-center">
                <button class="btn btn-primary text-uppercase fw-bold" type="submit">Thêm mới</button>
            </div>
        </form>
        </div>
    </div>
@endsection
