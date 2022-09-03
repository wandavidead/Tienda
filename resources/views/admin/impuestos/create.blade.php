@extends('adminlte::page')

@section('content_header')
    <h1>NUEVA IMPUESTO</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('impuestos.index') }}" class="btn btn-primary">VOLVER</a>
        </div>
        {{-- Primera fila --}}
        <div class="card-body">
            <form action="{{ route('impuestos.store') }}" method="POST">
                @csrf
                <div class="row">
                    {{-- input de nombre de categoria con select2 --}}
                    <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre" label-class="text-lightblue"
                        fgroup-class="col-md-5" type="text">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    {{-- input de porcentaje en numero con select2 --}}
                    <x-adminlte-input type="number" step="any" min="0" name="valor" label="Porcentaje"
                        placeholder="Porcentaje" label-class="text-lightblue" fgroup-class="col-md-2">
                    </x-adminlte-input>
                </div>
                <button type="submit" class="btn btn-success float-right">GUARDAR</button>
            </form>
        </div>
    </div>
@stop