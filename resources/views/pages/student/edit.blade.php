
@extends('layout')
@section('title', 'Cập nhật thông tin sinh viên')
@section('content')
    <div style="display: flex; align-items: center; justify-content: space-between">
    </div>
    <div class="row" style="background-color: #fff;border-radius: 5px;margin: 0; padding: 10px;">
        <div class="col-md-12">
            <div class="box-df profile-ds-info">
                <div class="portlet">
                    <div class="portlet-title d-flex justify-content-between pb-2">
                        <div class="caption ">
                            <span class="caption-subject bold">Thông tin học vấn</span>
                        </div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exportFile">Xuất biểu mẩu</button>
                    </div>
                    <form action="{{ route('user.update', $student->id) }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="portlet-body" style="font-size: 0.8rem;">
                            <div class="row">
                                <div class="col-sm-3 mb-3" style="text-align: center;">
                                    <div class="profile-userpic">
                                        <img src="{{ asset('images/no_avatar.jpg') }}" style="border-radius: 50%;" class="img-responsive">
                                    </div>
                                    <div class="text-center">
                                        <span>Trạng thái:
                                            <span class="bold" style="color: red">
                                                @if($student->info)
                                                    @if($student->info->status == DANG_HOC)
                                                        Đang học
                                                    @elseif($student->info->status == DA_TOT_NGHIEP)
                                                        Đã tốt nghiệp
                                                    @elseif($student->info->status == DA_NGHI_HOC)
                                                        Đã nghĩ học
                                                    @elseif($student->info->status == DANG_TAM_HOAN)
                                                        Tạm hoãn
                                                    @else
                                                        Đang cập nhật
                                                    @endif
                                                @else
                                                    Đang cập nhật
                                                @endif
                                            </span>
                                        </span><br>
                                        <a href="{{ route('student.detail', $student->id) }}" class="color-active">Về trang cá nhân</a>
                                    </div>
                                </div>
                                @if(isAdmin() || isTeacher())
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row g-3 align-items-center form-group mb-3">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Họ tên:</label>
                                                    </div>
                                                    <div class="col-md-7 col-9">
                                                        <input type="text" class="form-control" value="{{ $student->name ?? '' }}" name="name">
                                                        @if ($errors->any('name'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('name') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group mb-3">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Lớp học:</label>
                                                </div>
                                                    <div class="col-md-7 col-9">
                                                        <select class="form-select" aria-label="selectSchoolYears" name="class" required>
                                                            <option label="Lớp học"></option>
                                                            @foreach (getClassByFacultyCode($student->info->branch) as $class)
                                                                <option value="{{ $class->id }}" {{ $student->info && $class->id == $student->info->class_id ? "selected" : '' }}>{{ $class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->any('class'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('class') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group mb-3">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Bậc đào tạo:</label>
                                                    </div>
                                                    <div class="col-md-7 col-9">
                                                        <select class="form-select" aria-label="select" name="education_level" required>
                                                            <option label="Bậc đào tạo"></option>
                                                            <option value="{{ CAO_DANG }}" {{ $student->info->education_level == CAO_DANG ? "selected" : '' }}>Cao đẳng</option>
                                                            <option value="{{ DAI_HOC }}" {{ $student->info->education_level == DAI_HOC ? "selected" : '' }}>Đại học</option>
                                                        </select>
                                                        @if ($errors->any('education_level'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('education_level') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group mb-3">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Loại:</label>
                                                    </div>
                                                    <div class="col-md-7 col-9">
                                                        <select class="form-select" aria-label="select" name="type_education" required>
                                                            <option label="Loại đào tạo"></option>
                                                            <option value="{{ CHINH_QUY }}" {{ $student->info->type_education == CHINH_QUY ? "selected" : '' }}>Chính quy</option>
                                                            <option value="{{ CHAT_LUONG_CAO }}" {{ $student->info->type_education == CHAT_LUONG_CAO ? "selected" : '' }}>Chất lượng cao</option>
                                                        </select>
                                                        @if ($errors->any('type_education'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('type_education') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row g-3 align-items-center form-group mb-3">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">MSSV:</label>
                                                    </div>
                                                    <div class="col-md-7 col-9">
                                                        <input type="text" name="code_student" class="form-control" value="{{ $student->info->student_code ?? '' }}">
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group mb-3">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Khóa học:</label>
                                                    </div>
                                                    <div class="col-md-7 col-9">
                                                        <select class="form-select" aria-label="selectSchoolYears" name="school_years" required>
                                                            <option label="Chọn niên khóa"></option>
                                                            @foreach (getSchoolYears() as $years)
                                                                <option value="{{ $years->id }}" {{ $student->info->school_year == $years->id ? "selected" : '' }}>{{ $years->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->any('school_years'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('school_years') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group mb-3">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Khoa:</label>
                                                    </div>
                                                    <div class="col-md-7 col-9">
                                                        <select class="form-select" aria-label="select" name="branch" required>
                                                            <option label="Khoa"></option>
                                                            @foreach(getFaculies() as $fac)
                                                                <option value="{{ $fac->id }}"{{ $student->info->branch == $fac->id ? "selected" : '' }}>{{ $fac->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->any('branch'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('branch') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group mb-3">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Email:</label>
                                                    </div>
                                                    <div class="col-md-7 col-9">
                                                        <input type="text" name="email" class="form-control" value="{{ $student->email ?? '' }}" placeholder="Email..." required>
                                                        @if ($errors->any('email'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('email') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row g-3 align-items-center form-group">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Họ tên:</label>
                                                    </div>
                                                    <div class="col-auto bold">
                                                        {{ $student->name ?? 'Chưa cập nhật' }}
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Lớp học:</label>
                                                    </div>
                                                    <div class="col-auto bold">
                                                        {{ $student->info->class->name ?? 'Chưa cập nhật' }}
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Bậc đào tạo:</label>
                                                    </div>
                                                    <div class="col-auto bold">
                                                        {{ $student->info && $student->info->education_level == DAI_HOC ? 'Đại học' : 'Cao đẳng' }}
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Loại:</label>
                                                    </div>
                                                    <div class="col-auto bold">
                                                        {{ $student->info && $student->info->sex == CHINH_QUY ? 'Chính quy' : 'Chất lượng cao' }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row g-3 align-items-center form-group">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">MSSV:</label>
                                                    </div>
                                                    <div class="col-auto bold">
                                                        {{ $student->info->student_code ?? 'Chưa cập nhật' }}
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Khóa học:</label>
                                                    </div>
                                                    <div class="col-auto bold">
                                                        {{ $student->info->schoolYear->name ?? 'Chưa cập nhật' }}
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Khoa:</label>
                                                    </div>
                                                    <div class="col-auto bold">
                                                        {{ $student->info && $student->info->class ? $student->info->class->faculty->name  : 'Chưa cập nhật'}}
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group">
                                                    <div class="col-3">
                                                    <label for="" class="col-form-label">Email:</label>
                                                    </div>
                                                    <div class="col-auto bold">
                                                        {{  $student->email ?? 'Chưa cập nhật'  }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject bold">Thông tin cá nhân</span>
                            </div>
                        </div>
                        <div class="portlet-body" style="font-size: 0.8rem;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-horizontal">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <div class="col-md-3 mb-2">
                                                    <label for="birth" class="form-label">Ngày sinh:</label>
                                                    <input type="date" name="birth" class="form-control" value={{ $student->info->birth_date ?? '1990-01-01' }}>
                                                    @if ($errors->any('birth'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('birth') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="identity_card" class="form-label">Số CMND:</label>
                                                    <input type="text" name="identity_card" class="form-control" value={{ $student->info->identity_card_number ?? 'Chưa cập nhật' }}>
                                                    @if ($errors->any('identity_card'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('identity_card') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="ethnic" class="form-label">Dân tộc:</label>
                                                    <select class="form-select" aria-label="ethnic" name="ethnic">
                                                        <option label="Chọn dân tộc"></option>
                                                        @foreach (getEthnic() as $ethnic)
                                                            <option value="{{ $ethnic->id }}"
                                                                    {{ $student->info && $student->info->getEthnic->id == $ethnic->id ? 'selected' : '' }}>{{ $ethnic->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->any('ethnic'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('ethnic') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="date_join_tncshcm" class="form-label">Ngày vào Đoàn:</label>
                                                    <input type="date" name="date_join_tncshcm" class="form-control" value={{ $student->info->date_join_tncshcm ?? '1990-01-01' }}>
                                                    @if ($errors->any('date_join_tncshcm'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('date_join_tncshcm') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3 mb-2">
                                                    <label for="phone" class="form-label">Điện thoại:</label>
                                                    <input type="text" name="phone" class="form-control" value={{ $student->info->phone ?? 'Chưa cập nhật' }}>
                                                    @if ($errors->any('phone'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('phone') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="selectGender" class="form-label">Giới tính</label>
                                                    <select class="form-select" aria-label="selectGender" name="gender">
                                                        <option label="Chọn giới tính"></option>
                                                        <option {{ $student->info && $student->info->sex == NAM ? 'selected' : ''}} value='1'>Nam</option>
                                                        <option {{ $student->info && $student->info->sex == NU ? 'selected' : ''}} value='0'>Nữ</option>
                                                    </select>
                                                    @if ($errors->any('gender'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('gender') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="date_join_csvn" class="form-label">Ngày vào Đảng:</label>
                                                    <input type="date" name="date_join_csvn" class="form-control"
                                                            value={{ $student->info->date_join_csvn ?? '1990-01-01' }}>
                                                    @if ($errors->any('date_join_csvn'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('date_join_csvn') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="place_birth" class="form-label">Nơi sinh (Tỉnh / Thành phố)</label>
                                                    <select class="form-select" aria-label="" name="place_birth">
                                                        <option label="Chọn nơi sinh"></option>
                                                        @foreach (getProvince() as $province)
                                                            <option value="{{ $province->id }}" {{ $student->info && $province->id == $student->info->place_birth ? 'selected' : '' }}>{{ $province->_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->any('place_birth'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('place_birth') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3 mb-2">
                                                    <label for="selectProvince" class="form-label">Tỉnh / Thành phố</label>
                                                    <select class="form-select" aria-label="selectProvince" name="province">
                                                        <option label="Chọn Tỉnh / Thành phố"></option>
                                                        @foreach (getProvince() as $province)
                                                            <option value="{{ $province->id }}"
                                                                    {{ $student->info && $student->info->province == $province->id ? 'selected' : '' }}>{{  $province->_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->any('province'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('province') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="selectDistrict" class="form-label">Quận huyện</label>
                                                    <select class="form-select" aria-label="selectDistrict" name="district">
                                                        <option label="Chọn Quận huyện"></option>
                                                        @if ($student->info && $student->info->province)
                                                            @foreach (getDistrict($student->info->province) as $district)
                                                                <option value="{{ $district->id }}"
                                                                        {{ $student->info && $student->info->district == $district->id ? 'selected' : '' }}>{{  $district->_prefix.' '.$district->_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @if ($errors->any('district'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('district') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="exampleFormControlInput1" class="form-label">Phường / Xã / Thị trấn</label>
                                                    <select class="form-select" aria-label="selectWard" name="ward">
                                                        <option label="Chọn Xã / Thị trấn"></option>
                                                        @if ($student->info && $student->info->province && $student->info->district)
                                                            @foreach (getWard($student->info->district, $student->info->province) as $ward)
                                                                <option value="{{ $ward->id }}"
                                                                        {{ $student->info && $student->info->ward == $ward->id ? 'selected' : '' }}>{{ $ward->_prefix.' '.$ward->_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @if ($errors->any('ward'))
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
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject bold">Thông tin người thân</span>
                            </div>
                        </div>
                        @php
                            $student->relative = $student->relative->first() != null || empty($student->relative) ? $student->relative : [ 0 => '123', 1 => 'null', 2 => 'null'];
                        @endphp
                        <div class="portlet-body" style="font-size: 0.8rem;">
                            <div class="row">
                                @foreach ($student->relative as $i => $relatives)
                                    @php
                                        $prefix = $i == 0 ? 'father' : ($i == 1 ? 'mom' : 'other');
                                        $title = $i == 0 ? 'cha' : ($i == 1 ? 'mẹ' : 'vợ/chồng');
                                    @endphp
                                    <div class="col-sm-12">
                                        <div class="form-horizontal">
                                            <div class="form-body">
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="" class="form-label">Họ tên {{ $title }}:</label>
                                                                    <input type="text" class="form-control"
                                                                            value="{{ $relatives->name ?? '' }}"
                                                                            name="name_{{ $prefix }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="birth_{{ $prefix }}" class="form-label">Năm sinh</label>
                                                            <input type="date" name="birth_{{ $prefix }}" class="form-control" value={{ $relatives->year_birth ?? '1990-01-01' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">Công việc:</label>
                                                            <input type="text" class="form-control" value="" name="job_{{ $prefix }}">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="phone" class="form-label">Điện thoại:</label>
                                                            <input type="number" maxLength="10" name="phone_{{ $prefix }}" class="form-control" value={{ $relatives->phone ?? '' }}>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="ethnic" class="form-label">Dân tộc:</label>
                                                            <select class="form-select" aria-label="ethnic" name="ethnic_{{ $prefix }}">
                                                                <option label="Chọn dân tộc"></option>
                                                                @foreach (getEthnic() as $ethnic)
                                                                    <option value="{{ $ethnic->id }}"
                                                                            {{ isset($relatives->ethnic) && $relatives->ethnic == $ethnic->id ? 'selected' : '' }}>{{ $ethnic->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <label for="" class="form-label">Địa chỉ thường trú:</label>
                                                            <input type="text" class="form-control" value="{{ $relatives->permanent_address ?? '' }}" name="address_{{ $prefix }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="text-center mb-3">
                                    <button class="btn btn-primary">Cập nhật</button>
                                    <a href="{{ goPrev('student.index') }}" class="btn btn-secondary">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exportFile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 30%">
    <div class="modal-content" >
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đề xuất biểu mẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form>
        <div class="modal-body">
            <input type="hidden" id="student_id" value={{$student->id}}>
            <select class="form-select" aria-label="Default select example" id='file_type'>
                <option value="">Chọn biểu mẩu</option>
                <option value="1">Sơ yếu lí lịch</option>
                {{-- <option value="2">Giấy hoãn nghĩa vụ quân sự</option> --}}
            </select>
        </div>
        <div class="modal-footer">
            <a href="" class="btn btn-primary btn-dowload d-none" data-url="{{route('file.dowload')}}">Tải về</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        </div>
    </form>
    </div>
    </div>
</div>
@endsection

@section('script')
        @if ($errors->first('errorUpdate') || $errors->any())
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'error',
                    title: "Cập nhật thất bại"
                })
            </script>
        @endif

        @if (session('updateSuccess'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1500,
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

@push('javascript')
  <script>
    $('#file_type').change(function() {
      const id = $('#student_id').val();
      const type = $('#file_type').val();

      if([1,2].includes(parseInt(type))) {
        $('.btn-dowload').removeClass('d-none');
        let url = $('.btn-dowload').attr('data-url')+'?'+'id='+id+'?type='+type;
        $('.btn-dowload').attr('href', url);
      }
      else {
        $('.btn-dowload').addClass('d-none');
      }
    })

  </script>
@endpush
