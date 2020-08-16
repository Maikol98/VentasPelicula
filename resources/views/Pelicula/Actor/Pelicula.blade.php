@extends('layout')
@section('contenido')
    <div class="row py-4">
        <div class="col-12 col-sm-10 col-lg-5 mx-auto">
            <form class="shadow rounded px-3 py-4"
                action="{{route('Actor.store')}}" method="post">

                @csrf

                <h1 class="display-4">Registrar Actor En Pelicula</h2>
                <hr>
                <div class="form-group">
                    <label  for="">Id Pelicula</label>
                    <input type="text" name="Id_Pelicula" class="form-control">
                </div>

                <div class="form-group">
                    <label  for="">IdActor </label>
                    <input type="text" name="Id_Actor" class="form-control">
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block"> Guardar </button>
                <a href="{{route('Actor.index')}}" class="btn btn-lg btn-outline-dark btn-block"> Volver</a>
            </form>
        </div>
    </div>
@endsection
