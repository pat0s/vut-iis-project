<section id="tournament-tournaments-list">
    <form>
        <div>
            <input type="radio" id="all" name="filterValue" value="all" checked="checked">
            <label for="all">all</label>
        </div>
        <div>
            <input type="radio" id="finished" name="filterValue" value="finished">
            <label for="finished">finished</label>
        </div>
        <div>
            <input type="radio" id="ongoing" name="filterValue" value="ongoing">
            <label for="ongoing">ongoing</label>
        </div>
        <div>
            <input type="radio" id="unstarted" name="filterValue" value="unstarted">
            <label for="unstarted">unstarted</label>
        </div>
        <div>
            <input type="radio" id="unstarted" name="filterValue" value="approved">
            <label for="unstarted">approved</label>
        </div>
        <div>
            <input type="radio" id="unstarted" name="filterValue" value="unapproved">
            <label for="unstarted">unapproved</label>
        </div>
    </form>

    <ul>

        <x-tournament-page.tournaments-list-item 
            :tournamentID="'132456'"
            :tournamentName="'Nazov Turnaja'"
            :sport="'Futsal'"
            :numberOfParticipants="'8'"
            :dateOfStart="'16/12/2022'"
        />
        <x-tournament-page.tournaments-list-item 
            :tournamentID="'132456'"
            :tournamentName="'Nazov Turnaja'"
            :sport="'DOTA 2'"
            :numberOfParticipants="'16'"
            :dateOfStart="'16/12/2022'"
        />
        <x-tournament-page.tournaments-list-item 
            :tournamentID="'132456'"
            :tournamentName="'Nazov Turnaja'"
            :sport="'CSGO: 1v1'"
            :numberOfParticipants="'4'"
            :dateOfStart="'16/12/2022'"
        />
        <x-tournament-page.tournaments-list-item 
            :tournamentID="'132456'"
            :tournamentName="'Nazov Turnaja'"
            :sport="'Tenis'"
            :numberOfParticipants="'16'"
            :dateOfStart="'16/12/2022'"
        />
        <x-tournament-page.tournaments-list-item 
            :tournamentID="'132456'"
            :tournamentName="'Nazov Turnaja'"
            :sport="'CSGO: 1v1'"
            :numberOfParticipants="'32'"
            :dateOfStart="'16/12/2022'"
        />
        <x-tournament-page.tournaments-list-item 
            :tournamentID="'132456'"
            :tournamentName="'Nazov Turnaja'"
            :sport="'Tenis'"
            :numberOfParticipants="'16'"
            :dateOfStart="'16/12/2022'"
        />
            
    </ul>

</section>