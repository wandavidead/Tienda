@extends('adminlte::page')

@section('content_header')
    <h1>CREAR SUBCATEGORIA</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('subcategorias.index') }}" class="btn btn-primary">VOLVER</a>
        </div>
        {{-- Primera fila --}}
        <div class="card-body">
            <form action="{{ route('subcategorias.store') }}" method="POST">
                @csrf
                <div class="row">
                    {{-- input de nombre de producto con select2 --}}
                    <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre" label-class="text-lightblue"
                        fgroup-class="col-md-5" type="text">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    {{-- Seleccion de impuestos con select2 --}}
                    <x-adminlte-select2 name="categoria_id" label="Categoria" fgroup-class="col-md-4"
                        label-class="text-lightblue" data-placeholder="Selecciona una categoria">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-fw fa-percent"></i>
                            </div>
                        </x-slot>
                        <option value="">Selecciona una categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" @if ($categoria->id == $subcategorias->categoria) selected @endif>
                                {{ $categoria->nombre }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
                <button type="submit" class="btn btn-success float-right">GUARDAR</button>
            </form>
        </div>
    </div>
@stop