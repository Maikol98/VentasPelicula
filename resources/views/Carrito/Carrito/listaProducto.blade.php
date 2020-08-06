@extends('layout')
@section('contenido')
    <h1>Peliculas</h1>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Poster</th>
                <th scope="col">Nombre Pelicula</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Categoria</th>
                <th scope="col">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peliculas as $dato)
            <tr>
                <td> <img src="{{$dato->Poster}}" id="Carrito" alt=" " ></td>
                <td class="text-white">{{$dato->Nombre}}</td>
                <td class="text-white">{{$dato->Precio}}</td>
                <td class="text-white">{{$dato->Stock}}</td>
                <td class="text-white">{{$dato->Categoria}}</td>
                <td class="text-white">
                    <form action="{{route('Detallecarrito.store',[$IdCarrito,$dato->Id])}}" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="cantidad">
                        <button type="submit" class="btn btn-success">Añadir</button>
                    </form>
                    <a href="{{route('Pelicula.show',$dato->Id)}}" class="btn btn-primary"> Detalle</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
@endsection
