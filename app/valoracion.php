<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class valoracion extends Model
{
    protected $table ='valoracion';
    protected $primaryKey='Id';
    public $timestamps=false;

    protected $fillable=[
        'Id','Valoracion','Imagen','Nacionalidad','Edad'
    ];
}
