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
            <table id="impuestos" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TIPO DE IMPUESTO</th>
                        <th>VALOR</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                    @foreach ($impuestos as $impuesto)
                        <tr>
                            <td>{{ $impuesto->id }}</td>
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
        </div>
    </div>
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#impuestos').DataTable();
        });
    </script>
    {{-- <script>
        $('#DeleteBtn').click(function(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script> --}}
@stop
