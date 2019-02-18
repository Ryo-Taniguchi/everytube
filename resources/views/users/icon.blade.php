<aside class="col-sm-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title show-title text-center">{{ $user->name }}</h3>
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