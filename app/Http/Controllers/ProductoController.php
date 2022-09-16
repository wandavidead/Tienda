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
        $validated = $request->validate([
            'nombre' => 'required|max:45|min:3',
            'cantidad' => 'required|integer',
            'precio' => 'required',
            'descripcion' => 'max:255',
        ]);
        $array = $request->only('subcategorias');
        $validated = $request->except('subcategorias_id');
        $impuesto = $request->impuesto;
        $precio = $request->precio;

        if (!is_null($impuesto)) {
            $precio_impuesto = calcularporcentajeproducto($impuesto, $precio);
        } else {
            $precio_impuesto = $precio;
        }

        $validated += array(
            "precio_impuesto" => $precio_impuesto
        );

        $producto = new Producto($validated);
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
        $subcategorias = Subcategoria::all();
        return view('admin.productos.edit', compact('producto', 'impuestos', 'proveedores','subcategorias'));
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
        $validated = $request->validate([
            'nombre' => 'required|max:45|min:3',
            'cantidad' => 'required|integer',
            'precio' => 'required',
            'descripcion' => 'max:255',
        ]);

        $impuesto = $request->impuesto;
        $precio = $request->precio;

        if (!is_null($impuesto)) {
            $precio_impuesto = calcularporcentajeproducto($impuesto, $precio);
        } else {
            $precio_impuesto = $precio;
        }
        $array = $request->only('subcategorias');
        $producto->nombre = $validated['nombre'];
        $producto->cantidad = $validated['cantidad'];
        $producto->precio = $validated['precio'];
        $producto->descripcion = $validated['descripcion'];
        $producto->impuesto = $request->impuesto;
        $producto->precio_impuesto = $precio_impuesto;
        $producto->proveedor_id = $request->proveedor_id;
        $producto->save();
        if ($array) {
            $producto->subcategorias()->sync($array['subcategorias']);
        }
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
