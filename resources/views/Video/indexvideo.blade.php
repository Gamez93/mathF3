@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
    <button type="button"  class="btn btn-outline-dark btn-lg btn-block text-dark mb-1" disabled>
      {{$title ?? ''}}
    </button>
    <br>
    <div class="table-responsive">
      <a class="btn btn-outline-success btn-block" href="{{url('video/create')}}" role="button">{{$btn_add ?? ''}}</a>
      <br>
      <table id="dtBasicExample" class="table table-hover table-sm ">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Materia</th>
          <th scope="col">Unidad</th>
          <th scope="col">Descripcion</th>
          <th scope="col">URL</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = ($videos->currentpage()-1) * $videos->perpage() + 1; ?>
        @if($videos->count())
        {{ $videos->links() }}
        @foreach($videos as $video)
        <tr>
          <th scope="row">{{$i++}}</th>
          <td>{{$video->unidad->materia->nombre}}</td>
          <td>{{$video->unidad->nombre}}</td>
          <td>{{$video->descripcion}}</td>
          <td><a href="{{$video->URL}}" target="_blank">{{$video->URL}}</a></td>

          <td>
            <a class="btn btn-outline-primary btn-sm" href="{{action('BibliografiaController@edit', $video)}}" role="button">Editar</a>
          </td>
          <td>
            <form action="{{ route('bibliografia.destroy', $video->id) }}" method="POST">
               {{csrf_field()}}
               {{ method_field('DELETE') }}
               <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
            </form>
           </td>
        </tr>
        @endforeach
        @else
        <tr>
         <td colspan="8">No hay registros</td>
        </tr>
        @endif
        </tbody>
      </table>
    </div>
    <br>
    <?php $id=session()->get('idMateria'); ?>
    <a class="btn btn-outline-danger btn-block" href="{{action('VideoController@index', $id)}}" role="button">Cancelar</a>

@endsection
