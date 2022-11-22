<x-layout>
    <main id="tournament-page">
        <section>
            <h2>{{$name}}</h2>

            <a href="/tournaments/1/approved" class="button-styled" id="approved-button">Approve tournament</a>

            <section id="tournament-description">
                <h3>Description</h3>

                <p>{{$description}}</p>

            </section>

            <x-tournament-page.participants />

            <x-tournament-page.more-info

                :dateOfStart="$start_date"
                :dateOfEnd="$end_date"
                :pricePool="$price_pool.'$'"
                :capacity="$capacity"
                :sport="$sport"
                :approved="$approved"

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
