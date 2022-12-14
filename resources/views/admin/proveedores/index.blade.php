@extends('adminlte::page')

@section('content_header')
    <h1>PROVEEDORES</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('proveedores.create') }}" class="btn btn-primary"><i class="fas fa-plus-square fa-1x"></i> NUEVO
                PROVEEDOR</a>
        </div>
        <div class="card-body">
            <table id="proveedores" class="table table-striped">
                <thead>
                    <tr>
                        <th>NOMBRE FISCAL</th>
                        <th>CIF</th>
                        <th>DIRECCION</th>
                        <th>CODIGO POSTAL</th>
                        <th>PROVINCIA</th>
                        <th>MUNICIPIO</th>
                        <th>VER</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->nombre_Fiscal }}</td>
                            <td>{{ $proveedor->cif }}</td>
                            <td>{{ $proveedor->direccion }}</td>
                            <td>{{ $proveedor->codigo_postal }}</td>
                            <td>{{ $proveedor->provincia }}</td>
                            <td>{{ $proveedor->municipio }}</td>
                            <td><a href="{{ route('proveedores.show', $proveedor) }}" class="btn btn-success "><i
                                        class="far fa-eye fa-2x"></i></a></td>
                            <td><a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-primary"><i
                                        class="fas fa-edit fa-2x"></i></a></td>
                            <td>
                                <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST">
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
        </div>
    </div>
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#proveedores').DataTable();
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
