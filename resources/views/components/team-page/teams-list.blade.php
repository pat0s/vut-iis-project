<div id="teams-list-parent">

    <div id="list-legend">
        <p>ID</p>
        <p>Name of the team</p>
        <p>Number of participants</p>
    </div>

    <ul id="teams-list">
        @foreach($teams as $team)
            <x-team-page.teams-list-item
                :teamID="$team->team_id"
                :teamName="$team->team_name"
                :numberOfMembers="$team->number_of_players"
            />
        @endforeach
    </ul>

</div>
