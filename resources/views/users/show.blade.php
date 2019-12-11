@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="" alte="画像が入ります">
                </div>
            </div>
            {{ link_to_route('users.edit', 'プロフィールを編集する', ['id' => $user->id]) }}
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a class="nav-link" href="#">プロフィール詳細</a></li>
                <li class="nav-item"><a class="nav-link" href="#">投稿一覧</a></li>
                <li class="nav-item"><a class="nav-link" href="#">お気に入り</a></li>
            </ul>
        </div>
    </div>
@endsection