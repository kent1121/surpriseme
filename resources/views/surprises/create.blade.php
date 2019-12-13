@extends('layouts.app')

@section('content')
    <div class="col-sm-6 offset-sm-3 mb-5">
        
        <h3>新規投稿</h3>
        {{ Form::model($surprise, ['route' => 'surprises.store']) }}
        
            <div class="form-group">
                {!! Form::label('title', 'タイトル') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('reaction', 'リアクション') !!}
                {!! Form::select('reaction', ['手ごたえあり' => '手ごたえあり', 'まずまず' => 'まずまず', '失敗した' => '失敗した'], null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('budget', '予算') !!}
                {!! Form::number('budget', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('target', 'ターゲット') !!}
                {!! Form::select('target', ['家族' => '家族', '恋人' => '恋人', '友達' => '友達', '夫婦' => '夫婦', 'その他' => 'その他'], null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('content', '体験談') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
@endsection