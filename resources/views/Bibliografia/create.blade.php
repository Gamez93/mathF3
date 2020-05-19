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
  <form method="post" action="{{url('bibliografia/store')}}">
    {{csrf_field()}}

    <div class="form-group">
      <?php $id=session()->get('idMateria'); ?>
      <input type="hidden" name="materia_id" value="{{$id}}" id="materia_id">
      <label for="materia_id2">Materia</label>
      <select class="form-control" id="materia_id2" name="materia_id2" disabled>
        @foreach($materias as $materia)
          <option value="{{$materia->id}}">{{$materia->nombre}} - {{$materia->codigo_materia}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="descripcion">Descripcion</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">
    </div>
    <div class="form-group">
      <label for="URL">URL</label>
      <input type="text" class="form-control" id="URL" name="URL" placeholder="URL">
    </div>

    <div class="form-row">
      <div class="col">
        <button type="submit"  class="btn btn-outline-primary btn-lg btn-block btn-sm">
          {{$btn_store}}
        </button>
      </div>
      <div class="col">
        <a class="btn btn-outline-danger btn-lg btn-block btn-sm" href="{{url('bibliografia')}}" role="button">{{$btn_cancel}}</a>
      </div>
    </div>

  </form>
@endsection

@section('footer')
<script type="text/javascript">
  $(document).ready(function(){
    $("#materia_id2").val({{$materia->id}});
  });
</script>
@endsection
