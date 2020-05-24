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
            <div class="card border-dark mb-3" style="width: 15rem; height: 16rem">
              <div class="card-body text-light bg-primary">
                <h4 class="card-title">{{$materia->nombre}}</h4>
                <p class="card-text">
                      Codigo: {{$materia->codigo_materia}}
                      </p>
                      <br>
              </div>
              <?php
                    $count_videos = 0;
                    $count_biblio = $materia->bibliografias->count();
                    foreach ($materia->unidades as $unidad) {
                      $count_videos = $count_videos + $unidad->videos->count();
                    }
              ?>
              <div class="card-footer bg-transparent border-primary">
                    <!-- fila 1 -->
                    <div class"row">
                      <div class"col">
                        <a  href="{{action('MultimediaController@showvideo', $materia->id)}}" class="btn  bg-light {{$count_videos > 0 ? 'text-primary btn-primary' : 'text-danger disabled btn-danger'}} mb-2" style="width: 9rem; "  data-toggle="tooltip" data-placement="top" title="videos disponibles">
                          VIDEOS 
                        </a>
                        
                        <a class="btn  bg-light {{$count_videos > 0 ? 'text-primary btn-primary' : 'text-danger disabled btn-danger'}} mb-2" style="width: 3rem; " href="{{action('MultimediaController@showvideo', $materia->id)}}">
                          {{$count_videos}}
                        </a>
                      </div>
                    </div>
                        
                    <!-- fila 2 -->
                    <div class"row">
                      <div class"col">
                          <a  href="{{action('MultimediaController@showbiblio', $materia->id)}}" class="btn  bg-light {{$count_biblio > 0 ? 'text-primary btn-primary' : 'text-danger disabled btn-danger'}} mb-2" style="width: 9rem; "  data-toggle="tooltip" data-placement="top" title="videos disponibles">
                            BIBLIOGRAFIA
                          </a>
                          <a class="btn bg-light {{$count_biblio > 0 ? 'text-primary btn-primary' : 'text-danger disabled btn-danger'}} mb-2" style="width: 3rem; " href="{{action('MultimediaController@showbiblio', $materia->id)}}">
                            {{$count_biblio}}
                          </a>
                      </div>
                    </div>
                    <!-- fila 3 -->
                    <a  href="{{action('MultimediaController@showprograma', $materia->id)}}" class="btn btn-primary bg-light text-primary btn-block"  data-toggle="tooltip" data-placement="top" title="videos disponibles">
                      PROGRAMA
                    </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
@endsection
