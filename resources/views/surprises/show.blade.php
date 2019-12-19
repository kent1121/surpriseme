@extends('layouts.app')

@section('content')
    @if ($surprise)
        <div class="col-sm-10 offset-sm-1 mb-5">
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
                <div class="d-flex mb-3">
                    <div class="mr-2">
                        @include('surprises.favorite_button', ['surprise' => $surprise])
                    </div>
                    <div class="mr-auto">
                        @include('surprises.want_button', ['surprises' => $surprise])
                    </div>
            @if (Auth::id() == $surprise->user_id)
                        <div class="mr-2">
                            {!! link_to_route('surprises.edit', '編集', ['id' => $surprise->id], ['class' => 'btn btn-primary']) !!}
                        </div>
                        <div>
                            {!! Form::open(['route' => ['surprises.destroy', $surprise->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                </div>
                <p class="text-right">※削除は取り消せません</p>
            @endif
            </div>
            <div class="mb-5">
                <h5>コメント一覧</h5>
                {!! Form::open(['route' => ['comments.comment', $surprise->id]]) !!}
                    <div class="form-group text-right">
                        {!! Form::textarea('comment', old('comment'), ['class' => 'form-control mb-1', 'rows' => '2']) !!}
                        {!! Form::submit('コメントする', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
                @if (count($surprise->surprise_comments) > 0)
                    @foreach($surprise->surprise_comments as $comment)
                        <div class="mb-1">
                            <li class="media border">
                                <img class="mr-2 rounded" src="" alt="画像が入ります">
                                <div class="media-body">
                                    <div>
                                        <a href="{{ route('users.show', ['id' => $comment->user_id]) }}">{{ $comment->user->name }}</a>
                                    </div>
                                    <div>
                                        <p class="mb-0">{!! nl2br(e($comment->comment)) !!}</p>
                                    </div>
                                </div>
                            </li>
                            <div class="text-right">
                                {!! Form::open(['route' => ['comments.delete_comment', $comment->id]]) !!}
                                    {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>まだコメントがありません</p>
                @endif
            </div>
        </div>
    @endif
@endsection