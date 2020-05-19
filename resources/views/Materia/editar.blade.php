@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
  <button type="button"  class="btn btn-outline-primary btn-lg btn-block">
    {{$title}}
  </button>
  <br>
  <form method="post" action="{{action('MateriaController@update', $materia->id)}}">
    {{ method_field('PUT') }}
    {{csrf_field()}}

    <div class="form-group">
      <div class="row">
        <div class="col">
          <label for="nombre">Nombre de materia</label>
          <input value="{{$materia->nombre}}" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de materia">
        </div>
        <div class="col">
          <div class="row">
            <div class="col">
              <label for="codigo_materia">Código de materia</label>
              <input value="{{$materia->codigo_materia}}" type="text" class="form-control" id="codigo_materia" name="codigo_materia" placeholder="Codigo de materia">
            </div>
            <div class="col">
              <label for="numeroDeOrden">Numero de Orden</label>
              <input value="{{$materia->numeroDeOrden}}" type="text" class="form-control" id="numeroDeOrden" name="numeroDeOrden" placeholder="Numero de Orden">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="form-row">
        <div class="col">
          <label for="prerrequisito">Prerrequisito</label>
          <input value="{{$materia->prerrequisito}}" type="text" class="form-control" id="prerrequisito" name="prerrequisito" placeholder="Prerrequisito">
        </div>
        <div class="col">
          <label for="horasPorCiclo">Horas por ciclo</label>
          <input value="{{$materia->horasPorCiclo}}" type="text" class="form-control" id="horasPorCiclo" name="horasPorCiclo" placeholder="Horas por ciclo">
        </div>
        <div class="col">
          <label for="horasTeoricasSemanales">Horas teóricas</label>
          <input value="{{$materia->horasTeoricasSemanales}}" type="text" class="form-control" id="horasTeoricasSemanales" name="horasTeoricasSemanales" placeholder="Horas teoricas">
          <small id="Help" class="text-muted">
            semanales
          </small>
        </div>
        <div class="col">
          <label for="horasPracticasSemanales">Horas practicas</label>
          <input value="{{$materia->horasPracticasSemanales}}" type="text" class="form-control" id="horasPracticasSemanales" name="horasPracticasSemanales" placeholder="Horas practicas">
          <small id="Help" class="text-muted">
            semanales
          </small>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="form-row">
        <div class="col">
          <label for="cicloEnSemanas">Duración del ciclo</label>
          <input value="{{$materia->cicloEnSemanas}}" type="text" class="form-control" id="cicloEnSemanas" name="cicloEnSemanas" placeholder="Duracion del ciclo">
          <small id="Help" class="text-muted">
            semanas
          </small>
        </div>
        <div class="col">
          <label for="horaClase">Duración hora clase</label>
          <input value="{{$materia->horaClase}}" type="text" class="form-control" id="horaClase" name="horaClase" placeholder="Duracion hora clase">
          <small id="Help" class="text-muted">
            minutos
          </small>
        </div>
        <div class="col">
          <label for="unidadesValorativas">Unidades valorativas</label>
          <input value="{{$materia->unidadesValorativas}}" type="text" class="form-control" id="unidadesValorativas" name="unidadesValorativas" placeholder="Unidades valorativas">
        </div>
        <div class="col">
          <label for="identificacionCiclo">Identificación Ciclo</label>
          <select class="form-control" id="identificacionCiclo" name="identificacionCiclo">
            <option value="1">I</option>
            <option value="2">II</option>
            <option value="3">III</option>
            <option value="4">IV</option>
            <option value="5">V</option>
            <option value="6">VI</option>
            <option value="7">VII</option>
            <option value="8">VIII</option>
            <option value="9">IX</option>
            <option value="10">X</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label for="descripcion">Descripción de materia</label>
      <textarea value="{{$materia->descripcion}}" class="form-control" id="descripcion" name="descripcion" rows="3">{{$materia->descripcion}}</textarea>
    </div>

    <div class="form-group">
      <label for="objetivo_general">Objetivo general</label>
      <textarea value="{{$materia->objetivo_general}}" class="form-control" id="objetivo_general" name="objetivo_general" rows="3">{{$materia->objetivo_general}}</textarea>
    </div>

    <div class="form-group">
        <div class="form-row">
          <div class="col">
            <button type="submit"  class="btn btn-outline-primary btn-lg btn-block btn-sm">
              {{$btn_store}}
            </button>
          </div>
          <div class="col">
            <a class="btn btn-outline-success btn-lg btn-block btn-sm" href="{{url('materia')}}" role="button">Regresar</a>
          </div>
        </div>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Recuerde</strong> Guardar cambios antes de "Administrar Contenido".
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

  </form>
