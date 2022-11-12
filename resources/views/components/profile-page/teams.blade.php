<section id="teams">
    <h3>Teams</h3>

    <button class="button-styled" onclick="window.changePage('{{asset('/team/create')}}')">
    {{-- <button class="button-styled" onclick="window.changePage('http://127.0.0.1:8000/team/create')"> --}}
        Create Team
    </button>
    
    <ul>
        <x-profile-page.teams-item 
            :teamID="1"
        />
        
        <x-profile-page.teams-item 
            :teamName="'Team 1'"
            :teamID="1"
        />
        
        <x-profile-page.teams-item 
            :teamName="'Team 1'"
            :teamID="1"
        />
        
        <x-profile-page.teams-item 
            :teamName="'Team 1'"
            :teamID="1"
        />
        
        <x-profile-page.teams-item 
            :teamName="'Team 1'"
            :teamID="1"
        />
        
        <x-profile-page.teams-item 
            :teamName="'Team 1'"
            :teamID="1"
        />


    </ul>
</section>