<div id="users-list-parent">

    <div id="list-legend">
        <p>#</p>
        <p>Username</p>
        <p>First Name</p>
        <p>Surname</p>
    </div>

    <ul id="users-list">
        @foreach ($users as $user)
            <x-user-page.users-list-item
                :userID="$user->person_id"
                :username="$user->username"
                :firstName="$user->first_name"
                :surname="$user->surname"
            />
        @endforeach
    </ul>

</div>
