@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
<div class="container">
  <button type="button" class="btn btn-secondary btn-lg btn-block"> Herramienta Matem&aacute;tica - Inicio</button>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <!--<div class="card-header">Dashboard</div>-->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <img  src="../public/img/uca.png"/>

            </div>
        </div>
    </div>
</div>
@endsection