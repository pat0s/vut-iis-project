<li class="user-list-item">
    @auth
        <a href="/users/{{$userID}}" {{$userID == auth()->user()->person_id ? 'id=highlighted-user' :""}}>
    @endauth
    
    @guest
        <a href="/users/{{$userID}}">
    @endguest
        <p>{{$userID}}</p>
        <p>{{$username}}</p>
        <p>{{$firstName}}</p>
        <p>{{$surname}}</p>
    </a>
</li>

