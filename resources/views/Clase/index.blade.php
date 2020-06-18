@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
<div class="container">
  <!--Encabezado de la hoja donde interactua el usuario -->
  <button type="button" class="btn btn-outline-dark btn-lg btn-block text-dark mb-1" disabled>
    <img src="{{ url('/icons/file-text.svg') }}" alt="" width="25" height="25" title="Hoja">
    {{$clase->tema}}
  </button>

  <!--Opciones de la Hoja -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light border border-primary  rounded mb-1 p-1">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon sm"></span>
    </button>
  <a class="navbar-brand text-primary" href="#">Opciones</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <!--
      <li class="nav-item">
        <a class=" nav-link" href="#">
          <img src="{{ url('/icons/file-earmark-plus.svg') }}" alt="" width="25" height="25" title="Nuevo">

        </a>
      </li>-->
      <li>
        <a class="nav-item nav-link" href="#">
          <img src="{{ url('/icons/upload.svg') }}" alt="" width="25" height="25" title="Cargar">

        </a>
      </li>
      <li>
        <a class="nav-item nav-link" href="#">
          <img src="{{ url('/icons/download.svg') }}" alt="" width="25" height="25" title="Descargar">

        </a>
      </li>
      <li>
        <a class="nav-item nav-link" href="#">
          <img src="{{ url('/icons/graph-up.svg') }}" alt="" width="25" height="25" title="Graficar">

        </a>
      </li>
      <li>
        <a class="nav-item nav-link" href="#">
          <img src="{{ url('/icons/play.svg') }}" alt="" width="25" height="25" title="Resolver">
        </a>
      </li>
      <!--
      <li>
        <a class="nav-item nav-link" href="#">
          <img src="{{ url('/icons/plus-square.svg') }}" alt="" width="25" height="25" title="Guardar">
        </a>
      </li>

      <li>
        <a class="nav-item nav-link" href="#">
          <img src="{{ url('/icons/trash.svg') }}" alt="" width="25" height="25" title="Borrar">
        </a>
      </li>-->
      <li>
        <a class="nav-item nav-link" href="#">
          <img role="img" class="text-success" src="{{ url('/icons/question-square.svg') }}" alt="" width="25" height="25" title="Ayuda">
        </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="{{action('ClaseController@update', $clase->id)}}">
    {{ method_field('PUT') }}
    {{csrf_field()}}
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Guardar Clase</button>
    </form>
  </div>
</nav>

  <!--div editor:  div en el cual tiene la etiqueta conteneditable la cual se va a utilizar como texarea para ingresar informacion por el usuario-->
	<div id='editor'  contenteditable="true" class="editor rounded"   onmousedown='eventoCalcular()' >
      <p>{{$clase->contenido}}</p>
	</div> <!--Fin Div editor-->
  
</div><!-- cierre de seccion content-->
@endsection

<!-- Seccion de Anotaciones-->
@section('anotaciones')
  <div class="row ">
    <div class="col">
      <button type="button" class="btn btn-outline-primary btn-lg btn-block text-primary mb-2 " disabled >
        <img src="{{ url('/icons/file-earmark.svg') }}" alt="" width="20" height="20" title="Anotaciones">
        Clases
      </button>
    </div>
  </div>

  <div class="row ">
    <div class="col">
      <?php
        $idUser = auth()->user()->id;
       ?>
      <button  class="btn btn-outline-success btn-lg btn-block  mb-1 btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$idUser}}">+++</button>

    </div>
  </div>

  <!--Ventana Modal para crear nueva Clase -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nueva Clase</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{url('clase/store')}}">
            {{csrf_field()}}
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Tema:</label>
              <input type="text" class="form-control" id="recipient-name" name="tema" required>
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Crear</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  @if($anotaciones->count() > 0)
    @foreach($anotaciones as $anotacion)
      <div class="row" >
        <div class="col-9 col-auto">
          <a href="{{action('ClaseController@show', $anotacion->id)}}" class="btn {{$anotacion->id === $clase->id ? 'btn-dark' : 'btn-outline-dark'}}  btn-block  mb-1 btn-sm"  >{{$anotacion->tema}}</a>
        </div>
        <div class="col-3 col-auto">
          <form action="{{ route('clase.destroy', $anotacion->id) }}" method="POST">
             {{csrf_field()}}
             {{ method_field('DELETE') }}
             <button type="submit" class="btn {{$anotacion->id === $clase->id ? 'btn-danger' : 'btn-outline-danger'}} btn-block  mb-1 btn-sm" onclick="return confirm('Estás seguro que deseas eliminar esta Clase?');">-</button>
          </form>
        </div>
      </div>
    @endforeach
    @else
    <div class="row ">
      <div class="col">
        <a href="">No hay registros.</a>
      </div>
    </div>
  @endif
@endsection

<!-- Seccion para mostrar graficas-->
@section('graf')
  <button type="button" class="btn btn-outline-primary btn-lg btn-block text-primary mb-2" disabled>
    <img src="{{ url('/icons/graph-up.svg') }}" alt="" width="20" height="20" title="Graficas">
    Graficas
  </button>
  <div class="content border border-dark rounded">
    <button type="button" class="list-group-item list-group-item-action">.</button>
    <button type="button" class="list-group-item list-group-item-action">.</button>
    <button type="button" class="list-group-item list-group-item-action">.</button>
    <button type="button" class="list-group-item list-group-item-action">.</button>
  </div>
@endsection

<!-- Seccion para mostrar calculadora basica-->
