@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')

    <button type="button"  class="btn btn-secondary btn-lg btn-block">
      {{$title}}
    </button>
    <br>
    <div class="table-responsive">
      <a class="btn btn-outline-success btn-block" href="{{url('bibliografia/create')}}" role="button">{{$btn_add}}</a>
      <br>
      <table class="table table-hover table-sm">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Materia</th>
          <th scope="col">Descripcion</th>
          <th scope="col">URL</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        @if($bibliografias->count())
        @foreach($bibliografias as $bibliografia)
        <tr>
          <th scope="row">{{$i++}}</th>
          <td>{{$bibliografia->materia->nombre}}</td>
          <td>{{$bibliografia->descripcion}}</td>
          <td>{{$bibliografia->URL}}</td>
          <td>
            <a class="btn btn-outline-primary" href="{{action('MateriaController@edit', $bibliografia->id)}}" role="button">Editar</a>
          </td>
          <td>
            <form action="{{action('BibliografiaController@destroy', $bibliografia->id)}}" method="post">
             {{csrf_field()}}
             <input name="_method" type="hidden" value="DELETE">
             <button type="submit" class="btn btn-outline-danger">Eliminar</button>
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


@endsection
