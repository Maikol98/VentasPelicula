@extends('layout')
@section('contenido')
    <nav><h2 style="text-align: center">Registrar Administrador</h2></nav>


    <form action="{{route('Administrador.store')}}" method="post">

        {{ csrf_field() }}

        <div class="container">

            <div class="form-row col-md-10 p-2" >
                <div class="form-group col-md-5 p-2">
                    <label  for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="form-group col-md-5 p-2">
                    <label  for="">Apellido</label>
                    <input type="text" name="apellido" class="form-control">
                </div>
            </div>

            <div class="form-row col-md-10 p-1">
                <div class="form-group col-md-5 p-2">
                    <label  for="">Telefono</label>
                    <input type="text" name="telefono" class="form-control">
                </div>
                <div class="form-group col-md-5 p-2">
                    <label  for="">Carnet Identidad</label>
                    <input type="text" name="CI" class="form-control">
                </div>
            </div>


            <div class="form-group col-md-5 p-2">
                <label  for="">Direccion</label>
                <input type="text" name="direccion" class="form-control">
            </div>

            <div class="form-group col-md-5 p-2">
                <label  for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <p></p>
            <div class="form-group col-md-6 mb-2 p-2">
                <button type="submit" class="btn btn-primary"> Guardar </button>
            </div>

        </div>
    </form>
@endsection
