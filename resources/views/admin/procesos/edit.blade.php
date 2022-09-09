@extends('adminlte::page')

@section('content_header')
    <h1>EDITAR PROCESO</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('procesos.index') }}" class="btn btn-primary">VOLVER</a>
        </div>
        {{-- Primera fila --}}
        <div class="card-body">
            <form action="{{ route('procesos.update', $proceso) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    {{-- input de nombre de proceso con select2 --}}
                    <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre" label-class="text-lightblue"
                        fgroup-class="col-md-5" type="text" value=" {{$proceso->nombre}}">
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
