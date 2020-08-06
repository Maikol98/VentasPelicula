<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    protected $table ='comentario';
    protected $primaryKey='Id';
    public $timestamps=false;

    protected $fillable=[
        'Id','Descripcion'
    ];
}
