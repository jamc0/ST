<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';
    protected $primaryKey='RUC';

    public $timestamps=false;

    protected $fillable=[
    	'RUC',
    	'razon_social',
    	'direccion',
    	'email',
    	'telefono'
    ];
}
