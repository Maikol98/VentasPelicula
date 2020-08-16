<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelicula extends Model
{
    protected $table ='pelicula';
    protected $primaryKey='Id';
    public $timestamps=false;

    protected $fillable=[
        'Id','Nombre','Descripcion','Precio','Stock',
        'Poster','Trailer','Distribucion','Año','Categoria',
        'Resolucion', 'Idioma','Duracion'
    ];
}
