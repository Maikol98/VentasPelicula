@extends('layout')
@section('contenido')
    <nav><h2 style="text-align: center">Modificar Cantidad</h2></nav>
    <form action="" method="post">
        {!! method_field('PUT')!!}
        {{ csrf_field() }}

        <div class="container">

            <div class="form-group col-md-5 p-2">
                <label  for="">Cantidad</label>
                <input type="text" value="{{ $detalle->Cantidad }}" name="cantidad" class="form-control">
            </div>
            <div class="form-group col-md-6 mb-2 p-2">
                <button type="submit" class="btn btn-primary"> Guardar </button>
            </div>
        </div>
    </form>
@endsection
