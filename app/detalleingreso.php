<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalleingreso extends Model
{
    protected $table ='detalleingreso';
    protected $primaryKey='Id_Pelicula';
    public $timestamps=false;

    protected $fillable=[
        'Id_Pelicula','Id_Ingreso','Cantidad','Subtotal'
    ];
}
