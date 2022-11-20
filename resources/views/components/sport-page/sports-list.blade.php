<div id="sports-list-parent">

    <div id="list-legend">
        <p></p>
        <p>Name of the sport</p>
        <p>Number of members</p>
    </div>
    
    <ul id="sports-list">
        @foreach ($sports as $sport)
            <x-sport-page.sports-list-item
                :sportID="$sport->sport_id"
                :sportName="$sport->name"
                :numberOfPlayers="$sport->number_of_players"
            />
        @endforeach
    </ul>
</div>