@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
            @if( Auth::user()->id == $user->id )
                <p>{!! link_to_route('user.delete_confirm', 'アカウントを削除する') !!}</p>
            @endif
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">登録した文 <span class="badge">{{ $count_phrases }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/favorites') ? 'active' : '' }}"><a href="{{ route('users.favorites', ['id' => $user->id]) }}">お気に入り <span class="badge">{{ $count_favorites }}</span></a></li>
                <li><a href="#">お気に入られ</a></li>
            </ul>
            @if( count($phrases) > 0 )
                @include('phrases.phrases', ['phrases' => $phrases])
            @endif
        </div>
    </div>
@endsection