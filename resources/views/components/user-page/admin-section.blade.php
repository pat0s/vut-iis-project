<section id="admin-section">
    <h3>Admin section</h3>
    <form method="POST" action="/users/{{$user->person_id}}/admin">
        @csrf

        @if($user->role_id == 1)
            <input type="submit" name="btn-add" class="button-styled-full" value="Add admin role">
        @endif

        @if($user->role_id == 2)
            <input type="submit" name="btn-remove" class="button-styled" value="Remove admin role">
        @endif
    </form>
</section>
