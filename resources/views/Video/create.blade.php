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
  <form method="post" action="{{url('unidad/store')}}">
    {{csrf_field()}}

    <div class="form-group">
      <div class="row">
        <div class="col">
          <label for="nombre">Materia</label>
          <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre de unidad">
        </div>
        <div class="col">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre de unidad">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col">
          <label for="descripcion">Descripcion</label>
          <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion de la unidad">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="objetivo">Objetivo</label>
            <textarea class="form-control" id="objetivo" name="objetivo" rows="3"></textarea>
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
