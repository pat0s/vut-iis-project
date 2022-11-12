@props([
    'userID',
    'userName',
])

<li>
    <a href="/user/{{$userID}}">
        {{$userName}}
    </a>
    <!-- <a href=""><img src="./img/Trash.svg" alt="Trash"></a> -->
</li>