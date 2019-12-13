<div class="row mb-5">
    @if (count($surprises) > 0)
        @foreach ($surprises as $surprise)
            <article class="border rounded col-sm-6 col-md-4 mb-2">
                <div>
                    <p class="mb-0">投稿者：{{ link_to_route('users.show', $surprise->user->name, ['id' => $surprise->user->id]) }}</p>
                    <p class="mb-0">タイトル：{{ $surprise->title }}</p>
                    <p class="mb-0">リアクション：<i class="fa fa-lg {{ $surprise->icon }}"></i> {{ $surprise->reaction }}</p>
                    <p class="mb-0">予算：{{ number_format($surprise->budget) }}円</p>
                    <p class="mb-0">ターゲット：{{ $surprise->target }}</p>
                    <p class="mb-0">体験談：</p>
                    <p class="small">{{ mb_substr($surprise->content, 0, 100) }}{!! link_to_route('surprises.show', ' ... 詳細を見る', ['id' => $surprise->id]) !!}</p>
                </div>
            </article>
        @endforeach
    @endif
</div>
{!! $surprises->links('pagination::bootstrap-4') !!}