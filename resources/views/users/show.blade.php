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
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justfied mb-3">
                <li class="nav-item"><a href="#" class="nav-link">フォロワー</a></li>
                <li class="nav-item"><a href="#" class="nav-link"></a></li>
                <li class="nav-item"><a href="#" class="nav-link"></a></li>
            </ul>
        </div>
    </div>
@endsection