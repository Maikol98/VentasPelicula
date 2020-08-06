<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peliculadirector extends Model
{
    protected $table ='peliculadirector';
    protected $primaryKey='Id_Pelicula';
    public $timestamps=false;

    protected $fillable=[
        'Id_Pelicula','Id_Director'
    ];
}
