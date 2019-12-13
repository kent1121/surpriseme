@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <h3 class="mb-5">最近の投稿</h3>
        @include('surprises.index')
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the "Surprise Me!"</h1>
                {!! link_to_route('signup.get', '新規ユーザー登録はこちら', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection