<footer>
    <svg width="1920" height="131" viewBox="0 0 1920 131" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M-11.5 125C106.5 55.4997 351.479 -35.8805 532.5 45.0005C631 89.0107 725.5 97.9076 847.5 83.0005C1003 64.0001 1022 -19.9998 1206.5 13.5001C1391 47 1507.77 134.982 1679 83.0005C1763 57.5001 1955.67 131.334 1960.5 125" stroke="#FFDFD0" stroke-width="10" stroke-linecap="round"/>
    </svg>
    <div>
        <img src="{{asset('./img/DuckLightBrown.svg')}}" alt="DuckLogo">
        <h2>Duck Tournaments</h2>
    </div>
    <nav>
        <ul>
            @guest
                <li><a href="/login">Log in</a></li>
                <li><a href="/registration">Register</a></li>
            @endguest
            <li><a href="">Contact</a></li>
        </ul>
    </nav>

</footer>