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
        <h2>REPORTE DE PEDIDO</h1>
    </div>
    <h3></h3>
    <table  width="80%" border="1">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">CLIENTE</th>
                <th scope="col">PRECIO TOTAL</th>
                <th scope="col">FECHA PEDIDO</th>
                <th scope="col">DIRECCION</th>
                <th scope="col">ESTADO</th>
                <th scope="col">CANTIDAD </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $dato)
                <tr>
                <th scope="row">{{$dato->Id}}</th>
                <td scope="raw">{{$dato->cliente}}</td>
                <td scope="raw">{{$dato->PrecioTotal}}</td>
                <td scope="raw">{{$dato->FechaPedido}}</td>
                <td scope="raw">{{$dato->Direccion}}</td>
                <td scope="raw">{{$dato->Estado}}</td>
                <td scope="raw">{{$dato->Cantidad}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
