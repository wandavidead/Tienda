@extends('adminlte::page')

@section('content_header')
    <h1>PRODUCTOS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('productos.create') }}" class="btn btn-primary">NUEVO PRODUCTO</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                        <th>IMPUESTO</th>
                        <th>PRECIO CON IMPUESTO</th>
                        <th>PROVEEDOR</th>
                        <th>VER</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td class="text-center">{{ $producto->precio }}€</td>
                            @if (is_null($producto->impuesto))
                                <td>
                                    No tiene Impuesto
                                </td>
                            @else
                                <td>{{ $producto->impuesto }}%</td>
                            @endif
                            @if (is_null($producto->precio_impuesto))
                                <td class="text-center">
                                    No se puede calcular
                                </td>
                            @else
                                <td class="text-center">{{ $producto->precio_impuesto }}€</td>
                            @endif
                            @if (is_null($producto->proveedor))
                                <td>
                                    No tiene Proveedor
                                </td>
                            @else
                                <td>{{ $producto->proveedor->nombre_Fiscal }}</td>
                            @endif
                            <td><a href="{{ route('productos.show', $producto) }}" class="btn btn-primary">Ver</a></td>
                            <td><a href="{{ route('productos.edit', $producto) }}" class="btn btn-success">Editar</a></td>
                            <td>
                                <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <input id="DeleteBtn" type="submit" value="Eliminar" class="btn btn-danger" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
            {!! $productos->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@stop

@section('js')
@stop
