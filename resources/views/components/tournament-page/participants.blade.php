<section id="participants">
    <h3>Participants</h3>
    <ul>

        @foreach ($participants as $participant)
            <x-tournament-page.participants-item
                :userID="1"
                :userName="'Mista MrDalo'"
            />
        @endforeach

    </ul>

    {{-- Only if tournaments is for teamns --}}

    <form method="POST" action="/tournaments/{{$tournament->tournament_id}}/join-tournament">
        @csrf

        <select name="team-selection" id="team-selection">

            @foreach($teams as $team)
                <option value="{{$team->team_id}}">{{$team->team_name}}</option>
            @endforeach

        </select>
        @error('team')
        <p style="color:red;">{{$message}}</p>
        @enderror
        <button type='submit' class="button-styled">Join tournament</button>
    </form>

    {{-- Only if tournament is for induvidual particiapants --}}
    {{-- <a href="" class="button-styled">Join tournament</a> --}}


    {{-- <a href="" class="button-styled">Opt out of the tournament</a> --}}
</section>



