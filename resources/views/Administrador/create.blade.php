@extends('layout')
@section('contenido')

    <div class="container py-4">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-8 mx-auto">
                <form class="shadow rounded py-3 px-4"
                    action="{{route('Administrador.store')}}" method="post" style="width: 80%">

                    @csrf
                    <h1 class="display-5">Registrar Administrador</h1>

                        <div class="form-group">
                            <label  for="">Nombre</label>
                            <input type="text" name="Nombre" class="form-control">
                        </div>

                        <div class="form-group">
                            <label  for="">Apellido</label>
                            <input type="text" name="Apellido" class="form-control">
                        </div>

                        <div class="form-group">
                            <label  for="">Telefono</label>
                            <input type="text" name="Telefono" class="form-control">
                        </div>
                        <div class="form-group">
                            <label  for="">Carnet Identidad</label>
                            <input type="text" name="CI" class="form-control">
                        </div>


                        <div class="form-group">
                            <label  for="">Direccion</label>
                            <input type="text" name="Direccion" class="form-control">
                        </div>

                        <div class="form-group">
                            <label  for="">Email</label>
                            <input type="email" name="Email" class="form-control">
                        </div>
                        <p></p>
                        <button type="submit" class="btn btn-lg btn-primary btn-block"> Guardar </button>
                    </div>
                </form>
            </div>
        </div>

    </div>




@endsection
