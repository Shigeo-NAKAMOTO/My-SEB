@extends('layouts.app')

@section('content')
    {!! Form::model($selected_phrase, ['route' => ['phrases.update', $selected_phrase->id], 'method' => 'put']) !!}
        <div class="form-group">
            日本語
            {!! Form::textarea('japanese', $selected_phrase->japanese, ['class' => 'form-control', 'rows' => '1']) !!}
            英文
            {!! Form::textarea('english', $selected_phrase->english, ['class' => 'form-control', 'rows' => '1']) !!}
        </div>
        <div class="col-md-2 col-md-offset-5">
        {!! Form::submit('更新する', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}

    <div class="col-md-2 col-md-offset-5 spacer">
    {!! link_to_route('home', '戻る', null, ['class' => 'btn btn-warning btn-block']) !!}
    </div>
@endsection