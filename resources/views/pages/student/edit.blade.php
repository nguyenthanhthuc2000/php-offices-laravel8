
@extends('layout')
@section('title', 'Cập nhật thông tin sinh viên')
@section('content')
{{-- @dd(getProvince(1)) --}}
    <div style="display: flex; align-items: center; justify-content: space-between">
    </div>
    <div class="row" style="background-color: #fff;border-radius: 5px;margin: 0; padding: 10px;">
        <div class="col-md-12">
            <div class="box-df profile-ds-info">
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold">Thông tin học vấn</span>
                        </div>
                    </div>
                    <div class="portlet-body" style="font-size: 0.8rem;">
                        <div class="row">
                            <div class="col-sm-3" style="text-align: center;">
                                <div class="profile-userpic">
                                    <img src="{{ asset('images/no_avatar.jpg') }}" style="border-radius: 50%;" class="img-responsive">
                                </div>
                                <div class="text-center">
                                    <p>Trạng thái:
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
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-6 ">MSSV: <span class="bold">{{ $student->info->student_code ?? '--' }}</span></label>
                                            <label class="col-md-6 ">Lớp học: <span class="bold">{{ $student->info->class->name ?? '--' }}</span></label>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-6 ">Khóa học: <span class="bold">{{ $student->info->schoolYear->name ?? '--' }}</span></label>
                                            <label class="col-md-6 ">Bậc đào tạo: <span class="bold">{{ $student->info && $student->info->sex == DAI_HOC ? 'Đại học' : 'Cao đẳng' }}</span></label>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-6 ">Loại: <span class="bold">{{ $student->info && $student->info->sex == CHINH_QUY ? 'Chính quy' : 'Chất lượng cao' }}</span></label>
                                            <label class="col-md-6 ">Khoa: <span class="bold">{{ $student->info && $student->info->class ? $student->info->class->faculty->name  : 'Chưa cập nhật'}}</span></label>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-6 ">Họ tên: <span class="bold">{{  $student->name ?? '--'  }}</span></label>
                                            <label class="col-md-6 ">Email: <span class="bold">{{  $student->email ?? '--'  }}</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold">Thông tin cá nhân</span>
                        </div>
                    </div>
                    <div class="portlet-body" style="font-size: 0.8rem;">
                        <form action="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-horizontal">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <div class="col-md-3 mb-2">
                                                    <label for="exampleFormControlInput1" class="form-label">Ngày sinh:</label>
                                                    <input type="date" class="form-control" value={{ $student->info->birth_date ?? '1990-01-01' }} id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="exampleFormControlInput1" class="form-label">Số CMND:</label>
                                                    <input type="text" class="form-control" value={{ $student->info->identity_card_number ?? '--' }} id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="exampleFormControlInput1" class="form-label">Dân tộc:</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Chọn dân tộc</option>
                                                        @foreach ($lstEthnic as $ethnic)
                                                            <option value="{{ $ethnic->id }}"
                                                                    {{ $student->info && $student->info->getEthnic->id == $ethnic->id ? 'selected' : '' }}>{{ $ethnic->name }}</option>
                                                        @endforeach
                                                      </select>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="exampleFormControlInput1" class="form-label">Ngày vào Đoàn:</label>
                                                    <input type="date" class="form-control" value={{$student->info->date_join_csvn ?? '1990-01-01' }} id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3 mb-2">
                                                    <label for="exampleFormControlInput1" class="form-label">Điện thoại:</label>
                                                    <input type="text" class="form-control" value={{ $student->info->phone ?? '--' }} id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="exampleFormControlInput1" class="form-label">Giới tính</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Chọn giới tính</option>
                                                        <option {{ $student->info && $student->info->sex == NAM ? 'selected' : ''}} value='1'>Nam</option>
                                                        <option {{ $student->info && $student->info->sex == NU ? 'selected' : ''}} value='0'>Nữ</option>
                                                      </select>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="exampleFormControlInput1" class="form-label">Ngày vào Đảng:</label>
                                                    <input type="date" class="form-control" value={{ $student->info->date_join_tncshcm ?? '1990-01-01' }} id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="exampleFormControlInput1" class="form-label">Nơi sinh (Tỉnh / Thành phố)</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option label="Chọn nơi sinh"></option>
                                                        @foreach (getProvince() as $province)
                                                            <option value="{{ $province->id }}">{{ $province->_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3 mb-2">
                                                    <label for="exampleFormControlInput1" class="form-label">Tỉnh / Thành phố</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option label="Chọn Tỉnh / Thành phố"></option>
                                                        @foreach (getProvince() as $province)
                                                            <option value="{{ $province->id }}"
                                                                    {{ $student->info && $student->info->province == $province->id ? 'selected' : '' }}>{{ $province->_name }}</option>
                                                        @endforeach
                                                      </select>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="exampleFormControlInput1" class="form-label">Quận huyện</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option label="Chọn Quận huyện"></option>
                                                        @if ($student->info && $student->info->province)
                                                            @foreach (getProvince($student->info->province) as $province)
                                                                <option value="{{ $province->id }}"
                                                                        {{ $student->info && $student->info->province == $province->id ? 'selected' : '' }}>{{ $province->_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="exampleFormControlInput1" class="form-label">Phường / Xã / Thị trấn</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option label="Chọn Xã / Thị trấn"></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <button class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script>

        </script>
    @endsection
@endsection
