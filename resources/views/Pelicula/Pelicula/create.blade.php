@extends('layout')
@section('contenido')
    <div class="container">
        <div class="row py-2">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">

                <form class="shadow rounded px-3 py-3"
                    action="{{route('Pelicula.store')}}" method="post">
                    @csrf
                    <h2 class="display-4">Registrar Pelicula</h2>

                    <div class="form-group">
                        <label  for="">Nombre</label>
                        <input type="text" name="Nombre" class="form-control">
                    </div>

                        <div class="form-group">
                            <label>Descripcion</label>
                            <textarea name="Descripcion" id="input" rows="4%" class="form-control"></textarea>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label>Precio</label>
                                <input type="text" name="Precio" class="form-control">
                            </div>
                            <div class="col">
                                <label  for="">Poster</label>
                                <input type="text" name="Poster" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label  for="">Trailer</label>
                            <input type="text" name="Trailer" class="form-control">
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label  for="">Distribucion</label>
                                <input type="text" name="Distribucion" class="form-control">
                            </div>
                            <div class="col">
                                <label  for="">Categoria</label>
                                <input type="text" name="Categoria" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label>Año de Estreno</label>
                                <input type="text" name="Año" class="form-control">
                            </div>
                            <div class="col">
                                <label>Duracion(min)</label>
                                <input type="text" name="Duracion" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label>Resolucion</label>
                                <input type="text" name="Resolucion" class="form-control">
                            </div>
                            <div class="col">
                                <label>Idioma</label>
                                <input type="text" name="Idioma" class="form-control">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block"> Guardar </button>
                        <a href="{{route('Pelicula.index')}}" class="btn btn-lg btn-outline-dark btn-block"> Volver</a>
                </form>
            </div>
        </div>
    </div>
@endsection
