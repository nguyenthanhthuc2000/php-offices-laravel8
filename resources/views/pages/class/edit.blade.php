@extends('layout')

@section('title', 'CHỈNH SỬA LỚP')
@section('content')
    <div class="card border-0 shadow rounded-3 my-5 w-lg-50 mx-auto">
        <div class="card-body p-4 p-sm-5">
          <h3 class="card-title text-center text-uppercase">CHỈNH SỬA LỚP</h3></h3>
          <hr class="my-4">
          <form action="{{ route('class.update', $class->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="name" value="{{ old('name') ?? $class->name }}" placeholder="Nhập tên lớp" required>
              <label for="name">Tên lớp </label>
              @error('name')
                <div class="invalid-text">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" value="{{ old('sign') ?? $class->sign }}" placeholder="Nhập kí hiệu" name="sign" required>
              <label for="sign">Kí hiệu</label>
              @error('sign')
                <div class="invalid-text">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
              <select class="form-control" id="exampleFormControlSelect1" name='faculty_id'>
                <option value=''>---Chọn khoa---</option>
                @foreach($faculty as $f)
                <option value="{{ $f->id }}" {{ $f->id == $class->id ? 'selected' : ''}}>{{ $f->name }} - {{ $f->sign }} </option>
                @endforeach
              </select>
                @error('faculty_id')
                <div class="invalid-text">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="justify-content-center text-center">
              <button class="btn btn-primary text-uppercase fw-bold" type="submit">Lưu</button>
              <a class="btn btn-primary text-uppercase fw-bold" href={{ route('class.index') }}>Quay lại</a>
            </div>
          </form>
        </div>
      </div>
@endsection
