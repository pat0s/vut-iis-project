<section id="team-members">
    <h3>Members</h3>
    <ul id="list-of-members">
        <x-team-page.team-members-item 
            :userID="1"
        />
        
        <x-team-page.team-members-item 
            :userID="1"
        />
        
        <x-team-page.team-members-item 
            :userID="1"
        />
        
        <x-team-page.team-members-item 
            :userID="1"
        />
        
        <x-team-page.team-members-item 
            :userID="1"
        />

        
    </ul>

    <button type="button" onclick="window.addMemberToTeambuttonHandler()"><p>+</p></button>

    <div class="hidden-element" id="add-new-member-to-team-fieldset">

        <form method="GET" action="/team/add-member">
            @csrf

            <ul id="list-of-users">
                @for ($i = 0; $i < 10; $i++)
                    <li>
                        <input type="checkbox" name="members[]" value="{{$i}}-" id="{{$i}}">
                        <label for="{{$i}}">User {{$i}}</label>
                    </li>
                @endfor

                {{-- @foreach($users as $user)
                    <input type="checkbox" value="{{$user->person_id}}" name="{{$user->person_id}}">
                    <label for="{{$user->person_id}}">{{$user->username}}</label>
                @endforeach --}}
            </ul>
    
            <input type="submit" value="Add">
        </form>
    </div>

</section>