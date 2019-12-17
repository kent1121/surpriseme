@if (Auth::user()->is_wanting($surprise->id))
    {!! Form::open(['route' => ['wants.not_want', $surprise->id], 'method' => 'delete']) !!}
        <button class="btn btn-danger" type="submit"><a class="text-white text-decoration-none" href="{{ route('wants.not_want', ['id' => $surprise->id]) }}"><i class="far fa-heart"></i><span>されたい！</span><span class="badge">{{ $count_want_users }}</span></a></button>
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['wants.want', $surprise->id]]) !!}
        <button class="btn btn-light" type="submit"><a class="text-dark text-decoration-none" href="{{ route('wants.want', ['id' => $surprise->id]) }}"><i class="far fa-heart"></i><span>されたい！</span><span class="badge">{{ $count_want_users }}</span></a></button>
    {!! Form::close() !!}
@endif