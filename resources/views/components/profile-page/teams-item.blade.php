
<li>
    <a href="/team/{{$teamID}}">
        {{$teamName}}
    </a>
    @if($profileOwner)
        <a href=""><img src="{{asset('img/Trash.svg')}}" alt="Trash"></a>
    @endif
</li>
