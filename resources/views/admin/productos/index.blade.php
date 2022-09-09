@extends('adminlte::page')

@section('content_header')
    <h1>PRODUCTOS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('productos.create') }}" class="btn btn-primary">NUEVO PRODUCTO</a>
        </div>
        <div class="card-body">
            <table id="productos" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                        <th>IMPUESTO</th>
                        <th>PRECIO CON IMPUESTO</th>
                        <th>PROVEEDOR</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td><a href="{{ route('productos.show', $producto) }}">{{ $producto->nombre }}</a></td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>{{ $producto->precio }}</td>
                            @if (is_null($producto->impuesto))
                                <td>
                                    No tiene Impuesto
                                </td>
                            @else
                            <td>{{ $producto->impuesto }}%</td>
                            @endif
                            @if (is_null($producto->precio_impuesto))
                                <td>
                                    No se puede calcular
                                </td>
                            @else
                            <td>{{ $producto->precio_impuesto }}</td>
                            @endif
                            @if (is_null($producto->proveedor))
                                <td>
                                    No tiene Proveedor
                                </td>
                            @else
                            <td>{{ $producto->proveedor->nombre_Fiscal }}</td>
                            @endif
                            <td><a href="{{ route('productos.edit', $producto) }}" class="btn btn-primary">Editar</a></td>
                            <td>
                                <form action="{{ route('productos.destroy', $producto) }}" method="POST">
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
            $('#productos').DataTable();
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
