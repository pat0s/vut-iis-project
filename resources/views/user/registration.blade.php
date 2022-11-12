<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Duck Tournaments</title>
</head>
<body>
    <main id="registration-page">
        <section>
            <h1>Sign up</h1>

            <form method="POST" action="registration">
                @csrf
                 
                <input type="text" placeholder="First name*" name="firstName">   
                <input type="text" placeholder="Surname*" name="surname">   
                <input type="text" placeholder="Username*" name="userName">   
                <input type="email" placeholder="E-mail*" name="eMail">   
                <input type="password" placeholder="Password*" name="password">   
                <input type="password" placeholder="Repeat password*" name="repeatPassword">   
                
                <input type="submit" value="Register" name="register">
            </form>

            <a href="/login" id="registration-link">Do you already have an account?</a>
            <a href="/" id="mainPage-link">
                <svg width="59" height="24" viewBox="0 0 59 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.939343 10.9392C0.353557 11.525 0.353557 12.4748 0.939343 13.0605L10.4853 22.6065C11.0711 23.1923 12.0208 23.1923 12.6066 22.6065C13.1924 22.0207 13.1924 21.0709 12.6066 20.4852L4.12132 11.9999L12.6066 3.5146C13.1924 2.92881 13.1924 1.97906 12.6066 1.39328C12.0208 0.80749 11.0711 0.80749 10.4853 1.39328L0.939343 10.9392ZM59 10.4999L2 10.4999V13.4999L59 13.4999V10.4999Z" fill="#FFDFD0"/>
                </svg>
            </a>
        
        </section>
        <section>
            <a href="/">
                <img src="{{asset('img/DuckBlue.svg')}}" alt="DuckLogo">
                <h1>Duck Tournaments</h1>
            </a>
        </section>
    </main>
    
</body>
</html>