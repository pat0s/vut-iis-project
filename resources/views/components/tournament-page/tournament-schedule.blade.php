<form method="POST" action="/tournaments/{{$tournament->tournament_id}}/edit" id="tournament-form">
    @csrf

    <input type="submit" placeholder="Submit button" id="submit-button" name="submit-button" class="button-styled hidden-element" >
    <button id="cancel-button" class="button-styled hidden-element" type="button" onclick="window.buttonPressedTournament()">Cancel</button>

    @if(auth()->user() && auth()->user()->person_id == $tournament->manager_id)
            {{-- Controlling current date to disable EDIT button more than 1 day after tournament END DATE --}}
        @php
            $currentTime = Carbon\Carbon::now();
            $currentTimeMinusDay = Carbon\Carbon::now()->subDay();
        @endphp

        @if($tournament->is_generated == 0)
            @if($tournament->is_approved == 0)
                <p id="generate-button-message">The tournament need to be approved and have all {{$tournament->number_of_participants}} participants</p>
            @elseif($currentTime->gt($tournament->start_date))
                    <p id="generate-button-message">The tournament Start date has already been. You are unable to generate tournamnet schedule.</p>
            @elseif($tournament->participants->count() != $tournament->number_of_participants)
                <p id="generate-button-message">The tournament require all {{$tournament->number_of_participants}} participants</p>
            @endif

            <input type="submit" {{$tournament->participants->count() != $tournament->number_of_participants || $currentTime->gt($tournament->start_date) ? "disabled" : ""}} value="Generate tournament schedule" placeholder="Generate tournament schedule" id="generate-button" class="button-styled" name="generate-button">

        @endif



        <button id="edit-button" {{($tournament->is_generated == 0 || $currentTimeMinusDay->gt($tournament->end_date)) ? "disabled" : "" }} class="button-styled" type="button" onclick="window.buttonPressedTournament()">Edit tournament results</button>

    @endif

    <div id="tournament-schedule">

        @php
            $indexOfMatch = 0;
        @endphp

        @while(intdiv($tournament->number_of_participants, 2) > 0 )

            <div id="ul{{$tournament->number_of_participants}}">

                @for ($i = 0; $i < intdiv($tournament->number_of_participants, 2); $i++)

                        @php
                            if($tournament->is_generated)
                            {
                                $participant1Index = array_search($matches[$indexOfMatch]->participant1_id , array_column( $participants->toArray(), 'participant_id'));
                                $participant2Index = array_search($matches[$indexOfMatch]->participant2_id , array_column( $participants->toArray(), 'participant_id'));
                            }
                        @endphp

                        <fieldset>
                            <span>{{$tournament->is_generated && $participant1Index !== false ? $participants[$participant1Index]->participant_name : ""}}<input type="radio" name="{{$tournament->number_of_participants/2}}i{{$i}}" value="{{$matches[$indexOfMatch]->participant1_id}}" class="participant-name-input hidden-element" {{$matches[$indexOfMatch]->participant1_id != null && $matches[$indexOfMatch]->participant1_id == $matches[$indexOfMatch]->winner_id ? "checked" : ""}}></span>
                                <p class="match-result">{{$matches[$indexOfMatch]->participant1_result}}</p><input type="number" min="0" max="100" step="1" value="{{$matches[$indexOfMatch]->participant1_result}}" class="match-result-input hidden-element" name="r{{$tournament->number_of_participants/2}}i{{$i}}p1">
                            <span>{{$tournament->is_generated && $participant2Index !== false ? $participants[$participant2Index]->participant_name : ""}}<input type="radio" name="{{$tournament->number_of_participants/2}}i{{$i}}" value="{{$matches[$indexOfMatch]->participant2_id}}" class="participant-name-input hidden-element" {{$matches[$indexOfMatch]->participant2_id != null && $matches[$indexOfMatch]->participant2_id == $matches[$indexOfMatch]->winner_id ? "checked" : ""}}></span>
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


        @php
            if($tournament->is_generated){
                $participantWinnerIndex = array_search($matches[$indexOfMatch-1]->winner_id , array_column( $participants->toArray(), 'participant_id'));
            }
        @endphp

        <!-- final -->
        <div id="ul-final">
            <span>{{$tournament->is_generated && $participantWinnerIndex !== false ? $participants[$participantWinnerIndex]->participant_name : ""}}</span>
        </div>


    </div>
</form>
