<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>Duck Tournaments</title>
    </head>
    <body id="errorBody">
        <header>
            <div>
                <a href="/">
                    <img src="{{asset('img/DuckLightBrown.svg')}}" alt="DuckLogo">
                    <h2>Duck Tournaments</h2>
                </a>
            </div>
        </header>
        <main>
            @yield('code') | @yield('message')

            <a href="/" id="mainPage-link">
                <svg width="59" height="24" viewBox="0 0 59 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.939343 10.9392C0.353557 11.525 0.353557 12.4748 0.939343 13.0605L10.4853 22.6065C11.0711 23.1923 12.0208 23.1923 12.6066 22.6065C13.1924 22.0207 13.1924 21.0709 12.6066 20.4852L4.12132 11.9999L12.6066 3.5146C13.1924 2.92881 13.1924 1.97906 12.6066 1.39328C12.0208 0.80749 11.0711 0.80749 10.4853 1.39328L0.939343 10.9392ZM59 10.4999L2 10.4999V13.4999L59 13.4999V10.4999Z" fill="#FFDFD0"/>
                </svg>
            </a>

        </main>
    </body>
</html>
