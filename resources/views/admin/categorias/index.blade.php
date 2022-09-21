@extends('adminlte::page')

@section('content_header')
    <h1>CATEGORIAS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('categorias.create') }}" class="btn btn-primary">NUEVA CATEGORIA</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                        <th>NOMBRE</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->nombre }}</td>
                            <td><a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-primary">Editar</a></td>
                            <td>
                                <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
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
            {!! $categorias->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@stop

@section('js')

@stop
