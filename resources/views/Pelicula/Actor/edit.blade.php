@extends('layout')
@section('contenido')

    <div class="row">
        <div class="col-12 col-sm-10 col-lg-7 mx-auto">
            <form
                action="{{route('Actor.update', $actor->Id)}}" method="post">

                @method('PUT')
                @csrf

                <h2 class="display-4">Modificar Actor</h2>

                <div class="form-row col-md-10 p-2" >
                    <div class="form-group col-md-5 p-2">
                        <label  for="">Nombre</label>
                        <input type="text" value="{{ $actor->Nombre }}" name="nombre" class="form-control">
                    </div>
                </div>

                    <div class="form-group col-md-5 p-2">
                        <label  for="">Imagen</label>
                        <input type="text" value="{{ $actor->Imagen }}" name="imagen" class="form-control">
                    </div>

                    <div class="form-group col-md-5 p-2">
                        <label  for="">Nacionalidad</label>
                        <input type="text" value="{{ $actor->Nacionalidad }}" name="nacionalidad" class="form-control">
                    </div>

                    <div class="form-group col-md-5 p-2">
                        <label  for="">Edad</label>
                        <input type="text" value="{{ $actor->Edad }}" name="edad" class="form-control">
                    </div>
                    <p></p>
                    <div class="form-group col-md-6 mb-2 p-2">
                        <button type="submit" class="btn btn-primary"> Guardar </button>
                    </div>
            </form>
        </div>
    </div>

@endsection
