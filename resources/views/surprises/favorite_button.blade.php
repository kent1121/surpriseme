@if (Auth::user()->is_favoriting($surprise->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $surprise->id], 'method' => 'delete']) !!}
        <button class="btn btn-success" type="submit"><a class="text-white" href="{{ route('favorites.favorite', ['id' => $surprise->id]) }}"><i class="far fa-thumbs-up"></i><span class="badge">{{ $count_favorite_users }}</span></a></button>
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $surprise->id]]) !!}
        <button class="btn btn-light" type="submit"><a class="text-dark" href="{{ route('favorites.unfavorite', ['id' => $surprise->id]) }}"><i class="far fa-thumbs-up"></i><span class="badge">{{ $count_favorite_users }}</span></a></button>
    {!! Form::close() !!}
@endif
