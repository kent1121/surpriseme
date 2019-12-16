@if (Auth::user()->is_favoriting($surprise->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $surprise->id], 'method' => 'delete']) !!}
        {!! Form::submit('いいねを外す', ['class' => "btn btn-success btn-sm"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $surprise->id]]) !!}
        {!! Form::submit('いいね', ['class' => "btn btn-light btn-sm"]) !!}
    {!! Form::close() !!}
@endif
