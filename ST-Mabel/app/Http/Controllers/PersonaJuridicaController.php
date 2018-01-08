<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zona;
use App\Models\PersonaJuridica;
use App\Models\Estado;

class PersonaJuridicaController extends Controller
{
    //

    public function RegistrarPersonaJuridica()
    {
        $departamentos  = Zona::Listar_zonas_departamentos(); 
        $estados = Estado::Listar_Estados();
    	return view('adminlte::persona.personajuridica',compact('departamentos', 'estados'));
    }

    public function GuardarPersonaJuridica(Request $request)
    {
    	$data =$request->all();

        // var_dump($data);
        $bresultado = PersonaJuridica::GuardarPersonaJuridica($data);


        if ($bresultado) {
            // Exito
            return redirect()->back()->with('status','Los Datos han sido guardados exitosamente');
            //echo "Grabacion Correcta";
        } else {
                
            //echo "Grabacion no realizada";    
            return redirect()->back()->with('errors','Los Datos no han sido guardados correctamente.');

        }
    }
}

