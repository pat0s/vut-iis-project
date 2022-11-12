@props([
    'tournamentID',
    'tournamentCapacity',
])

<form method="POST" action="tournaments/edit" id="tournament-form">

    <input type="submit" placeholder="Submit button" id="submit-button" class="button-styled hidden-element" onclick="window.buttonPressedTournament()">
    <button id="cancel-button" class="button-styled hidden-element" type="button" onclick="window.buttonPressedTournament()">Cancel</button>
    <button id="edit-button" class="button-styled" type="button" onclick="window.buttonPressedTournament()">Edit tournament results</button>

    <div id="tournament-schedule">

        @while(intdiv($tournamentCapacity, 2) > 0 )

            <div id="ul{{$tournamentCapacity}}">

                @for ($i = 0; $i < intdiv($tournamentCapacity, 2); $i++)
                    <fieldset>
                        <span><a href="/user/1">Mista MrDalo</a> <input type="radio" name="{{$tournamentCapacity}}i{{$i}}" value="participant-name" class="participant-name-input hidden-element"></span>
                            <p class="match-result">16</p><input type="number" min="0" max="20" class="match-result-input hidden-element" name="r{{$tournamentCapacity}}i{{$i}}p1">
                        <span><a href="/user/1">Mista Pat0s</a> <input type="radio" name="{{$tournamentCapacity}}i{{$i}}" value="participant-name" class="participant-name-input hidden-element"></span>
                            <p class="match-result">5</p><input type="number" min="0" max="20" class="match-result-input hidden-element" name="r{{$tournamentCapacity}}i{{$i}}p2">
                    </fieldset>
                @endfor

            </div>

            @php
              $tournamentCapacity = $tournamentCapacity / 2;  
            @endphp
        
        @endwhile

        <!-- final -->
        <div id="ul-final">
            <span><a class="participant-name" href="/user/1">Mista MrDalo</a></span>
        </div>

    
    </div>
</form>