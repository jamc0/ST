<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\GuiaRemision;

class guia_remision extends Model
{
    protected $table = 'guia_remision';
    public $primarykey = 'id';

 
	public static function GuardarGuiaRemision($data)
	{
      $guia_remision = new GuiaRemision();

      $guia_remision->placa = $data['placa'];
      $guia_remision->fecha_remision = date_create($data['anio_entrega'] . "/" . $datos['mes_entrega'] . "/" .$datos['dia_entrega'])->format('Y-m-d H:i:s'),
      $guia_remision->fecha_traslado= date_create($data['anio_entrega'] . "/" . $datos['mes_entrega'] . "/" .$datos['dia_entrega'])->format('Y-m-d H:i:s'),
      $guia_remision->pto_partida = $data['pto_partida'];
      $guia_remision->pto_llegada = $data['pto_llegada'];
      $guia_remision->hora_llegada = date_create($data['anio_entrega'] . "/" . $datos['mes_entrega'] . "/" .$datos['dia_entrega'])->format('Y-m-d H:i:s'),
      $guia_remision->save(); 
      return true;
    }
    public static function ListarGuiaRemision()
    { 
      return Mensaje::all();
    }
}
