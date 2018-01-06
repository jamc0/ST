<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;


class ProductoController extends Controller
{
    
//

    public  function AñadirProducto()
    {
        $categorias = Categoria::Listar_Categorias();
    	return view('adminlte::producto.producto', compact('categorias'));
    }
    
    public function MostrarProductos()
    {
        $productos = Producto::Listar_Productos_Categoria();
        return view('adminlte::producto.mostrarproductos', compact('productos'));
    }
    

     public function VerProducto($id)
    {
        $productos = Producto::Listar_Producto_Id($id);
        //$productos = Producto::Listar_Producto_ID($id);           
        return view('adminlte::producto.Verproducto',compact('productos'));
    }

    public  function GuardarProducto(Request $request)
    {
    	$data = $request->all();
        var_dump($data);
    	 $resultado = Producto::GuardarProducto($data);
        

    	if($resultado)
    	{
    		return redirect()->back()->with('status', 'Los Datos se han guardado con exito');
    	}else{
    		return redirect()->back()->with('errors', 'Los Datos no han sido guardados ');
    	}
    }
//
    public function crud(request $request )
    {

        $productos = Producto::ListarProductos();
        if ($request->ajax()) {
            
            return view('adminlte::producto.productotable',compact('productos'));    
        } else {
           // $productos = Producto::Listar();
            return view('adminlte::producto.productocrud',compact('productos'));
        }  
    }

public function CrudProductos()
    {
        return view('adminlte::producto.productocrudpro');
    }
     

public function ListarProductos(Request $request)
    {

        $datos = $request->all();
        return Producto::ListarProductosCrud($datos);
       
    }


  

     public function EditarProducto($id)
   
    {
        $productos = Producto::Listar_Producto_Id($id);
        $categorias = Categoria::Listar_Categorias();
       // var_dump($productos[0]);
       
    return view('adminlte::producto.EditarProducto',compact('productos','categorias'));

    }
public function EditarGuardarProducto(request $request)
    {

        $data= $request->all();

        // var_dump($data);

        $bresultado = Producto::EditarProducto($data);

        if ($bresultado) {
            
            return redirect('Productos/Crud')->with('status','Los Datos se actualizaron correctamente.');

        } else {
            
            return redirect('Productos/Crud')->with('errors','La Datos No se actualizaron correctamente.');

        }
        
    }

}
