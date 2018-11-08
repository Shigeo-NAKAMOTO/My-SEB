<table class="table table-striped spacer">
@foreach($phrases as $phrase)
    <tr>
        <td>{!! nl2br(e($phrase->japanese)) !!}</td>
        <td>{!! nl2br(e($phrase->english)) !!}</td>
        @if( Auth::user()->id == $phrase->user_id )
            <td>
            {!! Form::open(['route' => ['phrases.edit', $phrase->id], 'method' => 'get']) !!}
                {!! Form::submit('編 集', ['class' => 'btn btn-info btn-sm']) !!}
            {!! Form::close() !!}
            </td>
            <td>
            {!! Form::open(['route' => ['phrases.destroy', $phrase->id], 'method' => 'delete']) !!}
                {!! Form::submit('削 除', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
            </td>
        @else
            @include('favorites.favorite_button')
        @endif
    </tr>
@endforeach
</table>
{!! $phrases->render() !!}