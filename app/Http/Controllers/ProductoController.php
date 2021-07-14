<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos= Producto::select('productos.id_producto','productos.nombre','productos.tipo','productos.cantidad','productos.precio','productos.ingreso')
        ->orderby('productos.id_producto','ASC')
        ->simplePaginate(3);
        return view("Productos.index",compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view("Productos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'tipo'=>'required',
            'cantidad'=>'required',
            'precio'=>'required',
            'ingreso'=>'required',
        ]);
        Producto::create($request->all());
        return redirect()->route('Productos.index')
        ->with('warning','Registro Exitoso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id_producto)
    {
        $productos=Producto::findorFail($id_producto);
        return view('Productos.edit',compact('productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_producto)
    {
        $request->validate([
            'nombre'=>'required',
            'tipo'=>'required',
            'cantidad'=>'required',
            'precio'=>'required',
            'ingreso'=>'required',
        ]);

        $productos=Producto::find($id_producto);
        $productos->nombre=$request->input('nombre');
        $productos->tipo=$request->input('tipo');
        $productos->cantidad=$request->input('cantidad');
        $productos->tipo=$request->input('precio');
        $productos->cantidad=$request->input('ingreso');
        $productos->save();

        return redirect()->route('Productos.index')
            ->with('warning','Actualizacion Exitosa!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_producto)
    {
        $productos=Producto::find($id_producto);
        $productos->delete();

        return redirect()->route("Productos.index")
            ->with("success","Producto Eliminado!!!");
    }
}
