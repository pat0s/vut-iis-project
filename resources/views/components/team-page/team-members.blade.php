<section id="team-members">
    <h3>Members</h3>
    <ul>
        @foreach($members as $member)
            <x-team-page.team-members-item
                :member="$member"
            />
        @endforeach
    </ul>

    @if($teamManager)
        <button type="button" onclick="window.addMemberToTeambuttonHandler()"><p>+</p></button>

        <div id="add-new-member-to-team-fieldset">
            <form method="POST" action="/team/{{$team->team_id}}/add-member">
                @csrf
                <select name="members[]" placeholder="Select users" multiple="multiple" required>
                    @foreach($users as $user)
                        <option value="{{$user->person_id}}">{{$user->username}}</option>
                    @endforeach
                </select>

                <input type="submit" value="Add">
            </form>

        </div>

    @endif

</section>


<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
<script defer>
    $(function () {
        $('select').multipleSelect()
    })
</script>

