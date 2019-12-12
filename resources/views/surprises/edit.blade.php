@extends('layouts.app')

@section('content')
    <div class="col-sm-6 offset-sm-3 mb-5">
        
        <h3>投稿を編集する</h3>
        {{ Form::model($surprise, ['route' => ['surprises.update', 'id' => $surprise->id], 'method' => 'put']) }}
        
            <div class="form-group">
                {!! Form::label('title', 'タイトル') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('reaction', 'リアクション') !!}
                {!! Form::text('reaction', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('budget', '予算') !!}
                {!! Form::number('budget', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('target', 'ターゲット') !!}
                {!! Form::text('target', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('content', '体験談') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('更新する', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection