@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
  <button type="button"  class="btn btn-outline-dark btn-lg btn-block text-dark mb-1" disabled>
    {{$title}}
  </button>
  <br>
  <form method="post" action="">
      <div class="form-group">
        <div class="row">
          <div class="col">
            <label for="nombre">Nombre de materia</label>
            <input disabled value="{{$materia->nombre}}" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de materia">
          </div>
          <div class="col">
            <div class="row">
              <div class="col">
                <label for="codigo_materia">Código de materia</label>
                <input disabled value="{{$materia->codigo_materia}}" type="text" class="form-control" id="codigo_materia" name="codigo_materia" placeholder="Codigo de materia">
              </div>
              <div class="col">
                <label for="numeroDeOrden">Numero de Orden</label>
                <input disabled value="{{$materia->numeroDeOrden}}" type="text" class="form-control" id="numeroDeOrden" name="numeroDeOrden" placeholder="Numero de Orden">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col">
            <label for="prerrequisito">Prerrequisito</label>
            <input disabled value="{{$materia->prerrequisito}}" type="text" class="form-control" id="prerrequisito" name="prerrequisito" placeholder="Prerrequisito">
          </div>
          <div class="col">
            <label for="horasPorCiclo">Horas por ciclo</label>
            <input disabled value="{{$materia->horasPorCiclo}}" type="text" class="form-control" id="horasPorCiclo" name="horasPorCiclo" placeholder="Horas por ciclo">
          </div>
          <div class="col">
            <label for="horasTeoricasSemanales">Horas teóricas</label>
            <input disabled value="{{$materia->horasTeoricasSemanales}}" type="text" class="form-control" id="horasTeoricasSemanales" name="horasTeoricasSemanales" placeholder="Horas teoricas">
            <small id="Help" class="text-muted">
              semanales
            </small>
          </div>
          <div class="col">
            <label for="horasPracticasSemanales">Horas practicas</label>
            <input disabled value="{{$materia->horasPracticasSemanales}}" type="text" class="form-control" id="horasPracticasSemanales" name="horasPracticasSemanales" placeholder="Horas practicas">
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
            <input disabled value="{{$materia->cicloEnSemanas}}" type="text" class="form-control" id="cicloEnSemanas" name="cicloEnSemanas" placeholder="Duracion del ciclo">
            <small id="Help" class="text-muted">
              semanas
            </small>
          </div>
          <div class="col">
            <label for="horaClase">Duración hora clase</label>
            <input disabled value="{{$materia->horaClase}}" type="text" class="form-control" id="horaClase" name="horaClase" placeholder="Duracion hora clase">
            <small id="Help" class="text-muted">
              minutos
            </small>
          </div>
          <div class="col">
            <label for="unidadesValorativas">Unidades valorativas</label>
            <input disabled value="{{$materia->unidadesValorativas}}" type="text" class="form-control" id="unidadesValorativas" name="unidadesValorativas" placeholder="Unidades valorativas">
          </div>
          <div class="col">
            <label for="identificacionCiclo">Identificación Ciclo</label>
            <select disabled class="form-control" id="identificacionCiclo" name="identificacionCiclo">
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
        <textarea disabled value="{{$materia->descripcion}}" class="form-control" id="descripcion" name="descripcion" rows="3">{{$materia->descripcion}}</textarea>
      </div>

      <div class="form-group">
        <label for="objetivo_general">Objetivo general</label>
        <textarea disabled value="{{$materia->objetivo_general}}" class="form-control" id="objetivo_general" name="objetivo_general" rows="3">{{$materia->objetivo_general}}</textarea>
      </div>
    
      <div class="form-group">
            <div class="form-row">
              <div class="col">
                <a class="btn btn-outline-success btn-lg btn-block btn-sm" href="{{action('MultimediaController@showlist', 1)}}" role="button">{{$btn_cancel}}</a>
              </div>
            </div>
      </div>
  </form>

  
  

  <script type="text/javascript">

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

