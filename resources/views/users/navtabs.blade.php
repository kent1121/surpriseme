<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">プロフィール詳細</a></li>
    <li class="nav-item"><a href="{{ route('users.surprises_index', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/surprises_index') ? 'active' : '' }}">投稿一覧 <span class="badge badge-secondary">{{ $count_surprises }}</span></a></li>
    <li class="nav-item"><a  href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/favorites') ? 'active' : '' }}">お気に入り <span class="badge badge-secondary">{{ $count_favorites }}</span></a></li>
</ul>