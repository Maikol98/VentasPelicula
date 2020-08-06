@extends('layout')
@section('contenido')
    <nav><h2 style="text-align: center">Registrar Pelicula</h2></nav>
    <form action="{{route('Pelicula.store')}}" method="post">
        {{ csrf_field() }}

        <div class="container">

            <div class="form-group col-md-6 p-2">
                <label  for="">Nombre</label>
                <input type="text" name="nombre" class="form-control">
            </div>

            <div class="form-group col-md-5 p-2">
                <label  for="">Descripcion</label>
                <textarea name="descripcion" id="input" cols="52" rows="5" ></textarea>
            </div>

                <div class="form-group col-md-5 p-2">
                    <label  for="">Precio</label>
                    <input type="text" name="precio" class="form-control">
                </div>

            <div class="form-group col-md-5 p-2">
                <label  for="">Poster</label>
                <input type="text" name="poster" class="form-control">
            </div>

            <div class="form-group col-md-5 p-2">
                <label  for="">Trailer</label>
                <input type="text" name="trailer" class="form-control">
            </div>

            <div class="form-group col-md-5 p-2">
                <label  for="">Distribucion</label>
                <input type="text" name="distribucion" class="form-control">
            </div>

            <div class="form-group col-md-5 p-2">
                <label  for="">Categoria</label>
                <input type="text" name="categoria" class="form-control">
            </div>

            <p></p>
            <div class="form-group col-md-6 mb-2 p-2">
                <button type="submit" class="btn btn-primary"> Guardar </button>
            </div>

        </div>
    </form>
@endsection
