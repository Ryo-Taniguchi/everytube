@extends('layouts.app')

@section('content')
    @if(empty (Session::has('genre') ))
    <form class="search" action="{{ url('search')}}" method="POST">
        {{ csrf_field() }}
        <input class="search-form" name="keyword" type="text" placeholder=" 曲名/アーティスト名" value="{{ $keyword }}"/>
        <input class="search-button" type="submit" value="検索" />
    </form>
    @endif
    <div class="index">
        <div class="col-sm-8">
            <ul class="nav nav-tabs mb-3 nav-home">
                <li class="nav-item nav-text">ミュージック一覧</li>
                <li class="nav-item">
                    <form class="select" action="{{ url('/search')}}" method="POST">
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
                      <option value="その他">その他</option>
                    </select>
                    <input class="select-button" type="submit" value="絞り込み" />
                    </form>
                </li>
            </ul>
            @if( !empty( Session::has('genre') ))
                <div class="result">
                    <h6 class="result-genre">ジャンル：{{ session('genre') }}で絞り込み中</h6>
                    <a class="ml-2" href="{{ url('videos') }}"><i class="fas fa-backspace fa-lg back-icon"></i></a>:戻る
                 </div>
            @endif
            <div class="video-home">
                @foreach ($videos as $video)
                <ul class="videos alert alert-secondary" role="alert">
                     @include('videos.videos', ['video' => $video])
                 </ul>
                @endforeach
            </div>
            {{ $videos->render('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection