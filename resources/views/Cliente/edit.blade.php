@extends('layout')
@section('contenido')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-7 mx-auto">
                <form class="shadow rounded py-3 px-4"
                    action="{{route('Cliente.update',$cliente)}}" method="post">

                    @method('PUT')
                    @csrf
                    
                    <h2 class="display-4">Modificar Cliente</h2>
                    <div class="container">

                        <div class="form-group">
                            <label  for="">Nombre</label>
                            <input type="text" value="{{$cliente->Nombre}}" name="Nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label  for="">Apellido</label>
                            <input type="text" value="{{$cliente->Apellido}}" name="Apellido" class="form-control">
                        </div>


                        <div class="form-group">
                            <label  for="">Telefono</label>
                            <input type="text" value="{{$cliente->Telefono}}" name="Telefono" class="form-control">
                        </div>

                        <div class="form-group">
                            <label  for="">Direccion</label>
                            <input type="text" value="{{$cliente->Direccion}}" name="Direccion" class="form-control">
                        </div>

                        <div class="form-group">
                            <label  for="">Email</label>
                            <input type="text" value="{{$cliente->Email}}" name="Email" class="form-control">
                        </div>
                        <p></p>
                            <button type="submit" class="btn btn-lg btn-primary btn-block"> Actualizar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
