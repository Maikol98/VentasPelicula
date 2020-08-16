@extends('layout')
@section('contenido')
    <div class="row py-4">
        <div class="col-12 col-sm-10 col-lg-5 mx-auto">
            @if (auth()->user()->rol === 'Cliente')
                <form class="shadow rounded px-3 py-4"
                    action="{{route('Pago.store',$pedido->Id)}}" method="post">
                    @csrf

                    <h1 class="display-4">Pago Con Tarjeta</h2>
                    <hr>
                    <div class="form-group">
                        <label  for="">Monto</label>
                        <input type="text" name="Monto" value="{{$pedido->PrecioTotal}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label  for="">Numero Tarjeta</label>
                        <input type="text" name="NumeroTarjeta" class="form-control">
                    </div>
                    <div class="form-group row justify-content-center">
                    <div class="col">
                        <label  for="">Fecha Expiracion</label>
                        <input type="text" name="FechaExpiracion" class="form-control">
                    </div>

                    <div class="col">
                        <label  for="">Codigo</label>
                        <input type="text" name="Codigo" class="form-control">
                    </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block"> Pagar </button>
                    <a href="{{route('Pedido.index')}}" class="btn btn-lg btn-outline-dark btn-block"> Volver</a>
                </form>
            @else
                <form class="shadow rounded px-3 py-4"
                    action="{{route('Pago.efectivo',$pedido->Id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <p>
                            <strong>Precio Total</strong>
                            {{$pedido->PrecioTotal}}
                            <br>
                            <strong>Direccion</strong>
                            {{$pedido->Direccion}}
                            <br>
                            <strong>Fecha Pedido</strong>
                            {{$pedido->FechaPedido}}
                            <br>
                        </p>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block"> Pagó en Efectivo </button>
                </form>
            @endif

        </div>
    </div>
@endsection
