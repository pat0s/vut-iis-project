@props([
    'tournamentID' => '1',
    'tournamentName' => 'Tournament Name',

])

<li>
    <a href="/tournament/{{$tournamentID}}">
        {{$tournamentName}}
    </a>
</li>