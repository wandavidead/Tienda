@extends('adminlte::page')

@section('content_header')
    <h1>EDITAR REALIZACION</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('realizaciones.index') }}" class="btn btn-primary">VOLVER</a>
        </div>
        {{-- Primera fila --}}
        <div class="card-body">
            <form action="{{ route('realizaciones.update', $realización) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    {{-- input de nombre de realización con select2 --}}
                    <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre" label-class="text-lightblue"
                        fgroup-class="col-md-5" type="text" value=" {{$realización->nombre}}">
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
