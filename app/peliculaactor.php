<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peliculaactor extends Model
{
    protected $table ='peliculaactor';
    protected $primaryKey='Id_Pelicula';
    public $timestamps=false;

    protected $fillable=[
        'Id_Pelicula','Id_Actor'
    ];
}
