
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
                                    <a href="{{ route('student.edit', $student->id) }}" class="color-active">Cập nhật thông tin</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group row" style="">
                                            <label class="col-md-6 ">MSSV: <span class="bold">{{ $student->info->student_code ?? '--' }}</span></label>
                                            <label class="col-md-6 ">Lớp học: <span class="bold">{{ $student->info->class->name ?? '--' }}</span></label>
                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-md-6 ">Khóa học: <span class="bold">{{ $student->info->schoolYear->name ?? '--'  }}</span></label>
                                            <label class="col-md-6 ">Bậc đào tạo: <span class="bold">{{ $student->info && $student->info->sex == DAI_HOC ? 'Đại học' : 'Cao đẳng' }}</span></label>
                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-md-6 ">Loại: <span class="bold">{{ $student->info && $student->info->sex == CHINH_QUY ? 'Chính quy' : 'Chất lượng cao' }}</span></label>
                                            <label class="col-md-6 ">Khoa: <span class="bold">{{ $student->info && $student->info->class ? $student->info->class->faculty->name  : 'Chưa cập nhật'}}</span></label>
                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-md-6 ">Họ tên: <span class="bold">{{  $student->name  }}</span></label>
                                            <label class="col-md-6 ">Email: <span class="bold">{{  $student->email  }}</span></label>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group row" style="">
                                            <label class="col-md-3">Ngày sinh: <span class="bold">{{ $student->info ? dateFormat($student->info->birth_date) : '--' }}</span></label>
                                            <label class="col-md-3">Số CMND: <span class="bold">{{ $student->info && $student->info->identity_card_number }}</span></label>
                                            <label class="col-md-3">Dân tộc: <span class="bold">{{ $student->info && $student->info->getEthnic ?  $student->info->getEthnic->name  : 'Chưa cập nhật'}}</span></label>

                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-md-3">Ngày vào Đoàn: <span class="bold">{{ $student->info ? dateFormat($student->info->date_join_csvn) : '--' }}</span></label>
                                            <label class="col-md-3">Điện thoại: <span class="bold">{{ $student->info ? $student->info->phone : '--' }}</span></label>
                                            <label class="col-md-3">Giới tính: <span class="bold">{{ $student->info && $student->info->sex == NAM ? 'Nam' : 'Nữ' }}</span></label>

                                        </div>
                                        <div class="form-group row" style="">
                                            <label class="col-md-3">Ngày vào Đảng: <span class="bold">{{ $student->info ? dateFormat($student->info->date_join_tncshcm) : '--' }}</span></label>
                                            <label class="col-md-3">Nơi sinh: <span class="bold">{{ $student->info ? $student->info->placeBirth->_name : '--' }}</span></label>
                                            <label class="col-md-3">Hộ khẩu:
                                                <span class="bold">
                                                    @if($student->info)
                                                    {{ $student->info->getProvince->_name. ', '.$student->info->getDistrict->_name. ', '  .$student->info->getWard->_prefix.' '.$student->info->getWard->_name
                                                    }}
                                                    @endif
                                                </span>
                                            </label>
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
                        <option selected value="">Chọn biểu mẩu</option>
                        <option value="1">Sơ yếu lí lịch</option>
                        <option value="2">Giấy hoãn nghĩa vụ quân sự</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id='export'>Xuất</button>
            </div>
        </form>
        </div>
        </div>
    </div>
@endsection
@push('javascript')
  <script>
    $('#export').click(function() {
      const type = $('#file_type').val();
      const id = $('#student_id').val();
      console.log(type, id)
      Swal.fire({
        title: 'Xác nhận?',
        text: 'Xuất biểu mẩu!',
        showCancelButton: true,
        confirmButtonText: 'OK',
        cancelButtonText: 'Hủy',
        icon: 'question',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            if(type == '') {
                Swal.fire(
                    'Lỗi!',
                    'Vui lòng chọn biểu mẩu!',
                    'error'
                )
            }
            else if(type != '' && id != ''){
                console.log('ok')
                $.ajax({
                    url: "/xuat-bieu-mau",
                    method: 'GET',
                    data:{type:type, id:id},
                }).done(function(res) {
                    console.log(res)
                    Swal.fire('Thành công!', '', 'success')
                });
            }
        }
      })
    })

  </script>
@endpush
