<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#FF3333">
        @if(Auth::check())
            <a class="navbar-brand" href="/videos">EveryTube</a>
        @else
            <a class="navbar-brand" href="/">EveryTube</a>
        @endif
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
            @if(Auth::check())
                <li class="nav-item">{!! link_to_route('videos.index', 'ホーム',[], ['class'=> 'nav-link nav-color']) !!}</li>
                <li class="nav-item">{!! link_to_route('users.show', 'マイページ', ['id'=>Auth::id()], ['class'=> 'nav-link nav-color']) !!}</li>
                <li class="nav-item">{!! link_to_route('videos.create','シェア', [], ['class' => 'nav-link nav-color']) !!}</li>
                <li class="nav-item">{!! link_to_route('logout.get','ログアウト', [], ['class' => 'nav-link nav-color']) !!}</li>
            @else
                <li class="nav-item">{!! link_to_route('signup.get','新規登録',[],['class' => 'nav-link nav-color']) !!}</li>
                <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class'=> 'nav-link nav-color']) !!}</li>
            @endif
            </ul>
        </div>
    </nav>
</header>