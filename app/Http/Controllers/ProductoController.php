<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Impuesto;
use App\Models\Proveedor;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\View\Components\Widget\Alert;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = new Producto();
        $impuestos = Impuesto::all();
        $proveedores = Proveedor::all();
        $subcategorias = Subcategoria::all();
        return view('admin.productos.create', compact('productos', 'proveedores', 'impuestos', 'subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = $request->only('subcategorias');
        $input = $request->except('subcategorias_id');
        $impuesto = $request->impuesto;
        $precio = $request->precio;

        if (!is_null($impuesto)) {
            $precio_impuesto = calcularporcentajeproducto($impuesto, $precio);
        } else {
            $precio_impuesto = $precio;
        }

        $input += array(
            "precio_impuesto" => $precio_impuesto
        );

        $producto = new Producto($input);
        $producto->save();

        if ($array) {
            $producto->subcategorias()->attach($array['subcategorias']);
        }
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('admin.productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $impuestos = Impuesto::all();
        $proveedores = Proveedor::all();
        return view('admin.productos.edit', compact('producto', 'impuestos', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $impuesto = $request->impuesto;
        $precio = $request->precio;

        if (!is_null($impuesto)) {
            $precio_impuesto = calcularporcentajeproducto($impuesto, $precio);
        } else {
            $precio_impuesto = $precio;
        }

        $producto->nombre = $request->nombre;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->impuesto = $request->impuesto;
        $producto->precio_impuesto = $precio_impuesto;
        $producto->proveedor_id = $request->proveedor_id;
        $producto->save();
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
