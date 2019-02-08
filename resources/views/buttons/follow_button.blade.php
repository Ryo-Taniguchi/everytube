@if (Auth::id() != $user->id)
    @if (Auth::user()->is_following($user->id))
        {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('フォロー解除', ['class' => 'btn btn-outline-danger btn-block']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.follow', $user->id ]]) !!}
            {!! Form::submit('フォロー', ['class' => 'btn btn-outline-primary btn-block']) !!}
        {!! Form::close() !!}
    @endif
@endif