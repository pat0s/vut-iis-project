<section class="main-tournament-list" id="tournaments">
    <h2>
        Tournaments
    </h2>
    <a href="/tournaments/create" class="button-styled">Create Tournament</a>
    <div>
        <ul>
            @foreach($tournaments as $tournament)
            <x-main-page.tournament-list-item
                :tournamentID="$tournament->tournament_id"

                :tournamentName="$tournament->tournament_name"

                :sport="$tournament->sport->name.' ('.$tournament->sport->number_of_players.' vs '.$tournament->sport->number_of_players.')'"
                :numberOfParticipants="$tournament->number_of_participants"
                :dateOfStart="date('d-m-Y', strtotime($tournament->start_date))"
            />
            @endforeach
        </ul>
    </div>

</section>
