<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detallepedido extends Model
{
    protected $table ='detallepedido';
    protected $primaryKey='Id_Pelicula';
    public $timestamps=false;

    protected $fillable=[
        'Id_Pelicula','Id_Pedido','Cantidad','Subtotal'
    ];
}
