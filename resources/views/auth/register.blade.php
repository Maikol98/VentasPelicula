@extends('layout')

@section('contenido')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card" style="background: rgb(153, 151, 151)">
                <div class="card-header display-4">Registrar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row justify-content-center">

                            <div class="col-md-6">
                                <label for="ci" class="col">CI</label>
                                <input id="ci" type="text" class="form-control @error('CI') is-invalid @enderror"
                                name="CI" value="{{ old('CI') }}">

                                @error('CI')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="name" class="col">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}"
                                    required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>



                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <label for="apellido" class="col">Apellido</label>
                                <input id="apellido" type="text" class="form-control @error('Apellido') is-invalid @enderror"
                                name="Apellido" value="{{ old('Apellido') }}">

                                @error('Apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="telefono" class="col">Telefono</label>
                                <input id="telefono" type="text" class="form-control @error('Telefono') is-invalid @enderror"
                                name="Telefono" value="{{ old('Telefono') }}">

                                @error('Telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="fecha" class="col">Fecha Naciemto</label>
                                <input id="fecha" type="date" class="form-control @error('Fecha') is-invalid @enderror"
                                name="Fecha" value="{{ old('Fecha') }}">

                                @error('Fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="direccion" class="col">Direccion</label>
                                <input id="direccion" type="text" class="form-control @error('Direccion') is-invalid @enderror"
                                name="Direccion" value="{{ old('Direccion') }}">

                                @error('Direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- direccion --}}
                        <div class="form-group row">



                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-center">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-center">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-center">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row m-1">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
