<div id="users-list-parent">

    <div id="list-legend">
        <p>ID of the user</p>
        <p>Name of the user</p>
    </div>

    <ul id="users-list">

        @for ($i = 0; $i < 20; $i++)
            <x-user-page.users-list-item
                :userID="1"
                :userName="'Mista MrDalo'"
            />

        @endfor

    </ul>


</div>
