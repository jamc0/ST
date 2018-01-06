<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\Categoria;
class Categoria extends Model
{
    //
    protected $table = 'categorias';
    public $primarykey = 'id';


    public static function GuardarCategoria($data)
    {
    	$categoria = new Categoria();

    	$categoria->nombre_categoria = $data['nombre_categoria'];
    	$categoria->descripcion = $data['descripcion'];
		$categoria->created_at = date_create()->format('Y-m-d H:i:s');
		$categoria->updated_at = date_create()->format('Y-m-d H:i:s');
		$categoria->save();
		return true;

    }
    public static function Listar_Categorias()
    {
        return Categoria::all();
    }
   
  
    public static function ListarCategoriasId($id)
    {
        return Categoria::select('*')->where('categorias.id', $id)->get();
    }
    public static function EditarCategorias($data)
    {
        try {
            
            DB::beginTransaction();

            $categorias = array('nombre_categoria'=>$data['nombre_categoria'],
                                    'descripcion'=>$data['descripcion']
                                    );

            Categoria::where('id',$data['id'])->update($categorias);

            DB::commit();

            $categorias = null;
            
            return true;

        } catch (Exception $e) {

            DB::rollback();
            return false;

        }
    }


   public static function ListarCategoriasCrud($datos)
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
        
        $query .= " SELECT  categorias.id, categorias.nombre_categoria, categorias.descripcion
                         
                    FROM categorias";                 

        if(!empty($_POST["searchPhrase"]))
        {
         $query .= ' WHERE (categorias.id LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR categorias.nombre_categoria LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR categorias.descripcion LIKE "%'.$_POST["searchPhrase"].'%" )';
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
         $query .= ' ORDER BY categorias.id DESC ';
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


        $total_records = Categoria::count();


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

