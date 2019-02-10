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
            <li class="nav-item">
                <form class="select" action="{{ url('/search/select')}}" method="POST">
                {{ csrf_field() }}
                <select class="select-form" name="genre">
                  <option selected="selected" value="">ジャンルを選択</option>
                  <option value="J-POP">J-POP</option>
                  <option value="アニメ">アニメ</option>
                  <option value="洋楽">洋楽</option>
                  <option value="レゲエ">レゲエ</option>
                  <option value="ロック">ロック</option>
                  <option value="K-POP">K-POP</option>
                  <option value="ジャズ">ジャズ</option>
                  <option value="EDM">EDM</option>
                </select>
                <input class="select-button" type="submit" value="絞り込み" />
                </form>
            </li>
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