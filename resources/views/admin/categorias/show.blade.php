@extends('adminlte::page')

@section('content_header')
    <h1>CATEGORIAS</h1>
@stop

@section('content')
    <div>
        {{-- Inicio de la primera fila --}}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('categorias.index') }}" class="btn btn-primary"><i
                                class="fas fa-backward fa-2x"></i></a></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Inicio de la Tercera fila --}}
        <div class="row">
            {{-- Primera columna --}}
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <label class="col-md-5 col-form-label text-lightblue "
                            style="font-size:25px;">{{ $categoria->nombre }} </label>
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
                                                            <td>{{ $subcategoria->nombre }}
                                                            </td>
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
        <div class="form-group row">
            <div class="col">
                <div class="card ">
                    <div class="card-body text-center ">
                        <button type="submit" class="btn btn-primary mr-5"><a
                                href="{{ route('categorias.edit', $categoria) }}" style="color: inherit;"> EDITAR
                            </a> </button>
                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST"
                            class="btn btn-danger ml-5">
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
@stop
