<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //
    public static function GuardarFactura($data)
    {
    	$factura = new Factura();

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
