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
                <button type='submit' class="button-styled">Join tournament</button>
            </form>
        @else
        {{-- Only if tournaments is for teamns --}}
            <form method="POST" action="/tournaments/{{$tournament->tournament_id}}/join-tournament-team">
                @csrf

                <select name="team_id" id="team-selection">

                    @foreach(auth()->user()->teams as $team)
                    <option value="{{$team->team_id}}">{{$team->team_name}}</option>
                    @endforeach

                </select>
                @error('team')
                <p style="color:red;">{{$message}}</p>
                @enderror
                <button type='submit' class="button-styled">Join tournament</button>
            </form>

        @endif
    @endauth

    {{-- <a href="" class="button-styled">Opt out of the tournament</a> --}}
</section>



