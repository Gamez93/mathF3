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
    Hoja actual 
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
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Guardar</button>
    </form>
  </div>
</nav>

  <!--div editor:  div en el cual tiene la etiqueta conteneditable la cual se va a utilizar como texarea para ingresar informacion por el usuario-->
	<div id='editor'  contenteditable="true" class="editor rounded"   onmousedown='eventoCalcular()' >
		<div ><p id="noborrar">Universidad Centroamericana "Jos&eacute; Sime&oacute;n Cañas"</P></div>

		<p>La Derivada </p>
	  <p>En matematicas, la derivada de una funcion, es la razon de cambio instantanea con la que cambia el valor de dicha funcion matematica,
		  segun cambie el valor de su variable
		  independiente. La derivada de una funcion es un concepto local, es decir, se calcula como el limite de la rapidez de cambio media de
		  la funcion en cierto intervalo, cuando el intervalo considerado para la variable independiente se torna cada vez mas pequeno.
		  Por ello se habla del valor de la derivada de una funcion en un punto dado.
		 </p>
		  <p> primera derivada de x**2 + 4*x**4 - sin(x)</p>
		  <p> primera derivada de cos(x)</p>
		  <p> primera derivada de x**3</p>
		  <p> dominio de x**2</p>



		  <p> limite de (x**2-4)/(x-2) cuando x tiende a infinito </p>
		  <p> limite de sin(x)/x cuando x tiende a 1</p>
		  <p> limite de x**2/x cuando x tiende a 9</p>
		  <p> limite de x*ln(x) cuando x tiende a 0</p>

	</div> <!--Fin Div editor-->

</div><!-- cierre de seccion content-->
@endsection

<!-- Seccion de Anotaciones-->
@section('anotaciones')
  <div class="row ">
    <div class="col">
      <button type="button" class="btn btn-outline-primary btn-lg btn-block text-primary mb-2 " disabled >
        <img src="../public/icons/file-earmark.svg" alt="" width="20" height="20" title="Anotaciones">
        Hojas 
      </button>
    </div>
  </div>

  <div class="row ">
    <div class="col">
      <a class="btn btn-outline-success btn-lg btn-block  mb-1 btn-sm" href="" >+++</a>
    </div>
  </div>
    
  @if($anotaciones->count() > 0)
    @foreach($anotaciones as $anotacion)
      <div class="row" >
        <div class="col-9 col-auto">
          <a href="#" class="btn btn-outline-dark  btn-block  mb-1 btn-sm"  >{{$anotacion->tema}}</a>
        </div>
        <div class="col-3 col-auto">
          <a class="btn btn-outline-danger btn-block  mb-1 btn-sm" href="" >
              -
          </a>
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
    <img src="../public/icons/graph-up.svg" alt="" width="20" height="20" title="Graficas">
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
