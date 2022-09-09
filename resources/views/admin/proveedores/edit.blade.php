@extends('adminlte::page')

@section('content_header')
    <h1>EDITAR PROVEEDOR</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('proveedores.index') }}" class="btn btn-primary">VOLVER</a>
        </div>
        {{-- Primera fila --}}
        <div class="card-body">
            <form action="{{ route('proveedores.update', $proveedor) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    {{-- input de nombre de proveedor con select2 --}}
                    <x-adminlte-input name="nombre_Fiscal" label="Nombre Fiscal" placeholder="Nombre Fiscal"
                        label-class="text-lightblue" fgroup-class="col-md-4" type="text"
                        value=" {{ $proveedor->nombre_Fiscal }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    {{-- input de codigo postal de proveedor con select2 --}}
                    <x-adminlte-input name="cif" label="Código de identificación fiscal (CIF)" placeholder="CIF"
                        label-class="text-lightblue" fgroup-class="col-md-2" type="text"
                        value=" {{ $proveedor->cif }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    {{-- input de direccion de proveedor con select2 --}}
                    <x-adminlte-input name="direccion" label="Dirección" placeholder="Dirección"
                        label-class="text-lightblue" fgroup-class="col-md-5" type="text"
                        value=" {{ $proveedor->direccion }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                {{-- Segunda fila --}}
                <div class="row">
                    {{-- input de codigo postal en numero con select2 --}}
                    <x-adminlte-input type="number" min="0" name="codigo_postal" label="Codigo Postal"
                        placeholder="Codigo postal" label-class="text-lightblue" type="cantidad" fgroup-class="col-md-2"
                        value=" {{ $proveedor->codigo_postal }}">
                    </x-adminlte-input>
                    {{-- input de provincia de proveedor con select2 --}}
                    <x-adminlte-input name="provincia" label="Provincia" placeholder="Provincia"
                        label-class="text-lightblue" fgroup-class="col-md-3" type="text"
                        value=" {{ $proveedor->provincia }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    {{-- input de municipio de proveedor con select2 --}}
                    <x-adminlte-input name="municipio" label="Municipio" placeholder="Municipio"
                        label-class="text-lightblue" fgroup-class="col-md-3" type="text"
                        value=" {{ $proveedor->municipio }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <button type="submit" class="btn btn-success float-right">GUARDAR</button>
            </form>
        </div>
    </div>
@stop
