@extends('layout')
@section('contenido')
 <div class="container">
     <div class="row py-4">
         <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="shadow rounded px-3 py-3"
                action="{{route('Director.store')}}" method="post">

                @csrf

                <h2 class="display-4">Registrar Director</h2>
                <div class="form-group">
                    <label  for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                </div>

                <div class="form-group">
                    <label  for="">Imagen</label>
                    <input type="text" name="imagen" class="form-control">
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label  for="">Nacionalidad</label>
                        <input type="text" name="nacionalidad" class="form-control">
                    </div>

                    <div class="col">
                        <label  for="">Edad</label>
                        <input type="text" name="edad" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-lg btn-primary btn-block"> Guardar </button>
                <a href="{{route('Director.index')}}" class="btn btn-lg btn-outline-dark btn-block">Volver</a>
            </form>

         </div>
     </div>
 </div>
@endsection
