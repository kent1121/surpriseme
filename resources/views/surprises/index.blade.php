<div class="row mb-5">
    @foreach ($surprises as $surprise)
        @php
            $reaction = '';
            $icon = '';
        @endphp
        
        @switch($surprise->reaction)
            @case('手ごたえあり')
                @php
                    //$reaction = 'border-success';
                    $icon = "fa-grin-squint";
                @endphp
                @break
            @case('まずまず')
                @php
                    //$reaction = 'border-primary';
                    $icon = "fa-smile";
                @endphp
                @break
            @case('失敗した')
                @php
                    //$reaction = 'border-danger';
                    $icon = "fa-grin-beam-sweat";
                @endphp
                @break
            @default
                @php
                    //$reaction = 'border-dark';
                    $icon = "fa-question-circle";
                @endphp
            @endswitch
                    
        <article class="{{ $reaction }} border rounded col-sm-6 col-md-4 mb-2">
            <div>
                <p class="mb-0">投稿者：{{ link_to_route('users.show', $surprise->user->name, ['id' => $surprise->user->id]) }}</p>
                <p class="mb-0">タイトル：{{ $surprise->title }}</p>
                <p class="mb-0">リアクション：<i class="fa fa-lg {{ $icon }}"></i> {{ $surprise->reaction }}</p>
                <p class="mb-0">予算：{{ $surprise->budget }} </p>
                <p class="mb-0">ターゲット：{{ $surprise->target }}</p>
                <p class="mb-0">体験談：</p>
                <p class="small">{{ mb_substr($surprise->content, 0, 100) }}{!! link_to_route('surprises.show', ' ... 詳細を見る', ['id' => $surprise->id]) !!}</p>
            </div>
        </article>
    @endforeach
</div>
{!! $surprises->links('pagination::bootstrap-4') !!}