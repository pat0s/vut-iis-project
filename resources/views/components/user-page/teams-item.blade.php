@props([
    'teamName' => 'Incredible team',
    'teamID' => '1',
])


<li>
    <a href="/team/{{$teamID}}">
        {{$teamName}}
    </a>
    <a href=""><img src="{{asset('img/Trash.svg')}}" alt="Trash"></a>
</li>