@extends('adminlte::page')

@section('content_header')
    <h1>IMPUESTOS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('impuestos.create') }}" class="btn btn-primary">NUEVO IMPUESTO</a>
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
                            <td><a href="{{ route('impuestos.edit', $impuesto) }}" class="btn btn-primary">Editar</a></td>
                            <td>
                                <form action="{{ route('impuestos.destroy', $impuesto) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <input id="DeleteBtn" type="submit" value="Eliminar" class="btn btn-danger" />
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
