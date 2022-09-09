@extends('adminlte::page')

@section('content_header')
    <h1>PROCESOS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('procesos.create') }}" class="btn btn-primary">NUEVO PROCESO</a>
        </div>
        <div class="card-body">
            <table id="procesos" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                    @foreach ($procesos as $proceso)
                        <tr>
                            <td>{{ $proceso->id }}</td>
                            <td>{{ $proceso->nombre }}</td>
                            <td><a href="{{ route('procesos.edit', $proceso->id) }}" class="btn btn-primary">Editar</a></td>
                            <td>
                                <form action="{{ route('procesos.destroy', $proceso) }}" method="POST">
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
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#procesos').DataTable();
        });
    </script>
@stop
