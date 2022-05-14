@extends('layout')
@section('title', 'Danh sách bài viết')
@section('content')

<div  style="background-color: #fff;border-radius: 5px;margin: 0;      padding: 10px;">
    <div style="display: flex; align-items: center; justify-content: space-between">
        <h4>Danh sách bài viết</h4>
        <a href="{{ route('news.create') }}" class="btn btn-primary btn-blue" style="border-radius: 25px;"><i class="fa-solid fa-plus"></i> Thêm mới</a>
    </div>
    @if(Session::get('success_message'))
    <div class="alert alert-success pt-2 pb-2 mt-2" role="alert">
        {{ Session::get('success_message') ? Session::get('success_message') : '' }}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Ảnh đại diện</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col" class="text-end">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @php
                $no = getNo($news->perPage(), $news->currentPage());
            @endphp
            @if($news->count() > 0)
                @foreach($news as $l)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td><a href={{ route('news.detail', $l->slug) }}>{{$l->title}}</a></td>
                        <td><img src="{{ asset('/upload/'.$l->image) }}" style="width: 100px; height: 70px; object-fit: cover"  alt=""></td>
                        <td>{{$l->created_at ?? 'Chưa cập nhật'}}</td>
                        <td class="text-end">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-mute text-warning" href="{{ route('news.edit', $l->id) }}" title="Chỉnh sửa" type="button">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                                <button class="btn btn-mute text-danger btn-delete-news" data-href="{{ route('news.delete', $l->id) }}" title="Xóa" type="button">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
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
        <div style="display: flex;justify-content: end;">
            {{$news->links()}}
        </div>
    </div>
</div>
@endsection
@push('javascript')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btn-delete-news').click(function() {
            let url = $(this).data('href');
            Swal.fire({
                title: 'Xác nhận ?',
                text: 'Xóa bài viết này?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Xóa',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        })
    </script>
@endpush
