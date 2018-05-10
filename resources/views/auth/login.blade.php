@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ログイン</h1>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            
            {!! Form::open(['url' => URL::to('/login', null, true)]) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    <p>（アカウント作成時に登録したもの）</p>
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
            <p>ご利用は初めてですか？{!! link_to('signup/', 'こちらでアカウントを作成', null, true) !!}できます。</p>
        </div>
    </div>
@endsection