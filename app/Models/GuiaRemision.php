<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class GuiaRemision extends Model
{
    protected $table = 'guia_remision';
    public $primarykey = 'id';

 
	public static function GuardarGuiaRemision($datos)
	{
      $guia_remision = new GuiaRemision();

      $guia_remision->placa = $datos['placa'];
      $guia_remision->fecha_remision = $datos['anio_remision'] . "/" . $datos['mes_remision'] . "/" .$datos['dia_remision'];
      $guia_remision->fecha_traslado= $datos['anio_traslado'] . "/" . $datos['mes_traslado'] . "/" .$datos['dia_traslado'];
      $guia_remision->pto_partida = $datos['punto_partida'];
      $guia_remision->pto_llegada = $datos['punto_llegada'];
      $guia_remision->hora_partida = ($datos['hora_llegada'] . ':' .$datos['minuto_llegada'] .':' .$datos['segundo_llegada']);
      $guia_remision->estado = $datos['estado'];
      $guia_remision->save(); 
      return true;
    }

       public static function Listar_GuiaRemision()
    { 
      return GuiaRemision::all();
    }

    public static function Listar_GuiaRemisionRUC($id)
    {
      return Cliente::select('*')->where('guia_remision.id', $id)->get();
    }

    public static function EditarGuiaRemision($data)
    {
        try {
            
            DB::beginTransaction();

            $guia_remision = array('placa'=>$data['placa'],
                                    'fecha_remision'=>$data['fecha_remision'],
                                    'fecha_traslado'=>$data['fecha_traslado'],
                                    'pto_partida'=>$data['pto_partida'],
                                    'pto_llegada'=>$data['pto_llegada'],
                                    'hora_partida'=>$data['hora_partida'],
                                    'estado'=>$data['estado']
                                    );

            Cliente::where('id',$data['id'])->update($guia_remision);

            DB::commit();

            $guia_remision = null;
            
            return true;

        } catch (Exception $e) {

            DB::rollback();
            return false;

        }
    }



}
