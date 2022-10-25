@extends('adminlte::page')

@section('content_header')
    <h1>Pagina de monstrar un Producto</h1>
@stop

@section('content')
    <div>
        {{-- Inicio de la primera fila --}}
        <div class="card">
            <div class="card-header text-center bg-dark text-lightblue">
                <div class="row align-items-center">
                    <div class="col-md-1">
                        <a href="{{ route('productos.index') }}" class="mr-5 btn btn-primary"><i
                                class="fas fa-backward fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-dark text-lightblue">
            <div class="form-group row card-body">
                <div class="col-md-6">
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
                        <label class="col-md-5 col-form-label text-lightblue" style="font-size:25px;">Impuesto</label>
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
                        <label class="col-md-5 col-form-label text-lightblue" style="font-size:25px;">Familia</label>
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
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label text-lightblue align-self-center"
                            style="font-size:25px;">{{ $producto->nombre }}</label>
                        <div class="col-sm-7">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-product-cards/img1.webp"
                                class="card-img-top" style="border-radius: 20px; width:55%;" alt="iPhone" />
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-5 col-form-label text-lightblue" style="font-size:25px;">Proveedor</label>
                        <div class="col-sm-7">
                            <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                {{ $producto->proveedor->nombre_Fiscal }} </p>
                        </div>
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
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col">
                                    <p class="text-center col-form-label text-lightblue" style="font-size:25px;">LISTA DE
                                        SUBCATEGORIAS</p>
                                    <div class="table-responsive-md">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NOMBRE</th>
                                                    <th>VER</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (is_null($subcategorias))
                                                    <tr>
                                                        <td>No tiene subcategorias</td>
                                                    </tr>
                                                @else
                                                    @foreach ($subcategorias as $subcategoria)
                                                        <tr>
                                                            <td>{{ $subcategoria->nombre }}</td>
                                                            <td><a href="{{ route('subcategorias.show', $subcategoria) }}"
                                                                    class="btn btn-success "><i
                                                                        class="far fa-eye fa-2x"></i></a></td>
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

        {{-- Parte dinal botones aceptar y cancelar --}}
        <div class=" row">
            <div class="col">
                <div class="card-body bg-dark text-center ">
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
@stop
