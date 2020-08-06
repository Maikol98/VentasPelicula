@extends('layout')

@section('contenido')

<h1 style="text-align: center">Carrito</h1>

<form action="{{route('Carrito.store')}}" method="post">

    {{ csrf_field() }}
    <div class="container">
        <div class="form-group col-md-5">
            <label  for="">CICliente</label>
            <input type="text" name="CI" class="form-control">
        </div>
        <div class="form-group col-md-5">
            <label  for="">Descipcion</label>
            <input type="text" name="descripcion" class="form-control">
        </div>
        <div class="form-group col-md-6 mb-2">
            <button type="submit" class="btn btn-primary"> Guardar </button>
        </div>
    </div>
</form>
@endsection
