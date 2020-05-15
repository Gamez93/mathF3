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
      <a class="btn btn-outline-success btn-block" href="{{url('bibliografia/create')}}" role="button">{{$btn_add ?? ''}}</a>
      <br>
      <table id="dtBasicExample" class="table table-hover table-sm ">
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
        <?php $i = ($bibliografias->currentpage()-1) * $bibliografias->perpage() + 1; ?>
        @if($bibliografias->count())
        {{ $bibliografias->links() }}
        @foreach($bibliografias as $bibliografia)
        <tr>
          <th scope="row">{{$i++}}</th>
          <td>{{$bibliografia->materia->nombre}}</td>
          <td>{{$bibliografia->descripcion}}</td>
          <td> <a href="{{$bibliografia->URL}}" target="_blank">{{$bibliografia->URL}}</a></td>
          <td>
            <a class="btn btn-outline-primary btn-sm" href="{{action('BibliografiaController@edit', $bibliografia)}}" role="button">Editar</a>
          </td>
          <td>
            <form action="{{ route('bibliografia.destroy', $bibliografia->id) }}" method="POST">
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
