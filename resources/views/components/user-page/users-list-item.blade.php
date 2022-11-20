<li class="user-list-item">
    <a href="/users/{{$userID}}" {{$userID == auth()->user()->person_id ? 'id=highlighted-user' :""}}>
        <p>{{$userID}}</p>
        <p>{{$username}}</p>
        <p>{{$firstName}}</p>
        <p>{{$surname}}</p>
    </a>
</li>

