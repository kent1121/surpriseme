<div class="border mb-2">
    <p>自己紹介：</p>
    <p>{{ $user->profile }}</p>
    <p>性別：{{ $user->sex }}</p>
    <p>年齢：{{ $user->age }}</p>
</div>
@if (Auth::id() == $user->id)
    {!! link_to_route('users.edit', 'プロフィールを編集する', ['id' => $user->id], ['class' => 'btn btn-primary btn-block mb-5']) !!}
    
    <p>退会を希望される方はこちら</p>
    {!! link_to_route('users.delete_confirmation', 'アカウントを削除する', ['id' => $user->id], ['class' => 'btn btn-danger btn-block mb-5']) !!}
@endif
