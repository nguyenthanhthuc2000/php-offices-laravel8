
@extends('layout')
@section('title', 'Thông tin sinh viên')
@section('content')
    <div style="display: flex; align-items: center; justify-content: space-between">
    </div>
    <div class="row" style="background-color: #fff;border-radius: 5px;margin: 0; padding: 10px;">
        <div class="col-md-12">
            <div class="box-df profile-ds-info">
                <div class="portlet">
                    <div class="portlet-title pb-3" style="display: flex; justify-content: space-between;">

                        <div class="caption">
                            <span class="caption-subject bold">Thông tin học vấn</span>
                        </div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exportFile">Xuất biểu mẩu</button>
                    </div>
                    <div class="portlet-body" style="font-size: 0.8rem;">
                        <div class="row">
                            <div class="col-sm-3" style="text-align: center;">
                                <div class="profile-userpic">
                                    <img src="{{ asset('images/no_avatar.jpg') }}" style="border-radius: 50%;" class="img-responsive">
                                </div>
                                <div class="text-center">
                                    <p style="margin: 0">Trạng thái:
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
{{--                                    @if(getRole()!= 2) --}}
                                    <a href="{{ route('student.edit', $student->id) }}" class="color-active">Cập nhật thông tin</a>
{{--                                    @endif--}}
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
                                                {{ $student->name ?? 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-3">
                                            <label for="" class="col-form-label">Lớp học:</label>
                                            </div>
                                            <div class="col-auto bold">
                                                {{ getClassName($student->info->class_id) ?? 'Chưa cập nhật' }}
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
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold">Thông tin cá nhân</span>
                        </div>
                    </div>
                    <div class="portlet-body" style="font-size: 0.8rem;">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row g-3 align-items-center form-group">
                                        <div class="col-4">
                                        <label for="" class="col-form-label">Ngày sinh:</label>
                                        </div>
                                        <div class="col-auto bold">
                                            {{ $student->info ? dateFormat($student->info->birth_date) : 'Chưa cập nhật' }}
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center form-group">
                                        <div class="col-4">
                                        <label for="" class="col-form-label">Số CMND:</label>
                                        </div>
                                        <div class="col-auto bold">
                                        {{ $student->info && $student->info->identity_card_number ? $student->info->identity_card_number : 'Chưa cập nhật' }}
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center form-group">
                                        <div class="col-4">
                                        <label for="" class="col-form-label">Dân tộc:</label>
                                        </div>
                                        <div class="col-auto bold">
                                            {{ $student->info && $student->info->getEthnic ?  $student->info->getEthnic->name  : 'Chưa cập nhật'}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row g-3 align-items-center form-group">
                                        <div class="col-4">
                                        <label for="" class="col-form-label">Ngày vào Đoàn:</label>
                                        </div>
                                        <div class="col-auto bold">
                                            {{ $student->info ? dateFormat($student->info->date_join_csvn) : 'Chưa cập nhật' }}
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center form-group">
                                        <div class="col-4">
                                        <label for="" class="col-form-label">Điện thoại:</label>
                                        </div>
                                        <div class="col-auto bold">
                                            {{ $student->info ? $student->info->phone : 'Chưa cập nhật' }}
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center form-group">
                                        <div class="col-4">
                                        <label for="" class="col-form-label">Giới tính:</label>
                                        </div>
                                        <div class="col-auto bold">
                                            {{ $student->info && $student->info->sex == NAM ? 'Nam' : 'Nữ' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row g-3 align-items-center form-group">
                                        <div class="col-4">
                                        <label for="" class="col-form-label">Ngày vào Đảng:</label>
                                        </div>
                                        <div class="col-auto bold">
                                            {{ $student->info ? dateFormat($student->info->date_join_tncshcm) : 'Chưa cập nhật' }}
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center form-group">
                                        <div class="col-4">
                                        <label for="" class="col-form-label">Nơi sinh:</label>
                                        </div>
                                        <div class="col-auto bold">
                                            {{ $student->info ? $student->info->placeBirth->_name : 'Chưa cập nhật' }}
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center form-group">
                                        <div class="col-4">
                                        <label for="" class="col-form-label">Hộ khẩu:</label>
                                        </div>
                                        <div class="col-auto bold">
                                            @if($student->info)
                                            {{ $student->info->getProvince->_name. ', '.$student->info->getDistrict->_name. ', '  .$student->info->getWard->_prefix.' '.$student->info->getWard->_name
                                            }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- thân nhân --}}
                    @php
                        $father = $student->relative && isset($student->relative[0]) ? $student->relative[0] : null;
                        $mom = $student->relative && isset($student->relative[1]) ? $student->relative[1] : null;
                        $other = $student->relative && isset($student->relative[2]) ? $student->relative[2] : null;
                    @endphp
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold">Thông tin người thân{{ $father == null && $mom == null && $other == null ? ' (Chưa cập nhật)' : ''}}</span>
                        </div>
                    </div>
                    @if($father != null && $father->name != null)
                        <div class="portlet-body" style="font-size: 0.8rem;">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row g-3 align-items-center form-group">
                                            <label for="" class="col-form-label col-4">Họ và tên cha</label>
                                            <div class="col-auto bold">
                                                {{ $father != null && $father->name ? $father->name : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <label for="" class="col-form-label col-4">Địa chỉ thường trú:</label>
                                            <div class="col-auto bold">
                                                {{ $father != null && $father->permanent_address ? $father->permanent_address : 'Chưa cập nhật'}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row g-3 align-items-center form-group">
                                            <label for="" class="col-form-label col-4">Năm sinh:</label>
                                            <div class="col-auto bold">
                                                {{ $father != null && $father->year_birth ? dateFormat($father->year_birth, 'Y') : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-4">
                                            <label for="" class="col-form-label">Điện thoại:</label>
                                            </div>
                                            <div class="col-auto bold">
                                                {{ $father != null && $father->phone ? $father->phone : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row g-3 align-items-center form-group">
                                            <label for="" class="col-form-label col-4">Công việc</label>
                                            <div class="col-auto bold">
                                                {{ $father != null && $father->job ? $father->job : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-4">
                                            <label for="" class="col-form-label">Dân tộc:</label>
                                            </div>
                                            <div class="col-auto bold">
                                                {{ $father != null && $father->ethnic ? getNameEthnic($father->ethnic) : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($mom != null && $mom->name != null)
                        {{-- mẹ --}}
                        <div class="portlet-body" style="font-size: 0.8rem;">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row g-3 align-items-center form-group">
                                            <label for="" class="col-form-label col-4">Họ và tên mẹ</label>
                                            <div class="col-auto bold">
                                                {{ $mom != null && $mom->name ? $mom->name : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <label for="" class="col-form-label col-4">Địa chỉ thường trú:</label>
                                            <div class="col-auto bold">
                                                {{ $mom != null && $mom->permanent_address ? $mom->permanent_address : 'Chưa cập nhật'}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row g-3 align-items-center form-group">
                                            <label for="" class="col-form-label col-4">Năm sinh:</label>
                                            <div class="col-auto bold">
                                                {{ $mom != null && $mom->year_birth ? dateFormat($mom->year_birth, 'Y') : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-4">
                                            <label for="" class="col-form-label">Điện thoại:</label>
                                            </div>
                                            <div class="col-auto bold">
                                                {{ $mom != null && $mom->phone ? $mom->phone : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row g-3 align-items-center form-group">
                                            <label for="" class="col-form-label col-4">Công việc</label>
                                            <div class="col-auto bold">
                                                {{ $mom != null && $mom->job ? $mom->job : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-4">
                                            <label for="" class="col-form-label">Dân tộc:</label>
                                            </div>
                                            <div class="col-auto bold">
                                                {{ $mom != null && $mom->ethnic ? getNameEthnic($mom->ethnic) : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($other != null && $other->name != null)
                        {{-- vợ chồng --}}
                        <div class="portlet-body" style="font-size: 0.8rem;">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row g-3 align-items-center form-group">
                                            <label for="" class="col-form-label col-4">Họ và tên vợ/chồng</label>
                                            <div class="col-auto bold">
                                                {{ $other != null && $other->name ? $other->name : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <label for="" class="col-form-label col-4">Địa chỉ thường trú:</label>
                                            <div class="col-auto bold">
                                                {{ $other != null && $other->permanent_address ? $other->permanent_address : 'Chưa cập nhật'}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row g-3 align-items-center form-group">
                                            <label for="" class="col-form-label col-4">Năm sinh:</label>
                                            <div class="col-auto bold">
                                                {{ $other != null && $other->year_birth ? dateFormat($other->year_birth, 'Y') : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-4">
                                            <label for="" class="col-form-label">Điện thoại:</label>
                                            </div>
                                            <div class="col-auto bold">
                                                {{ $other != null && $other->phone ? $other->phone : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row g-3 align-items-center form-group">
                                            <label for="" class="col-form-label col-4">Công việc</label>
                                            <div class="col-auto bold">
                                                {{ $other != null ? $other->job : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-4">
                                            <label for="" class="col-form-label">Dân tộc:</label>
                                            </div>
                                            <div class="col-auto bold">
                                                {{ $other != null ? getNameEthnic($other->ethnic) : 'Chưa cập nhật' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
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
            <a href="" class="btn btn-primary btn-dowload d-none" data-url={{route('file.dowload')}}>Tải về</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        </div>
    </form>
    </div>
    </div>
</div>
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
