@extends('adminlte::page')

@section('content_header')
    <h1>SUBCATEGORIA</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('subcategorias.create') }}" class="btn btn-primary">NUEVO SUBCATEGORIA</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>CATEGORIA</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                    @foreach ($subcategorias as $subcategoria)
                        <tr>
                            <td>{{ $subcategoria->nombre }}</td>
                            @if (is_null($subcategoria->categoria))
                                <td>
                                    No tiene Categoria
                                </td>
                            @else
                                <td>{{ $subcategoria->categoria->nombre }}</td>
                            @endif
                            <td><a href="{{ route('subcategorias.edit', $subcategoria) }}" class="btn btn-primary">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('subcategorias.destroy', $subcategoria) }}" method="POST">
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
            {!! $subcategorias->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@stop

@section('js')

@stop
