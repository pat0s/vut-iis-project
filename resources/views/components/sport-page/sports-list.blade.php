<div id="sports-list-parent">

    <div id="list-legend">
        <p>Name of the sport</p>
        <p>Number of members</p>
    </div>
    
    <ul id="sports-list">
        @foreach ($sports as $sport)
        {{-- {{dd($sport)}} --}}
            <x-sport-page.sports-list-item
                :sportID="$sport->sport_id"
                :sportName="$sport->name"
                :numberOfPlayers="$sport->number_of_players"
            />
        @endforeach

        {{-- @for ($i = 0; $i < 20; $i++)
            <x-sport-page.sports-list-item
                :teamID="1"
                :teamName="'Sport name'"
                :numberOfMembers="1"
            />
        @endfor --}}

    </ul>


</div>