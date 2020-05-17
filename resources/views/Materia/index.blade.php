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
      <a class="btn btn-outline-success btn-block" href="{{url('materia/create')}}" role="button">{{$btn_add ?? ''}}</a>
      <br>
      <table id="dtBasicExample" class="table table-hover table-sm ">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Codigo</th>
          <th scope="col">Unidades valorativas</th>
          <th scope="col">Num. de Orden</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = ($materias->currentpage()-1) * $materias->perpage() + 1; ?>
        @if($materias->count())
        {{ $materias->links() }}
        @foreach($materias as $materia)
        <tr>
          <th scope="row">{{$i++}}</th>
          <td>{{$materia->nombre}}</td>
          <td>{{$materia->codigo_materia}}</td>
          <td>{{$materia->unidadesValorativas}}</td>
          <td>{{$materia->numeroDeOrden}}</td>
          <td>
            <a class="btn btn-outline-primary btn-sm" href="{{action('MateriaController@edit', $materia->id)}}"  role="button">Editar</a>
          </td>
          <td>
            <form action="{{ route('materia.destroy', $materia->id) }}" method="POST">
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
@endsection

@section('footer')
<script type="text/javascript">

</script>
@endsection
