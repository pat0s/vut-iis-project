<x-layout>
    <main id="tournament-page">
        <section>
            <h2>{{$tournament->tournament_name}}</h2>

            <a href="/tournaments/1/approved" class="button-styled" id="approved-button">Approve tournament</a>

            <section id="tournament-description">
                <h3>Description</h3>

                <p>{{$tournament->description}}</p>

            </section>

            <x-tournament-page.participants />

            <x-tournament-page.more-info

                :dateOfStart="'23.10.2022'"
                :dateOfEnd="'25.10.2022'"
                :pricePool="'5000EUR and trophies'"
                :capacity="$tournament->number_of_participants"
                :sport="'Cycling'"
                :approved="'True'"

                {{-- :dateOfStart="$tournament->dateOfStart"
                :pricePool="$tournament->pricePool"
                :capacity="$tournament->capacity" --}}

            />

        </section>

        <x-tournament-page.tournament-schedule
            :tournamentID="1"
            :tournamentCapacity="32"
        />



    </main>
</x-layout>
