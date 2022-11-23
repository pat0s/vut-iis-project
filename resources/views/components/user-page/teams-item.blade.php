<li>
    <a href="/teams/{{$team->team_id}}">
        {{$team->team_name}}
    </a>
    @if($profileOwner and $team->manager_id != auth()->user()->person_id)
        <form method="POST" action="/teams/{{$team->team_id}}/remove-member/{{auth()->user()->person_id}}">
            @csrf
            @method('DELETE')
            <input type="image" src="{{asset('/img/exit.svg')}}" alt="Leave">
        </form>
    @endif
</li>
