@extends('layout')
@section('contenido')
    <div class="container">
        <div class="row py-3">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <form class="shadow rounded px-3 py-3"
                    action="{{route('Pedido.store')}}" method="post">
                    @csrf
                    <h1 class="display-4">Nuevo Pedido Admin</h1>
                    <hr>
                    <div class="form-group">
                        <label for="">Ci Cliente</label>
                        <input type="text" name="cliente"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for=""> Direccion</label>
                        <input type="text" name="Direccion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <input type="text" name="Descripcion" placeholder="Opcional" class="form-control">
                    </div>
                    <button type="submit" class="btn-lg btn-primary btn-block">Realizar Pedido</button>
                    <a href="/" class="btn btn-lg btn-outline-dark btn-block">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

@endsection
