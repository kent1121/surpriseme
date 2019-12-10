<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Surprise Me!</a>
    
     <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
         <span class="navbar-toggler-icon"></span>
     </button>
     
     <div class="collapse navbar-collapse" id="navbar">
         <ul class="navbar-nav mr-auto"></ul>
         <ul class="navbar-nav">
             <li class="nav-item">{!! link_to_route('signup.get', '新規ユーザー登録', [], ['class' => 'nav-link']) !!}</li>
             <li class="nav-item"><a class="nav-link" href="#">ログイン</a></li>
         </ul>
     </div>
</nav>