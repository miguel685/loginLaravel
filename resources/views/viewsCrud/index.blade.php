@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<a href="cliente/create" class="btn btn-primary mb-4"> Crear</a>
<table id= "tablacliente" class="table table-striped table-bordered" style="width:100%">
    <!-- filas -->
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Cedula</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- recorremos los registros de la tabla clientes  -->
        @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nombre}}</td>
                <td><img src="public/imagen/{{$cliente->imagen}}" width="60%" ></td>
                <td>{{$cliente->cedula}}</td>
                <td>{{$cliente->correo}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->observaciones}}</td>
                
                <td>

                <form action="{{ route('cliente.destroy', $cliente->id)}}" method="POST" >
                    <!-- le cargamos la pagina, el id y el metodo controller -->
                    <a  href="/cliente/{{$cliente->id}}/edit" class="btn btn-info">Editar</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
                
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
    $('#tablacliente').DataTable();
} );
</script>
@stop



