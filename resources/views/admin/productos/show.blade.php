@extends('adminlte::page')

@section('content_header')
    <h1>Pagina de monstrar un Producto</h1>
@stop

@section('content')
    <div>
        {{-- Inicio de la primera fila --}}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('productos.index') }}" class="btn btn-primary">VOLVER</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Inicio de la Tercera fila --}}
        <div class="row">

            {{-- Primera columna --}}
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        {{-- Label y input de nombre de producto con select2 --}}
                        <p class="text-center text-lightblue" style="font-size:25px;"> {{ $producto->nombre }} </p>
                        <div class="form-group row">
                            <div class="col-md-10 ml-5">
                                <div class="card text-black">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-product-cards/img1.webp"
                                        class="card-img-top" alt="iPhone" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Segunda columna --}}
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            {{-- Seleccion de proveedor con select2 --}}
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label text-lightblue" style="font-size:25px;">Stock</label>
                                <div class="col-sm-7">
                                    <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                        {{ $producto->cantidad }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label text-lightblue" style="font-size:25px;">Precio</label>
                                <div class="col-sm-7">
                                    <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                        {{ $producto->precio }}€
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label text-lightblue"
                                    style="font-size:25px;">Impuesto</label>
                                <div class="col-sm-7">
                                    <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                        {{ $producto->impuesto }}%
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label text-lightblue" style="font-size:25px;">Precio con
                                    impuesto</label>
                                <div class="col-sm-7">
                                    <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                        {{ $producto->precio_impuesto }}€</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label text-lightblue"
                                    style="font-size:25px;">Proveedor</label>
                                <div class="col-sm-7">
                                    <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                        {{ $producto->proveedor->nombre_Fiscal }} </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label text-lightblue"
                                    style="font-size:25px;">Familia</label>
                                <div class="col-sm-7">
                                    @if (is_null($categoria))
                                        <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                            No tiene familia asociada
                                        </p>
                                    @else
                                        <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                            {{ $categoria->nombre }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <p class="text-center col-form-label text-lightblue" style="font-size:25px;">LISTA DE
                                        SUBCATEGORIAS</p>
                                    <div class="table-responsive-md">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @if (is_null($subcategorias))
                                                    <tr>
                                                        <td>No tiene subcategorias</td>
                                                    </tr>
                                                @else
                                                    @foreach ($subcategorias as $subcategoria)
                                                        <tr>
                                                            <td>{{ $subcategoria->nombre }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    </div>

    {{-- Parte dinal botones aceptar y cancelar --}}
    <div class="form-group row">
        <div class="col">
            <div class="card ">
                <div class="card-body text-center ">
                    <button type="submit" class="btn btn-primary mr-5"><a href="{{ route('productos.edit', $producto) }}"
                            style="color: inherit;"> EDITAR PRODUCTO
                        </a> </button>
                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="btn btn-danger ml-5">
                        @method('delete')
                        @csrf
                        ELIMINAR
                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>


    {{-- <div class="card">
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
                            <td>{{ $producto->subcategorias }}</td>
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
    </div> --}}
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
