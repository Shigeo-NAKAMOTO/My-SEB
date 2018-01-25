<table class="table table-striped spacer">
@foreach($phrases as $phrase)
    <tr>
        <td>{!! nl2br(e($phrase->japanese)) !!}</td>
        <td>{!! nl2br(e($phrase->english)) !!}</td>
        <td>
            @if( Auth::user()->id == $phrase->user_id )
                {!! Form::open(['route' => ['phrases.destroy', $phrase->id], 'method' => 'delete']) !!}
                    {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-xs']) !!}
                {!! Form::close() !!}
            @endif
        </td>
    </tr>
@endforeach
</table>
{!! $phrases->render() !!}