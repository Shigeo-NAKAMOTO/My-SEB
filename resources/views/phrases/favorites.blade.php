<table class="table table-striped spacer">
@foreach($favorites as $favorite)
    <tr>
        <td>{!! nl2br(e($favorite->japanese)) !!}</td>
        <td>{!! nl2br(e($favorite->english)) !!}</td>
        @if( Auth::user()->id == $user->id )
            <td>
            {!! Form::open(['route' => ['phrase.unfavor', $favorite->id], 'method' => 'delete']) !!}
                {!! Form::submit('いいね！を外す', ['class' => 'btn btn-warning btn-xs']) !!}
            {!! Form::close() !!}
            </td>
        @endif
    </tr>
@endforeach
</table>