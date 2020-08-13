<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $table ='cliente';
    protected $primaryKey='CI';
    public $timestamps=false;

    protected $fillable=[
        'CI','Nombre','Apellido','Telefono','FechaNacimiento','Direccion','Email','Estado'
    ];


}
