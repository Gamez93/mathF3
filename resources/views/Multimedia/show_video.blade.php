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
  @foreach($unidades as $unidad)
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">{{$unidad->nombre}}</h1>
        <p class="lead text-primary">{{$unidad->descripcion}}.</p>
        @if($unidad->videos->count() > 0)
        <div class="">
          <div class="row ">
            @foreach($unidad->videos as $video)
              <div class="col">
                <div class="card border-light mb-3" style="width: 25rem; ">

                  <div class="card-body ">
                    <p class="card-text text-primary">{{$video->descripcion}}</p>
                  </div>
                  <?php
                    $url = str_replace("https://youtu.be/","https://www.youtube.com/embed/",$video->URL);
                   ?>

                  <div class="embed-responsive embed-responsive-4by3">
                    <iframe
                            src="{{$url}}"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        @else
          <p class="lead text-danger">Esta unidad no posee videos asociados.</p>
        @endif

      </div>
    </div>

  @endforeach


@endsection
