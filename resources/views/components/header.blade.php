<header>
    <div>
        <a href="/">
            <img src="{{asset('img/DuckLightBrown.svg')}}" alt="DuckLogo">
            <h2>Duck Tournaments</h2>
        </a>
    </div>
    
    @guest
        <nav>
            <ul>
                <li><a href="/login" id="login-button">Log in</a></li>
                <li><a href="/registration" id="registration-button">Register</a></li>
            </ul>
        </nav>
    @endguest

    @auth
        <nav id="logged-user">
            <a href="./profile.html">
                <h3>
                    Mista MrDalo
                </h3>
                <img src="./img/UserAvatar.svg">
            </a>
        </nav>
    @endauth

</header>