
@extends('layout')
@section('title', 'Thông tin cá nhân')
@section('content')
    <div style="display: flex; align-items: center; justify-content: space-between">
    </div>
    <div class="row" style="background-color: #fff;border-radius: 5px;margin: 0; padding: 10px;">
        <div class="col-md-7">
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
                                    <a href="" class="color-active">Xem chi tiết</a>
                                </div>
                            </div>

                            <div class="col-sm-9">
                                <form class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group row" style="">
                                            <label class="col-6">MSSV: <span class="bold">{{ $student->info->student_code }}</span></label>
                                            <label class="col-6">Lớp học: <span class="bold">K8-L3</span></label>
                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-6">Họ tên: <span class="bold">ĐỖ THỊ HẢI YẾN</span></label>
                                            <label class="col-6">Khóa học: <span class="bold">Khóa 8</span></label>
                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-6">Giới tính: <span class="bold">Nữ</span></label>
                                            <label class="col-6">Bậc đào tạo: <span class="bold">Đại học</span></label>
                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-6">Ngày sinh: <span class="bold">23/09/2001</span></label>
                                            <label class="col-6">Loại hình đào tạo: <span class="bold">Chính quy</span></label>
                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-6">Nơi sinh: <span class="bold">Thành phố Hà Nội</span></label>
                                            <label class="col-6">Ngành: <span class="bold">Luật</span></label>
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
