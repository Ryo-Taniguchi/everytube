@extends('layouts.app')

@section('content')
    <div class="share-title text-center">
        <h2>音楽動画を登録する</h2>
    </div>
    
    <div class="share-form">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-sm-offset-4">
                
                {!! Form::open(['route'=>'videos.store']) !!}
                    <div class="form-group">
                        {!! Form::label('music_name','曲名') !!}
                        {!! Form::text('music_name',old('music_name'), ['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('artist','アーティスト名') !!}
                        {!! Form::text('artist',old('artist'), ['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('string','URL (Youtubeの共有からURLを取得しペーストしてください)') !!}
                        {!! Form::text('string',old('string'), ['placeholder'=>'(例)　https://youtu.be/xxxxxxxx', 'class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        ジャンル
                        {!! Form::select('genre', ['' => '選択してください']+['J-POP'=>'J-POP', 'アニメ'=>'アニメ', '洋楽'=>'洋楽', 'レゲエ'=>'レゲエ', 'ロック'=>'ロック', 'K-POP'=>'K-POP', 'ジャズ'=>'ジャズ','EDM'=>'EDM']) !!}
                    </div>
                    
                    <div class="submit mt-5">
                        {!! Form::submit('シェア',['class'=>'btn btn-success btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection