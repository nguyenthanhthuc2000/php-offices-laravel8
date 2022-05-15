
@extends('layout')
@section('title', 'Trang chủ')
@section('content')
    <div>
        <h4 class="mb-3">Trang chủ</h4>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('upload/slider/1.jpg') }}" style=" object-fit: contain;width: 100%;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('upload/slider/2.jpg') }}" style=" object-fit: contain;width: 100%;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('upload/slider/3.jpg') }}" style=" object-fit: contain;width: 100%;" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <br>
        <div class="row">
            @foreach($news as $n)
                <div class="col-md-3 mb-3">
                    <div class="card p-2"  style="max-height: 330px;">
                        <a href={{ route('news.detail', $n->slug) }}><img src="{{ asset('/upload/'.$n->image) }}" style="width: 100%; height: 200px; object-fit: cover" class="card-img-top" alt="..."></a>
                        <div class="card-body">
                            <a class="text-split-1" style="font-size: 1rem; font-weight: 600;"  href={{ route('news.detail', $n->slug) }} >{{ $n->title }}</a>
{{--                            <div class="card-text text-split-2" style="font-size: 0.85rem;" >{!! $n->content !!} </div>--}}
                            <small>Ngày đăng: {{ dateFormat($n->created_at) }}</small>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div style="display: flex; justify-content: flex-end;">
            {{ $news->links() }}
        </div>
    </div>
@endsection
