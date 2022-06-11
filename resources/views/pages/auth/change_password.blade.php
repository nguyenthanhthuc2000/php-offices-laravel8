@extends('layout')

@section('title', 'Đổi mật khẩu')
@section('content')
    <div class="card border-0 shadow rounded-3 my-5 w-lg-50 mx-auto">
        <div class="card-body p-4 p-sm-5">
          <h3 class="card-title text-center text-uppercase">ĐỔI MẬT KHẨU</h3></h3>
          <hr class="my-4">
          @if(session()->has('updatePasswordError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert"
               style="justify-content: center">
              <strong>{{ session()->get('updatePasswordError') }}</strong>
              </div>
          @endif
          <form action="{{ route('password.update') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="current_password" id="floatingPass" placeholder="name@example.com" required>
              <label for="floatingPass">Mật khẩu hiện tại</label>
              @error('current_password')
                <div class="invalid-text">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassNew" placeholder="Nhập mật khẩu mới" name="new_password" required>
              <label for="floatingPassNew">Mật khẩu mới</label>
              @error('new_password')
                <div class="invalid-text">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassNew" placeholder="Nhập mật khẩu xác nhận" name="confirm_password" required>
              <label for="floatingPassNew">Mật xác nhận</label>
              @error('confirm_password')
                <div class="invalid-text">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="d-grid justify-content-center">
              <button class="btn btn-primary text-uppercase fw-bold" type="submit">Thay đổi</button>
            </div>
          </form>
        </div>
      </div>
@endsection
