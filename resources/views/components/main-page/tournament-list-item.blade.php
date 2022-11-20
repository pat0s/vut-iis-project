@props([
    'tournamentID' => '1',
    'tournamentName' => 'Tournament Name',
    'sport' => 'Sport',
    'numberOfParticipants',
    'dateOfStart', 
])

<li>
    <a href="tournaments/{{$tournamentID}}">
        <div>
            <p>ID: &nbsp;&nbsp;{{$tournamentID}}</p>
            <p>{{$tournamentName}}</p>
        </div>
        <div>
            <p>{{$sport}}</p>
            <p>Number of particiapnts: &nbsp;&nbsp; {{$numberOfParticipants}}</p>
            <p>{{$dateOfStart}}</p>
        </div>
    </a>
</li>