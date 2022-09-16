<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('admin.proveedores.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = new Proveedor();
        return view('admin.proveedores.create',compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_Fiscal' => 'required|max:150|min:3',
            'cif' => 'required|unique:proveedores|cif|max:11|min:',
            /* 'dni' => 'required|unique:proveedores|dni|max:11|min:9', */
            'direccion' => 'max:150',
            'codigo_postal' => 'spanish_postal_code|max:6',
            'provincia' => 'max:45',
            'municipio' => 'max:45',
        ]);
        $proveedor = new Proveedor($validated);
        $proveedor->save();

        return redirect()->route('proveedores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        return view('admin.proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $validated = $request->validate([
            'nombre_Fiscal' => 'required|unique:proveedores|max:150|min:3',
            'cif' => 'required|unique:proveedores|cif|max:11|min:9',
            'direccion' => 'max:150|min:5',
            'codigo_postal' => 'spanish_postal_code|max:6|min:5',
            'provincia' => 'max:45|min:5',
            'municipio' => 'max:45|min:5',
        ]);
        $proveedor->nombre_Fiscal = $validated['nombre_Fiscal'];
        $proveedor->cif = $validated['cif'];
        $proveedor->direccion = $validated['direccion'];
        $proveedor->codigo_postal = $validated['codigo_postal'];
        $proveedor->provincia = $validated['provincia'];
        $proveedor->municipio = $validated['municipio'];
        $proveedor->save();
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index');
    }
}
