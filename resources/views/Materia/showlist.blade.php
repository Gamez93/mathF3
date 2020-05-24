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
        @foreach($materias as $materia)
          <div class="col">
              <div id="card_{{$materia->id}}" class="card text-white bg-primary mb-3" style="width: 16rem; height: 15rem">

              <div class="card-body text-white">
                <h5 class="card-title">{{$materia->nombre}}</h5>
                <p class="card-text">Codigo: {{$materia->codigo_materia}}</p>
                <p class="card-text">UV: {{$materia->unidadesValorativas}}</p>
                <p class="card-text">Ciclo: {{$materia->identificacionCiclo}}</p>
              </div>

              <?php

                $count_videos = 0;
                foreach ($materia->unidades as $unidad) {
                  $count_videos = $count_videos + $unidad->videos->count();
                }
              ?>
              <div class="card-footer">
                <div class="row">
                  <div class="col">
                    <a id="btn_vid_2" href="{{action('VideoController@indexvideo', $materia->id)}}" class="btn btn-primary bg-light text-primary" style="width: 10rem;">
                      {{$count_videos}} videos
                    </a>
                    <a class="btn btn-primary bg-light text-primary" href="#" role="button">...</a>
                  </div>

                </div>


             </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
@endsection
