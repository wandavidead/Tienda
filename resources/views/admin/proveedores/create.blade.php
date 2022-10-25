@extends('adminlte::page')

@section('content_header')
    <h1>NUEVO PROVEEDOR</h1>
@stop

@section('content')
    <div>
        {{-- Inicio de la primera fila --}}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('proveedores.index') }}" class="btn btn-primary"><i class="fas fa-backward fa-2x"></i></a></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Inicio del formulario --}}
        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf
            {{-- Inicio de la segunda fila --}}
            <div class="row">
                {{-- Primera columna --}}
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            {{-- Label y input de nombre de producto con select2 --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-lightblue">Nombre Fiscal</label>
                                <div class="col-sm-8">
                                    {{-- input de nombre de proveedor con select2 --}}
                                    <x-adminlte-input name="nombre_Fiscal" placeholder="Nombre Fiscal"
                                        label-class="text-lightblue" fgroup-class="col-md-12" type="text">
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
                                <label class="col-sm-4 col-form-label text-lightblue">Código de identificación fiscal
                                    (CIF)</label>
                                <div class="col-sm-8">
                                    {{-- input de codigo postal de proveedor con select2 --}}
                                    <x-adminlte-input name="cif" placeholder="CIF" label-class="text-lightblue"
                                        fgroup-class="col-md-12" type="text">
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
                                <label class="col-sm-4 col-form-label text-lightblue">Dirección</label>
                                <div class="col-sm-8">
                                    {{-- input de direccion de proveedor con select2 --}}
                                    <x-adminlte-input name="direccion" placeholder="Dirección" label-class="text-lightblue"
                                        fgroup-class="col-md-12" type="text">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-user text-lightblue"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Segunda columna --}}
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            {{-- {{-- Area de texto de descripcion del producto con select2 --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-lightblue">Codigo Postal</label>
                                <div class="col-sm-8">
                                    {{-- input de codigo postal en numero con select2 --}}
                                    <x-adminlte-input type="number" min="0" name="codigo_postal"
                                        placeholder="Codigo postal" label-class="text-lightblue" type="cantidad"
                                        fgroup-class="col-md-12">
                                    </x-adminlte-input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-lightblue">Provincia</label>
                                <div class="col-sm-8">
                                    {{-- input de provincia de proveedor con select2 --}}
                                    <x-adminlte-input name="provincia" placeholder="Provincia" label-class="text-lightblue"
                                        fgroup-class="col-md-12" type="text">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-user text-lightblue"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-lightblue">Municipio</label>
                                <div class="col-sm-8">
                                    {{-- input de municipio de proveedor con select2 --}}
                                    <x-adminlte-input name="municipio" placeholder="Municipio" label-class="text-lightblue"
                                        fgroup-class="col-md-12" type="text">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-user text-lightblue"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Parte dinal botones aceptar y cancelar --}}
            <div class="form-group row">
                <div class="col">
                    <div class="card">
                        <div class="card-body text-center">
                            <a href="{{ route('productos.index') }}" class="btn btn-danger mr-5" style="color: inherit;">
                                CANCELAR
                            </a>
                            <button type="submit" class="btn btn-success ml-5">GUARDAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
