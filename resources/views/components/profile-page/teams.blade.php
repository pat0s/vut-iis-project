<section id="teams">
    <h3>Teams</h3>

    @if($profileOwner)
        <button class="button-styled" onclick="window.changePage('{{asset('/team/create')}}')">
        {{-- <button class="button-styled" onclick="window.changePage('http://127.0.0.1:8000/team/create')"> --}}
            Create Team
        </button>
    @endif

    <ul>
        <x-profile-page.teams-item
            :teamID="1"
            :teamName="'Team 1'"
            :profileOwner="$profileOwner"
        />

        <x-profile-page.teams-item
            :teamName="'Team 1'"
            :teamID="1"
            :profileOwner="$profileOwner"
        />

        <x-profile-page.teams-item
            :teamName="'Team 1'"
            :teamID="1"
            :profileOwner="$profileOwner"
        />

        <x-profile-page.teams-item
            :teamName="'Team 1'"
            :teamID="1"
            :profileOwner="$profileOwner"
        />

        <x-profile-page.teams-item
            :teamName="'Team 1'"
            :teamID="1"
            :profileOwner="$profileOwner"
        />

        <x-profile-page.teams-item
            :teamName="'Team 1'"
            :teamID="1"
            :profileOwner="$profileOwner"
        />


    </ul>
</section>
