@extends('adminlte::page')

@section('content_header')
    <h1>CREAR SUBCATEGORIA</h1>
@stop

@section('content')
    <div>
        {{-- Inicio de la primera fila --}}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('subcategorias.index') }}" class="btn btn-primary">VOLVER</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Inicio del formulario --}}
        <form action="{{ route('subcategorias.store') }}" method="POST">
            @csrf

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
                                        type="text">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-user text-lightblue"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-lightblue">Categoria</label>
                                <div class="col-sm-8">
                                    {{-- Seleccion de subcategorias con select2 --}}
                                    <x-adminlte-select2 name="categoria_id" fgroup-class="col-md-4"
                                        label-class="text-lightblue" data-placeholder="Selecciona una categoria">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text bg-gradient-info">
                                                <i class="fas fa-fw fa-percent"></i>
                                            </div>
                                        </x-slot>
                                        <option value="">Selecciona una categoria</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}"
                                                @if ($categoria->id == $subcategorias->categoria) selected @endif>
                                                {{ $categoria->nombre }}</option>
                                        @endforeach
                                    </x-adminlte-select2>
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
                            <a href="{{ route('subcategorias.index') }}" class="btn btn-danger mr-5" style="color: inherit;">
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
