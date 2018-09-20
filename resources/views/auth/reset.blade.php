@extends('layouts.app')
@section('content')
    <div class="text-center">
        <h1>パスワードのリセット</h1>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
        	    <div class="panel-body">
        		    アカウント作成時に登録したメールアドレスと新しいパスワードを入力してリセットボタンを押してください。
        	    </div>
            </div>
            {!! Form::open(['url' => '/password/reset']) !!}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード確認') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('リセット', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection