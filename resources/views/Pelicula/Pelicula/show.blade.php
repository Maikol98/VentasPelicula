@extends('layout')
@section('contenido')


    <div class="container">
        <h1 class="display-4 text-white text-center">{{$pelicula->Nombre}}</h1>
        <div class="row py-2">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <div class="container text-center p-3">
                    <img src="{{$pelicula->Poster}}" class="shadow img-fluid mx-auto"
                    style="border: 10px ridge grey">
                </div>
                <div class="container rounded" style="background: #ffffff79">
                    <p>{{$pelicula->Descripcion}}</p>
                    <p>
                        <strong>Titulo Original:</strong>
                        {{$pelicula->Nombre}}
                        <br>
                        <strong>Año:</strong>
                        {{$pelicula->Año}}
                        <br>
                        <strong>Duracion:</strong>
                        {{$pelicula->Duracion}} min
                        <br>
                        <strong>Resolucion:</strong>
                        {{$pelicula->Resolucion}}
                        <br>
                        <strong>Idioma:</strong>
                        {{$pelicula->Idioma}}
                        <br>
                        <strong>Categoria:</strong>
                        {{$pelicula->Categoria}}
                        <br>
                        <strong>Precio:</strong>
                        {{$pelicula->Precio}} bs
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mx-auto">
                    <h2 class="text-white text-center">Actores</h2>
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{$pelicula->Poster}}" class="d-block w-100 h-80"  height="200"
                                    style="border: 10px ridge grey">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Nombre Actor</h5>
                                </div>
                            </div>
                          <div class="carousel-item">
                            <img src="https://s3-us-west-2.amazonaws.com/lasaga-blog/media/original_images/grupo_imagen.jpg" height="200" class="d-block w-100 h-80"
                                style="border: 10px ridge grey">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-lg-4 mx-auto">
                    <h3 class="text-white">Trailer</h3>
                    <div class="embed-responsive embed-responsive-16by9" style="border: 10px ridge grey">
                        <iframe class="TituloCard embed-responsive-item " src="{{$pelicula->Trailer}}" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <div class="rounded" style="background: #ffffff79">
                    <div class="col">
                        <form class="py-2" style="background: none"
                            action="{{route('Comentario.store',$pelicula->Id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold"> Escribe tu comentario</label>
                                <textarea name="Comentario" id=""  rows="4" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"> Guardar </button>
                        </form>
                    </div>
                </div>
                <h3 class="text-white text-center py-2">Comentarios</h1>
                @foreach ($comentario as $dato)
                <div class="rounded py-2 px-2" style="background: #ffffff79">
                    <h5 class="font-weight-bold">{{$dato->Nombre}}</h6>
                    <hr>
                    <h6>{{$dato->Descripcion}}</h5>
                </div>
                <p></p>
            @endforeach
            </div>
        </div>
    </div>




    <a href="{{route('Pelicula.index')}}" class="btn btn-primary"> Volver </a>


</div>


@endsection
