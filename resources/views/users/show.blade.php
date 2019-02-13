@extends('layouts.app')

@section('content')
    <div class="profile">
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center">{{ $user->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid" src="{{ $user->filename }}" width="220" height="250">
                        </div>
                        @if (Auth::id() == $user->id)
                            {!! Form::open([ 'route' => ['user.upload',$user->id], 'method' => 'post', 'class' => 'form', 'files' => true]) !!}
                                <div class="form-group">
                                    {!! Form::file('file') !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('アップロード',['class' => 'btn btn-outline-success']) !!}
                                </div>
                            {!! Form::close() !!}
                        @endif
                    </div>
                    <div class="follow_button">
                        @include('buttons.follow_button',['user' => $user])
                    </div>
                </div>
            </aside>
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
                    <ul class="media-list videos">
                        @foreach ($videos as $video)
                            @include('videos.videos', ['video' => $video])
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        {{ $videos->render('pagination::bootstrap-4') }}
@endsection