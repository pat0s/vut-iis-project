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

    {{-- Only if tournaments is for teamns --}}
    <form method="POST" action="">
        <select name="team-selection" id="team-selection">
            
            {{-- user's teams --}}
            <option value="Mistas">Mistas</option>
            <option value="Yteckari">Yteckari</option>
        
        </select>
        <button type='submit' class="button-styled">Join tournament</button>
    </form>

    {{-- Only if tournament is for induvidual particiapants --}}
    {{-- <a href="" class="button-styled">Join tournament</a> --}}

    
    {{-- <a href="" class="button-styled">Opt out of the tournament</a> --}}
</section>



