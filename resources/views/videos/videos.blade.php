<li class="media mb-3">
    <img class="media-object rounded" src="{{ $video->user->filename }}" width="45" height="47">
    <div class="media-body ml-3">
        <div>
            {!! link_to_route('users.show',$video->user->name,['id' => $video->user->id], ['class' => 'video-user']) !!}
        </div>
        <div class="video-title">
            {{ $video->music_name }} / {{ $video->artist }} / ジャンル: {{ $video->genre }}
        </div>
        <div class="video-wrap">
            <iframe width="560" height="315" src="{!! 'https://www.youtube.com/embed/'.$video->string !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="favorite-button">
            @include('buttons.favo_button',['video' => $video])
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