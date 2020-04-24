@extends('layouts.app')

<<<<<<< HEAD
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
=======
@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
<div class="container">
  <button type="button"  class="btn btn-secondary btn-lg btn-block">
    Herramienta Matem&aacute;tica
  </button>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <!--<div class="card-header">Dashboard</div>-->
>>>>>>> a27f707eaedc78d8e9576770cfb6f7f5e730ba02

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<<<<<<< HEAD

                    <h1>Example heading <span class="badge badge-secondary">New</span></h1>
                </div>
=======
                </div>
                <img  src="../public/img/uca.png" class="rounded img-fluid" alt="Responsive image"/>

>>>>>>> a27f707eaedc78d8e9576770cfb6f7f5e730ba02
            </div>
        </div>
    </div>
</div>
@endsection
