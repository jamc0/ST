<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Factura2;
use App\Models\GuiaRemision;

class GuiaController extends Controller
{
    
     public function GenerarGuiaRemision()
    {
       
        $vehiculos = Vehiculo::Listar_Vehiculos();
        $guia_remision = GuiaRemision::Listar_GuiaRemision();
        // return view('adminlte::pedido.boleta',compact('RUC','id_guia', 'fecha','total','descripcion','estado'));
        return view('adminlte::servicio.guia',compact('vehiculos', 'guia_remision'));
    }

    public function RegistrarGuiaRemision(Request $request)
    {
        $data = $request->all();

        // dd($data);
        $bresultado = GuiaRemision::GuardarGuiaRemision($data);

        if ($bresultado) {
            return redirect('Factura/GuiaRemision')->with('status','Se Registro la Factura Correctamente.');
        } else {
            return redirect('Factura/GuiaRemision')->with('erros','La Factura no ha sido registrada.');
        }
    }
}


