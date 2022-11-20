<li>
    <a href="/users/{{$member->person_id}}">
        {{$member->username}}
    </a>
    @if($teamManager and $member->person_id != $teamManagerId)
        <a href=""><img src="{{asset('/img/Trash.svg')}}" alt="Trash"></a>
        @endif
    
        
    @if($member->person_id == $teamManagerId)
        <img src="{{asset('/img/Star.svg')}}" alt="Star">
    @elseif($member->person_id == auth()->user()->person_id)
        <a href=""><img src="{{asset('/img/exit.svg')}}" alt="leave"></a>
    @endif
</li>
