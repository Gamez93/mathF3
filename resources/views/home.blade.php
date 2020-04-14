@extends('layouts.app')

@section('sidebar')
<div class="container">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Clases
                          </a>
                      </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                      </div>
                  </div>
              </div>

              <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingTwo">
                      <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Multimedia
                          </a>
                      </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="panel-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                      </div>
                  </div>
              </div>

              <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Opciones
                          </a>
                      </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                      <div class="panel-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                      </div>
                  </div>
              </div>
          </div>
        </div>
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
