<div id="side_menu" class="dropdown-menu-left">

  <!--
  <h6 class="dropdown-header">
    <img src="{{ url('/icons/justify.svg') }}" alt="" width="30" height="30" title="Menu">
    MENU
  </h6>-->
  <div class="dropdown-divider"></div>
  <div class="dropdown-divider"></div>

  <a id="menu1" class="dropdown-item {{ URL::route('home') === URL::current() ? 'active' : '' }}" href="{{ route('home') }}" click="changeClass(1);">
    <img src="{{ url('/icons/house.svg') }}" alt="" width="25" height="25" title="Inicio">
     INICIO</a>
  <div class="dropdown-divider"></div>

  <a class="dropdown-item {{ URL::route('hoja') === URL::current() ? 'active' : '' }}" href="{{ route('hoja') }}" onclick="changeClass(2);">
    <img src="{{ url('/icons/pencil.svg') }}" alt="" width="25" height="25" title="Clases">
    CLASES</a>
  <div class="dropdown-divider"></div>

  <a class="dropdown-item " href="{{action('MateriaController@showlist', 1)}}">
    <img src="{{ url('/icons/film.svg') }}" alt="" width="25" height="25" title="Multimedia">
    MULTIMEDIA</a>
  <div class="dropdown-divider"></div>

  <a class="dropdown-item " href="{{action('MateriaController@showlist', 2)}}">
    <img src="{{ url('/icons/bookmarks.svg') }}" alt="" width="25" height="25" title="Multimedia">
    BIBLIOGRAFIA</a>
  <div class="dropdown-divider"></div>

  <a class="dropdown-item {{ URL::route('materia') === URL::current() ? 'active' : '' }}" href="{{ route('materia') }}">
      <img src="{{ url('/icons/book.svg') }}" alt="" width="25" height="25" title="Multimedia">
      MATERIAS</a>
  <div class="dropdown-divider"></div>
  <div class="dropdown-divider"></div>

</div>
