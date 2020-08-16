<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
        crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    {{-- <link rel="stylesheet" href="/css/style.css"> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Pelicula</title>
  </head>

  <body>


    <div class="d-flex toggled" id="wrapper" >
        <!-- Sidebar -->
        <div class="bg-dark border border-dark" id="sidebar-wrapper"  >
            <div class="sidebar-heading font-weight-bold text-white" >Pelicula </div>
            <div class="p-3"></div>
            <hr>
            <div class="list-group list-group-flush">
                <a href="{{route('Cliente.index')}}" class="list-group-item text-white" id="MenuItem">Cliente</a>
                <a href="{{route('Administrador.index')}}" class="list-group-item text-white" id="MenuItem">Administrador</a>
                <a href="{{route('Pelicula.index')}}" class="list-group-item text-white" id="MenuItem">Peliculas</a>
                <a href="{{route('Pedido.index')}}" class="list-group-item text-white" id="MenuItem">Pedido</a>
                <a href="{{route('Carrito.create')}}" class="list-group-item text-white" id="MenuItem">Carrito</a>
                <a href="{{route('Carrito.index')}}" class="list-group-item text-white" id="MenuItem">Todos Los Carritos</a>
                <a href="#" class="list-group-item text-white" id="MenuItem">Ingreso</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

          <nav class="navbar navbar-expand-lg navbar-light bg-dark">

            <!-- BOTON PARA DESPLAZAR EL MENU -->
            <button class="btn btn-dark border border-white" id="menu-toggle">
                <i class="icon ion-md-menu" style="font-size: 20px"></i>
            </button>


            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">

              <span class="navbar-toggler-icon"></span>
            </button> --}}


            {{-- navbar --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white border rounded" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white border rounded mx-1" href="{{ route('register') }}">Registrase</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">{{ Auth::user()->name }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white border rounded mx-1" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Salir</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                    @csrf
                                </form>
                        </li>

                    @endguest

              </ul>
            </div>
          </nav>

          <div class="container-fluid">
            @yield('contenido')
          </div>
        </div>
        <!-- /#page-content-wrapper -->

      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous">
    </script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    </script>
  </body>
</html>
