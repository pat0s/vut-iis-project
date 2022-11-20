@props([
    'sportID' => '1',
    'sportName' => 'Sport name',
    'numberOfPlayers' => '1',
])


<li class="sport-list-item">
        <p>ID: &nbsp;&nbsp;{{$sportID}}</p>
        <p>{{$sportName}}</p>
        <p>{{$numberOfPlayers}}</p>
</li>
