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
          <!--
          <th scope="col">Ver</th>-->
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
          <!--<td><a class="btn btn-outline-success btn-sm" href="#" role="button">Ver</a></td>-->
          <td>
            <a class="btn btn-outline-primary btn-sm" href="{{action('MateriaController@edit', $materia->id)}}"  role="button">Editar</a>
          </td>
          <td>
            <form action="{{ route('materia.destroy', $materia->id) }}" method="POST">
               {{csrf_field()}}
               {{ method_field('DELETE') }}
               <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Estás seguro que deseas eliminar esta Materia?');">Eliminar</button>
            </form>
            <!--
            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
              Eliminar
            </button>
          -->
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

    <!-- Modal
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Materia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-outline-primary btn-sm">Confirmar</button>
          </div>
        </div>
      </div>
    </div>-->
@endsection

@section('graf')
<div class="alert alert-info alert-dismissible fade show w-75" role="alert">
   Para administrar el contenido de una materia, hacer clic en <strong>"Editar"</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="alert alert-warning alert-dismissible fade show w-75" role="alert">
   <strong>Eliminar</strong> una "Materia" tambien elimina su contenido asociado, Unidades, Bibliografia y Videos.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endsection

@section('footer')
<script type="text/javascript">

</script>
@endsection
