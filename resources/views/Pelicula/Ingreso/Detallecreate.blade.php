@extends('layout')
@section('contenido')
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-6 mx-auto">
                <form class="shadow rounded px-3 py-3"
                    action="{{route('Detalleingreso.store',$Id)}}" method="post">
                    @csrf
                    <h1 class="display-4">Nuevo Ingreso</h1>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Codigo Pelicula</label>
                            <input type="text"  name="Id_Pelicula" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Cantidad</label>
                            <input type="number" name="Cantidad" min="1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 py-3">
                        <label for="">Precio</label>
                        <input type="text" name="Precio" min="1" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary btn-block"> Seguir Ingresando</button>
                    <a href="{{route('Ingreso.index')}}" class="btn btn-lg btn-outline-primary btn-block">Terminar Ingreso</a>
                    <a href="/" class="btn btn-lg btn-outline-dark btn-block"> HOME </a>
                </form>
            </div>
        </div>
    </div>
@endsection
