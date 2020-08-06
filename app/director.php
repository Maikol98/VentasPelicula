<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class director extends Model
{
    protected $table ='director';
    protected $primaryKey='Id';
    public $timestamps=false;

    protected $fillable=[
        'Id','Nombre','Imagen','Nacionalidad','Edad'
    ];
}
