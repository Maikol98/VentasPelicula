<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    protected $table ='pedido';
    protected $primaryKey='Id';
    public $timestamps=false;

    protected $fillable=[
        'Id','FechaPedido','PrecioTotal','Estado','Direccion','Descripcion','Ci_Cliente'
    ];
}
