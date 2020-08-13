@extends('layout')
@section('contenido')

    <div class="container py-4">

        <div class="row" >

            <div class="col-12 col-sm-10 col-lg-7 mx-auto" >

                <form class="shadow rounded py-3 px-4"
                    action="{{route('Cliente.store')}}" method="post">

                    @csrf

                    <h1 class="display-5">Registrar Cliente</h1>

                    <div class="form-group">
                        <label  for="">Nombre</label>
                        <input class="form-control bg-light shadow-sm @error('Nombre') is-invalid
                        @enderror
                        border-1" value="{{old('Nombre')}}"
                        type="text"
                        name="Nombre">

                        @error('Nombre')
                            <span class="invalided-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label  for="">Apellido</label>
                        <input class="form-control bg-light shadow-sm @error('Apellido') is-invalid
                        @enderror
                        border-1"
                        type="text" value="{{old('Apellido')}}"
                        name="Apellido">

                        @error('Apellido')
                            <span class="invalided-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label  for="">Telefono</label>
                        <input class="form-control bg-light shadow-sm @error('Telefono') is-invalid
                        @enderror
                        border-1"
                        type="text" value="{{old('Telefono')}}"
                        name="Telefono">

                        @error('Telefono')
                            <span class="invalided-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label  for="">Carnet Identidad</label>
                        <input class="form-control bg-light shadow-sm @error('CI') is-invalid
                            @enderror
                            border-1"
                            type="text" value="{{old('CI')}}"
                            name="CI">

                            @error('CI')
                                <span class="invalided-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                    </div>


                    <div class="form-group">
                        <label  for="">Fecha De Nacimiento</label>
                        <input class="form-control bg-light shadow-sm @error('FechaNacimiento') is-invalid
                            @enderror
                            border-1" placeholder="yyyy-mm-dd"
                            type="date" value="{{old('FechaNacimiento')}}"
                            name="FechaNacimiento" min="1950-01-01">

                            @error('FechaNacimiento')
                                <span class="invalided-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                    </div>


                    <div class="form-group">
                        <label  for="">Direccion</label>
                        <input class="form-control bg-light shadow-sm @error('Direccion') is-invalid
                            @enderror
                            border-1"
                            type="text" value="{{old('Direccion')}}"
                            name="Direccion">

                            @error('Direccion')
                                <span class="invalided-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label  for="">Email</label>
                        <input class="form-control bg-light shadow-sm @error('Email') is-invalid
                            @enderror
                            border-1"
                            type="text" value="{{old('Email')}}"
                            name="Email">

                            @error('Email')
                                <span class="invalided-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary btn-block"> Guardar </button>
                </form>
            </div>
        </div>
    </div>
@endsection
