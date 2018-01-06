<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriaController extends Controller
{
    //
    public function AñadirCategoria()
    {
    	return view('adminlte::categoria.categoria');
    }
    public function MostrarCategorias()
    {
        $categorias = Categoria::Listar_Categorias();
        return view('adminlte::categoria.mostrarcategorias', compact('categorias'));

    }

    public function GuardarCategoria(Request $request)
    {
    	$data = $request->all();
    	$resultado = Categoria::GuardarCategoria($data);

    	if($resultado)
    	{
    		return redirect()->back()->with('status','Los Datos han sido guardados exitosamente');
    	}else{
    		return redirect()->back()->with('errors','Los Datos no han sido guardados correctamente');
    	}
    }
    public function CrudPro()
    {
        return view('adminlte::categoria.categoriacrudpro');
    }

    public function ListarCategorias(Request $request)
    {
        $datos = $request->all();
        return Categoria::ListarCategoriasCrud($datos);
    }

    public function VerCategorias($id)
    {
        $categorias = Categoria::ListarCategoriasId($id);
        return view('adminlte::categoria.vercategorias', compact('categorias'));

    }
    public function EditarCategorias($id)
    {
        $categorias = Categoria::ListarCategoriasId($id);
        return view('adminlte::categoria.editarcategorias', compact('categorias'));

    }
    public function EditarGuardarCategorias(request $request)
    {

        $data= $request->all();
        // var_dump($data);

        $bresultado = Categoria::EditarCategorias($data);



        if ($bresultado) {
            
            return redirect('Categoria/Crud')->with('status','Los Datos se actualizaron correctamente.');

        } else {
            
            return redirect('Categoria/Crud')->with('errors','La Datos No se actualizaron correctamente.');

        }
        
    }


  
}
