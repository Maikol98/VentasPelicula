@extends('layout')
@section('contenido')
    <div class="row py-4">
        <div class="col-12 col-sm-10 col-lg-5 mx-auto">
            <form class="shadow rounded px-3 py-4"
                action="{{route('Actor.store')}}" method="post">

                @csrf

                <h1 class="display-4">Registrar Actor</h2>
                <hr>
                <div class="form-group">
                    <label  for="">Nombre</label>
                    <input type="text" name="Nombre" class="form-control">
                </div>
                
                <div class="form-group">
                    <label  for="">Imagen</label>
                    <input type="text" name="Imagen" class="form-control">
                </div>
                <div class="form-group row justify-content-center">
                    <div class="col">
                        <label  for="">Nacionalidad</label>
                        <input type="text" name="Nacionalidad" class="form-control">
                    </div>

                    <div class="col">
                        <label  for="">Edad</label>
                        <input type="text" name="Edad" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block"> Guardar </button>
                <a href="{{route('Actor.index')}}" class="btn btn-lg btn-outline-dark btn-block"> Volver</a>
            </form>
        </div>
    </div>
@endsection
