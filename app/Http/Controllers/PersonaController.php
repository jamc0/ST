<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sexo;
use App\Models\EstadoCivil;
use App\Models\Zona;
use App\Models\PersonaNatural;
use App\Models\PersonaJuridica;
use App\Models\Estado;

class PersonaController extends Controller
{
    public function RegistrarPersonaNatural()
    {
    	$sexos = Sexo::Listar_Sexo();
    	$estadosciviles = EstadoCivil::Listar_Estados_Civiles();
    	$departamentos  = Zona::Listar_zonas_departamentos(); 

    	return view('adminlte::persona.personanatural',compact('sexos','estadosciviles','departamentos'));
    
    }
    public function GuardarPersonaNatural(Request $request)
    {
        $data =$request->all();

        var_dump($data);

        $bresultado = PersonaNatural::GuardarPersonaNatural2($data);

        if ($bresultado) {
            // Exito
            return redirect()->back()->with('status','Los Datos han sido guardados exitosamente');
            //echo "Grabacion Correcta";
        } else {
                
            //echo "Grabacion no realizada";    
            return redirect()->back()->with('errors','Los Datos no han sido guardados correctamente.');

        }
        
    }

    public function CrudProNatural()
    {
        return view('adminlte::persona.personanaturalcrudpro');
    }

    public function ListarPersonasNaturales(Request $request)
    {
        $datos = $request->all();
        return PersonaNatural::ListarPersonasNaturales($datos);
    }

    public function CrudProJuridica()
    {
        return view('adminlte::persona.personajuridicacrudpro');
    }

    public function ListarPersonasJuridicas(Request $request)
    {
        $datos = $request->all();
        return PersonaJuridica::ListarPersonasJuridicas($datos);
    }

    public function VerPersonaNatural($id)
    {
        // var_dump($id);
        //$id : codigo de persona natural.
        //echo $id;
        $personasnataurales = PersonaNatural::Listar_Persona_Natural($id);

        //dd($personasnataurales);
        
        return view('adminlte::persona.verpersonanatural',compact('personasnataurales'));
    }

    public function EditarPersonaNatural($id)
    {
        $sexos = Sexo::Listar_Sexo();
        $estadosciviles = EstadoCivil::Listar_Estados_Civiles();
        $departamentos  = Zona::Listar_zonas_departamentos();
        $personasnataurales = PersonaNatural::Listar_Persona_Natural($id);
        $provincias = Zona::Listar_provincias_x_departamento($personasnataurales[0]->departamento_id);
        $distritos = Zona::Listar_distritos_x_provincia($personasnataurales[0]->provincia_id); 
        //dd($provincias);
        $estados = Estado::Listar_Estados();
        
        return view('adminlte::persona.editarpersonanatural',compact('sexos','estadosciviles','departamentos','personasnataurales','provincias','distritos','estados'));
    }

    public function EditarGuardarPersonaNatural(request $request)
    {

        $data= $request->all();

        var_dump($data);

        $bresultado = PersonaNatural::EditarPersonaNatural($data);

        if ($bresultado) {
            
            return redirect('PersonaNatural/Crud')->with('status','Los Datos se actualizaron correctamente.');

        } else {
            
            return redirect('PersonaNatural/Crud')->with('errors','La Datos No se actualizaron correctamente.');

        }
        
    }
    public function VerPersonaJuridica($id)
    {
        $PersonaJuridica = PersonaJuridica::Listar_Persona_Juridica($id);
        return view('adminlte::persona.verpersonajuridica', compact('PersonaJuridica'));
    }

    public function EditarPersonaJuridica($id)
    {
        $departamentos  = Zona::Listar_zonas_departamentos();
        $personajuridica = PersonaJuridica::Listar_Persona_Juridica($id);
        // print_r($personajuridicas);
        $provincias = Zona::Listar_Provincias_x_Departamento($personajuridica[0]->departamento_id);
        $distritos = Zona::Listar_Distritos_x_Provincia($personajuridica[0]->provincia_id); 
        $estados = Estado::Listar_Estados();
        // var_dump($estados);
        return view('adminlte::persona.editarpersonajuridica',compact('departamentos','personajuridica','provincias','distritos','estados'));
    }

    public function EditarGuardarPersonaJuridica(request $request)
    {
        $data= $request->all();

        // var_dump($data);

        $bresultado = PersonaJuridica::EditarPersonaJuridica($data);

        if ($bresultado) {
            
            return redirect('PersonaJuridica/Crud')->with('status','Los Datos se actualizaron correctamente.');

        } else {
            
            return redirect('PersonaJuridica/Crud')->with('errors','La Datos No se actualizaron correctamente.');

        }
    }

}
