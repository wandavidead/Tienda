@extends('adminlte::page')

@section('content_header')
    <h1>Pagina de editar producto</h1>
@stop

@section('content')
    <div>
        {{-- Inicio de la primera fila --}}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('productos.index') }}" class="btn btn-primary"><i class="fas fa-backward fa-2x"></i></a></a>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('productos.update', $producto) }}" method="post">
            @csrf
            @method('put')

            {{-- Inicio de la segunda fila --}}
            <div class="row">
                {{-- Primera columna --}}
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            {{-- Label y input de nombre de producto con select2 --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-lightblue">Nombre</label>
                                <div class="col-sm-8">
                                    <x-adminlte-input name="nombre" placeholder="Nombre" fgroup-class="col-md-12"
                                        type="text" value="{{ $producto->nombre }}">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-user text-lightblue"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                            {{-- input del PLU de producto con select2 --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-lightblue">Codigo PLU</label>
                                <div class="col-sm-8">
                                    <x-adminlte-input name="plu" placeholder="Codigo PLU" fgroup-class="col-md-12"
                                        type="text" value="{{ $producto->plu }}">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-user text-lightblue"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                            {{-- Seleccion multiple de subcategorias con select2 --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-lightblue">Subcategorias</label>
                                <div class="col-sm-8">
                                    <x-adminlte-select class="js-example-basic-multiple" name="subcategorias[]"
                                        fgroup-class="col-md-12" label-class="text-lightblue" multiple="multiple">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text bg-gradient-info">
                                                <i class="fas fa-fw fa-people-arrows"></i>
                                            </div>
                                        </x-slot>
                                        @foreach ($subcategorias as $subcategoria)
                                            <option value="{{ $subcategoria->id }}"
                                                @foreach ($producto->subcategorias as $producto->subcategoria) @if (!is_null($producto->subcategoria) && $subcategoria->id == $producto->subcategoria->id) selected @endif @endforeach>
                                                {{ $subcategoria->nombre }}</option>
                                        @endforeach
                                    </x-adminlte-select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Segunda columna --}}
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                {{-- {{-- Area de texto de descripcion del producto con select2 --}}
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-lightblue">Descripción</label>
                                    <div class="col-sm-8">
                                        <x-adminlte-textarea name="descripcion" rows=5 fgroup-class="col-md-12"
                                            label-class="text-lightblue" igroup-size="sm"
                                            placeholder="Inserte descripción...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-dark">
                                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                            {{ $producto->descripcion }}
                                        </x-adminlte-textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Inicio de la Tercera fila --}}
            <div class="row">

                {{-- Primera columna --}}
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            {{-- Label y input de nombre de producto con select2 --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-lightblue">Cantidad</label>
                                <div class="col-sm-8">
                                    <x-adminlte-input type="number" min="0" name="cantidad" placeholder="Cantidad"
                                        label-class="text-lightblue" type="cantidad" fgroup-class="col-md-12"
                                        value="{{ $producto->cantidad }}">
                                    </x-adminlte-input>
                                </div>
                            </div>
                            {{-- input del PLU de producto con select2 --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-lightblue">Precio</label>
                                <div class="col-sm-8">
                                    <x-adminlte-input type="number" step="any" min="0" name="precio"
                                        placeholder="Precio" label-class="text-lightblue" fgroup-class="col-md-12"
                                        value="{{ $producto->precio }}">
                                    </x-adminlte-input>
                                </div>
                            </div>
                            {{-- input del PLU de producto con select2 --}}
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-lightblue">Impuestos</label>
                                <div class="col-sm-8">
                                    {{-- Seleccion de impuestos con select2 --}}
                                    <x-adminlte-select2 name="impuesto" fgroup-class="col-md-10"
                                        label-class="text-lightblue" data-placeholder="Selecciona un impuesto">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text bg-gradient-info">
                                                <i class="fas fa-fw fa-percent"></i>
                                            </div>
                                        </x-slot>
                                        <option value="" selected>Selecciona un impuesto</option>
                                        @foreach ($impuestos as $impuesto)
                                            <option value="{{ $impuesto->valor }}"
                                                @if (!is_null($producto->impuesto) && $impuesto->valor == $producto->impuesto) selected @endif>
                                                {{ $impuesto->nombre }} - {{ $impuesto->valor }}%</option>
                                        @endforeach
                                    </x-adminlte-select2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Segunda columna --}}
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                {{-- Seleccion de proveedor con select2 --}}
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-lightblue">Proveedor</label>
                                    <div class="col-sm-8">
                                        <x-adminlte-select2 name="proveedor_id" fgroup-class="col-md-12"
                                            label-class="text-lightblue" data-placeholder="Selecciona un proveedor">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-fw fa-people-arrows"></i>
                                                </div>
                                            </x-slot>
                                            <option value="" selected>Selecciona a un proveedor</option>
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{ $proveedor->id }}"
                                                    @if (!is_null($producto->proveedor) && $proveedor->id == $producto->proveedor->id) selected @endif>
                                                    {{ $proveedor->nombre_Fiscal }}</option>
                                            @endforeach
                                        </x-adminlte-select2>
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
                            <button type="submit" class="btn btn-danger mr-5"><a href="{{ route('productos.index') }}"
                                    style="color: inherit;"> CANCELAR </a> </button>
                            <button type="submit" class="btn btn-success ml-5">GUARDAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@stop
