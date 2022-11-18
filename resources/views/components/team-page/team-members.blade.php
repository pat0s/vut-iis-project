<section id="team-members">
    <h3>Members</h3>
    <ul id="list-of-members">
        @foreach($members as $member)
            <x-team-page.team-members-item
                :member="$member"
            />
        @endforeach
    </ul>

    @if($teamManager)
        <button type="button" onclick="window.addMemberToTeambuttonHandler()"><p>+</p></button>

        <div class="hidden-element" id="add-new-member-to-team-fieldset">

            <form method="POST" action="/teams/{{$team->team_id}}/add-member">
                @csrf

                <ul id="list-of-users">
                     @foreach($users as $user)
                         <li>
                            <input type="checkbox" name="members[]" value="{{$user->person_id}}" id="{{$user->person_id}}">
                            <label for="{{$user->person_id}}">{{$user->username}}</label>
                         </li>
                    @endforeach
                </ul>

                <input type="submit" value="Add">
            </form>
        </div>
    @endif

</section>
