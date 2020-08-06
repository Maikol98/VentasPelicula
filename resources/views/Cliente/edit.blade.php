@extends('layout')
@section('contenido')
    <nav><h2 style="text-align: center">Modificar Cliente</h2></nav>

    <form action="{{route('Cliente.update',$cliente->CI)}}" method="post">

        {!! method_field('PUT')!!}

        {{ csrf_field() }}

        <div class="container">

            <div class="form-row col-md-10 " >
                <div class="form-group col-md-5 p-2">
                    <label  for="">Nombre</label>
                    <input type="text" value="{{$cliente->Nombre}}" name="nombre" class="form-control">
                </div>
                <div class="form-group col-md-5 p-2">
                    <label  for="">Apellido</label>
                    <input type="text" value="{{$cliente->Apellido}}" name="apellido" class="form-control">
                </div>
            </div>

            <div class="form-row col-md-10 ">
                <div class="form-group col-md-5 p-2">
                    <label  for="">Telefono</label>
                    <input type="text" value="{{$cliente->Telefono}}" name="telefono" class="form-control">
                </div>
            </div>

            <div class="form-group col-md-5 p-2">
                <label  for="">Direccion</label>
                <input type="text" value="{{$cliente->Direccion}}" name="direccion" class="form-control">
            </div>

            <div class="form-group col-md-5 p-2">
                <label  for="">Email</label>
                <input type="text" value="{{$cliente->Email}}" name="email" class="form-control">
            </div>
            <p></p>
            <div class="form-group col-md-6 mb-2 p-2">
                <button type="submit" class="btn btn-primary"> Guardar </button>
            </div>

        </div>
    </form>
@endsection
