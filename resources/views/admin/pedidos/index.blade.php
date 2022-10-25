@extends('adminlte::page')

@section('content_header')
    <h1>PEDIDOS</h1>
@stop

@section('content')
    <div class="card">
{{--         <div class="card-header">
            <a href="{{ route('pedidos.create') }}" class="btn btn-primary"><i class="fas fa-plus-square fa-1x"></i> NUEVO PEDIDO</a>
        </div> --}}
        <div class="card-body">
            <table id="pedidos" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>BASE</th>
                        <th>CUOTA</th>
                        <th>PRECIO TOTAL</th>
                        <th>FECHA DE PEDIDO</th>
                        <th>IMPUESTO</th>
                        <th>FORMA DE PAGO</th>
                        <th>FORMA DE REALIZACION</th>
                        <th>USUARIO</th>
{{--                         <th>EDITAR</th>
                        <th>ELIMINAR</th> --}}
                    </tr>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td><a href="{{ route('pedidos.show', $pedido) }}">{{ $pedido->base }}</a></td>
                            <td>{{ $pedido->cuota }}</td>
                            <td>{{ $pedido->precio_total }}</td>
                            <td>{{ $pedido->fecha_pedido }}</td>
                            <td>{{ $pedido->impuesto }}%</td>
                            <td>{{ $pedido->pago }}</td>
                            <td>{{ $pedido->proceso }}</td>
                            <td>{{ $pedido->user->usuario }}</td>
{{--                             <td><a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-primary"><i class="fas fa-edit fa-2x"></i></a></td>
                            <td>
                                <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button id="DeleteBtn" type="submit" class="btn btn-danger"><i class="fas fa-minus-square fa-2x"></i></button>
                                </form>
                            </td> --}}
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
            $('#pedidos').DataTable();
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
