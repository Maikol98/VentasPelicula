<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="text-center">
        <h1>TIENDA DE PELICULAS</h1>
        <h2>REPORTE DE INGRESO</h1>
    </div>
    <h3></h3>
    <table  width="80%" border="1">
        <thead>
            <tr>
                <th scope="col">NOMBRE ADMIN</th>
                <th scope="col">PRECIO TOTAL</th>
                <th scope="col">FECHA</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $dato)
                <tr>
                <th scope="row">{{$dato->Admin}}</th>
                <td scope="raw">{{$dato->PrecioTotal}}</td>
                <td scope="raw">{{$dato->Fecha}}</td>
                <td scope="raw">{{$dato->Nombre}}</td>
                <td scope="raw">{{$dato->Cantidad}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
