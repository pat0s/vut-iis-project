<section id="create-page-team-members">
    <h3>Members</h3>

    <div id="add-new-member-to-team-fieldset">
        <ul id="list-of-users">
            <li id="team-manager">
                <input type="checkbox" value="{{auth()->user()->person_id}}"
                       name="members[]" id="manager" checked="checked" required>
                <label for="manager">{{auth()->user()->username}}</label>
            </li>
             @foreach($users as $user)
                 <li>
                     <input type="checkbox" value="{{$user->person_id}}" name="members[]" id="{{$user->person_id}}">
                     <label for="{{$user->person_id}}">{{$user->username}}</label>
                 </li>
            @endforeach
        </ul>
    </div>

</section>
