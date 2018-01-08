<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\GuiaRemision;
use App\Models\Factura;

class FacturaController extends Controller
{
    //
    public function GenerarFactura()
    {
        $cliente = Cliente::Listar_Clientes();
        $vehiculo = Vehiculo::Listar_Vehiculos();
        $guia_remision = GuiaRemision::Listar_GuiaRemision();
        // return view('adminlte::pedido.boleta',compact('RUC','id_guia', 'fecha','total','descripcion','estado'));
   
dd($cliente,$vehiculo,$guia_remision);
        return view('adminlte::venta.factura',compact('cliente', 'vehiculo', 'guia_remision'));
  }


    public function RegistrarFactura(Request $request)
    {
       

       $data = $request->all();

        // dd($data);
        $bresultado = Factura::GuardarFactura($data,Auth::user()->id);

        if ($bresultado) {
            return redirect('Factura/Factura')->with('status','Se Registro la Factura Correctamente.');
        } else {
            return redirect('Factura/Factura')->with('erros','La Factura no ha sido registrada.');
        }
    }
}
