<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">

    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">


    <title>Pelicula</title>
  </head>

  <body>


    <div class="d-flex toggled" id="wrapper" >
        <!-- Sidebar -->
        <div class="bg-dark border border-dark" id="sidebar-wrapper"  >
            <div class="sidebar-heading font-weight-bold" >Pelicula </div>
            <div class="p-3"></div>
            <hr>
            <div class="list-group list-group-flush">
                <a href="<?php echo route('Cliente.index')?>" class="list-group-item" id="MenuItem">Cliente</a>
                <a href="<?php echo route('Administrador.index')?>" class="list-group-item" id="MenuItem">Administrador</a>
                <a href="<?php echo route('Pelicula.index')?>" class="list-group-item" id="MenuItem">Peliculas</a>
                <a href="#" class="list-group-item" id="MenuItem">Pedido</a>
                <a href="<?php echo route('Carrito.create')?>" class="list-group-item" id="MenuItem">Carrito</a>
                <a href="<?php echo route('Carrito.index')?>" class="list-group-item" id="MenuItem">Todos Los Carritos</a>
                <a href="#" class="list-group-item" id="MenuItem">Ingreso</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

          <nav class="navbar navbar-expand-lg navbar-light bg-dark border border-dark">
            <!-- BOTON PARA DESPLAZAR EL MENU -->
            <button class="btn btn-dark border border-white" id="menu-toggle">
                <i class="icon ion-md-menu" style="font-size: 20px"></i>
            </button>

            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">

              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown" >
                  <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    style="color: rgb(95, 110, 5)">
                    Perfil
                  </a>

                  <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown"
                    style="border-radius: 12px">
                    <a class="dropdown-item" style="color: rgb(95, 110, 5)" href="#">Perfil</a>
                    <a class="dropdown-item" style="color: rgb(95, 110, 5)" href="#">Configuracion</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" style="color: rgb(95, 110, 5)" href="#">Salir</a>
                  </div>
                </li>
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
