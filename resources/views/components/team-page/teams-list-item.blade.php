<li class="team-list-item">
    @auth
        {{-- {{dd(array_search($teamID , array_column( auth()->user()->teams->toArray(), 'team_id')))}} --}}
        <a href="/teams/{{$teamID}}" class={{(array_search($teamID , array_column( auth()->user()->teams->toArray(), 'team_id')) !== false) ? "highlighted-team" : ""}}>
    @endauth
    @guest
        <a href="/teams/{{$teamID}}" >
    @endguest
        <p>{{$teamID}}</p>
        <p>{{$teamName}}</p>
        <p>{{$numberOfMembers}}</p>
    </a>
</li>
