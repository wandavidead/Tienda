@extends('adminlte::page')

@section('content_header')
    <h1>SUBCATEGORIAS</h1>
@stop

@section('content')
    <div>
        {{-- Inicio de la primera fila --}}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('subcategorias.index') }}" class="btn btn-primary"><i
                                class="fas fa-backward fa-2x"></i></a></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Inicio de la Tercera fila --}}
        <div class="row">
            {{-- Primera columna --}}
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <label class="col-md-5 col-form-label text-lightblue "
                            style="font-size:25px;">{{ $subcategoria->nombre }} </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col">
                                    <p class="text-center col-form-label text-lightblue" style="font-size:25px;">LISTA
                                        DE PRODUCTOS</p>
                                    <div class="table-responsive-md">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NOMBRE</th>
                                                    <th class="text-center">CANTIDAD</th>
                                                    <th class="text-center">PRECIO</th>
                                                    <th>IMPUESTO</th>
                                                    <th class="text-center">PRECIO CON IMPUESTO</th>
                                                    <th>VER</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (is_null($productos))
                                                    <tr>
                                                        <td class="">-------------------------------- No </td>
                                                        <td class="">existe</td>
                                                        <td class="">ningun</td>
                                                        <td class="">producto</td>
                                                        <td class="">vinculado --------------------------------</td>
                                                    </tr>
                                                @else
                                                    @foreach ($productos as $producto)
                                                        <tr>
                                                            <td>{{ $producto->nombre }}</td>
                                                            <td class="text-center">{{ $producto->cantidad }}</td>
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
                                                                <td class="text-center">{{ $producto->precio_impuesto }}€
                                                                </td>
                                                            @endif
                                                            <td><a href="{{ route('productos.show', $producto) }}"
                                                                    class="btn btn-success "><i
                                                                        class="far fa-eye fa-2x"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Parte dinal botones aceptar y cancelar --}}
        <div class="form-group row">
            <div class="col">
                <div class="card ">
                    <div class="card-body text-center ">
                        <button type="submit" class="btn btn-primary mr-5"><a
                                href="{{ route('subcategorias.edit', $subcategoria) }}" style="color: inherit;"> EDITAR
                            </a> </button>
                        <form action="{{ route('subcategorias.destroy', $subcategoria) }}" method="POST"
                            class="btn btn-danger ml-5">
                            @method('delete')
                            @csrf
                            ELIMINAR
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @stop
