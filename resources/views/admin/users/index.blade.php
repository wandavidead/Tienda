@extends('adminlte::page')

@section('content_header')
    <h1>USUARIOS</h1>
@stop

@section('content')
    <div class="card">
{{--         <div class="card-header">
            <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus-square fa-1x"></i> NUEVO USUARIO</a>
        </div> --}}
        <div class="card-body">
            <table id="users" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>USUARIO</th>
                        <th>TIPO DE USUARIO</th>
                        <th>EMAIL</th>
                        <th>NOMBRE</th>
{{--                         <th>EDITAR</th>
                        <th>ELIMINAR</th> --}}
                    </tr>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><a href="{{ route('users.show', $user) }}">{{ $user->usuario }}</a></td>
                            @if ($user->usertype == '1')
                                <td>Admin</td>
                            @endif
                            @if ($user->usertype == '0')
                                <td>Usuario</td>
                            @endif
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->nombre }}</td>
{{--                             <td><a href="{{ route('users.edit', $user) }}" class="btn btn-primary"><i class="fas fa-edit fa-2x"></i></a></td>
                            <td>
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
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

    <script>
        $(document).ready(function() {
            $('#users').DataTable();
        });
    </script>
@stop
