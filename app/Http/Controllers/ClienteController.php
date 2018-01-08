<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cliente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClienteFormRequest;
use DB;


class ClienteController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));//Filtro busqueda
            $clientes=DB::table('cliente')
            ->where('RUC','LIKE','%'.$query.'%')
            ->orwhere('razon_social','LIKE','%'.$query.'%')
            ->orderBy('RUC','desc')
            ->paginate(10);
            return view('servicios.cliente.index',["clientes"=>$clientes,"searchText"=>$query]);
        }
    }
    public function create(){
        return view("servicios.cliente.create");
    }
    public function store(ClienteFormRequest $request){
        $cliente=new Cliente;
        $cliente->RUC=$request->get('RUC');
        $cliente->razon_social=$request->get('razon_social');
        $cliente->direccion=$request->get('direccion');
        $cliente->email=$request->get('email');
        $cliente->telefono=$request->get('telefono');
        $cliente->save();
        return Redirect::to('servicios/cliente');
    }
    public function show($id){
        return view("servicios.cliente.show",["cliente"=>Cliente::findOrFail($id)]);
    }
    public function edit($id){
        return view("servicios.cliente.edit",["cliente"=>Cliente::findOrFail($id)]);
    }
    public function update(ClienteFormRequest $request, $RUC){
        $cliente=Cliente::findOrFail($RUC);
        $cliente->razon_social=$request->get('razon_social');
        $cliente->direccion=$request->get('direccion');
        $cliente->email=$request->get('email');
        $cliente->telefono=$request->get('telefono');
        $cliente->update();
        return Redirect::to('servicios/cliente');
    }
}
