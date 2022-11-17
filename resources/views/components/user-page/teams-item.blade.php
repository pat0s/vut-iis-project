
<li>
    <a href="/team/{{$team->team_id}}">
        {{$team->team_name}}
    </a>
    @if($profileOwner and $team->manager_id == auth()->user()->person_id)
        <a href="/team/{{$team->team_id}}/delete"><img src="{{asset('img/Trash.svg')}}" alt="Trash"></a>
    @endif
</li>
