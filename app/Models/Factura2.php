<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
class Factura2 extends Model
{

	protected $table = 'factura';
    public $primarykey = 'id';
    public static function GuardarFactura($data)
    {
    	$factura = new Factura2();

    	$factura->RUC = $data['ruc'];
    	$factura->id_guia = $data['guia'];
    	$factura->fecha = $data['anio_factura'].'/'.$data['mes_factura'].'/'.$data['dia_factura'];
		  // $factura->create_at = date_create()->format('Y-m-d H:i:s');
		  $factura->total = $data['total_factura'];
      $factura->descripcion = $data['descripcion'];
      $factura->estado = $data['estado'];
		$factura->save();
		return true;

    }
}
