@extends('layout')

@section('title', 'CHỈNH SỬA NIÊN KHÓA')
@section('content')
    <div class="card border-0 shadow rounded-3 my-5 w-lg-50 mx-auto">
        <div class="card-body p-4 p-sm-5">
          <h3 class="card-title text-center text-uppercase">CHỈNH SỬA NIÊN KHÓA</h3></h3>
          <hr class="my-4">
          <form action="{{ route('school.year.update', $school_year->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="form-floating mb-3">
              <input type="text" class="form-control" value="{{ old('name') ?? $school_year->name }}" name="name" id="name" placeholder="Nhập niên khóa" required>
              <label for="name">Niên khóa </label>
              @error('name')
                <div class="invalid-text">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="justify-content-center text-center">
              <button class="btn btn-primary text-uppercase fw-bold" type="submit">Lưu</button>
              <a class="btn btn-primary text-uppercase fw-bold" href={{ route('school.year.index') }}>Quay lại</a>
            </div>
          </form>
        </div>
      </div>
@endsection
