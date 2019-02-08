    @if (Auth::user()->is_favorites($video->id) )
        {!! Form::open(['route'=>['favorites.unfavorite',$video->id],'method'=>'delete' ]) !!}
            {!! Form::submit('お気に入り解除',['class'=>"btn btn-outline-warning"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route'=>['favorites.favorite',$video->id ]]) !!}
            {!! Form::submit('お気に入り登録',['class'=>"btn btn-outline-primary"]) !!}
        {!! Form::close() !!}
    @endif