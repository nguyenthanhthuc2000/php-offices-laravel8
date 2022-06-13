@extends('layout')
@section('title', 'Danh sách giáo viên')
@section('content')
    <div style="background-color: #fff;border-radius: 5px;margin: 0;   padding: 10px;">
        <div class="mb-3">
            <h4>Danh sách giáo viên</h4>
        </div>
            <div class="mb-2">
                <form method="GET" action="{{route("teacher.index")}}">
                    <div class="row">
                        <div class="col-md-3">
                            <div  class="d-flex w-100" >
                                <input class="form-control" type="search" name="email" placeholder="Nhập email tìm kiếm..." aria-label="Search">
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
        @if(session()->has('messageResetPass'))
        <br>
            <div class="alert alert-success" role="alert"
             style="justify-content: center">
            <strong>{{ session()->get('messageResetPass') }}</strong>
            </div>
        @endif
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
                            <td>{{ $teacher->info && $teacher->info->class ? $teacher->info->class->faculty->name  : 'Chưa cập nhật'}}</td>
                            <td class="text-end">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-mute text-primary btn-reset-password" data-email="{{ $teacher->email }}" 
                                        data-href="{{ route('teacher.reset.password', $teacher->id)}}">
                                        <i class="fa-solid fa-key"></i>
                                    </button>
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

@if(session('deleteSuccess'))
<script>
    Swal.fire({
        title: 'Xóa thành công',
        icon: 'success',
        confirmButtonText: 'Đồng ý'
    })
</script>
@endif
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
        $('.btn-reset-password').click(function(e){
            e.preventDefault();
            let href = $(this).attr('data-href');
            let email = $(this).attr('data-email');
            swalWithBootstrapButtons.fire({
            title: 'Bạn có chắc muốn reset mật khẩu cho tài khoản '+email+'?',
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
