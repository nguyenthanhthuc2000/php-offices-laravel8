@extends('layout')
@section('title',  $news->title)
@section('content')
    <div class="row" style="background-color: #fff;border-radius: 5px;margin: 0; padding: 10px;">
        <div class="col-md-8">
            <div  >
                <h4 style="color: black">{{ $news->title }}</h4>
                <p style="font-size: 0.85rem">Ngày đăng: {{ $news->created_at ?? 'Chưa cập nhập' }}</p>
                <img src="{{ asset('upload/'.$news->image) }}" class="w-100" alt="">
                <br>
                <br>
                <div class="content" style="    text-align: justify;">
                    {!! $news->content  !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h4 style="color: black">Bài viết mới nhất</h4>
            @foreach($listNews as $new)
                <div class="item-news" style="display: flex;padding: 10px 0;">
                    <a href="{{ route('news.detail', $new->slug) }}">
                        <img src="{{ asset('upload/'.$new->image) }}" class="" style="width: 100px; height: 70px; object-fit: cover" alt="...">
                    </a>
                    <div class="card-body pt-0 pb-0" >
                        <a href="{{ route('news.detail', $new->slug) }}" class="card-text text-split-1">{{  $new->title }}</a>
                        <small>Ngày đăng: {{ dateFormat($news->created_at) }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
