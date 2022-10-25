@extends('adminlte::page')

@section('content_header')
    <h1>EDITAR IMPUESTO</h1>
@stop

@section('content')
<div>
    {{-- Inicio de la primera fila --}}
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('impuestos.index') }}" class="btn btn-primary"><i class="fas fa-backward fa-2x"></i></a></a>
                </div>
            </div>
        </div>
    </div>

    {{-- Inicio del formulario --}}
    <form action="{{ route('impuestos.update', $impuesto) }}" method="POST">
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
                                    type="text" value=" {{$impuesto->nombre}}">
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
                        {{-- {{-- Area de texto de descripcion del subcategoria con select2 --}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-lightblue">Porcentaje</label>
                            <div class="col-sm-8">
                                {{-- input de porcentaje en numero con select2 --}}
                                <x-adminlte-input type="number" step="any" min="0" name="valor"
                                    placeholder="Porcentaje" label-class="text-lightblue" fgroup-class="col-md-12" value="{{ $impuesto->valor}}">
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
                        <a href="{{ route('impuestos.index') }}" class="btn btn-danger mr-5" style="color: inherit;">
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
