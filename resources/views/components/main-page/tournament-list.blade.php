<section class="main-tournament-list" id="tournaments">
    <h2>
        Tournaments
    </h2>
    <a href="/tournament/create" class="button-styled">Create Tournament</a>
    <div>
        <ul>

            <x-main-page.tournament-list-item 
                :tournamentID="'132456'"
                
                :tournamentName="'Nazov Turnaja'"

                :sport="'Futsal'"
                :numberOfParticipants="'8'"
                :dateOfStart="'16/12/2022'"
            />
            <x-main-page.tournament-list-item 
                :tournamentID="'132456'"
                :tournamentName="'Nazov Turnaja'"
                :sport="'DOTA 2'"
                :numberOfParticipants="'16'"
                :dateOfStart="'16/12/2022'"
            />
            <x-main-page.tournament-list-item 
                :tournamentID="'132456'"
                :tournamentName="'Nazov Turnaja'"
                :sport="'CSGO: 1v1'"
                :numberOfParticipants="'4'"
                :dateOfStart="'16/12/2022'"
            />
            <x-main-page.tournament-list-item 
                :tournamentID="'132456'"
                :tournamentName="'Nazov Turnaja'"
                :sport="'Tenis'"
                :numberOfParticipants="'16'"
                :dateOfStart="'16/12/2022'"
            />
            <x-main-page.tournament-list-item 
                :tournamentID="'132456'"
                :tournamentName="'Nazov Turnaja'"
                :sport="'CSGO: 1v1'"
                :numberOfParticipants="'32'"
                :dateOfStart="'16/12/2022'"
            />
            <x-main-page.tournament-list-item 
                :tournamentID="'132456'"
                :tournamentName="'Nazov Turnaja'"
                :sport="'Tenis'"
                :numberOfParticipants="'16'"
                :dateOfStart="'16/12/2022'"
            />
            
        </ul>
    </div>

</section>