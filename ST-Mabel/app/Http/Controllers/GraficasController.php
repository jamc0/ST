<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Documento;
use App\Models\Anio;
use App\Models\Mes;
class GraficasController extends Controller
{
    //
    public function Personas()
    {
        $anios = Anio::Listar_Anios();
        $meses = Mes::Listar_Meses();
        return view("adminlte::reporte.listado_graficas", compact('anios', 'meses'));
    }
    public function getUltimoDiaMes($elAnio,$elMes) {
        return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
       }
   public function registros_mes($anio,$mes)
   {
       $primer_dia=1;
       $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
       $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
       $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
       $usuarios=User::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();

  
       $ct=count($usuarios);
       for($d=1;$d<=$ultimo_dia;$d++){
           $registros[$d]=0;     
       }
       foreach($usuarios as $usuario){
       $diasel=intval(date("d",strtotime($usuario->created_at) ) );
       $registros[$diasel]++;    
       }
       $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
       return   json_encode($data);
   }
  //  public function ventas()
  //  {
  //   $anios = Anio::Listar_Anios();
  //   $meses = Mes::Listar_Meses();
  //   return view("adminlte::reporte.listado_graficas", compact('anios', 'meses')); 
  // }
  public function ventas_mes($anio, $mes)

  {
    $primer_dia=1;
       $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
       $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
       $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
       $usuarios=Documento::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();

  
       $ct=count($usuarios);
       for($d=1;$d<=$ultimo_dia;$d++){
           $registros[$d]=0;     
       }
       foreach($usuarios as $usuario){
       $diasel=intval(date("d",strtotime($usuario->created_at) ) );
       $registros[$diasel]++;    
       }
       $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
       return   json_encode($data);
  }
}
