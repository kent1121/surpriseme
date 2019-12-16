<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">プロフィール詳細</a></li>
    <li class="nav-item"><a href="{{ route('users.surprises_index', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/surprises_index') ? 'active' : '' }}">投稿一覧</a></li>
    <li class="nav-item"><a class="nav-link" href="#">お気に入り</a></li>
</ul>