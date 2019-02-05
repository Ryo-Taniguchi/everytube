@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="card">
            <div class="card-header">
                <h3 class="card-title text-center">{{ $user->name }}</h3>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ $user->filename }}" width="250" height="200">
                </div>
                @if (Auth::id() == $user->id)
                    {!! Form::open([ 'route' => ['user.upload',$user->id], 'method' => 'post', 'class' => 'form', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::file('file', null) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('アップロード',['class' => 'btn btn-outline-success']) !!}
                        </div>
                    {!! Form::close() !!}
                @endif
            </div>
        </aside>
        <div class="user-index">
            <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
                  <div class="card-header">フォローしているユーザー</div>
                  <div class="card-body">
                    <a href="{{ route('users.show',['id'=>$user->id]) }}"><img class="mb-3" src="{{ $user->filename }}" width="50" height="40"></a>
                  </div>
            </div>
        </div>
    </div>
        <div class="index">
            <div class="col-sm-8">
                <ul class="nav nav-tabs nav-justified mb-3">
                    <li class="nav-item"><a href="{{ route('users.show',['id'=>$user->id])}}" class="nav-link {{ Request::is('users/' .$user->id) ? 'active' : ''}}">動画一覧 <span class="badge badge-secondary"> {{ $count_videos }}</span></a></li>
                </ul>
                <div class="share-button">
                    {!! link_to_route('videos.create','動画を追加する',[],['class' => 'btn btn-success']) !!}
                </div>
                <div class="movie-content">
                    <ul class="media-list">
                        @foreach ($videos as $video)
                            <li class="media mb-3 videos">
                                <img class="media-object rounded" src="{{ $user->filename }}" width="50" height="40">
                                <div class="media-body ml-3">
                                    <div>
                                        {!! link_to_route('users.show',$video->user->name,['id' => $video->user->id]) !!}
                                    </div>
                                    <div>
                                        {{ $video->music_name }} / {{ $video->artist }} / ジャンル：{{ $video->genre }}
                                    </div>
                                    <div class="movie-wrap">
                                        <iframe width="560" height="315" src="{!! 'https://www.youtube.com/embed/'.$video->string !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <div class="delete-button">
                                        @if (Auth::id() == $video->user_id)
                                            {!! Form::open(['route' => ['videos.destroy', $video->id], 'method' => 'delete']) !!}
                                              {!! Form::submit('削除',['class'=>'btn btn-outline-danger']) !!}
                                            {!! Form::close() !!}
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection