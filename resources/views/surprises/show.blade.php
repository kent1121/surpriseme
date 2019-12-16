@extends('layouts.app')

@section('content')
    @if ($surprise)
        <div class="col-sm-8 offset-sm-2">
            <div class="mb-5">
                <h4> {{ $surprise->title }}</h4>
                <p>投稿者：{{ link_to_route('users.show', $surprise->user->name, ['id' => $surprise->user->id]) }}</p>
                <table class="table table-striped table-bordered">
                    </tr>
                    <tr>
                        <th>リアクション</th>
                        <td>{{ $surprise->reaction }}</td>
                    </tr>
                    <tr>
                        <th>予算</th>
                        <td>{{ number_format($surprise->budget) }}円</td>
                    </tr>
                    <tr>
                        <th>ターゲット</th>
                        <td>{{ $surprise->target }}</td>
                    </tr>
                </table>
                <h5>体験談</h5>
                <p class="bg-light">{{ $surprise->content }}</p>
                @include('surprises.favorite_button', ['surprise' => $surprise])
            </div>
            @if (Auth::id() == $surprise->user_id)
                {!! link_to_route('surprises.edit', '投稿を編集する', ['id' => $surprise->id], ['class' => 'btn btn-primary btn-block']) !!}
                
                <p class="mt-5">※下記の動作は取り消せません</p>
                {!! Form::open(['route' => ['surprises.destroy', $surprise->id], 'method' => 'delete']) !!}
                    {!! Form::submit('投稿を削除する', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            @endif
        </div>
    @endif
@endsection