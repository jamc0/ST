<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\Cliente;
class Cliente extends Model
{
    //
    protected $table = 'cliente';
    public $primarykey = 'RUC';


    public static function GuardarCliente($data)
    {
        $cliente = new Cliente();

        $cliente->RUC = $data['RUC'];
        $cliente->razon_social = $data['razon_social'];
        $cliente->direccion =$data['direccion'];
        $cliente->email = $data['email'];
        $cliente->telefono=$data['telefono'];
        $cliente->save();
        return true;
    }

    public static function Listar_Clientes()
    {
        return Cliente::all();
    }
   
  
    public static function ListarClientesRUC($RUC)
    {
      return Cliente::select('*')->where('cliente.RUC', $RUC)->get();
    }

    public static function EditarCliente($data)
    {
        try {
            
            DB::beginTransaction();

            $clientes = array('razon_social'=>$data['razon_social'],
                                    'direccion'=>$data['direccion'],
                                    'email'=>$data['email'],
                                    'telefono'=>$data['telefono']
                                    );

            Cliente::where('RUC',$data['RUC'])->update($clientes);

            DB::commit();

            $clientes = null;
            
            return true;

        } catch (Exception $e) {

            DB::rollback();
            return false;

        }
    }


   public static function ListarClientesCrud($datos)
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
        
        $query .= " SELECT  cliente.RUC, cliente.razon_social, cliente.direccion, cliente.email, cliente.telefono
                         
                    FROM cliente";                 

        if(!empty($_POST["searchPhrase"]))
        {
         $query .= ' WHERE (cliente.RUC LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR clientes.razon_social LIKE "%'.$_POST["searchPhrase"].'%" ';
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
         $query .= ' ORDER BY cliente.RUC DESC ';
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


        $total_records = Cliente::count();


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

