@extends('layouts.app')

@section('content')
    <div class="text-center">
        <p class="alert alert-danger">本当にこのアカウントを削除しますか？</p>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="center">
                <table class="table table-bordered">
                    <tr>
                        <th>名前</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                </table>
            </div>
            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <p>※この動作は取り消せません</p>
                {!! Form::submit('アカウントを削除する', ['class' => 'btn btn-danger btn-block']) !!}
            {!! link_to_route('users.show', 'プロフィール画面に戻る', ['id' => $user->id], ['class' => 'btn btn-primary btn-block mt-2']) !!}
        </div>
    </div>
@endsection