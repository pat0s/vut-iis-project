<x-layout>
    <main id="tournament-page">
        <section>
            <h2>Tour de Kachna</h2>

            <a href="/tournament/1/approved" class="button-styled" id="approved-button">Approve tournament</a>
            
            <section id="tournament-description">
                <h3>Description</h3>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas et mollis eget urna, rhoncus fringilla. Pellentesque mattis velit purus quis egestas cursus nec. 
                    Massa amet at eget sed egestas dignissim aliquam. Molestie metus, tincidunt a egestas tempor pulvinar risus. Malesuada praesent sed tempor in amet 
                    dui egestas. Sit augue tempor lacus, faucibus. At purus in etiam eget ipsum. Bibendum ac integer feugiat elementum fermentum sem.
                </p>

            </section>

            <x-tournament-page.participants />

            <x-tournament-page.more-info

                :dateOfStart="'23.10.2022'"
                :pricePool="'5000EUR and trophies'"
                :capacity="'32'"
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