
@extends('layout')
@section('title', 'Trang chủ')
@section('content')
    <div>
        <h4 class="mb-3">Trang chủ</h4>
        <div class="row">
            @foreach($news as $n)
                <div class="col-md-3 mb-3">
                    <div class="card p-2">
                        <img src="{{ asset('/upload/'.$n->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="text-split-1" style="font-size: 1rem; font-weight: 600;"  href={{ route('news.detail', $n->slug) }} >{{ $n->title }}</a>
                            <p class="card-text text-split-2" style="font-size: 0.85rem;" >{{ $n->content }}</p>
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
