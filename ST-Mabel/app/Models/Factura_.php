<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\Factura;
class Factura extends Model
{
    //
    protected $table = 'factura';
    public $primarykey = 'id';


    public static function GuardarFactura($data)
    {
    	$factura = new Factura();

    	$factura->RUC = $data['ruc'];
    	$factura->id_guia = $data['id_guia'];
		$factura->creat_at = date_create()->format('Y-m-d H:i:s');
		$factura->total = $data['total'];
        $factura->descripcion = $data['descripcion'];
        $factura->estado = $data['estado'];
		$factura->save();
		return true;

    }
    public static function Listar_Factura()
    {
        return Factura::all();
    }
   
  
    public static function ListarFacturaId($id)
    {
        return Factura::select('*')->where('factura.id', $id)->get();
    }
    public static function EditarFactura($data)
    {
        try {
            
            DB::beginTransaction();

            $factura = array('ruc'=>$data['ruc'],
                                    'id_guia'=>$data['id_guia']
                                    );

            Factura::where('id',$data['id'])->update($factura);

            DB::commit();

            $factura = null;
            
            return true;

        } catch (Exception $e) {

            DB::rollback();
            return false;

        }
    }


   public static function ListarFacturaCrud($datos)
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
        
        $query .= " SELECT  factura.id, factura.ruc, factura.id_guia, factura.fecha, factura.total factura.descripcion, factura.estado 
                         
                    FROM factura";                 

        if(!empty($_POST["searchPhrase"]))
        {
         $query .= ' WHERE (factura.id LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR factura.id_guia LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR factura.fecha LIKE "%'.$_POST["searchPhrase"].'%" )';
         $query .= 'OR factura.fecha LIKE "%'.$_POST["searchPhrase"].'%" )';       
         $query .= 'OR factura.total LIKE "%'.$_POST["searchPhrase"].'%" )';
         $query .= 'OR factura.descripcion LIKE "%'.$_POST["searchPhrase"].'%" )'; 
        $query .= 'OR factura.estado LIKE "%'.$_POST["searchPhrase"].'%" )';
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
         $query .= ' ORDER BY factura.id DESC ';
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


        $total_records = Factura::count();


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

