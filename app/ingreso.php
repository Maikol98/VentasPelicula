<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingreso extends Model
{
    protected $table ='ingreso';
    protected $primaryKey='Id';
    public $timestamps=false;

    protected $fillable=[
        'Id','PrecioTotal','Fecha'
    ];
}
