<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anio extends Model
{
	protected $table = 'anios';
    public $primarykey = 'id';

    public static function Listar_Anios()
    {
    	return Anio::select("anios.id as id","anios.numero_anio as numero_anio")
            			->get();
    }

}
