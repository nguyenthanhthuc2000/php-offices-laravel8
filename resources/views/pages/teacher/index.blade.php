@extends('layout')
@section('title', 'Danh sách giáo viên')
@section('content')
    <div style="background-color: #fff;border-radius: 5px;margin: 0;   padding: 10px;">
        <div class="mb-3">
            <h4>Danh sách giáo viên</h4>
        </div>
            <div class="mb-2">
                <form >
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Chọn lớp</option>
                                <option value="1">Quản trị mạng 18C</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div  class="d-flex w-100" >
                                <input class="form-control" type="search" placeholder="Nhập thông tin tìm kiếm..." aria-label="Search">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-outline-success" type="submit" style="border-radius: 25px;"><i class="fa-solid fa-magnifying-glass" ></i></button>
                        </div>
                    </div>
                </form>
            </div>

        <div class="mb-3" style="display: flex; align-items: center; justify-content: end">
            @if (getRole() == IS_ADMIN)
            <a href="{{ route('register.teacher') }}" class="btn btn-primary btn-blue" style="border-radius: 25px;"><i class="fa-solid fa-plus"></i> Thêm mới</a>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Khoa</th>
                    <th scope="col" class="text-end">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $no = getNo($teachers->perPage(), $teachers->currentPage());
                @endphp
                @if($teachers->count() > 0)
                    @foreach($teachers as $teacher)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{$teacher->name}}</td>
                            <td>{{$teacher->email}}</td>
                            <td >{{$teacher->facultyTeacher ? $teacher->facultyTeacher->faculty->name : 'Chưa cập nhật'}}</td>
                            <td class="text-end">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a class="btn btn-mute text-warning" title="Chỉnh sửa" href="{{ route('teacher.edit', $teacher->id) }}">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </a>
                                    <a class="btn btn-mute text-danger btn-delete" title="Xóa" type="button" href="{{ route('teacher.delete', $teacher->id) }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5">
                            <h6>Không có dữ liệu</h6>
                        </th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div style="display: flex;justify-content: end;">
            {{$teachers->links()}}
        </div>
    </div>
@endsection
@section('script')
    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        $('.btn-delete').click(function(e){
            e.preventDefault();

            let href = $(this).attr('href');
            swalWithBootstrapButtons.fire({
            title: 'Bạn có chắc muốn xóa?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy',
            reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            })
        })
    </script>
@endsection
