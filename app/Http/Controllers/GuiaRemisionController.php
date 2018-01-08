<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuiaRemision;
use App\Models\Cliente;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Auth as Auth;


class FacturaController extends Controller
{
    //
    public function GenerarFactura()
    {
        $cliente = Cliente::Listar_Clientes();
        $vehiculo = Producto::Listar_Vehiculos();
        $guia_remision = GuiaRemision::Listar_GuiaRemision();
        return view('adminlte::pedido.boleta',compact('personas','tiposdocumentos','tipospagos','series','articulos','anios','meses', 'transportes'));
    }



    public function RegistrarBoleta(Request $request)
    {
        $data = $request->all();

        // dd($data);
        $bresultado = Pedido::GuardarBoleta($data,Auth::user()->id);

        if ($bresultado) {
            return redirect('Factura/GuiaRemision')->with('status','Se Registro la Boleta Correctamente.');
        } else {
            return redirect('Factura/GuiaRemision')->with('erros','La Boleta no ha sido registrada.');
        }
    }



      public function MostrarGuiaRemision()
    {
        $mensajes = GuiaRemision::ListarGuiaRemision();
        return view('adminlte::mensaje.mensajestotales', compact('mensajes'));
    }
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

}