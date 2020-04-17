@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
<div class="container">
  <button type="button" class="btn btn-secondary btn-lg btn-block">
    <img src="../public/icons/file-text.svg" alt="" width="25" height="25" title="Hoja">
    Hoja de Estudio
  </button>

</div>
@endsection

@section('graf')
  <button type="button" class="btn btn-primary btn-lg btn-block">
    <img src="../public/icons/graph-up.svg" alt="" width="25" height="25" title="Hoja">
    Graficas
  </button>
@endsection
