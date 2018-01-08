<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\GuiaRemision;
use App\Models\Factura2;
class FacturasController extends Controller
{
    //
    public function GenerarFactura()
    {
        $clientes = Cliente::Listar_Clientes();
        $vehiculo = Vehiculo::Listar_Vehiculos();
        $guia_remision = GuiaRemision::Listar_GuiaRemision();
        // return view('adminlte::pedido.boleta',compact('cliente','vehiculo','guia_remision'));
   
		// dd($cliente,$vehiculo,$guia_remision);
        return view('adminlte::venta.factura',compact('clientes', 'vehiculo', 'guia_remision'));
  }
 public function GuardarFactura(Request $request)
    {
       

       $data = $request->all();

        // dd($data);
        $bresultado = Factura2::GuardarFactura($data);

        if ($bresultado) {
            return redirect('Factura/GuiaRemision')->with('status','Se Registro la Factura Correctamente.');
        } else {
            return redirect('Factura/GuiaRemision')->with('erros','La Factura no ha sido registrada.');
        }
    }
}
