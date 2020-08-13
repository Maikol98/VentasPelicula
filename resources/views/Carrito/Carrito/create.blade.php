@extends('layout')

@section('contenido')

<div class="container py-3">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-7 mx-auto">

            <form class="shadow rounded py-3 px-4"
                action="{{route('Carrito.store')}}" method="post">

                {{ csrf_field() }}

                <h1 style="text-align: center">Carrito</h1>
                <div class="form-group">
                    <label  for="">Descipcion</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="Opcional">
                </div>
                <button type="submit" class=" btn btn-lg btn-primary"> Guardar </button>
            </form>
        </div>
    </div>
</div>


@endsection
