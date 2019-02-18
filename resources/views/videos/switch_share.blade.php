<div class="col-sm-8 col-sm-offset-4">
    <div class="switch-title border-bottom">
        <h6 class="switch-text ml-3"><i class="fas fa-check fg-lg"></i>曲名,アーティスト名,ジャンルを選び登録してください。</h6>
    </div>
    {!! Form::open(['route'=>'videos.store']) !!}
        {!! Form::hidden('string', session('v_id'))!!}
        <div class="form-group">
            {!! Form::label('music_name','曲名') !!}
            {!! Form::text('music_name', session('v_title'), ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('artist','アーティスト名') !!}
            {!! Form::text('artist',old('artist'), ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            ジャンル
            {!! Form::select('genre', ['' => '選択してください']+['J-POP'=>'J-POP', 'アニメ'=>'アニメ', '洋楽'=>'洋楽', 'レゲエ'=>'レゲエ', 'ロック'=>'ロック', 'K-POP'=>'K-POP', 'ジャズ'=>'ジャズ', 'EDM'=>'EDM', 'その他'=>'その他']) !!}
        </div>
        
        <div class="submit mt-5">
            {!! Form::submit('シェア',['class'=>'btn btn-success btn-block']) !!}
        </div>
    {!! Form::close() !!}
</div>