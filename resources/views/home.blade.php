@extends('layouts.app')

@section('content')
<form class="search" action="{{ url('/search/search')}}" method="POST">
    {{ csrf_field() }}
    <input class="search-form" name="keyword" type="text" placeholder=" 曲名/アーティスト名" />
    <input class="search-button" type="submit" value="検索" />
</form>
<div class="index">
    <div class="col-sm-8">
        <ul class="nav nav-tabs mb-3 nav-home">
            <li class="nav-item nav-text">ミュージック一覧</li>
        </ul>
        <div class="video-home">
            <ul class="media-list videos">
                @foreach ($videos as $video)
                     @include('videos.videos', ['video' => $video])
                @endforeach
            </ul>
        </div>
        {{ $videos->render('pagination::bootstrap-4') }}
    </div>
</div>
@endsection