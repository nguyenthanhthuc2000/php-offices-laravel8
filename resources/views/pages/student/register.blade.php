@extends('layout')

@section('title', 'Tạo mới sinh viên')
@section('content')
    <div class="card border-0 shadow rounded-3 my-5 mx-auto">
        <div class="card-body p-4 p-sm-5">
            <h3 class="card-title text-center text-uppercase">Tạo mới sinh viên</h3>
            <hr class="my-4">
            <form action="{{ route('register.post') }}" method="POST" class="needs-validation row" novalidate>
                @method('post')
                @csrf
                <div class="col-xl-4 mb-2">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold">Thông tin đăng nhập</span>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" name="name" placeholder="Họ tên" value="{{ old('name') }}" required>
                        @if ($errors->name)
                        <div class="invalid-text">
                            {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                        @if ($errors->email || $errors->has('email'))
                            <div class="invalid-text">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
                        @if ($errors->password)
                            <div class="invalid-text">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="password_confirm" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" name="password_confirm" required>
                        @if ($errors->password_confirm)
                            <div class="invalid-text">
                                {{ $errors->first('password_confirm') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb2">
                        <label for="password_confirm" class="form-label">Chọn vai trò</label>
                        <select name="role" class="form-select">
                                <option value="3" >Sinh viên</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="portlet-title mb-3">
                        <div class="caption">
                            <span class="caption-subject bold">Thông tin cá nhân</span>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group row mb-2">
                                            <div class="col-md-4">
                                                <label for="phone" class="form-label">Điện thoại:</label>
                                                <input type="number" name="phone" class="form-control" maxLength="10" value="{{ old('phone') }}" required>
                                                @if ($errors->phone)
                                                    <div class="text-danger">
                                                        {{ $errors->first('phone') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <label for="identity_card" class="form-label">Số CMND:</label>
                                                <input type='number' name="identity_card" class="form-control" maxLength="12" value="{{ old('identity_card') }}" required>
                                                @if ($errors->identity_card)
                                                    <div class="text-danger">
                                                        {{ $errors->first('identity_card') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <label for="code_student" class="form-label">MSSV: <small class="text-italic" style="font-size:0.75rem">(bỏ trống để tự động)</small></label>
                                                <input type="text" name="code_student" maxLength="10" class="form-control" value="{{ old('code_student') }}" >
                                                @if ($errors->student_code)
                                                    <div class="text-danger">
                                                        {{ $errors->first('code_student') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <div class="col-md-6">
                                                <label for="ethnic" class="form-label">Dân tộc:</label>
                                                <select class="form-select" aria-label="ethnic" name="ethnic" required>
                                                    <option label="Chọn dân tộc"></option>
                                                    @foreach (getEthnic() as $ethnic)
                                                        <option value="{{ $ethnic->id }}" {{ old('ethnic') == $ethnic->id ? 'selected' : '' }}>{{ $ethnic->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->ethnic)
                                                    <div class="text-danger">
                                                        {{ $errors->first('ethnic') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="selectGender" class="form-label">Giới tính</label>
                                                <select class="form-select" aria-label="selectGender" name="gender" required>
                                                    <option label="Chọn giới tính"></option>
                                                    <option value="{{ NAM }}" {{ old('gender') == NAM  ? 'selected' : '' }}>Nam</option>
                                                    <option value="{{ NU }}" {{ old('gender') == NU  ? 'selected' : '' }}>Nữ</option>
                                                </select>
                                                @if ($errors->gender)
                                                    <div class="text-danger">
                                                        {{ $errors->first('gender') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <div class="col-md-6">
                                                <label for="birth_date" class="form-label">Ngày sinh:</label>
                                                <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date') ?? '1990-01-01' }}" required>
                                                @if ($errors->birth)
                                                    <div class="text-danger">
                                                        {{ $errors->first('birth_date') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="place_birth" class="form-label">Nơi sinh (Tỉnh / Thành phố)</label>
                                                <select class="form-select" aria-label="" name="place_birth" required>
                                                    <option label="Chọn nơi sinh"></option>
                                                    @foreach (getProvince() as $province)
                                                        <option value="{{ $province->id }}" {{ old('place_birth') == $province->id ? 'selected' : '' }}>{{ $province->_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->place_birth)
                                                    <div class="text-danger">
                                                        {{ $errors->first('place_birth') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <div class="col-md-6">
                                                <label for="date_join_tncshcm" class="form-label">Ngày vào Đoàn:</label>
                                                <input type="date" name="date_join_tncshcm" class="form-control" value="{{ old('date_join_tncshcm') ?? '1990-01-01' }}" required>
                                                @if ($errors->date_join_tncshcm)
                                                    <div class="text-danger">
                                                        {{ $errors->first('date_join_tncshcm') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="date_join_csvn" class="form-label">Ngày vào Đảng:</label>
                                                <input type="date" name="date_join_csvn" class="form-control" required
                                                        value={{ old('date_join_csvn') ?? '1990-01-01' }}>
                                                @if ($errors->date_join_csvn)
                                                    <div class="text-danger">
                                                        {{ $errors->first('date_join_csvn') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <div class="col-md-4">
                                                <label for="selectProvince" class="form-label">Tỉnh / Thành phố</label>
                                                <select class="form-select" aria-label="selectProvince" name="province" required>
                                                    <option label="Chọn Tỉnh / Thành phố"></option>
                                                    @foreach (getProvince() as $province)
                                                        <option value="{{ $province->id }}">{{  $province->_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->province)
                                                    <div class="text-danger">
                                                        {{ $errors->first('province') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <label for="selectDistrict" class="form-label">Quận huyện</label>
                                                <select class="form-select" aria-label="selectDistrict" name="district" required>
                                                    <option label="Chọn Quận huyện"></option>
                                                </select>
                                                @if ($errors->district)
                                                    <div class="text-danger">
                                                        {{ $errors->first('district') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label">Phường / Xã / Thị trấn</label>
                                                <select class="form-select" aria-label="selectWard" name="ward" required>
                                                    <option label="Chọn Xã / Thị trấn"></option>
                                                </select>
                                                @if ($errors->ward)
                                                    <div class="text-danger">
                                                        {{ $errors->first('ward') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold">Thông tin lớp học</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="selectClass" class="form-label">Lớp học</label>
                            <select class="chosen-select" aria-label="selectClass" name="class[]" multiple required tabindex="8" placeholder="Chọn lớp học">
                                @foreach (getClass() as $class)
                                    <option value="{{ $class->id }}"
                                            {{-- {{ old('class') == $class->id ? 'selected' : '' }} --}}
                                            {{ checkSelected($class->id, old('class')) }}
                                            >{{ $class->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->class)
                                <div class="text-danger">
                                    {{ $errors->first('class') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="selectSchoolYears" class="form-label">Niên khóa</label>
                            <select class="form-select" aria-label="selectSchoolYears" name="school_years" required>
                                <option label="Chọn niên khóa"></option>
                                @foreach (getSchoolYears() as $years)
                                    <option value="{{ $years->id }}" {{ old('school_years') == $years->id ? 'selected' : '' }}>{{ $years->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->school_years)
                                <div class="text-danger">
                                    {{ $errors->first('school_years') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="selectClass" class="form-label">Loại đào tạo</label>
                            <select class="form-select" aria-label="select" name="type_education" required>
                                <option label="Loại đào tạo"></option>
                                <option value="{{ CHINH_QUY }}" {{ old('type_education') == CHINH_QUY ? 'selected' : '' }}>Chính quy</option>
                                <option value="{{ CHAT_LUONG_CAO }}" {{ old('type_education') == CHAT_LUONG_CAO ? 'selected' : '' }}>Chất lượng cao</option>
                            </select>
                            @if ($errors->type_education)
                                <div class="text-danger">
                                    {{ $errors->first('type_education') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="selectClass" class="form-label">Bậc đào tạo</label>
                            <select class="form-select" aria-label="select" name="education_level" required>
                                <option label="Bậc đào tạo"></option>
                                <option value="{{ CAO_DANG }}" {{ old('education_level') == CAO_DANG ? 'selected' : '' }}>Cao đẳng</option>
                                <option value="{{ DAI_HOC }}" {{ old('education_level') == DAI_HOC ? 'selected' : '' }}>Đại học</option>
                            </select>
                            @if ($errors->education_level)
                                <div class="text-danger">
                                    {{ $errors->first('education_level') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="selectClass" class="form-label">Khoa</label>
                            <select class="form-select" aria-label="select" name="branch" required>
                                <option label="Khoa"></option>
                                @foreach(getFaculies() as $fac)
                                    <option value="{{ $fac->id }}" {{ old('branch') == $fac->id ? 'selected' : '' }}>{{ $fac->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->branch)
                                <div class="text-danger">
                                    {{ $errors->first('branch') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-grid justify-content-center">
                    <button class="btn btn-primary text-uppercase fw-bold" type="submit">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@if ($errors->first('errorUpdate'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'error',
                    title: '{{ $errors->first('errorUpdate') }}'
                })
            </script>
        @endif

        @if (session('updateSuccess'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'success',
                    title: '{{ session('updateSuccess') }}'
                })
            </script>
        @endif
    <script>
        var provinceEle = $('[name="province"]');
        var districtEle = $('[name="district"]');
        var wardEle = $('[name="ward"]');
        provinceEle.change(function(){
            var lstDistrict = '<option label="Chọn Quận huyện"></option>';
            var lstWard = '<option label="Chọn Xã / Thị trấn"></option>';
            let id_province = $(this).val();
            districtEle.html(lstDistrict);
            wardEle.html(lstWard);
            if(!id_province){
                return;
            }
            $.get('/get-district/'+id_province, function(data){
                $(data).each(function(index, item){
                    lstDistrict += `<option value="${item.id}">${item._prefix} ${item._name}</option>`;
                })
                districtEle.html(lstDistrict);
            })
        })

        districtEle.change(function(){
            var lstWard = '<option label="Chọn Xã / Thị trấn"></option>';
            let id_province = provinceEle.val();
            let id_district = $(this).val();
            wardEle.html(lstWard);
            if(!id_province || !id_district){
                return;
            }
            $.get('/get-ward/' + id_district + '/' + id_province, function(data){
                $(data).each(function(index, item){
                    lstWard += `<option value="${item.id}">${item._prefix} ${item._name}</option>`;
                })
                wardEle.html(lstWard);
            })
        })
    </script>
@endsection
