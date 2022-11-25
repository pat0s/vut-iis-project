<form method="POST" action="/tournaments/{{$tournament->tournament_id}}/edit" id="tournament-form">
    @csrf
    
    <input type="submit" placeholder="Submit button" id="submit-button" name="submit-button" class="button-styled hidden-element" onclick="window.buttonPressedTournament()">
    <button id="cancel-button" class="button-styled hidden-element" type="button" onclick="window.buttonPressedTournament()">Cancel</button>
    
    @if(auth()->user() && auth()->user()->person_id == $tournament->manager_id)
        @if($tournament->is_generated == 0)

            @if($tournament->is_approved == 0)
                <p id="generate-button-message">The tournament need to be approved and have all {{$tournament->number_of_participants}} participants</p>
            @elseif($tournament->participants->count() != $tournament->number_of_participants)
                <p id="generate-button-message">The tournament require all {{$tournament->number_of_participants}} participants</p>
            @endif
        
            <input type="submit" {{$tournament->participants->count() != $tournament->number_of_participants ? "disabled" : ""}} value="Generate tournament schedule" placeholder="Generate tournament schedule" id="generate-button" class="button-styled" name="generate-button">
        
        @endif
    
        <button id="edit-button" {{$tournament->is_generated == 0 ? "disabled" : "" }} class="button-styled" type="button" onclick="window.buttonPressedTournament()">Edit tournament results</button>
    @endif

    <div id="tournament-schedule">
        @php
            $indexOfMatch = 0;
        @endphp
    
        @while(intdiv($tournament->number_of_participants, 2) > 0 )
        
            <div id="ul{{$tournament->number_of_participants}}">

                @for ($i = 0; $i < intdiv($tournament->number_of_participants, 2); $i++)

                        <fieldset>
                            <span><a href="/user/1">{{$matches[$indexOfMatch]->participant1_id}}</a> <input type="radio" name="{{$tournament->number_of_participants/2}}i{{$i}}" value="{{$matches[$indexOfMatch]->participant1_id}}" class="participant-name-input hidden-element" {{$matches[$indexOfMatch]->participant1_id != null && $matches[$indexOfMatch]->participant1_id == $matches[$indexOfMatch]->winner_id ? "checked" : ""}}></span>
                                <p class="match-result">{{$matches[$indexOfMatch]->participant1_result}}</p><input type="number" min="0" max="100" step="1" value="{{$matches[$indexOfMatch]->participant1_result}}" class="match-result-input hidden-element" name="r{{$tournament->number_of_participants/2}}i{{$i}}p1">
                            <span><a href="/user/1">{{$matches[$indexOfMatch]->participant2_id}}</a> <input type="radio" name="{{$tournament->number_of_participants/2}}i{{$i}}" value="{{$matches[$indexOfMatch]->participant2_id}}" class="participant-name-input hidden-element" {{$matches[$indexOfMatch]->participant2_id != null && $matches[$indexOfMatch]->participant2_id == $matches[$indexOfMatch]->winner_id ? "checked" : ""}}></span>
                                <p class="match-result">{{$matches[$indexOfMatch]->participant2_result}}</p><input type="number" min="0" max="100" step="1" value="{{$matches[$indexOfMatch]->participant2_result}}" class="match-result-input hidden-element" name="r{{$tournament->number_of_participants/2}}i{{$i}}p2">
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
            <span><a class="participant-name" href="/user/1">{{$matches[$indexOfMatch-1]->winner_id}}</a></span>
        </div>

    
    </div>
</form>