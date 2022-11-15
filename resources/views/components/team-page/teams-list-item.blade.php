@props([
    'teamID' => '1',
    'teamName' => 'Team name',
    'numberOfMembers' => '1',
])


<li class="team-list-item">
    <a href="/team/{{$teamID}}">
        <p>ID: &nbsp;&nbsp;{{$teamID}}</p>
        <p>{{$teamName}}</p>
        <p>{{$numberOfMembers}}</p>
    </a>
</li>
