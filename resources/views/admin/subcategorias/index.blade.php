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
            <table id="subcategorias" class="table table-striped">
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
        </div>
    </div>
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#subcategorias').DataTable();
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
