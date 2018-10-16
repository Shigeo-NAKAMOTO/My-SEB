@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <div class="row">
            {!! Form::open(['route' => 'phrases.store']) !!}
                <div class="form-group">
                    日本語
                    {!! Form::textarea('japanese', old('japanese'), ['class' => 'form-control', 'rows' => '1', 'placeholder' => 'こんにちわ！']) !!}
                    英文
                    {!! Form::textarea('english', old('english'), ['class' => 'form-control', 'rows' => '1', 'placeholder' => 'Hello!']) !!}
                </div>
                <div class="col-md-2 col-md-offset-5">
                {!! Form::submit('文を登録する', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            {!! Form::close() !!}
            <div class="col-xs-12">
                @if(count($phrases) > 0)
                    @include('phrases.phrases', ['phrases' => $phrases])
                @endif
            </div>
            <div class="col-md-2 col-md-offset-5">
            {!! link_to_route('phrases.index', 'Start!', null, ['class' => 'btn btn-success btn-block']) !!}
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>My 瞬間英作文</h1>
                <p>super beta</p>
                {!! link_to_route('signup.get', 'アカウントを作る（無料）', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
        <h2>瞬間英作文とは？</h2>
        <p>「英語上達完全マップ」の著者である森沢洋介さんが提唱する英語トレーニング法です。
        <a href="http://mutuno.o.oo7.jp/05_training/05_training02.html" target="_blank">（公式サイトによる解説）</a></p>
        <p>このトレーニングに適した書籍やツールはいろいろありますが、続けていると自分で気に入ったフレーズをトレーニングに組み込みたくなってきます。</p>
        <p>「My瞬間英作文」は気に入ったフレーズや言い回しを登録して反復練習をやりやすくするためのサービスです。</p>
    @endif
@endsection