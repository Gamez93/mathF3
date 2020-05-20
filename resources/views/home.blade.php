@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
<div class="container">
  <button type="button"  class="btn btn-outline-dark btn-lg btn-block text-dark" disabled>
    Herramienta Matem&aacute;tica
  </button>
  <br>
    <div class="row justify-content-center">
        <div class="col-md-4 ">
            <div class="card border-secondary" style="width: 16rem; height: 17rem">
                <!--<div class="card-header">Dashboard</div>-->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <img  src="../public/img/uca.png" class="rounded img-fluid" alt="Responsive image"/>

            </div>
        </div>
    </div>
</div>
@endsection
