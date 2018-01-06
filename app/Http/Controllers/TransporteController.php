<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transporte;
class TransporteController extends Controller
{
    //


    public function CrudPro()
    {
    	return view('adminlte::transporte.transportecrudpro');
    }
    public function ListarMensajes(Request $request)
    {
    	$datos = $request->all();
    	return Transporte::ListarTransportesCrud($datos);

    }
}
