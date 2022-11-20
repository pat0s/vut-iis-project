
<li>
    <a href="/teams/{{$team->team_id}}">
        {{$team->team_name}}
    </a>
    @if($profileOwner and $team->manager_id != auth()->user()->person_id)
        <a href="/teams/{{$team->team_id}}/delete"><img src="{{asset('img/exit.svg')}}" alt="Leave"></a>
    @endif
</li>
