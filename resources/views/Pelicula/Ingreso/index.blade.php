@extends('layout')

@section('contenido')

<p></p>
<div class="container p-1">
    <div class="row">
        <div class="mx-auto text-center">
            <h1 class="display-4 text-white">Ingreso</h1>
            <form class="rounded"
                action="{{ route('Ingreso.store') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-lg btn-primary btn-block">Añadir Nuevo Ingreso</button>
            </form>
            <table class="table table-responsive py-2">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">PrecioTotal</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Nombre Administrador</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingreso as $datos)
                        <tr>
                        <th class="text-white" scope="row">{{$datos->Id}}</th>
                        <td class="text-white">{{$datos->PrecioTotal}}</td>
                        <td class="text-white">{{$datos->Fecha}}</td>
                        <td class="text-white">{{$datos->Nombre}}</td>
                        <td class="text-white">
                            <a href="{{route('Detalleingreso.create',$datos->Id)}}"
                                class="btn btn-success">Añadir</a>
                            <a class="btn btn-primary"
                                href="{{route('Ingreso.show',$datos->Id)}}">Detalles</a>
                            <form style="display: inline" action="{{route('Ingreso.destroy',$datos->Id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
