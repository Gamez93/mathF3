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
  <button type="button" class="btn btn-secondary btn-lg btn-block">
    <img src="../public/icons/file-text.svg" alt="" width="25" height="25" title="Hoja">
    Hoja de Estudio
  </button>

  <!--Opciones de la Hoja -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="#">
          <img src="../public/icons/file-earmark-plus.svg" alt="" width="25" height="25" title="Nuevo">
        </a>
        <a class="nav-item nav-link" href="#">
          <img src="../public/icons/upload.svg" alt="" width="25" height="25" title="Cargar">
        </a>
        <a class="nav-item nav-link" href="#">
          <img src="../public/icons/download.svg" alt="" width="25" height="25" title="Descargar">
        </a>
        <a class="nav-item nav-link" href="#">
          <img src="../public/icons/graph-up.svg" alt="" width="25" height="25" title="Graficar">
        </a>
        <a class="nav-item nav-link" href="#">
          <img src="../public/icons/play.svg" alt="" width="25" height="25" title="Resolver">
        </a>
        <a class="nav-item nav-link" href="#">
          <img src="../public/icons/plus-square.svg" alt="" width="25" height="25" title="Guardar">
        </a>
        <a class="nav-item nav-link" href="#">
          <img src="../public/icons/trash.svg" alt="" width="25" height="25" title="Borrar">
        </a>
        <a class="nav-item nav-link" href="#">
          <img src="../public/icons/question-square.svg" alt="" width="25" height="25" title="Ayuda">
        </a>
      </div>
    </div>
  </nav>
</div><!-- cierre de seccion content-->
@endsection

@section('graf')
  <button type="button" class="btn btn-primary btn-lg btn-block">
    <img src="../public/icons/graph-up.svg" alt="" width="25" height="25" title="Hoja">
    Graficas
  </button>
@endsection
