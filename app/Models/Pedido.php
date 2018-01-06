<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\DetallePedido;

class Pedido extends Model
{
    protected $table = 'pedidos';
    public $primarykey = 'id';

 
	public static function GuardarBoleta($datos, $codigo_usuario)
	{
		try {
    		
            DB::beginTransaction();
    			
    			

            	// Insertando Cabecera
            	$codigo_pedido_generado = DB::table('pedidos')->insertGetId(
		     			[
		     				'persona_juridica_id' => $datos['persona_id'],
		     				'user_id'  => $codigo_usuario,
		     				'precio_total'  => 0,
		     				'fechaEntrega' => date_create($datos['anio_entrega'] . "/" . $datos['mes_entrega'] . "/" .$datos['dia_entrega'])->format('Y-m-d H:i:s'),
		     				'fechaPedido' => date_create($datos['anio_pedido'] . "/" . $datos['mes_pedido'] . "/" .$datos['dia_pedido'])->format('Y-m-d H:i:s'),
				 			'created_at' =>  date_create()->format('Y-m-d H:i:s'),
				 			'updated_at' =>  date_create()->format('Y-m-d H:i:s')				
		     			]
				 	);

            	// Insertando Detalle.
            	$total = 0;
            	  for ($i=0; $i < count($datos['idarticulo']); $i++) { 
                    
                   $precio = $datos['precio_venta'][$i];
				   $cantidad = $datos['cantidad'][$i];                   
				   $articulo = $datos['idarticulo'][$i];

                   $subtotal = floatval($datos['precio_venta'][$i])*intval($datos['cantidad'][$i]);

               		$DetallePedido = new DetallePedido();

               		$DetallePedido->pedido_id = $codigo_pedido_generado;
               		$DetallePedido->producto_id = $articulo;
               		$DetallePedido->cantidad = $cantidad;
               		$DetallePedido->precio = $precio;
               		$DetallePedido->subtotal = $subtotal;

               		$DetallePedido->save();

               		Producto::ActualizarStockProducto2($articulo, $cantidad);

               		$total = $total + $subtotal;
                    
                    
               }

               
               // Actualizando los Datos.

                $valores=array('precio_total' => $total );

            	Pedido::where('id',$codigo_pedido_generado)
                	->update($valores);

                
                $total =null;

            DB::commit();

          	return true;  
    	} catch (Exception $e) {
    		B::rollback();

            return false; 
    	}
	}   
}
