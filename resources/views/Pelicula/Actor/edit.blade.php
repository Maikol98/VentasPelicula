@extends('layout')
@section('contenido')
    <div class="container">
        <div class="row py-4">
            <div class="col-12 col-sm-10 col-lg-5 mx-auto">
                <form class="shadow rounded px-4 py-3"
                    action="{{route('Actor.update', $actor->Id)}}" method="post">

                    @method('PUT')
                    @csrf

                    <h2 class="display-4">Modificar Actor</h2>

                    <div class="form-group">
                        <label  for="">Nombre</label>
                        <input type="text" value="{{ $actor->Nombre }}" name="nombre" class="form-control">
                    </div>

                    <div class="form-group">
                        <label  for="">Imagen</label>
                        <input type="text" value="{{ $actor->Imagen }}" name="imagen" class="form-control">
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col">
                            <label  for="">Nacionalidad</label>
                            <input type="text" value="{{ $actor->Nacionalidad }}" name="nacionalidad" class="form-control">
                        </div>

                        <div class="col">
                            <label  for="">Edad</label>
                            <input type="text" value="{{ $actor->Edad }}" name="edad" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block"> Actualizar </button>
                    <a href="{{route('Actor.index')}}" class="btn btn-lg btn-outline-dark btn-block"> Volver</a>
                </form>
            </div>
        </div>
    </div>
@endsection
