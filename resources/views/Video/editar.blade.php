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
  <form method="post" action="{{action('VideoController@update', $video->id)}}">
    {{ method_field('PUT') }}
    {{csrf_field()}}

    <div class="form-group">
      <div class="row">
        <div class="col">
          <label for="descripcion">Descripcion de video</label>
          <input type="text" value="{{$video->descripcion}}" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="URL">URL</label>
          <input type="text" value="{{$video->URL}}" id="URL" name="URL" class="form-control" placeholder="URL">
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
        <?php $idUnidad = session()->get('idUnidad'); ?>
        <a class="btn btn-outline-danger btn-lg btn-block btn-sm" href="{{action('VideoController@indexvideo', $idUnidad)}}" role="button">{{$btn_cancel}}</a>
      </div>
    </div>

  </form>
@endsection
