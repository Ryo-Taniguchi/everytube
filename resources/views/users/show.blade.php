@extends('layouts.app')

@section('content')
    <div class="profile">
        <div class="row">
            @include('users.icon',['user' => $user])
            <div class="user-index col-sm-8">
                @include('users.followings',['followings' => $followings])
            </div>
        </div>
    </div>
    <div class="index">
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="{{ route('users.show',['id'=>$user->id])}}" class="nav-link show-nav {{ Request::is('users/' .$user->id) ? 'active' : ''}}">動画一覧 <span class="badge badge-primary"> {{ $count_videos }}</span></a></li>
                <li class="nav-item"><a href="{{ route('users.favorites',['id'=>$user->id])}}" class="nav-link show-nav {{ Request::is('users/*/favorites') ? 'active' : ''}}">お気に入り <span class="badge badge-primary"> {{ $count_favorites }}</span></a></li>
            </ul>
            <div class="share-button">
                {!! link_to_route('videos.create','動画を追加する',[],['class' => 'btn btn-success']) !!}
            </div>
            <div class="video-content">
                @foreach ($videos as $video)
                <ul class="videos alert alert-secondary" role="alert">
                    @include('videos.videos', ['video' => $video])
                </ul>
                @endforeach
            </div>
        </div>
    </div>
    {{ $videos->render('pagination::bootstrap-4') }}
@endsection