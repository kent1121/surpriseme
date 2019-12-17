@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{{ $user->name }}のプロフィール編集</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>
                
                <!--<div class="form-group">-->
                <!--    {!! Form::label('avatar', 'アバター画像') !!}-->
                <!--    {!! Form::text('avatar', null, ['class' => 'form-control']) !!}-->
                <!--</div>-->
                
                <div class="form-group">
                    {!! Form::label('sex', '性別') !!}
                    {!! Form::select('sex', ['男性' => '男性', '女性' => '女性', '秘密' => '秘密'], null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('age', '年齢') !!}
                    {!! Form::select('age', ['10代以下' => '10代以下', '20代' => '20代', '30代' => '30代', '40代以上' => '40代以上', '秘密' => '秘密', ], null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('profile', '自己紹介') !!}
                    {!! Form::textarea('profile', null,  ['class' => 'form-control', 'rows' => '5']) !!}
                </div>
                
                {!! Form::submit('更新する', ['class' => 'btn btn-primary btn-block mb-5']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection