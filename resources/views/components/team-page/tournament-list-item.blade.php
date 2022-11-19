@props([
    'tournamentID' => '1',
    'tournamentName' => 'Tournament Name',

])

<li>
    <a href="/tournaments/{{$tournamentID}}">
        {{$tournamentName}}
    </a>
</li>
