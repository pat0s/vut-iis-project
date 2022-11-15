<div id="teams-list-parent">

    <div id="list-legend">
        <p>Name of the team</p>
        <p>Number of participants</p>
    </div>
    
    <div id="teams-list">
        
        @for ($i = 0; $i < 20; $i++)
            <x-team-page.teams-list-item
                :teamID="1"
                :teamName="'Team name'"
                :numberOfMembers="1"
            />
            
        @endfor

    </div>


</div>