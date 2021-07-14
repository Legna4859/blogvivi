<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Ofertas=DB::select('SELECT o.id_oferta,o.oferta,c.correo,p.nombre FROM ofertas as o,clientes as c,productos as p WHERE c.id_cliente=o.id_cliente AND p.id_producto=o.id_producto');
        return view("Ofertas.index",compact('Ofertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Clientes=Cliente::all();
        $Productos=Producto::all();
        return view("Ofertas.create",compact('Clientes','Productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Oferta $Ofertas)
    {
        $request->validate([
            'oferta'=>'required',
            'correo'=>'required',
            'producto'=>'required',
        ]);

        $Ofertas->oferta=$request->input('oferta');
        $Ofertas->id_cliente=$request->input('correo');
        $Ofertas->id_producto=$request->input('producto');
        $Ofertas->save();

        return redirect()->route('Ofertas.index')
            ->with('warning','Registro Exitoso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oferta  $Ofertas
     * @return \Illuminate\Http\Response
     */
    public function show(Oferta $Ofertas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oferta $Ofertas
     * @return \Illuminate\Http\Response
     */
    public function edit($id_oferta)
    {
        $Ofertas = Oferta::where('id_oferta',$id_oferta)->first();
        $Clientes = Cliente::all();
        $Productos = Producto::all();
        return view("Ofertas.edit",compact("Ofertas","Clientes","Productos"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oferta  $Ofertas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_oferta)
    {
        $request->validate([
            'oferta'=>'required',
            'correo'=>'required',
            'producto'=>'required',
        ]);

        $Ofertas = Oferta::where('id_oferta',$id_oferta)->first();
        $Ofertas->oferta=$request->input('oferta');
        $Ofertas->id_cliente=$request->input('correo');
        $Ofertas->id_producto=$request->input('producto');
        $Ofertas->save();

        return redirect()->route('Ofertas.index')
            ->with('warning','Actualizacion Exitosa!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oferta  $Ofertas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_oferta)
    {
        DB::table('ofertas')->where('id_oferta',$id_oferta)->delete();

        return redirect()->route('Ofertas.index')
            ->with('success','Oferta Eliminada!!!!');
    }
}
