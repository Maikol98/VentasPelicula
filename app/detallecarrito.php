<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detallecarrito extends Model
{
    protected $table ='detallecarrito';
    protected $primaryKey='Id_Pelicula';
    public $timestamps=false;

    protected $fillable=[
        'Id_Pelicula','Id_Carrito','Cantidad','Subtotal'
    ];
}
