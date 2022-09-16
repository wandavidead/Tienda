@extends('adminlte::page')

@section('content_header')
    <h1>PANEL DE ADMINISTRADOR</h1>
@stop

@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    CATEGORÍA
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">CREAR CATEGORÍA</li>
                    <li class="list-group-item">VER LISTA DE CATEGORÍA</li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    SUBCATEGORÍA
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">CREAR SUBCATEGORÍA</li>
                    <li class="list-group-item">VER LISTA DE SUBCATEGORÍA</li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    PRODUCTOS
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">CREAR PRODUCTOS</li>
                    <li class="list-group-item">VER LISTA DE PRODUCTOS</li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    PROVEEDORES
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">CREAR PROVEEDORES</li>
                    <li class="list-group-item">VER LISTA DE PROVEEDORES</li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    IMPUESTOS
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">CREAR IMPUESTOS</li>
                    <li class="list-group-item">VER LISTA DE IMPUESTOS</li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    PROCESOS DE PEDIDOS
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">CREAR PROCESOS DE PEDIDOS</li>
                    <li class="list-group-item">VER LISTA DE PROCESOS DE PEDIDOS</li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    PAGOS
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">CREAR PAGOS</li>
                    <li class="list-group-item">VER LISTA DE PAGOS</li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    USUARIOS
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">VER LISTA DE USUARIOS</li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    PEDIDOS PENDIENTES
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">VER LISTA DE PEDIDOS PENDIENTES</li>
                </ul>
            </div>
        </div>
    </div>
@stop
