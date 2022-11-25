<li>
    <a href="/users/{{$member->person_id}}">
        {{$member->username}}
    </a>
    @if($isTeamManager and $member->person_id != $team->manager_id)
        <form method="POST" action="/teams/{{$team->team_id}}/remove-member/{{$member->person_id}}">
            @csrf
            @method('DELETE')
            <input type="image" src="{{asset('/img/Trash.svg')}}" alt="Trash">
        </form>
    @endif


    @if($member->person_id == $team->manager_id)
        <img src="{{asset('/img/Star.svg')}}" alt="Star">
    @elseif(auth()->user() && $member->person_id == auth()->user()->person_id)
        <form method="POST" action="/teams/{{$team->team_id}}/remove-member/{{$member->person_id}}">
            @csrf
            @method('DELETE')
            <input type="image" src="{{asset('/img/exit.svg')}}" alt="Leave">
        </form>
    @endif
</li>
