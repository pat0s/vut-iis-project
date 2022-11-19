<header>
    <div>
        <a href="/">
            <img src="{{asset('img/DuckLightBrown.svg')}}" alt="DuckLogo">
            <h2>Duck Tournaments</h2>
        </a>
    </div>

    <nav>
        <a href="/users">Users</a>
        <a href="/teams">Teams</a>
        <a href="/tournaments">Tournaments</a>

        @guest
        <ul id="not-logged-in">
            <li><a href="/login" id="login-button">Log in</a></li>
            <li><a href="/registration" id="registration-button">Register</a></li>
        </ul>
        @endguest

         @auth
        <div id="logged-user">

            <div id="logged-user-div" onclick="window.clickOnUserNavDiv()">
                <h3>
                    {{auth()->user()->username}}
                </h3>
                <img src="{{asset('/img/UserAvatar.svg')}}">
            </div>
            <div id="user-nav-div" class="hidden-element">
                <ul>
                    <li><a href="/users/{{auth()->user()->person_id}}"><img src="{{asset('/img/profileBlue.svg')}}">Profile</a></li>
                    <li><a href="/sport"><img src="{{asset('/img/sports.svg')}}">Sports</a></li>
                    <li><a href="/teams/create"><img src="{{asset('/img/create-team.svg')}}">Create team</a></li>
                    <li><a href="/tournament/create"><img src="{{asset('/img/tournament.svg')}}">Create tournament</a></li>
                    <li><a href="/logout"><img src="{{asset('/img/log-out.svg')}}">Log out</a></li>
                </ul>
            </div>
        </div>
         @endauth

    </nav>

</header>
