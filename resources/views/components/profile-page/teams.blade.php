<section id="teams">
    <h3>Teams</h3>

    @if($profileOwner)
        <button class="button-styled" onclick="window.changePage('{{asset('/team/create')}}')">
            Create Team
        </button>
    @endif

    <ul>
    @foreach($teams as $team)
        <x-profile-page.teams-item
            :team="$team"
            :profileOwner="$profileOwner"
        />
    @endforeach
    </ul>

</section>
