@extends('layouts.app')

@section('content')
    <div class="register-title text-center">
        <h2>新規登録</h2>
    </div>
    
    <div class="register-form">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-sm-offset-4">
                
                {!! Form::open(['route'=>'signup.post']) !!}
                    <div class="form-group">
                        {!! Form::label('name','名前') !!}
                        {!! Form::text('name',old('name'), ['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('email','メールアドレス') !!}
                        {!! Form::email('email',old('email'), ['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('password','パスワード') !!}
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('password_confirmation','パスワード確認') !!}
                        {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="submit mt-5">
                        {!! Form::submit('登録',['class'=>'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection