@extends('layout')
@section('contenido')

<!-- colocar titulo de la pelicula -->
<div id="ImgPoster">
    <h1 class="Titulo"> {{$pelicula->Nombre}} </h1>

    <img src="{{$pelicula->Poster}}" class="TituloCard" alt=" " >

</div>



<div id="Descripcion">
    <h5 >{{$pelicula->Descripcion}}</h5>

    <div class="row">
        {{-- toda esta vaina se va a reducir a un for each --}}
        <div class="col">
            <img src="{{$pelicula->Poster}}" class="ActorImg" alt="">
            <h6>La yoganzo</h6>
        </div>
        <div class="col">
            <img src="{{$pelicula->Poster}}" class="ActorImg" alt="">
            <h6>La yoganzo</h6>
        </div>
        <div class="col">
            <img src="{{$pelicula->Poster}}" class="ActorImg" alt="">
            <h6 >La yoganzo</h6>
        </div>
        <div class="col">
            <img src="https://d500.epimg.net/cincodias/imagenes/2018/11/13/lifestyle/1542113135_776401_1542116070_noticia_normal.jpg" class="ActorImg" alt="">
            <h6 class="NombreActor">La yoganzo</h6>
        </div>
        {{-- ssssss --}}
        <p></p>
        {{-- <div id="ImgPoster">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="TituloCard embed-responsive-item " src="https://www.youtube.com/embed/yuFI5KSPAt4" allowfullscreen></iframe>
            </div>
        </div> --}}
    </div>

    <h1>Comentarios</h1>
    <div class="col">
        <form action="{{route('Comentario.store',$pelicula->Id)}}" method="post">
            @csrf
            <textarea name="Comentario" id="" cols="50" rows="4"></textarea>
            <button type="submit" class="btn btn-primary"> Guardar </button>
        </form>
    </div>
    <p></p>

    @foreach ($comentario as $dato)
        <hr>
        <h6>{{$dato->Nombre}}</h6>
        <h5>{{$dato->Descripcion}}</h5>
    @endforeach

    {{-- <h5>Nombre de la persona</h5>
    <h6>Comentario</h6>
    <hr>
    <h5>Nombre de la persona</h5>
    <h6>Comentario</h6>
    <hr>
    <h5>Nombre de la persona</h5>
    <h6>Comentario</h6>
    <hr>
    <h5>Nombre de la persona</h5>
    <h6>Comentario</h6>
    <hr>
    <h5>Nombre de la persona</h5>
    <h6>Comentario</h6>
    <hr>
    <h5>Nombre de la persona</h5>
    <h6>Comentario</h6> --}}

    <a href="{{route('Pelicula.index')}}" class="btn btn-primary"> Volver </a>


</div>


@endsection
