@props([
    'tournamentID' => '1',
    'tournamentName' => 'Tournament Name',
    'sport' => 'Sport',
    'numberOfParticipants',
    'dateOfStart', 
])

<li>
    <a href="tournament/{{$tournamentID}}">
        <div>
            <p>ID: &nbsp;&nbsp;{{$tournamentID}}</p>
            <p>{{$tournamentName}}</p>
        </div>
        <div>
            <p>{{$sport}}</p>
            <p>Počet účastníku: &nbsp;&nbsp; {{$numberOfParticipants}}</p>
            <p>{{$dateOfStart}}</p>
        </div>
    </a>
</li>