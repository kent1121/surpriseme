<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Surprise Me!</a>
    
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
         <span class="navbar-toggler-icon"></span>
    </button>
     
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav">
            @if (Auth::check())
                <li class="nav-item"><a class="nav-link" href="#">ユーザー一覧</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item"><a href="#">My profile</a></li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item">{!! link_to_route('logout', 'ログアウト') !!}</li>
                    </ul>
                </li>
            @else
                <li class="nav-item">{!! link_to_route('signup.get', '新規ユーザー登録', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
            @endif
        </ul>
    </div>
</nav>