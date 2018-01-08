<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\Serie;
use App\Models\DocumentoDetalle;
use App\Models\Producto;
use App\Models\PersonaNatural;

class Documento extends Model
{
    protected $table='documentos';
    public $primaryKey ='id';


     public static function ListarNombreVentaAll()
    {

 $query = " SELECT documentos.id, documentos.persona_id, 
                          documentos.total,
                          documentos.fecha_pago,
                          documentos.direccion_envio,
                          CONCAT(personasnaturales.Nombres,' ', personasnaturales.cApellidoPaterno,' ',  personasnaturales.cApellidoMaterno) as Nombres
                         FROM documentos 
                        inner join personas on personas.id = documentos.persona_id 
                        inner join personasnaturales on personasnaturales.id = personas.id";

return DB::select($query);
         // return Documento::select("documentos.id",
         //                               "documentos.persona_id",
         //                               "documentos.total",
         //                               "documentos.fecha_pago",
         //                               "documentos.direccion_envio",
         //                               "personasnaturales.Nombres")
         //                        ->join("personas","personas.id","=","documentos.persona_id")
         //                        ->join("personasnaturales","personasnaturales.id","=","personas.id")
         //                        ->get();

    }

 public static function ListarNombreCliente($datos)
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
        
        $query .= " SELECT documentos.id, documentos.persona_id, 
                          documentos.total,
                          documentos.fecha_pago,
                          documentos.direccion_envio,
                          personasnaturales.Nombres
                    FROM documentos 
                        inner join personas on personas.id = documentos.persona_id 
                        inner join personasnaturales on personasnaturales.id = personas.id";

        if(!empty($_POST["searchPhrase"]))
        {
         $query .= ' WHERE (documentos.id LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR documentos.persona_id LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR documentos.total LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR documentos.fecha_pago LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR documentos.direccion_envio LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR personasnaturales.Nombres LIKE "%'.$_POST["searchPhrase"].'%" )';
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
         $query .= ' ORDER BY documentos.id DESC ';
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


        $total_records = Documento::count();


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


    public static function GuardarFactura($datos,$codigo_usuario)
    {
    	try {
    		
             DB::beginTransaction();
    			
    			   Serie::ActualizarCorrelativo($datos['serie_id']);
            	
            	$numero_documento = Serie::DevuelveCorrelativo($datos['serie_id']);

            	$igv = 0;
            	$subtotal =0;
            	$total = 0;


            	// Insertando Cabecera
            	$codigo_documento_generado = DB::table('documentos')->insertGetId(
		     			[
		     				'persona_id' => $datos['persona_id'],
		     				'user_id'  => $codigo_usuario,
  							'serie_id' => $datos['serie_id'],
  							'nro_documento' => $numero_documento,
  							'tipo_pago_id' => $datos['tipo_pago_id'],
  							'tipo_documento_id' => $datos['tipo_documento_id'],
  							'cNumeroOperacion' => '',
  							'igv'  => $igv,
  							'subtotal' => $subtotal,
  							'total' => $total,
  							'anio_id' => $datos['anio_id'], 
  							'mes_id' => $datos['mes_id'],
  							'pago_dia' => $datos['pago_dia'],
  							'fecha_pago' => date_create($datos['anio_id'] . "/" . $datos['mes_id'] . "/" .$datos['pago_dia'])->format('Y-m-d H:i:s'),
  				 			'created_at' =>  date_create()->format('Y-m-d H:i:s'),
  				 			'updated_at' =>  date_create()->format('Y-m-d H:i:s'),
  				 			'transporte_id' => 	$datos['transporte_id'],			
  				 			'direccion_envio' => 	$datos['direccion_envio']			
		     			]
				 	);

            	// Insertando Detalle.
            	  for ($i=0; $i < count($datos['idarticulo']); $i++) { 
                    
                   $precio = $datos['precio_venta'][$i];
				   $cantidad = $datos['cantidad'][$i];                   
				   $articulo = $datos['idarticulo'][$i];

                   $subtotal = floatval($datos['precio_venta'][$i])*intval($datos['cantidad'][$i]);

               		$documento_detalle = new DocumentoDetalle();

               		$documento_detalle->documento_id = $codigo_documento_generado;
               		$documento_detalle->producto_id = $articulo;
               		$documento_detalle->cantidad = $cantidad;
               		$documento_detalle->precio = $precio;
               		$documento_detalle->total = $subtotal;


               		$documento_detalle->save();

               		Producto::ActualizarStockProducto($datos['idarticulo'][$i],$cantidad);

               		$total = $total + $subtotal;
                    
                    
               }

               $igv = 0.18*$total;

               $totaligv = $total + $igv;

               // Actualizando los Datos.

                $valores=array('igv'=> $igv,
                			   'subtotal' =>$total,
                			   'total' => $totaligv );

            	Documento::where('id',$codigo_documento_generado)
                	->update($valores);

                $valores= null;
                $igv = null;
                $totaligv = null; 
                $total =null;

            DB::commit();

          	return true;  
    	} catch (Exception $e) {
    		B::rollback();

            return false; 
    	}
    }
}
