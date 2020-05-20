@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
<div class="container">
  <button type="button" class="btn btn-outline-dark btn-lg btn-block text-dark mb-1" disabled>
    <img src="../public/icons/film.svg" alt="" width="25" height="25" title="Multimedia">
    Multimedia
  </button>

</div>
@endsection
