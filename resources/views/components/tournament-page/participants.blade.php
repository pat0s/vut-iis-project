<section id="participants">
    <h3>Participants</h3>
    <ul>
        
        {{-- @foreach ($collection as $item)
            
        @endforeach --}}

        @for ($i = 0; $i < 10; $i++)
            <x-tournament-page.participants-item 
                :userID="1"
                :userName="'Mista MrDalo'"
            />
        @endfor

    </ul>
    <button class="button-styled" onclick="window.joinTournament()">Join tournament</button>
</section>



