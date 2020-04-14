@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('content')
<div class="container">
  <button type="button" class="btn btn-secondary btn-lg btn-block">Hoja de Estudio</button>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('graf')
  <button type="button" class="btn btn-primary btn-lg btn-block">Graficas</button>
@endsection
