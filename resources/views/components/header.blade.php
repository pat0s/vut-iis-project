<header>
    <div>
        <a href="/">
            <img src="{{asset('img/DuckLightBrown.svg')}}" alt="DuckLogo">
            <h2>Duck Tournaments</h2>
        </a>
    </div>
    
    {{-- @guest
        <nav>
            <ul>
                <li><a href="/login" id="login-button">Log in</a></li>
                <li><a href="/registration" id="registration-button">Register</a></li>
            </ul>
        </nav>
    @endguest --}}

    {{-- @auth --}}
        <nav id="logged-user">
            <div id="logged-user-div" onclick="window.clickOnUserNavDiv()">
                <h3>
                    Mista MrDalo
                </h3>
                <img src="{{asset('/img/UserAvatar.svg')}}">
            </div>
            <div id="user-nav-div" class="hidden-element">
                <ul>
                    <li><a href="/user/1"><img src="{{asset('/img/profileBlue.svg')}}">Profile</a></li>
                    <li><a href="/logout"><img src="{{asset('/img/log-out.svg')}}">Log out</a></li>
                </ul>
            </div>
        </nav>
    {{-- @endauth --}}

</header>