<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anio;
use App\Models\Mes;
use App\Models\PersonaNatural;
use App\Models\TipoDocumento;
use App\Models\Transporte;
use App\Models\TipoPago;
use App\Models\Serie;
use App\Models\Producto;
use App\Models\Documento;


use Illuminate\Support\Facades\Auth as Auth;

class VentaController extends Controller
{
    //


    public function RegistrarFactura()
    {
    	$personas = PersonaNatural::ListarPersonasNaturalAll();

    	$tiposdocumentos = TipoDocumento::Listar_Tipo_Documento(2);
    	$tipospagos= TipoPago::Listar_Tipo_Pago();
    	$series = Serie::Listar_Series_Facturas();
    	$articulos = Producto::Listar_ProductosMostrar();
    	$anios = Anio::Listar_Anios();
    	$meses = Mes::Listar_Meses();
        $transportes = Transporte::ListarTransportes();


    	return view('adminlte::venta.factura',compact('personas','tiposdocumentos','tipospagos','series','articulos','anios','meses', 'transportes'));


    }

    public function GuardarFactura(Request $request)
    {
    	$data = $request->all();

    	//dd($data);
    	$bresultado = Documento::GuardarFactura($data,Auth::user()->id);

    	if ($bresultado) {
    		return redirect('Venta/Factura')->with('status','Se Registro la Factura Correctamente.');
    	} else {
    		return redirect('Venta/Factura')->with('erros','La factura no ha sido registrada.');
    	}
    }

}
