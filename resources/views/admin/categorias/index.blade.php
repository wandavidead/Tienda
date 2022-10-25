@extends('adminlte::page')

@section('content_header')
    <h1>CATEGORIAS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('categorias.create') }}" class="btn btn-primary"><i class="fas fa-plus-square fa-1x"></i> NUEVA CATEGORIA </a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                        <th>NOMBRE</th>
                        <th>VER</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->nombre }}</td>
                            <td><a href="{{ route('categorias.show', $categoria) }}" class="btn btn-success "><i class="far fa-eye fa-2x"></i></a></td>
                            <td><a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-primary"><i class="fas fa-edit fa-2x"></i></a></td>
                            <td>
                                <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
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
            {!! $categorias->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@stop

@section('js')

@stop
