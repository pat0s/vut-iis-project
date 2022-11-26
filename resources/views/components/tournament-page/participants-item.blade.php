<li>
    <a href="/users/{{$userID}}">
        {{$userName}}
    </a>

    @auth
        @if(!$tournament->is_generated && ($tournament->manager_id == auth()->user()->person_id))
            <form method="POST" action="/participants/{{$userID}}">
                @csrf
                @method('DELETE')
                <input type="image" src="{{asset('/img/Trash.svg')}}" alt="Trash">
            </form>
        @endif
    @endauth
</li>
