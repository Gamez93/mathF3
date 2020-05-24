@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
    <button type="button"  class="btn btn-outline-dark btn-lg btn-block text-dark mb-1" disabled>
      {{$title ?? ''}}
    </button>
    <br>
    <div class="container">
      <div class="row ">
        <?php $count_unidades =  $unidades->count(); ?>
        @foreach($unidades as $unidad)
          <div class="col">
            @if($unidad->videos->count() > 0)
              <div id="card_{{$unidad->id}}" class="card border-primary mb-3" style="width: 16rem; height: 14rem">
              <div class="card-header text-primary">{{$unidad->nombre}}</div>
            @else
              <div id="card_{{$unidad->id}}" class="card border-danger mb-3" style="width: 16rem; height: 14rem">
              <div class="card-header text-danger">{{$unidad->nombre}}</div>
            @endif
              <div class="card-body text-secondary">
                <p class="card-text">{{$unidad->descripcion}}</p>

              </div>
              <div class="card-footer">
              <?php
                $count = $unidad->videos->count();
              ?>
              @if($count > 0)
                <a id="btn_vid_1" href="{{action('VideoController@indexvideo', $unidad->id)}}" class="btn btn-outline-primary ">Administrar</a>
                <a id="btn_vid_2" href="{{action('VideoController@indexvideo', $unidad->id)}}" class="btn btn-primary ">{{$unidad->videos->count()}}</a>
              @else
                <a id="btn_vid_1" href="{{action('VideoController@indexvideo', $unidad->id)}}" class="btn btn-outline-danger ">Administrar</a>
                <a id="btn_vid_2" href="{{action('VideoController@indexvideo', $unidad->id)}}" class="btn btn-danger ">{{$unidad->videos->count()}}</a>
              @endif
             </div>
            </div>
          </div>
        @endforeach
      </div>
      <br>
      <?php $id=session()->get('idMateria'); ?>
      <a class="btn btn-outline-success btn-block btn-sm" href="{{action('MateriaController@edit', $id)}}" role="button">Regresar</a>
    </div>
@endsection

@section('footer')
<script type="text/javascript">

</script>
@endsection
