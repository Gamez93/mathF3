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

  @foreach($bibliografias as $bibliografia)
    <div class="card mb-1">
      <div class="card-body">
        <h5 class="card-title">{{$bibliografia->descripcion}}</h5>
        <a href="{{$bibliografia->URL}}" target="_blank" class="card-link">{{$bibliografia->URL}}</a>
      </div>
    </div>
  @endforeach
@endsection
