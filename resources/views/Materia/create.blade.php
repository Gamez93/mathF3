@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
  <button type="button"  class="btn btn-secondary btn-lg btn-block">
    {{$title}}
  </button>
  <br>
  <form method="post" action="{{url('materia/store')}}">
    {{csrf_field()}}

    <div class="form-group">
      <div class="row">
        <div class="col">
          <label for="nombre">Nombre de materia</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de materia">
        </div>
        <div class="col">
          <div class="row">
            <div class="col">
              <label for="codigo_materia">Codigo de materia</label>
              <input type="text" class="form-control" id="codigo_materia" name="codigo_materia" placeholder="Codigo de materia">
            </div>
            <div class="col">
              <label for="numeroDeOrden">Numero de Orden</label>
              <input type="text" class="form-control" id="numeroDeOrden" name="numeroDeOrden" placeholder="Numero de Orden">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="form-row">
        <div class="col">
          <label for="prerrequisito">Prerrequisito</label>
          <input type="text" class="form-control" id="prerrequisito" name="prerrequisito" placeholder="Prerrequisito">
        </div>
        <div class="col">
          <label for="horasPorCiclo">Horas por ciclo</label>
          <input type="text" class="form-control" id="horasPorCiclo" name="horasPorCiclo" placeholder="Horas por ciclo">
        </div>
        <div class="col">
          <label for="horasTeoricasSemanales">Horas teoricas</label>
          <input type="text" class="form-control" id="horasTeoricasSemanales" name="horasTeoricasSemanales" placeholder="Horas teoricas">
          <small id="Help" class="text-muted">
            semanales
          </small>
        </div>
        <div class="col">
          <label for="horasPracticasSemanales">Horas practicas</label>
          <input type="text" class="form-control" id="horasPracticasSemanales" name="horasPracticasSemanales" placeholder="Horas practicas">
          <small id="Help" class="text-muted">
            semanales
          </small>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="form-row">
        <div class="col">
          <label for="cicloEnSemanas">Duracion del ciclo</label>
          <input type="text" class="form-control" id="cicloEnSemanas" name="cicloEnSemanas" placeholder="Duracion del ciclo">
          <small id="Help" class="text-muted">
            semanas
          </small>
        </div>
        <div class="col">
          <label for="horaClase">Duracion hora clase</label>
          <input type="text" class="form-control" id="horaClase" name="horaClase" placeholder="Duracion hora clase">
          <small id="Help" class="text-muted">
            minutos
          </small>
        </div>
        <div class="col">
          <label for="unidadesValorativas">Unidades valorativas</label>
          <input type="text" class="form-control" id="unidadesValorativas" name="unidadesValorativas" placeholder="Unidades valorativas">
        </div>
        <div class="col">
          <label for="identificacionCiclo">Identificacion Ciclo</label>
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
      <label for="descripcion">Descripcion de materia</label>
      <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="objetivo_general">Objetivo general</label>
      <textarea class="form-control" id="objetivo_general" name="objetivo_general" rows="3"></textarea>
    </div>

    <div class="form-row">
      <div class="col">
        <button type="submit"  class="btn btn-outline-primary btn-lg btn-block btn-sm">
          {{$btn_store}}
        </button>
      </div>
      <div class="col">
        <a class="btn btn-outline-danger btn-lg btn-block btn-sm" href="{{url('materia')}}" role="button">{{$btn_cancel}}</a>
      </div>
    </div>

  </form>
@endsection
