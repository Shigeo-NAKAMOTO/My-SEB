@extends('layouts.app')
@section('content')
    <div class="text-center">
        <h1>パスワードのリセット</h1>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
        	    <div class="panel-body">
        		    アカウント作成時に登録したメールアドレスを入力して送信ボタンを押してください。パスワードリセット用のメールが届きます。
        	    </div>
            </div>
            {!! Form::open(['url' => '/password/email']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('送信', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection