<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>mathF3</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- jquery-->
    <script src="{{ asset('bootstrap/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}" defer></script>

    <!-- bootstrap-->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>
    <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('bootstrap/css/katex.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/math.min.js') }}" ></script>
    <script src="{{ asset('bootstrap/js/jquery.min.1.4.2.js') }}" ></script>
    <script src="{{ asset('bootstrap/js/plotly-1.35.2.min.js') }}" ></script>
    <script src="{{ asset('bootstrap/js/katex.min.js') }}" ></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img src="{{ url('/icons/play.svg') }}" alt="" width="25" height="25" title="Usuario">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Herramienta Matem&aacute;tica
                    <br>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    <img src="{{ url('/icons/person.svg') }}" alt="" width="25" height="25" title="Usuario">

                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                        {{ __('Cerrar') }}

                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>

    </div>

    <!--Top bar con nombre de la UCA -->
    <div class="row">
      <div class="col-sm">
        @yield('topbar')
      </div>
    </div>
    <!-- Barra de division en blanco -->
    <div class="row">
      <div class="col-sm">

        <!-- Alerta de errores
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>mathF3:</strong> {{ $error }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endforeach
        @endif -->

        <!-- Alerta de success -->
        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>mathF3:</strong> {{session()->get('message')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <br>
      </div>
    </div>

    <div class="row ">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
      <!--Seccion de Menu de navegacion -->
      <div class="col-sm-2 mb-3" >
        <!-- Seccion de Menu-->
        <div class="row" >
          <div class="col-sm-12" >
            @yield('sidebar')
          </div>
        </div>

        <!-- Seccion de Anotaciones-->
        <div class="row" >
          <div class="col-sm-12" >
            <!--seccion de anotaciones en Clases -->
            @yield('anotaciones')
            <!-- Alerta de errores -->
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>mathF3:</strong> {{ $error }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endforeach
            @endif
          </div>
        </div>
      </div>

      <!-- Seccion de contenido-->
      <div class="col-sm-6 mb-3">
        @yield('content')
      </div>

      <!-- Seccion de Graficas-->
      <div class="col-sm-4 mb-3" >
        <!-- Seccion de grafica-->
        <div class="row" >
          <div class="col-sm-12" >
            @yield('graf')
          </div>
        </div>
        <!-- Seccion de calculadora-->
        <div class="row" >
          <div class="col-sm-12" >
            @yield('calculadora')
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-sm">

        @yield('footer')

      </div>
    </div>

</body>
</html>
