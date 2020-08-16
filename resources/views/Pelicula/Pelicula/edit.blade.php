@extends('layout')
@section('contenido')

    <div class="Container">
        <div class="row py-3">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <form class="shadow rounded px-3 py-3"
                action="{{route('Pelicula.update',$pelicula->Id)}}" method="post">

                @method('PUT')
                @csrf

                <h2 class="display-5">Modificar Datos de la Pelicula</h2>

                <div class="form-group">
                    <label  for="">Nombre</label>
                    <input type="text" value="{{$pelicula->Nombre}}" name="nombre" class="form-control">
                </div>

                <div class="form-group">
                    <label  for="">Descripcion</label>
                        <div class="col">
                        <textarea name="descripcion" id="input" cols="50%" rows="4%" ></textarea>
                    </div>
                </div>

                <div class="form-group col-4">
                    <label  for="">Precio</label>
                    <input type="text" value="{{$pelicula->Precio}}" name="precio" class="form-control">
                </div>

                <div class="form-group">
                    <label  for="">Poster</label>
                    <input type="text" value="{{$pelicula->Poster}}" name="poster" class="form-control">
                </div>

                <div class="form-group">
                    <label  for="">Trailer</label>
                    <input type="text" value="{{$pelicula->Trailer}}" name="trailer" class="form-control">
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label  for="">Distribucion</label>
                        <input type="text" value="{{$pelicula->Distribucion}}" name="distribucion" class="form-control">
                    </div>
                    <div class="col">
                        <label  for="">Categoria</label>
                        <input type="text" value="{{$pelicula->Categoria}}" name="categoria" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block"> Actualizar </button>
                <a href="{{route('Pelicula.index')}}" class="btn btn-lg btn-outline-dark btn-block"> Volver</a>
            </form>
            </div>
        </div>
    </div>
@endsection
