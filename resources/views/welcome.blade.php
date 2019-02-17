@extends('layouts.app')

@section('content')
        <div class="wrapper">
            <h1 class="title">お気に入りの音楽をシェアしよう。</h1>
            
           <div class="about">
               <p>YouTubeのMusic PVを</br></br>自分用に保存したり共有できるサイトです。</p>
           </div>
           <div class="enter">
               <div class="login">
                   <section>既にアカウントをお持ちの方</section>
                   {!! link_to_route('login', 'ログイン', [], [ 'class' => 'col-4 btn btn-lg btn-primary']) !!}
                </div>
                <div class="signup">
                    {!! link_to_route('signup.get', '初めてログインされる方はこちら', [], [ 'class' => 'btn btn-lg btn-success']) !!}
                </div>
           </div>
        </div>
@endsection