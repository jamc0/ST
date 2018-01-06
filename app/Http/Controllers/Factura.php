<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
class FacturaController extends Controller
{
    //
    public function AñadirFactura()
    {
    	return view('adminlte::Factura.Factura');
    }
    public function MostrarFactura()
    {
        $Facturas = Factura::Listar_Factura();
        return view('adminlte::factura.mostrarfactura', compact('factura'));

    }

    public function GuardarFactura(Request $request)
    {
    	$data = $request->all();
    	$resultado = Factura::GuardarFactura($data);

    	if($resultado)
    	{
    		return redirect()->back()->with('status','Los Datos han sido guardados exitosamente');
    	}else{
    		return redirect()->back()->with('errors','Los Datos no han sido guardados correctamente');
    	}
    }
    public function CrudPro()
    {
        return view('adminlte::factura.facturacrudpro');
    }

    public function ListarFactura(Request $request)
    {
        $datos = $request->all();
        return Factura::ListarFacturaCrud($datos);
    }

    public function VerFactura($id)
    {
        $Facturas = Factura::ListarFacturasId($id);
        return view('adminlte::factura.verfactura', compact('factura'));

    }
    public function EditarFactura($id)
    {
        $Facturas = Factura::ListarFacturaId($id);
        return view('adminlte::Factura.editarfacturas', compact('factura'));

    }
    public function EditarGuardarFactura(request $request)
    {

        $data= $request->all();
        // var_dump($data);

        $bresultado = Factura::EditarFactura($data);



        if ($bresultado) {
            
            return redirect('Factura/Crud')->with('status','Los Datos se actualizaron correctamente.');

        } else {
            
            return redirect('Factura/Crud')->with('errors','La Datos No se actualizaron correctamente.');

        }
        
    }

}
