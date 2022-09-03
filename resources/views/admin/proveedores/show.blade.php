@extends('adminlte::page')

@section('content_header')
    <h1>Pagina de monstrar un Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('productos.index') }}" class="btn btn-primary">VOLVER</a>
        </div>
        <div class="card-header">
            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-primary">EDITAR PRODUCTO</a>
        </div>
        <div class="card-body">
            <table id="producto" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                        <th>IMPUESTO</th>
                        <th>PROVEEDOR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->impuesto->valor }}%</td>
                            <td>{{ $producto->proveedor->nombre_Fiscal }}</td>
                            <td>
                                <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <input id="DeleteBtn" type="submit" value="Eliminar" class="btn btn-danger" />
                                </form>
                            </td>
                        </tr>
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
            $('#producto').DataTable();
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