@endsection

@section('graf')
<button type="button"  class="btn btn-outline-primary btn-lg btn-block w-75">
  {{$title_c}}
</button>
<br>
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Unidades de {{$materia->nombre}}</h5>
    <p class="card-text">Puedes administrar las unidades de esta materia acá.</p>
    <?php $i = $materia->unidades->count(); ?>
    @if($i > 0)
      <a href="{{action('UnidadController@index', $materia->id)}}" class="btn btn-outline-primary">Administrar</a>
      <a class="btn btn-primary" href="{{action('UnidadController@index', $materia->id)}}" role="button">{{$i}}</a>
    @else
      <a href="{{action('UnidadController@index', $materia->id)}}" class="btn btn-outline-danger">Administrar</a>
      <a class="btn btn-danger" href="{{action('UnidadController@index', $materia->id)}}" role="button">0</a>
      <small id="Help" class="text-muted">
        No posee Unidades
      </small>
    @endif
  </div>
</div>
<br>
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Bibliografías de {{$materia->nombre}}</h5>
    <p class="card-text">Puedes administrar las bibliografías de esta materia acá.</p>
    <?php $i = $materia->bibliografias->count(); ?>
    @if($i > 0)
      <a href="{{action('BibliografiaController@editList', $materia->id)}}" class="btn btn-outline-primary">Administrar</a>
      <a class="btn btn-primary" href="{{action('BibliografiaController@editList', $materia->id)}}" role="button">{{$i}}</a>
    @else
      <a href="{{action('BibliografiaController@editList', $materia->id)}}" class="btn btn-outline-danger">Administrar</a>
      <a class="btn btn-danger" href="{{action('BibliografiaController@editList', $materia->id)}}" role="button">0</a>
      <small id="Help" class="text-muted">
        No posee Bibliografías
      </small>
    @endif
  </div>
</div>
<br>
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Videos de {{$materia->nombre}}</h5>
    <p class="card-text">Puedes administrar los videos de esta materia acá.</p>
    <?php
      $count_unidades = $materia->unidades->count();

      $count_videos = 0;
      foreach ($materia->unidades as $unidad) {
        $count_videos = $count_videos + $unidad->videos->count();
      }
    ?>
    <a id="btn_videos_1" href="{{action('VideoController@index', $materia->id)}}" class="btn btn-outline-primary">Administrar</a>
    <a id="btn_videos_2" class="btn btn-primary" href="{{action('VideoController@index', $materia->id)}}" role="button">{{$count_videos}}</a>
    <small id="lbl_id_adv" class="text-muted"></small>

  </div>
</div>
@endsection

@section('footer')
<script type="text/javascript">

  //Logica de administracion de Videos
  $(document).ready(function(){
    var j = {{$count_unidades}};

    if ({{$count_videos}} > 0) {
      document.getElementById("lbl_id_adv").innerText ="";
    }else {
      document.getElementById("btn_videos_1").classList.remove('btn-outline-primary');
      document.getElementById("btn_videos_1").classList.add('btn-outline-danger');

      document.getElementById("btn_videos_2").classList.remove('btn-primary');
      document.getElementById("btn_videos_2").classList.add('btn-danger');

      if (j > 0) {
        document.getElementById("lbl_id_adv").innerText = "No posee Videos";
      }else {
        document.getElementById("lbl_id_adv").innerText = "Se requiere agregar Unidad.";
        document.getElementById("btn_videos_1").classList.add('disabled');
        document.getElementById("btn_videos_2").classList.add('disabled');
      }
    }

  });

  //funcion para setear identificacionCiclo ya que es un Enum
  $(document).ready(function(){

    var x = "{{$materia->identificacionCiclo}}";
    switch(x) {
    case "I":
      $("#identificacionCiclo").val(1);
      break;
    case "II":
      $("#identificacionCiclo").val(2);
      break;
    case "III":
      $("#identificacionCiclo").val(3);
      break;
    case "IV":
      $("#identificacionCiclo").val(4);
      break;
    case "V":
      $("#identificacionCiclo").val(5);
      break;
    case "VI":
      $("#identificacionCiclo").val(6);
      break;
    case "VII":
      $("#identificacionCiclo").val(7);
      break;
    case "VIII":
      $("#identificacionCiclo").val(8);
      break;
    case "IX":
      $("#identificacionCiclo").val(9);
      break;
    case "X":
      $("#identificacionCiclo").val(10);
      break;
    default:
      $("#identificacionCiclo").val(1);
    };
  });
</script>
@endsection
