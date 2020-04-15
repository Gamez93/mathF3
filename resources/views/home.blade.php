@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
<div class="container">
  <button type="button"  class="btn btn-secondary btn-lg btn-block"> Herramienta Matem&aacute;tica - Inicio</button>
  <a href="{{ route('hoja') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Primary link</a>
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

                <img  src="../public/img/uca.png" class="rounded"/>

            </div>
        </div>
    </div>
</div>
@endsection
