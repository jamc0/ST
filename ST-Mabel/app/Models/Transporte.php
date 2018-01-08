<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class Transporte extends Model
{
    protected $table = 'transportes';
    public $primarykey = 'id';

    public static function ListarTransportesCrud($datos)
    {
    	 $query = '';
        
        $records_per_page = 10;
        
        $start_from = 0;
        
        $current_page_number = 0;

        if(isset($_POST["rowCount"]))
        {
         $records_per_page = $datos["rowCount"];
        }
        else
        {
         $records_per_page = 10;
        }

        if(isset($_POST["current"]))
        {
         $current_page_number = $datos["current"];
        }
        else
        {
         $current_page_number = 1;
        }

        $start_from = ($current_page_number - 1) * $records_per_page;
        
        $query .= " SELECT  transportes.id, transportes.nombre_transporte, transportes.demora, 
                           transportes.precio, estados.nombre_estado
                         
                    FROM transportes
                    inner join estados on estados.id = transportes.estado_id";                    

        if(!empty($_POST["searchPhrase"]))
        {
         $query .= ' WHERE (transportes.id LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR transportes.nombre_transporte LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR estados.nombre_estado LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR transportes.precio LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR transportes.demora LIKE "%'.$_POST["searchPhrase"].'%" )';
         
         // $query .= 'OR estados.nombre_estado LIKE "%'.$_POST["searchPhrase"].'%" )';
        }

        $order_by = '';

        if(isset($_POST["sort"]) && is_array($_POST["sort"]))
        {
         foreach($_POST["sort"] as $key => $value)
         {
          $order_by .= " $key $value, ";
         }
        }
        else
        {
         $query .= ' ORDER BY transportes.id DESC ';
        }

        if($order_by != '')
        {
         $query .= ' ORDER BY ' . substr($order_by, 0, -2);
        }

        if($records_per_page != -1)
        {
         $query .= " LIMIT " . $start_from . ", " . $records_per_page .";";
        }


        $results = DB::select($query);


        $total_records = Transporte::count();


        $output = array(
         'current'  => intval($datos["current"]),
         'rowCount'  => $records_per_page,
         'total'   => intval($total_records),
         'rows'   => $results
        );

        $total_records = null;
        $query = null;
        $records_per_page = null;
        $order_by = null;
        $start_from = null;

        return json_encode($output);
    }


    public static function ListarTransportes()
    {
         return DB::table('transportes')->get();
    }
}
