<?php

namespace App\Http\Controllers;

use App\Models\Impuesto;
use Illuminate\Http\Request;

class ImpuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impuestos = Impuesto::all();
        return view('admin.impuestos.index',compact('impuestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $impuestos = new Impuesto();
        return view('admin.impuestos.create',compact('impuestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $impuesto = new Impuesto($input);
        $impuesto->save();

        return redirect()->route('impuestos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Impuesto  $impuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Impuesto $impuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Impuesto  $impuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Impuesto $impuesto)
    {
        return view('admin.impuestos.edit', compact('impuesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Impuesto  $impuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Impuesto $impuesto)
    {
        $impuesto->nombre = $request->nombre;
        $impuesto->valor = $request->valor;
        $impuesto->save();
        return redirect()->route('impuestos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Impuesto  $impuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impuesto $impuesto)
    {
        $impuesto->delete();
        return redirect()->route('impuestos.index');
    }
}
