<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>mathF3</title>

<<<<<<< HEAD
    <!-- Scripts
    <script src="{{ asset('js/app.js') }}" defer></script>
    -->
=======
>>>>>>> a27f707eaedc78d8e9576770cfb6f7f5e730ba02
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<<<<<<< HEAD
    <!-- Styles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      -->

<!-- jquery
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
-->
<script src="{{ asset('bootstrap/js/jquery.min.js') }}" defer></script>
<script src="{{ asset('bootstrap/js/popper.min.js') }}" defer></script>

<!-- bootstrap-->
<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>

<!--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
-->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
=======
    <!-- jquery-->
    <script src="{{ asset('bootstrap/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>

    <!-- bootstrap-->
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet">

</head>
<body>
  <div class="">
    <div class="row">
      <div class="col-sm"><nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="../public/icons/play.svg" alt="" width="30" height="30" title="mathF3">
>>>>>>> a27f707eaedc78d8e9576770cfb6f7f5e730ba02
                    Herramienta Matem&aacute;tica
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
<<<<<<< HEAD
=======
                                    <img src="../public/icons/person.svg" alt="" width="25" height="25" title="Usuario">
>>>>>>> a27f707eaedc78d8e9576770cfb6f7f5e730ba02
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
<<<<<<< HEAD
                                        {{ __('Logout') }}
=======
                                        {{ __('Cerrar') }}
>>>>>>> a27f707eaedc78d8e9576770cfb6f7f5e730ba02
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
<<<<<<< HEAD
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
=======
        </nav></div>
    </div>
    <div class="row">
      <div class="col-sm">
        @yield('topbar')
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <br>
      </div>
    </div>
    <div class="row">

      <!--Seccion de Menu de navegacion -->
      <div class="col col-lg-2" >
        <!-- Seccion de Menu-->
        <div class="row" >
          <div class="col-sm-12" >
            @yield('sidebar')
          </div>
        </div>

        <!-- Seccion de Anotaciones-->
        <div class="row" >
          <div class="col-sm-12" >
            @yield('anotaciones')
          </div>
        </div>
      </div>

      <!-- Seccion de contenido-->
      <div class="col col-lg-6">
        @yield('content')
      </div>

      <!-- Seccion de Graficas-->
      <div class="col col-lg-4" >
        @yield('graf')
      </div>
    </div>

    <!--footer-->
    <div class="row">
      <div class="col-sm">
        @yield('footer')
      </div>
    </div>
</div>
>>>>>>> a27f707eaedc78d8e9576770cfb6f7f5e730ba02

</body>
</html>
