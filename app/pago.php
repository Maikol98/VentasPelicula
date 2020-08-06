<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    protected $table ='pago';
    protected $primaryKey='Id';
    public $timestamps=false;

    protected $fillable=[
        'Id','TipoPago'
    ];
}
