<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actor extends Model
{
    protected $table ='actor';
    protected $primaryKey='Id';
    public $timestamps=false;

    protected $fillable=[
        'Id','Nombre','Imagen','Nacionalidad','Edad'
    ];
}
