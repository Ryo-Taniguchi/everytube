<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#FF3333;">
        <a class="navbar-brand" href="/">EveryTube</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li>{!! link_to_route('signup.get','新規登録',[],['class' => 'nav-link']) !!}</li>
                <li>{!!  link_to_route('login', 'ログイン', [], ['class'=> 'nav-link']) !!}</li>
            </ul>
        </div>
    </nav>
</header>