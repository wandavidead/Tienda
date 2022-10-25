@extends('adminlte::page')

@section('content_header')
    <h1>PRODUCTOS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('productos.create') }}" class="btn btn-primary"><i class="fas fa-plus-square fa-1x"></i> NUEVO
                PRODUCTO</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
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
                            <td><a href="{{ route('productos.show', $producto) }}" class="btn btn-success "><i
                                        class="far fa-eye fa-2x"></i></a></td>
                            <td><a href="{{ route('productos.edit', $producto) }}" class="btn btn-primary"><i
                                        class="fas fa-edit fa-2x"></i></a></td>
                            <td>
                                <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button id="DeleteBtn" type="submit" class="btn btn-danger"><i
                                            class="fas fa-minus-square fa-2x"></i></button>
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
