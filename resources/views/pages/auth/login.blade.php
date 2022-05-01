@extends('layout')

@section('title', 'Đăng nhập')
@section('content')
    <div class="card border-0 shadow rounded-3 my-5 w-lg-50 mx-auto">
        <div class="card-body p-4 p-sm-5">
          <h3 class="card-title text-center text-uppercase">Đăng nhập</h3>
          <hr class="my-4">
          <form action="{{ route('login.post') }}" method="POST" class="needs-validation" novalidate>
            @method('post')
            @csrf

            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="name@example.com" required>
              <label for="floatingEmail">Email</label>
              @if ($errors->email)
                <div class="invalid-text">
                    {{ $errors->first('email') }}
                </div>
              @endif
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Mật khẩu" name="password" required>
              <label for="floatingPassword">Mật khẩu</label>
              @if ($errors->password)
                <div class="invalid-text">
                    {{ $errors->first('password') }}
                </div>
              @endif
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" name="remember" id="rememberPasswordCheck">
              <label class="form-check-label" for="rememberPasswordCheck">
                Nhớ mật khẩu
              </label>
            </div>
            @if ($errors->has('userNotExist'))
              <div class="invalid-text mb-3">
                  {{ $errors->first('userNotExist') }}
              </div>
            @endif
            <div class="d-grid justify-content-center">
              <button class="btn btn-primary text-uppercase fw-bold" type="submit">Đăng nhập</button>
            </div>
          </form>
        </div>
      </div>
@endsection
