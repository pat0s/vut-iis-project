@props([
    'teamID' => '1',
    'teamName' => 'Sport name',
    'numberOfMembers' => '1',
])


<li class="sport-list-item">
        <p>ID: &nbsp;&nbsp;{{$teamID}}</p>
        <p>{{$teamName}}</p>
        <p>{{$numberOfMembers}}</p>
</li>
