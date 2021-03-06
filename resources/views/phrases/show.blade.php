@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <p>{!! nl2br(e($phrase->english)) !!}</p>
        </div>
    </div>
    <div class="col-md-2 col-md-offset-5">
    {!! link_to_route('phrases.index', '次へ', null, ['class' => 'btn btn-success btn-block']) !!}
    </div>
    <div class="col-md-2 col-md-offset-5 spacer">
    {!! link_to_route('home', 'やめる', null, ['class' => 'btn btn-warning btn-block']) !!}
    </div>
@endsection