@props([
    'userID',
    'userName',
])

<li>
    <a href="/users/{{$userID}}">
        {{$userName}}
    </a>
    <!-- <a href=""><img src="./img/Trash.svg" alt="Trash"></a> -->
</li>
