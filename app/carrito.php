<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    protected $table ='carrito';
    protected $primaryKey='Id';
    public $timestamps=false;

    protected $fillable=[
        'Id','Descripcion'
    ];
}
