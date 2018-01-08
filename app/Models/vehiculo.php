<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\Vehiculo;
class Vehiculo extends Model
{
    //
    protected $table = 'vehiculo';
    public $primarykey = 'placa';


    public static function GuardarVehiculo($data)
    {
        $vehiculo = new Vehiculo();

        $vehiculo->placa = $data['placa'];
        $vehiculo->marca = $data['marca'];
        $vehiculo->cod_configuracion =$data['cod_configuracion'];
        $vehiculo->nro_contacto = $data['nro_contacto'];
        $vehiculo->estado=$data['estado'];
        $vehiculo->save();
        return true;
    }

    public static function Listar_Vehiculos()
    {
        return Vehiculo::all();
    }
   
  
    public static function ListarVehiculosPlaca($placa)
    {
      return Vehiculo::select('*')->where('vehiculo.placa', $placa)->get();
    }

    public static function EditarVehiculo($data)
    {
        try {
            
            DB::beginTransaction();

            $clientes = array('marca'=>$data['marca'],
                              'cod_configuracion'=>$data['cod_configuracion'],
                              'nro_contacto'=>$data['nro_contacto'],
                              'estado'=>$data['estado']
                               );

            Vehiculo::where('placa',$data['placa'])->update($vehiculo);

            DB::commit();

            $vehiculo = null;
            
            return true;

        } catch (Exception $e) {

            DB::rollback();
            return false;

        }
    }


   public static function ListarVehiculoCrud($datos)
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
        
        $query .= " SELECT  vehiculo.placa, vehiculo.marca, vehiculo.cod_configuracion, vehiculo.nro_contacto, vehiculo.estado
                         
                    FROM vehiculo";                 

        if(!empty($_POST["searchPhrase"]))
        {
         $query .= ' WHERE (vehiculo.placa LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR vehiculo.marca LIKE "%'.$_POST["searchPhrase"].'%" ';
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
         $query .= ' ORDER BY vehiculo.placa DESC ';
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


        $total_records = Vehiculo::count();


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

