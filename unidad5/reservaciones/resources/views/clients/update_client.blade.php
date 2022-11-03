<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <h1>HOLA ESTA ES LA VISTA CREATE</h1> --}}
    <form method="POST" action=" {{ url('clients/') }} ">
        @method('PUT')
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" name="name" placeholder="Fulanito" value=" {{ $client->name }} ">

        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="example@mail.com" value=" {{ $client->email }} ">

        <br>

        <label for="phone_number">Telefono:</label>
        <input type="text" name="phone_number" placeholder="612XXXXXXX" value=" {{ $client->phone_number }} ">

        <br>

        <input type="hidden" name="id" value=" {{ $client->id }} ">
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>