@extends('layout')
@section('contenido')
    <nav><h2 style="text-align: center">Modificar Actor</h2></nav>
    <form action="{{route('Actor.update', $actor->Id)}}" method="post">

        {!! method_field('PUT')!!}
        {{ csrf_field() }}

        <div class="container">

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

        </div>
    </form>
@endsection
