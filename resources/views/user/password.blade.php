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
<main id="">
    <section>
        <h1>Change password</h1>

            <form method="POST" action="/password/update">
                @csrf

                <input type="password" placeholder="Old password*" name="old_password"/>
                @error('old_password')
                    <p style="color:red;">{{$message}}</p>
                @enderror
                <input type="password" placeholder="New password*" name="new_password"/>
                @error('new_password')
                    <p style="color:red;">{{$message}}</p>
                @enderror
                <input type="password" placeholder="Repeat new password*" name="new_password_confirmation"/>
                @error('new_password_confirmation')
                    <p style="color:red;">{{$message}}</p>
                @enderror

                <input type="submit" value="Change password" name="btn">
            </form>

    </section>
</main>

</body>
</html>
