@extends('layouts.app')

@section('content')
    <?php echo $is_production; ?>
    <div class="text-center">
        <h1>アカウント作成</h1>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            
            {!! Form::open(['url' => URL::to('/signup', null, true)]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'ニックネーム') !!}
                    <p>（My瞬間英作文の中で使用される呼び名です。好きな名前を登録してください）</p>
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '英作太郎']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'A-saku@mail.com']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    <p>（6文字以上のパスワードを設定してください）</p>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '******']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '******']) !!}
                </div>
                
                {!! Form::submit('送信する', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection