@if (count($users) > 0)
<ul class="media-list">
@foreach ($users as $user)
    @if( $user->id != Auth::user()->id )
        <li class="media">
            <div class="media-left">
                <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
            </div>
            <div class="media-body">
                <div>
                    <p>{!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}</p>
                </div>
            </div>
        </li>
    @endif
@endforeach
</ul>
{!! $users->render() !!}
@endif