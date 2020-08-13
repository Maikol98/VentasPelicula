<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class administrador extends Model
{
    protected $table ='administrador';
    protected $primaryKey='CI';
    public $timestamps=false;

    protected $fillable=[
        'CI','Nombre','Apellido','Direccion','Telefono','Email','Estado'
    ];
}
