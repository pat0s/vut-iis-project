<section id="tournaments-in-team">
    <h3>Tournaments</h3>
    <ul>
        @foreach($tournaments as $tournament)
            <x-team-page.tournament-list-item
                :tournamentID="$tournament->tournament_id"
                :tournamentName="$tournament->tournament_name"
            />
        @endforeach
    </ul>
</section>
