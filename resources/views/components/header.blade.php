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

        {{-- @guest
        <ul id="not-logged-in">
            <li><a href="./logging.html" id="login-button">Log in</a></li>
            <li><a href="./registration.html" id="registration-button">Register</a></li>
        </ul>
        @endguest --}}

        {{-- @auth --}}
        <div id="logged-user">

            <div id="logged-user-div" onclick="clickOnUserNavDiv()">
                <h3>
                    Mista MrDalo
                </h3>
                <img src="./img/UserAvatar.svg">
            </div>
            <div id="user-nav-div" class="hidden-element">
                <ul>
                    <li><a href="./profile.html"><img src="./img/profileBlue.svg">Profile</a></li>
                    <li><a href="/"><img src="./img/log-out.svg">Log out</a></li>
                </ul>
            </div>
        </div>
        {{-- @endauth --}}

    </nav>

</header>