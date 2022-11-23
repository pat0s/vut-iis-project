{{-- @props([
    'tournament',
    'matches',
]) --}}

<form method="POST" action="tournaments/edit" id="tournament-form">
    @csrf
    
    <input type="submit" placeholder="Submit button" id="submit-button" class="button-styled hidden-element" onclick="window.buttonPressedTournament()">
    <button id="cancel-button" class="button-styled hidden-element" type="button" onclick="window.buttonPressedTournament()">Cancel</button>
    @if(auth()->user() && auth()->user()->person_id == $tournament->manager_id)

        @if($tournament->is_generated == 0)
            <input type="submit" value="Generate tournament schedule" id="generate-button" class="button-styled">
        @endif
    
        <button id="edit-button" class="button-styled" type="button" onclick="window.buttonPressedTournament()">Edit tournament results</button>
    @endif

    <div id="tournament-schedule">
        @php
            $indexOfMatch = 0;
        @endphp
        @while(intdiv($tournament->number_of_participants, 2) > 0 )
        
            <div id="ul{{$tournament->number_of_participants}}">

                @for ($i = 0; $i < intdiv($tournament->number_of_participants, 2); $i++)

                        <fieldset>
                            <span><a href="/user/1">{{$matches[$indexOfMatch]->participant1_id}}</a> <input type="radio" name="{{$tournament->number_of_participants}}i{{$i}}" value="participant-name" class="participant-name-input hidden-element"></span>
                                <p class="match-result">{{$matches[$indexOfMatch]->participant1_result}}</p><input type="number" min="0" max="30" step="1" class="match-result-input hidden-element" name="r{{$tournament->number_of_participants}}i{{$i}}p1">
                            <span><a href="/user/1">{{$matches[$indexOfMatch]->participant2_id}}</a> <input type="radio" name="{{$tournament->number_of_participants}}i{{$i}}" value="participant-name" class="participant-name-input hidden-element"></span>
                                <p class="match-result">{{$matches[$indexOfMatch]->participant2_result}}</p><input type="number" min="0" max="30" step="1" class="match-result-input hidden-element" name="r{{$tournament->number_of_participants}}i{{$i}}p2">
                        </fieldset>
                        
                        @php
                            $indexOfMatch++;
                        @endphp
                @endfor

            </div>

            @php
              $tournament->number_of_participants = $tournament->number_of_participants / 2;  
            @endphp
        
        @endwhile

        <!-- final -->
        <div id="ul-final">
            <span><a class="participant-name" href="/user/1">{{$matches[$indexOfMatch]->participant2_id}}</a></span>
        </div>

    
    </div>
</form>