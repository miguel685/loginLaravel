@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
<form action="/cliente/{{$cliente->id}}" method="POST">
    <!-- fuerza a enviar una peticio a una aplicacion vulnerable
        corss site request forgery -->
        @csrf    
    
    <!-- espesificamos que se va a utilizar una directiva http de tipo put -->
        @method('PUT')

        
       <div class= "mb-3">
       <label for="" class="form-label">Nombre</label>
       <input id = "nombre" type="text" class= "form-control" name="nombre" value="{{$cliente->nombre}}">
       </div>

       <div class= "mb-3">
       <img  id="imagenSeleccionada" alt="">
       </div>

       <div>
       <label for="" class="form-label">Imagen</label>
       <input type='file' name="imagen" id="imagen" class="hidden" >
       </div>

       <div class= "mb-3">
       <label for="" class="form-label">Cedula</label>
       <input id="cedula" type="text" class= "form-control" name="cedula" values="{{$cliente->cedula}}">
       </div>

       <div class= "mb-3">
       <label for="" class="form-label">Correo</label>
       <input id="correo" type="text" class= "form-control" name="correo" values="{{$cliente->correo}}">
       </div>

       <div class= "mb-3">
       <label for="" class="form-label">Telefono</label>
       <input id="telefono" type="text" class= "form-control" name="telefono" values="{{$cliente->telefono}}">
       </div>

       <div class= "mb-3">
       <label for="" class="form-label">Observaciones</label>
       <input id="telefono" type="text" class= "form-control" name="observaciones" values="{{$cliente->observaciones}}">
       </div>

       

       <a href="/cliente" class="btn btn-secondary">Cancelar</a>
       <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function (e){
            $('#imagen').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imagenSeleccionada').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script> 
@stop




