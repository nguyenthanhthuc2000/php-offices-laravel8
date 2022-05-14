@extends('layout')
@section('title', 'Thêm mới bài viết')
@section('content')

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
    <div  style="background-color: #fff;border-radius: 5px;margin: 0;      padding: 10px;">
        <div style="display: flex; align-items: center; justify-content: space-between">
            <h4>Thêm mới bài viết</h4>
            <button class="btn btn-primary btn-blue " style="border-radius: 25px;"><i class="fa-solid fa-plus"></i> Lưu</button>
        </div>
        <div class="form p-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề <span style="color: red;">*</span></label>
                            <input type="title" class="form-control" name="title" id="title" placeholder="Tiêu đề bài viết..." required>
                            @error('title')
                            <span class="error text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ckeditor" class="form-label">Nội dung bài viết <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="ckeditor" name="contents" rows="3" required></textarea>
                            @error('contents')
                            <span class="error text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="form-label">Hình ảnh  <span style="color: red;">*</span></label>
                            <input type="file" id="input_file_img" class="form-control" name="image" onchange="review_img(event)" hidden placeholder="Tiêu đề bài viết...">
                            @error('image')
                                <span class="error text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="review-img">
                            <img id="review-img" src="{{asset('/images/noimage.png')}}" style=" width: 100%;    border: 3px dashed blue;">
                        </div>
                    </div>
                </div>

        </div>
    </div>
    </form>
@endsection
@push('javascript')
    <script>
        $(document).ready(function(){
            $('#review-img').click(function(){
                $('#input_file_img').click();
            })
        })
        let review_img = function(event){
            let img = document.getElementById('review-img');
            img.src = URL.createObjectURL(event.target.files[0]);
            img.onload = function(){
                URL.revokeObjectURL(img.src);
            }
        }
    </script>
@endpush
