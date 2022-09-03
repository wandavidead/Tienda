@extends('adminlte::page')

@section('content_header')
    <h1>REALIZACIONES</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('realizaciones.create') }}" class="btn btn-primary">NUEVA REALIZACION</a>
        </div>
        <div class="card-body">
            <table id="realizaciones" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                    @foreach ($realizaciones as $realizacion)
                        <tr>
                            <td>{{ $realizacion->id }}</td>
                            <td>{{ $realizacion->nombre }}</td>
                            <td>{{ $realizacion->valor }}</td>
                            <td><a href="{{ route('realizaciones.edit', $realizacion->id) }}" class="btn btn-primary">Editar</a></td>
                            <td>
                                <form action="{{ route('realizaciones.destroy', $realizacion) }}" method="POST">
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
            $('#realizaciones').DataTable();
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
