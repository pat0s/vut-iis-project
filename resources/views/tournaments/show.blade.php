<x-layout>
    @if(Session::has('message'))
        <x-flash-message message="{{Session::get('message')}}" successOrerror="success"/>
    @elseif(Session::has('error'))
        <x-flash-message message="{{Session::get('error')}}" successOrerror="error"/>
    @endif

    <main id="tournament-page">
        <section>
            <h2>{{$tournament->tournament_name}}</h2>

            @auth
                @if(!$tournament->is_approved and $isAdmin)
                    <form method="POST" action="/tournaments/{{$tournament->tournament_id}}/edit">
                        @csrf
                        <input type="submit" name="approve-button" class="button-styled" value="Approve tournament"/>
                    </form>
                @endif
            @endauth

            <section id="tournament-description">
                <h3>Description</h3>

                <p>{{$tournament->description}}</p>

            </section>

            <x-tournament-page.participants
                :tournament="$tournament"
                :participants="$participants"
                {{-- :teams="$teams" --}}
            />

            <x-tournament-page.more-info
                :dateOfStart="$startDate"
                :dateOfEnd="$endDate"
                :pricePool="$pricepool"
                :capacity="$tournament->number_of_participants"
                :sport="$tournament->sport->name.' ('.$tournament->sport->number_of_players.' vs '.$tournament->sport->number_of_players.')'"
                :approved="$approved"
                :managerID="$tournament->manager_id"
            />

        </section>

        <x-tournament-page.tournament-schedule
            :tournament="$tournament"
            :matches="$matches"
        />



    </main>
</x-layout>
