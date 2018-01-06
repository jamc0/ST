<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePedido;
use App\Models\Dia;
use App\Models\Anio;
use App\Models\Mes;
use App\Models\PersonaJuridica;
use App\Models\Producto;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth as Auth;

class BoletaController extends Controller
{
    //

	public function GenerarBoleta()
	{
		$personas = PersonaJuridica::ListarPersonasJuridicasAll();
    	$articulos = Producto::Listar_ProductosMostrar();
    	$anios = Anio::Listar_Anios();
    	$meses = Mes::Listar_Meses();
		return view('adminlte::pedido.boleta',compact('personas','tiposdocumentos','tipospagos','series','articulos','anios','meses', 'transportes'));
	}



	public function RegistrarBoleta(Request $request)
	{
		$data = $request->all();

    	// dd($data);
    	$bresultado = Pedido::GuardarBoleta($data,Auth::user()->id);

    	if ($bresultado) {
    		return redirect('Boleta/Pedido')->with('status','Se Registro la Boleta Correctamente.');
    	} else {
    		return redirect('Boleta/Pedido')->with('erros','La Boleta no ha sido registrada.');
    	}
	}


}
