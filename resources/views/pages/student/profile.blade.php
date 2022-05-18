
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-3">
                                            <label for="" class="col-form-label">Họ tên:</label>
                                            </div>
                                            <div class="col-auto bold">
                                                {{ $student->info->student_code ?? 'Chưa cập nhật' }}
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
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
