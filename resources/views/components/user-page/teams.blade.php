<section id="teams">
    <h3>Teams</h3>

    @if($profileOwner)
        <button class="button-styled" onclick="window.changePage('{{asset('/teams/create')}}')">
            Create Team
        </button>
    @endif

    <ul>
    @foreach($teams as $team)
        <x-user-page.teams-item
            :team="$team"
            :profileOwner="$profileOwner"
        />
    @endforeach
    </ul>

</section>
