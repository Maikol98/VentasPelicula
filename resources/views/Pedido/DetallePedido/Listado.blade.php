@extends('layout')
@section('contenido')
    <div class="container">
        <div class="col py-3">
            <h1 class="display-4 text-white text-weight-bold text-center">Todas las Peliculas</h1>
            <div class="row">
                @foreach ($peliculas as $pelicula)
                <div class="col-sm-4 py-3">
                    <div class="card" style="background: rgba(95, 95, 95, 0.925)">
                        <div class="card-header font-weight-bold text-center"> {{$pelicula->Nombre}}</div>
                        <img src="{{$pelicula->Poster}}" class="card-img p-2">
                        <div class="card-body">
                            <div class="col">
                                <div class="row font-weight-bold">
                                    <label>Valoracion</label>
                                    <label class="px-2"><i class="icon ion-md-star">4.5</i></label>
                                    <label class="px-2">Stock:45</label>
                                    <label class="px-2">Precio: 80bs</label>
                                </div>
                            </div>
                            <form class=" shadow rounded px-1 py-1"
                                action="{{route('Detallepedido.store',[$pelicula->Id,$id_Pedido])}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-bold">Cantidad</label>
                                    <input type="text" name="Cantidad" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Añadir al Pedido</button>
                                <a href="{{route('Pelicula.show',$pelicula->Id)}}" class="btn btn-outline-dark btn-block">Detalles</a>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
