<div id="sports-list-parent">

    <div id="list-legend">
        <p>Name of the sport</p>
        <p>Number of members</p>
    </div>
    
    <ul id="sports-list">
        
        @for ($i = 0; $i < 20; $i++)
            <x-team-page.teams-list-item
                :teamID="1"
                :teamName="'Sport name'"
                :numberOfMembers="1"
            />
        @endfor

    </ul>


</div>