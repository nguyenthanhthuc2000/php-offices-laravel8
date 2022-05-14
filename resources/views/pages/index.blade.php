
@extends('layout')
@section('title', 'Trang chủ')
@section('content')
    <div>
        <h4 class="mb-3">Trang chủ</h4>
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
