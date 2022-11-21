<section id="tournament-tournaments-list">

    <ul>

        @foreach($tournaments as $tournament)
            <x-tournament-page.tournaments-list-item
                :tournamentID="$tournament->tournament_id"
                :tournamentName="$tournament->tournament_name"
                :sport="'Futsal'"
                :numberOfParticipants="$tournament->number_of_participants"
                :dateOfStart="'16/12/2022'"
            />
        @endforeach

    </ul>

</section>
