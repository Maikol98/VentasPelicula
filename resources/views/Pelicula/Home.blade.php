@extends('layout')
@section('contenido')
    <div class="container">
        <div class="col py-3">
            <h1 class="display-4 text-white text-weight-bold text-center">Nuesto Catalogo</h1>
            <div class="row">
                @foreach ($peliculas as $pelicula)
                <div class="col-sm-4 py-3">
                    <div class="card" style="background: rgba(95, 95, 95, 0.925)">
                        <div class="card-header font-weight-bold text-center"> {{$pelicula->Nombre}}</div>
                        <img src="{{$pelicula->Poster}}" class="card-img p-2">
                        <div class="card-body">
                            <div class="col">
                                <p>
                                    <strong>Resolucion:</strong>
                                    {{$pelicula->Resolucion}}
                                    <br>
                                    <strong>Idioma:</strong>
                                    {{$pelicula->Idioma}}
                                    <br>
                                    <strong>Precio:</strong>
                                    {{$pelicula->Precio}} bs
                                </p>
                            </div>
                            <a href="{{route('Pelicula.show',$pelicula->Id)}}" class="btn btn-outline-dark btn-block">Detalles</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
