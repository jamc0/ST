<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class Zona extends Model
{
    protected $table = 'zonas';
    public $primarykey = 'id';

    public static function Listar_Zonas_Departamentos()
    {

    	return  DB::select("call usp_listar_zonas_departamentos"); 
    }
    public static function Listar_Provincias_x_Departamento($codigo)
    {
    	return DB::select("call usp_listar_zonas_provincias_x_departamento($codigo)");
    }
    public static function Listar_Distritos_x_Provincia($codigo)
    {
        return DB::select("call usp_listar_zonas_distritos_x_provincia($codigo)");
    }
    public static function Listar_Zona_x_ID($codigo)
    {

        return Zona::select('zonas.id','zonas.cNomZona')
                    ->where('zonas.id',$codigo)
                    ->get();
    }
}
