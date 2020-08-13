@extends('layout')
@section('contenido')
    <div class="container">
        <div class="row py-4">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <form class="shadow rounded px-3 py-4"
                    action="{{route('Administrador.update', $administrador->CI)}}" method="post">

                    @method('PUT')
                    @csrf
                    <h2 class="display-4">Modificar Administrador</h2>

                        <div class="form-group">
                            <label  for="">Nombre</label>
                            <input type="text" name="nombre" value="{{$administrador->Nombre}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label  for="">Apellido</label>
                            <input type="text" name="apellido" value="{{$administrador->Apellido}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label  for="">Telefono</label>
                            <input type="text" name="telefono" value="{{$administrador->Telefono}}" class="form-control">
                        </div>


                        <div class="form-group">
                            <label  for="">Direccion</label>
                            <input type="text" name="direccion" value="{{$administrador->Direccion}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block"> Guardar </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
