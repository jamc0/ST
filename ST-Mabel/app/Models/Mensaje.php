<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class Mensaje extends Model
{
    //
    protected $table = 'mensajes';
    public $primarykey = 'id';

     public static function GuardarMensaje($data)
    {
    	$mensaje = new Mensaje();

    	$mensaje->nombres = $data['name'];
    	$mensaje->correo_electronico = $data['email'];
    	$mensaje->mensaje = $data['message'];
        $mensaje->telefono = $data['phone'];
        $mensaje->save(); 
    	return true;
    }

    public static function ListarMensajes()
    { 
    	return Mensaje::all();
    }
    public static function ListarMensajeId($id)
    {
        return Mensaje::select('*')->where('mensajes.id', $id)->get();

    }
    public static function ListarMensajesCrud($datos)
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
        
        $query .= " SELECT  mensajes.id, mensajes.nombres, mensajes.correo_electronico, 
                           CONCAT(SUBSTR(mensajes.mensaje ,1 ,30), '...') as mensaje,
                          mensajes.telefono, estados.nombre_estado
                         
                    FROM mensajes
                    inner join estados on estados.id = mensajes.estado_id";                    

        if(!empty($_POST["searchPhrase"]))
        {
         $query .= ' WHERE (mensajes.id LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR mensajes.nombres LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR estados.nombre_estado LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR mensajes.correo_electronico LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR mensajes.mensaje LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR mensajes.telefono LIKE "%'.$_POST["searchPhrase"].'%" )';
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
         $query .= ' ORDER BY mensajes.id DESC ';
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


        $total_records = Mensaje::count();


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
    
}
