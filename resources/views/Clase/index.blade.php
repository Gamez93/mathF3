<!DOCTYPE html>
@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')

  <div class="container">
    <!--Encabezado de la hoja donde interactua el usuario {{$clase->tema}} -->
    <button type="button" class="btn btn-outline-dark btn-lg btn-block text-dark mb-1" disabled>
      <img src="{{ url('/icons/file-text.svg') }}" alt="" width="25" height="25" title="Hoja">
        Hoja de Clase
    </button>

    <!--Opciones de la Hoja -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border border-primary  rounded mb-1 p-1">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon sm"></span>
      </button>
    <a class="navbar-brand text-primary" href="#">Opciones</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li>
          <!--<a class="nav-item nav-link" value=""  id="id_subir_archivo"  href="javascript:;">
            <img src="{{ url('/icons/upload.svg') }}" alt="" width="25" height="25" title="Cargar">
          </a>-->
          <button  class="btn btn-outline-light btn-lg btn-block  mb-1 btn-sm" data-toggle="modal" data-target="#ModalUpload" data-whatever=""><img src="{{ url('/icons/upload.svg') }}" alt="" width="25" height="25" title="Cargar"></button>
        </li>
        <li>
          <a class="nav-item nav-link"   value=""  id="descargar_txt"  href="javascript:;">
            <img src="{{ url('/icons/download.svg') }}" alt="" width="25" height="25" title="Descargar">

          </a>
        </li>
        <li>
          <a class="nav-item nav-link" href="javascript:;" id="id_boton_grafica">
            <img src="{{ url('/icons/graph-up.svg') }}" alt="" width="25" height="25" title="Graficar">

          </a>
        </li>
        <li>
          <a class="nav-item nav-link" href="#">
            <img src="{{ url('/icons/play.svg') }}" alt="" width="25" height="25" title="Resolver">
          </a>
        </li>
        <li>
          <a class="nav-item nav-link" href="#">
            <img role="img" class="text-success" src="{{ url('/icons/question-square.svg') }}" alt="" width="25" height="25" title="Ayuda">
          </a>

        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" method="post" onmouseover="saveContenido()" action="{{action('ClaseController@update', $clase->id)}}">
      {{ method_field('PUT') }}
      {{csrf_field()}}

          <input type="hidden" name="contenido"  id="contenido">
          <input type="hidden" name="idclase"  id="idclase">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Guardar Clase</button>
      </form>
    </div>
  </nav>

    <!--div editor:  div en el cual tiene la etiqueta conteneditable la cual se va a utilizar como texarea para ingresar informacion por el usuario-->
  	<div id='editor'  contenteditable="true" class="editor rounded"   onmousedown='eventoCalcular()' >
      <div ><p id="noborrar">Universidad Centroamericana "Jos&eacute; Sime&oacute;n Cañas"</P></div>
        <!--
        <p> Ejemplos: </p>

        <p> primera derivada de x**2 + 4*x**4 - sin(x) + ln(x) + cosh(x)</p>

        <p> primera derivada de (4*x**4+2*x**2)/(x**3)</p>

        <p> dominio de x**2</p>


        <p> limite de sqrt(x**2-2*x+3)/(x+2) cuando x tiende a infinito </p>

        <p> limite de x*ln(x) cuando x tiende a 0</p>

        <p>{{$clase->contenido}}</p>

        {{$clase->contenido}}-->
  	</div> <!--Fin Div editor-->

  </div><!-- cierre de seccion content
<input type="button" value=""  id="guardar_bd" onclick="bd()"  href="javascript:;"  style="background:url(../../img/1.png) no-repeat; border:none; width:16px; height:16px;" title="Guardar"   />
  -->




@endsection

<!-- Modals -->

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

  <!--Ventana Modal para subir archivo -->
  <div class="modal fade" id="ModalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seleccionar Archivo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('clase.upload') }}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" value="" name="file"  id="file-input2"  /> <!-- input file para subir el archivo -->
                  <input type="file" value="" class="custom-file-input" id="file-input" name="file" accept=".math">
                  <label class="custom-file-label" for="file-input" aria-describedby="inputGroupFileAddon02">Seleccionar archivo</label>
                </div>
              </div>
            </div>
            <!--
            <button type="submit" class="btn btn-primary">Abrir</button>
          -->
          </form>
        </div>
      </div>
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
        <div class="col-9 col-auto"><!--{{action('ClaseController@show', $anotacion->id)}}
          {{$anotacion->id === $clase->id ? 'btn-dark' : 'btn-outline-dark'}}
        {{$anotacion->id === $clase->id ? 'btn-danger' : 'btn-outline-danger'}}-->
          <a href="javascript:;" onclick="showclass({{$anotacion->id}});" class="btn btn-outline-dark  btn-block  mb-1 btn-sm"  >{{$anotacion->tema}}</a>
        </div>
        <div class="col-3 col-auto">
          <form action="{{ route('clase.destroy', $anotacion->id) }}" method="POST">
             {{csrf_field()}}
             {{ method_field('DELETE') }}
             <button type="submit" class="btn btn-outline-danger btn-block  mb-1 btn-sm" onclick="return confirm('Estás seguro que deseas eliminar esta Clase?');">-</button>
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
  <div class="row ">
    <div class="col">
      <div align="center" id="plot"  class="alert alert-success hidden"    style="width: 400px; height: 300px;"   ></div>
    </div>
  </div>


  <!--Funciones de Descarga de Archivo .math -->
  @include('js.download')

  <!--Funciones de Carga de Archivo .math -->
  @include('js.upload')

  <!--Funciones para guardar clases -->
  @include('js.saveclass')

  <!--Funciones para mostrar clases -->
  @include('js.showclass')

  <!--Funciones para mostrar clases -->
  @include('js.calculo')
@endsection
