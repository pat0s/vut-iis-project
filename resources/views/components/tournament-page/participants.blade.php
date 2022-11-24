<section id="participants">
    <h3>Participants</h3>
    <ul>
        @foreach ($participants as $participant)
            <x-tournament-page.participants-item
                :userID="$participant->participant_id"
                :userName="$participant->participant_name"
            />
        @endforeach
    </ul>

    @auth
        {{-- Only if tournament is for induvidual particiapants --}}
        @if($tournament->isIndividual())
            <form method="POST" action="/tournaments/{{$tournament->tournament_id}}/join-tournament-person">
                @csrf

                <button type='submit' class="button-styled" {{($tournament->is_approved) ? '' : 'disabled'}}>
                    Join tournament
                </button>
                @error('person_id')
                    <p style="color:red;">{{$message}}</p>
                @enderror
            </form>
        @else
        {{-- Only if tournaments is for teamns --}}
            <form method="POST" action="/tournaments/{{$tournament->tournament_id}}/join-tournament-team">
                @csrf

                <select name="team_id" id="team-selection" {{($tournament->is_approved) ? '' : 'disabled'}}>
                    @foreach(auth()->user()->teams as $team)
                        <option value="{{$team->team_id}}">{{$team->team_name}} ({{$team->number_of_players}} {{$team->number_of_players > 1 ? 'players' : 'player'}})</option>
                    @endforeach
                </select>
                @error('team_id')
                    <p style="color:red;">{{$message}}</p>
                @enderror

                <button type='submit' class="button-styled" {{($tournament->is_approved) ? '' : 'disabled'}}>
                    Join tournament
                </button>
            </form>

        @endif
    @endauth

    {{-- <a href="" class="button-styled">Opt out of the tournament</a> --}}
</section>



