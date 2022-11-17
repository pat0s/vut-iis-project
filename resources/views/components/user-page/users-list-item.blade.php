@props([
    'userID' => '1',
    'userName' => 'User name',
])

<li class="user-list-item">

    <a href="/user/{{$userID}}">
        <p>ID: &nbsp;&nbsp;{{$userID}}</p>
        <p>{{$userName}}</p>
    </a>

</li>