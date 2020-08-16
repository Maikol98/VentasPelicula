@extends('layout')
@section('contenido')
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-6 mx-auto">
                <form class="shadow rounded px-3 py-3"
                    action="{{route('Detalleingreso.update',[$detalleingreso->Id_Ingreso,$detalleingreso->Id_Pelicula])}}" method="post">
                    @method('PUT')
                    @csrf
                    <h1 class="display-4">Editar Ingreso</h1>
                    <hr>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="">Cantidad</label>
                            <input type="number" name="Cantidad" min="1" value="{{$detalleingreso->Cantidad}}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Precio</label>
                            <input type="text"  name="Precio" value="{{$detalleingreso->Precio}}" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block"> Actualizar Datos</button>
                    <a class="btn btn-outline-dark btn-lg btn-block"
                        href="{{route('Ingreso.show',$detalleingreso->Id_Ingreso)}}">Volver</a>
                </form>
            </div>
        </div>
    </div>
@endsection
