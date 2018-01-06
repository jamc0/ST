<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;


class MensajeController extends Controller
{
    //
    public function GuardarMensaje(Request $request)
    {
    	$data = $request->all();
        // var_dump($data);
    	$resultado = Mensaje::GuardarMensaje($data);


    	if ($resultado)
    	{
    		return redirect()->back()->with('status', 'El Mensaje ha sido enviado correctamente');
    	}else{
    		return redirect()->back()->with('errors', 'El Mensaje no ha sido enviado');
    	}

    }
    public function MostrarMensajes()
    {
        $mensajes = Mensaje::ListarMensajes();
        return view('adminlte::mensaje.mensajestotales', compact('mensajes'));
    }

    public function crud(Request $request)
    {
        $mensajes = Mensaje::ListarMensajes();
        if($request->ajax())
        {
            return view('adminlte::mensaje.mensajetable', compact('mensajes'));
        }else{
            return view('adminlte::mensaje.mensajecrud', compact('mensajes'));
        }
    }

    public function CrudPro()
    {
        return view('adminlte::mensaje.mensajecrudpro');
    }


    public function ListarMensajes(Request $request)
    {
        $datos = $request->all();
        return Mensaje::ListarMensajesCrud($datos);
    }
    public function VerMensaje($id)
    {
        $mensaje = Mensaje::ListarMensajeId($id);

        return view('adminlte::mensaje.mensaje', compact('mensaje'));
    }
}
