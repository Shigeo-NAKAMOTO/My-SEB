<td>
    @if (Auth::user()->is_favoring($phrase->id))
        {!! Form::open(['route' => ['phrase.unfavor', $phrase->id], 'method' => 'delete']) !!}
            {!! Form::submit('いいね！を外す', ['class' => 'btn btn-warning btn-xs']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['phrase.favor', $phrase->id], 'method' => 'post']) !!}
            {!! Form::submit('いいね！', ['class' => 'btn btn-success btn-xs']) !!}
        {!! Form::close() !!}
    @endif
</td>