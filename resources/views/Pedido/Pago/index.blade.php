@extends('layout')

@section('contenido')

<p></p>
<div class="container p-1">
    <div class="row">
        <div class="mx-auto text-center">
            <h1 class="display-4 text-white">Pagos</h1>
            <a href="#" class="btn btn-lg btn-primary btn-block">Volver al Inicio</a>
            <table class="table table-responsive py-2">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Tipo Pago</th>
                        <th scope="col">Nombre del Cliente</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pago as $datos)
                        <tr>
                        <th class="text-white" scope="row">{{$datos->Id}}</th>
                        <td class="text-white">{{$datos->TipoPago}}</td>
                        <td class="text-white">{{$datos->Nombre}}</td>
                        <td class="text-white">{{$datos->Fecha}}</td>
                        <td class="text-white">{{$datos->Monto}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
