@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <div class="row">
            {!! Form::open(['route' => 'phrases.store']) !!}
                <div class="form-group">
                    和文
                    {!! Form::textarea('japanese', old('japanese'), ['class' => 'form-control', 'rows' => '1', 'placeholder' => 'こんにちわ！']) !!}
                    英文
                    {!! Form::textarea('english', old('english'), ['class' => 'form-control', 'rows' => '1', 'placeholder' => 'Hello!']) !!}
                </div>
                <div class="col-md-3 col-md-offset-5">
                {!! Form::submit('文を登録する', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            {!! Form::close() !!}
            <div class="col-xs-12">
                @if(count($phrases) > 0)
                    @include('phrases.phrases', ['phrases' => $phrases])
                @endif
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>My 瞬間英作文</h1>
                {!! link_to_route('signup.get', 'アカウントを作ってみる', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection