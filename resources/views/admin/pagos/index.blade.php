@extends('adminlte::page')

@section('content_header')
    <h1>PAGOS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pagos.create') }}" class="btn btn-primary"><i class="fas fa-plus-square fa-1x"></i> NUEVO PAGO</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>TIPO DE PAGO</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                    @foreach ($pagos as $pago)
                        <tr>
                            <td>{{ $pago->nombre }}</td>
                            <td><a href="{{ route('pagos.edit', $pago) }}" class="btn btn-primary"><i class="fas fa-edit fa-2x"></i></a></td>
                            <td>
                                <form action="{{ route('pagos.destroy', $pago) }}" method="POST">
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
            {!! $pagos->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@stop

@section('js')
@stop
