@extends('layout')
@section('contenido')

<div class="container">
    <h1>Todos los Pedidos</h1>

    <table>
        <thead class="table-dark">
            <tr>
                <th>Nro Pedido</th>
                <th>Fecha Pedido</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedido as $datos)
                <tr>
                    <td>{{$datos->Id}}</td>
                    <td>{{$datos->FechaPedido}}</td>
                    <td>{{$datos->Nombre}}</td>
                    <td>{{$datos->Estado}}</td>
                    <td>Las Acciones</td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>


@endsection
