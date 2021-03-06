@extends('layout')
@section('contenido')
    <div class="container">
        <div class="col py-3">
            <h1 class="display-4 text-white text-weight-bold text-center">Todas las Peliculas</h1>
            <div class="row">
                @foreach ($peliculas as $dato)
                <div class="col-sm-4 py-3">
                    <div class="card" style="background: rgba(95, 95, 95, 0.925)">
                        <div class="card-header font-weight-bold text-center"> {{$dato->Nombre}}</div>
                        <img src="{{$dato->Poster}}" class="card-img p-2" style="border-radius: 10px">
                        <div class="card-body">
                            <div class="col">
                                <div class="row font-weight-bold">
                                    <label class="px-2">Categoria: {{$dato->Categoria}}</label>
                                    <label class="px-2">Stock: {{$dato->Stock}}</label>
                                    <label class="px-2">Precio: {{$dato->Precio}}</label>
                                </div>
                            </div>
                            <form class=" shadow rounded px-1 py-1"
                            action="{{route('Detallecarrito.store',[$IdCarrito,$dato->Id])}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-bold">Cantidad</label>
                                    <input type="text" name="cantidad" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Añadir al Carrito</button>
                                <a href="{{route('Pelicula.show',$dato->Id)}}" class="btn btn-outline-dark btn-block">Detalles</a>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
