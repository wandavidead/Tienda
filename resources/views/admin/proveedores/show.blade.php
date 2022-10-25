@extends('adminlte::page')

@section('content_header')
    <h1>Pagina de monstrar un Proveedor</h1>
@stop

@section('content')
    <div>

        <div class="card">
            <div class="card-header text-center bg-dark text-lightblue">
                <div class="row align-items-center">
                    <div class="col-md-1">
                        <a href="{{ route('proveedores.index') }}" class="btn btn-primary"><i
                                class="fas fa-backward fa-2x"></i></a></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-dark text-lightblue">
            <div class="form-group row card-body">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label text-lightblue" style="font-size:25px;">Direccion</label>
                        <div class="col-sm-7">
                            <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                {{ $proveedor->direccion }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label text-lightblue" style="font-size:25px;">CIF</label>
                        <div class="col-sm-7">
                            <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                {{ $proveedor->cif }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label text-lightblue" style="font-size:25px;">Codigo
                            Postal</label>
                        <div class="col-sm-7">
                            <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                {{ $proveedor->codigo_postal }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label text-lightblue" style="font-size:25px;">Municipio</label>
                        <div class="col-sm-7">
                            <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                {{ $proveedor->municipio }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label text-lightblue align-self-center"
                            style="font-size:25px;">{{ $proveedor->nombre_Fiscal }}</label>
                        <div class="col-sm-7">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-product-cards/img1.webp"
                                class="card-img-top" style="border-radius: 20px; width:55%;" alt="iPhone" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label text-lightblue" style="font-size:25px;">Provincia</label>
                        <div class="col-sm-7">
                            <p class="text-center text-lightblue ml-5" style="font-size:25px;">
                                {{ $proveedor->provincia }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col">
                                    <p class="text-center col-form-label text-lightblue" style="font-size:25px;">LISTA DE
                                        Productos</p>
                                    <div class="table-responsive-md">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NOMBRE</th>
                                                    <th class="text-center">CANTIDAD</th>
                                                    <th class="text-center">PRECIO</th>
                                                    <th>IMPUESTO</th>
                                                    <th class="text-center">PRECIO CON IMPUESTO</th>
                                                    <th>VER</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @if (is_null($productos))
                                                    <tr>
                                                        <td>No tiene productos</td>
                                                    </tr>
                                                @else
                                                    @foreach ($productos as $producto)
                                                        <tr>
                                                            <td>{{ $producto->nombre }}</td>
                                                            <td class="text-center">{{ $producto->cantidad }}</td>
                                                            <td class="text-center">{{ $producto->precio }}€</td>
                                                            @if (is_null($producto->impuesto))
                                                                <td>
                                                                    No tiene Impuesto
                                                                </td>
                                                            @else
                                                                <td>{{ $producto->impuesto }}%</td>
                                                            @endif
                                                            @if (is_null($producto->precio_impuesto))
                                                                <td class="text-center">
                                                                    No se puede calcular
                                                                </td>
                                                            @else
                                                                <td class="text-center">{{ $producto->precio_impuesto }}€
                                                                </td>
                                                            @endif
                                                            <td><a href="{{ route('productos.show', $producto) }}"
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

        <div class=" row">
            <div class="col">
                <div class="card-body bg-dark text-center ">
                    <button type="submit" class="btn btn-primary mr-5"><a
                            href="{{ route('proveedores.edit', $proveedor) }}" style="color: inherit;"> EDITAR
                        </a> </button>
                    <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST"
                        class="btn btn-danger ml-5">
                        @method('delete')
                        @csrf
                        ELIMINAR
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
