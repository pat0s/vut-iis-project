<section id="tournament-tournaments-list">

    <ul>

        @foreach($tournaments as $tournament)
            <x-tournament-page.tournaments-list-item
                :tournamentID="$tournament->tournament_id"
                :tournamentName="$tournament->tournament_name"
                :sport="$tournament->sport->name.' ('.$tournament->sport->number_of_players.' vs '.$tournament->sport->number_of_players.')'"
                :numberOfParticipants="$tournament->number_of_participants"
                :dateOfStart="date('d-m-Y', strtotime($tournament->start_date))"
            />
        @endforeach

    </ul>

</section>
