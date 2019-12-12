@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <h3 class="mb-5">最近の投稿</h3>
        <div class="row">
            @foreach ($surprises as $surprise)
                @php
                    $reaction = ''
                @endphp
                
                @switch($surprise->reaction)
                    @case('手ごたえあり')
                        @php
                            $reaction = 'border-success alert-success'
                        @endphp
                        @break
                    @case('まずまず')
                        @php
                            $reaction = 'border-primary alert-primary'
                        @endphp
                        @break
                    @case('失敗した')
                        @php
                            $reaction = 'border-danger alert-danger'
                        @endphp
                        @break
                    @default
                        @php
                            $reaction = 'border-dark alert-light'
                        @endphp
                    @endswitch
                            
                <article class="{{$reaction}} border alert rounded col-sm-4 mb-2">
                    <div class="box">
                        <p>投稿者：{{ link_to_route('users.show', $surprise->user->name, ['id' => $surprise->user->id]) }}</p>
                        <p>タイトル：{{ $surprise->title }}</p>
                        <p>リアクション：{{ $surprise->reaction }}</p>
                        <p>予算：{{ $surprise->budget }}</p>
                        <p>ターゲット：{{ $surprise->target }}</p>
                        <p>体験談：</p>
                        <p>{{ mb_substr($surprise->content, 0, 191) }}{!! link_to_route('surprises.show', ' ... 詳細を見る', ['id' => $surprise->id]) !!}</p>
                    </div>
                </article>
            @endforeach
        </div>
        {!! $surprises->links('pagination::bootstrap-4') !!}
        <div class="mb-5"></div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the "Surprise Me!"</h1>
                {!! link_to_route('signup.get', '新規ユーザー登録はこちら', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection