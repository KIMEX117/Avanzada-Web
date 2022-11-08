<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

    <h1>
        {{-- {{ Auth::User()?->name }} --}}
        {{-- {{ isset(Auth::User()->name)? Auth::User()->name:"No login" }} --}}
        @if (Auth::user())
            {{ Auth::user()->name }}
        @endif
    </h1>

    <form method="POST" action=" {{ url('login/') }} ">
        @csrf

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="email@fake.com">
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="* * * * * *">
        <br>

        <button type="submit">Iniciar sesión</button>

    </form>
</body>
</html>