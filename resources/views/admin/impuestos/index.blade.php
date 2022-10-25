@extends('adminlte::page')

@section('content_header')
    <h1>IMPUESTOS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('impuestos.create') }}" class="btn btn-primary"><i class="fas fa-plus-square fa-1x"></i> NUEVO IMPUESTO</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>TIPO DE IMPUESTO</th>
                        <th>VALOR</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                    @foreach ($impuestos as $impuesto)
                        <tr>
                            <td>{{ $impuesto->nombre }}</td>
                            <td>{{ $impuesto->valor }}%</td>
                            <td><a href="{{ route('impuestos.edit', $impuesto) }}" class="btn btn-primary"><i class="fas fa-edit fa-2x"></i></a></td>
                            <td>
                                <form action="{{ route('impuestos.destroy', $impuesto) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button id="DeleteBtn" type="submit" class="btn btn-danger"><i class="fas fa-minus-square fa-2x"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
            {!! $impuestos->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@stop

@section('js')
@stop
