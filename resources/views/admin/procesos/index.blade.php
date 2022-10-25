@extends('adminlte::page')

@section('content_header')
    <h1>PROCESOS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('procesos.create') }}" class="btn btn-primary"><i class="fas fa-plus-square fa-1x"></i> NUEVO
                PROCESO</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                    @foreach ($procesos as $proceso)
                        <tr>
                            <td>{{ $proceso->nombre }}</td>
                            <td><a href="{{ route('procesos.edit', $proceso->id) }}" class="btn btn-primary"><i
                                        class="fas fa-edit fa-2x"></i></a></td>
                            <td>
                                <form action="{{ route('procesos.destroy', $proceso) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button id="DeleteBtn" type="submit" class="btn btn-danger"><i
                                            class="fas fa-minus-square fa-2x"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
            {!! $procesos->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@stop

@section('js')
@stop
