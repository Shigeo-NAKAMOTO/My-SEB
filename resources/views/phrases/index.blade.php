@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <p>{!! nl2br(e($random_phrase->japanese)) !!}</p>
        </div>
    </div>
    <div class="col-md-2 col-md-offset-5">
    {!! link_to_route('phrases.show', '英文をみる', ['id' => $random_phrase->id], ['class' => 'btn btn-primary btn-block']) !!}
    </div>
    <div class="col-md-2 col-md-offset-5 spacer">
    {!! link_to_route('home', 'やめる', null, ['class' => 'btn btn-warning btn-block']) !!}
    </div>
@endsection