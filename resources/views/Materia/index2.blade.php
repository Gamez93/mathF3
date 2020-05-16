@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('topbar')
  @include('layouts.topbar')
@endsection

@section('content')
<button type="button"  class="btn btn-secondary btn-lg btn-block">
  Herramienta Matem&aacute;tica
</button>
<div class="container">
  <div class="row row-cols-3">

    @foreach($materias as $materia)
      <div class="col" >
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">{{$materia->nombre}} {{$materia->seleccion}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Codigo: {{$materia->codigo_materia}}</h6>
            <p class="card-text">{{$materia->descripcion}}</p>
            <!--<a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>-->

            <div class="form-check form-check-inline">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
              <input onclick="saveSeleccion('{{$materia->id}}');" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="{{$materia->seleccion}}">
              <label class="form-check-label" for="inlineRadio1">{{$materia->id}}</label>
            </div>

          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection

@section('footer')
<script>

function saveSeleccion(id)
{
  var $post = {};
	var dato = 1;
  var value = id;
  var route = "http://localhost:80/mathF3/public/updateFromRB"//+id+"";
  var token = $("#token").val();

  $post.id = id;
  $post.seleccion = dato;
  $post._token = token;
  //alert($post._token);
  $.ajax({
    url: route,
    //headers: {'X-CSRF-TOKEN': token},
    type: 'post',
    dataType: 'json',
    //contentType: "application/json; charset=utf-8",
    data: $post,//{"id":value,"seleccion": dato}
    error: function(mensaje){
    alert(mensaje.val);

    }

  });
}

function getMessage() {
            $.ajax({
               type:'POST',
               url:'/getmsg',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                  $("#msg").html(data.msg);
               }
            });
         }

</script>


@endsection
