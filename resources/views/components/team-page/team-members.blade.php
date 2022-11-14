@props([
    'useFlag' => '1',
])

<section id="team-members">
    <h3>Members</h3>
    <ul>
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

    <button type="button" onclick="window.addMemberToTeambuttonHandler({{$useFlag}})"><p>+</p></button>

    <fieldset id="add-new-member-to-team-fieldset" class="hidden-element">
        <input list="members" name="member-name">
        <datalist id="members">

            {{-- @foreach ($users as $user)
                <option value="{{$user->name}}">
            @endforeach --}}

            <option value="Mista MrDalo">
            <option value="Mista Pat0s">
            <option value="Mista Sek1no">
            <option value="Mista Anton van der Tonislav">
            <option value="Mista LOva">
        </datalist>
        <input type="button" value="Add">
    </fieldset>

</section>