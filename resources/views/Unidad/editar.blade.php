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
  <form method="post" action="{{action('UnidadController@update', $unidad->id)}}">
    {{ method_field('PUT') }}
    {{csrf_field()}}

    <div class="form-group">
      <div class="row">
        <div class="col">
          <label for="nombre">Nombre</label>
          <input type="text" value="{{$unidad->nombre}}" id="nombre" name="nombre" class="form-control" placeholder="Nombre de unidad">
        </div>
        <div class="col">
          <label for="nombre">Materia</label>
          <input type="text" value="{{$unidad->materia->nombre}}" id="materia" name="materia" class="form-control" disabled>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col">
          <label for="descripcion">Descripcion</label>
          <input type="text" value="{{$unidad->descripcion}}" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion de la unidad">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="objetivo">Objetivo</label>
            <textarea class="form-control" value="{{$unidad->objetivo}}" id="objetivo" name="objetivo" rows="3">
              {{$unidad->objetivo}}
            </textarea>
          </div>
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col">
        <button type="submit"  class="btn btn-outline-primary btn-lg btn-block btn-sm">
          {{$btn_store}}
        </button>
      </div>
      <div class="col">
        <a class="btn btn-outline-danger btn-lg btn-block btn-sm" href="{{url('unidad')}}" role="button">{{$btn_cancel}}</a>
      </div>
    </div>

  </form>
@endsection
