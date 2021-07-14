<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Municipio;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estado=Estado::all();
        $municipio=Municipio::all();
        $clientes=DB::select('SELECT id_cliente,correo,domicilio,direccion,municipio FROM clientes,municipios WHERE municipios.id_municipio=clientes.id_municipio');
        return view("Cliente.index",compact('clientes','estado','municipio'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipio=Municipio::all();
        return view("Cliente.create",compact('municipio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Cliente $cliente)
    {
        $request->validate([
        'correo' =>'required',
        'domicilio'=>'required',
        'direccion'=>'required',
        'ciudad'=>'required',
        ]);

        $cliente->correo = $request->correo;
        $cliente->domicilio = $request->domicilio;
        $cliente->direccion=$request->direccion;
        $cliente->id_municipio=$request->ciudad;
        $cliente->save();

        return redirect()->route('Cliente.index')
            ->with('success', 'Registro exitoso!!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id_cliente)
    {
        $cliente=Cliente::findorFail($id_cliente);
        $municipio=Municipio::join('clientes','municipios.id_municipio','=','clientes.id_municipio')
        ->select('clientes.correo','clientes.domicilio','clientes.direccion','municipios.municipio')
        ->where('clientes.id_cliente',$id_cliente)
        ->get();
        return view("Cliente.edit",compact('cliente','municipio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Cliente $cliente)
    {
        $request->validate([
            'correo' =>'required',
            'domicilio'=>'required',
            'direccion'=>'required',
            'ciudad'=>'required',
            ]);

            $cliente->correo=$request->input('correo');
            $cliente->domicilio=$request->input('domicilio');
            $cliente->direccion=$request->input('direccion');
            $cliente->id_municipio=$request->input('ciudad');
            $cliente->save();

            return redirect()->route('Cliente.index')
                ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_cliente)
    {
        DB::table('clientes')->where('id_cliente',$id_cliente)->delete();

        return redirect()->route('Cliente.index')
            ->with('success', 'Cliente eliminado!!');

    }
}
