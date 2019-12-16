@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs')
            @if (count($surprises) > 0)
                @include('surprises.index', ['surprises' => $surprises])
            @else
                <p class="text-center alert alert-primary">まだお気に入りはありません</p>
            @endif
        </div>
    </div>
@endsection