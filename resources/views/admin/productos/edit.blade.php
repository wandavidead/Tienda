@extends('adminlte::page')

@section('content_header')
    <h1>Pagina de editar producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('productos.index') }}" class="btn btn-primary">VOLVER</a>
        </div>
        {{-- Primera fila --}}
        <div class="card-body">
            <form action="{{ route('productos.update', $producto) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    {{-- input de nombre de producto con select2 --}}
                    <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre" label-class="text-lightblue"
                        fgroup-class="col-md-5" type="text" value=" {{ $producto->nombre }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    {{-- input de cantidad en numero con select2 --}}
                    <x-adminlte-input type="number" min="0" name="cantidad" label="Cantidad" placeholder="Cantidad"
                        label-class="text-lightblue" type="cantidad" fgroup-class="col-md-2"
                        value="{{ $producto->cantidad }}">
                    </x-adminlte-input>
                    <x-adminlte-input type="number" step="any" min="0" name="precio" label="Precio"
                        placeholder="Precio" label-class="text-lightblue" fgroup-class="col-md-2"
                        value="{{ $producto->precio }}">
                    </x-adminlte-input>
                </div>
                {{-- Segunda fila --}}
                <div class="row">
                    {{-- Seleccion de impuestos con select2 --}}
                    <x-adminlte-select2 name="impuesto" label="Impuestos" fgroup-class="col-md-4"
                        label-class="text-lightblue" data-placeholder="Selecciona un impuesto">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-fw fa-percent"></i>
                            </div>
                        </x-slot>
                        <option value="">Selecciona un impuesto</option>
                        @foreach ($impuestos as $impuesto)
                            <option value="{{ $impuesto->valor }}" @if (!is_null($producto->impuesto) && $impuesto->valor == $producto->impuesto) selected @endif>
                                {{ $impuesto->nombre }} - {{ $impuesto->valor }}%</option>
                        @endforeach
                    </x-adminlte-select2>
                    {{-- Seleccion de proveedor con select2 --}}
                    <x-adminlte-select2 name="proveedor_id" label="Proveedor" fgroup-class="col-md-4"
                        label-class="text-lightblue" data-placeholder="Selecciona un proveedor">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-fw fa-people-arrows"></i>
                            </div>
                        </x-slot>
                        <option value="">Selecciona a un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}" @if (!is_null($producto->proveedor) && $proveedor->id == $producto->proveedor->id) selected @endif>
                                {{ $proveedor->nombre_Fiscal }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
                {{-- Tercera fila --}}
                <div class="row">
                    {{-- Area de texto de descripcion del producto con select2 --}}
                    <x-adminlte-textarea name="descripcion" label="Descripcion del Producto" rows=4 fgroup-class="col-md-6"
                        label-class="text-lightblue" igroup-size="sm" placeholder="Inserte descripcion...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                            </div>
                        </x-slot>
                        {{ $producto->descripcion }}
                    </x-adminlte-textarea>
                </div>
                <button type="submit" class="btn btn-success float-right">GUARDAR</button>
            </form>
        </div>
    </div>
@stop
