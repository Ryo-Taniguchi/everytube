@extends('layouts.app')

@section('content')
    <div class="login-title text-center">
        <h2>ログイン</h2>
    </div>
    
    <div class="login-form">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-sm-offset-4">
                
                {!! Form::open(['route'=>'login.post']) !!}
                    <div class="form-group">
                        {!! Form::label('email','メールアドレス') !!}
                        {!! Form::email('email',old('email'), ['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('password','パスワード') !!}
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="submit mt-5">
                        {!! Form::submit('ログイン',['class'=>'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
                
                <p class="mt-2 text-center">アカウントお持ちでない方は新規登録  <a href="{{ route('signup.get', []) }}"><i class="far fa-check-square fa-lg check"></a></i>
            </div>
        </div>
    </div>
@endsection