@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')

    <button type="button"  class="btn btn-secondary btn-lg btn-block">
      {{$title ?? ''}}
    </button>
    <br>
    <div class="table-responsive">
      <a class="btn btn-outline-success btn-block" href="{{url('unidad/create')}}" role="button">{{$btn_add ?? ''}}</a>
      <br>
      <table id="dtBasicExample" class="table table-hover table-sm ">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Materia</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = ($unidades->currentpage()-1) * $unidades->perpage() + 1; ?>
        @if($unidades->count())
        {{ $unidades->links() }}
        @foreach($unidades as $unidad)
        <tr>
          <th scope="row">{{$i++}}</th>
          <td>{{$unidad->materia->nombre}}</td>
          <td>{{$unidad->nombre}}</td>
          <td>{{$unidad->descripcion}}</td>
          <td>
            <a class="btn btn-outline-primary btn-sm" href="{{action('UnidadController@edit', $unidad)}}" role="button">Editar</a>
          </td>
          <td>
            <form action="{{ route('unidad.destroy', $unidad->id) }}" method="POST">
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
    <a class="btn btn-outline-danger btn-block" href="{{action('MateriaController@edit', $id)}}" role="button">Cancelar</a>
@endsection

@section('footer')
<script type="text/javascript">

</script>
@endsection
