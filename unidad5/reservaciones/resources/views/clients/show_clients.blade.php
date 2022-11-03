<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>
        Clientes
    </h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{ json_encode($clients) }} --}}

            @foreach ($clients as $client)
                <tr>
                    <td>
                        {{ $client->id }}
                    </td>
                    <td>
                        {{ $client->name }}
                    </td>
                    <td>
                        {{ $client->email }}
                    </td>
                    <td>
                        {{ $client->phone_number }}
                    </td>
                    <td>
                        {{-- <a href="{{ url('/clients/edit',$client) }}">Editar</a> --}}
                        <a href="{{ url('/clients/edit/'.$client->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>