
@extends('layout')
@section('title', 'Thông tin cá nhân')
@section('content')
    <div style="display: flex; align-items: center; justify-content: space-between">
    </div>
    <div class="row" style="background-color: #fff;border-radius: 5px;margin: 0; padding: 10px;">
        <div class="col-md-12">
            <div class="box-df profile-ds-info">
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold">Thông tin sinh viên</span>
                        </div>
                    </div>
                    <div class="portlet-body" style="font-size: 0.8rem;">
                        <div class="row">
                            <div class="col-sm-3" style="text-align: center;">
                                <div class="profile-userpic">
                                    <img src="{{ asset('images/no_avatar.jpg') }}" style="border-radius: 50%;" class="img-responsive">

                                </div>

                                <div class="text-center">
                                    <a href="{{ route('student.detail', $student->id) }}" class="color-active">Xem chi tiết</a><br>
                                    <a href="{{ route('student.edit', $student->id) }}" class="color-active">Cập nhật thông tin</a>
                                </div>
                            </div>

                            <div class="col-sm-9">
                                <form class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group row" style="">
                                            <label class="col-6">MSSV: <span class="bold">{{$student->info->student_code }}</span></label>
                                            <label class="col-6">Lớp học: <span class="bold">{{ $student->info->class->name }}</span></label>
                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-6">Họ tên: <span class="bold" style="text-transform: uppercase">{{ $student->name }}</span></label>
                                            <label class="col-6">Khóa học: <span class="bold">{{ $student->info->schoolYear->name }}</span></label>
                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-6">Giới tính: <span class="bold">{{ $student->info->sex == NAM ? 'Nam' : 'Nữ' }}</span></label>
                                            <label class="col-6">Bậc đào tạo: <span class="bold">{{ $student->info->sex == DAI_HOC ? 'Đại học' : 'Cao đẳng' }}</span></label>
                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-6">Ngày sinh: <span class="bold">{{ dateFormat($student->info->birth_date) }}</span></label>
                                            <label class="col-6">Loại: <span class="bold">{{ $student->info->sex == CHINH_QUY ? 'Chính quy' : 'Chất lượng cao' }}</span></label>
                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-6">Nơi sinh: <span class="bold">{{$student->info->placeBirth ?  $student->info->placeBirth->_name  : 'Chưa cập nhật'}}</span></label>
                                            <label class="col-6">Khoa: <span class="bold">{{$student->info->class ? $student->info->class->faculty->name  : 'Chưa cập nhật'}}</span></label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
