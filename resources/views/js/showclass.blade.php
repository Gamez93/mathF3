
<?php
    //index al entrar a clases
    
    $idClaseActual = session()->get('idClaseActual');
 ?>

<script type="application/javascript">

  $(document).ready(function() {
      showclass({{$idClaseActual}});
  });

  function showclass(id){
    var parametros = {
              "id": id,
              "_token": "{{ csrf_token() }}",
    };
    $.ajax({
           data:  parametros, //datos que se envian a traves de ajax
           url: '/mathF3/public/ajaxshow',
           type: 'post',
           success: function (response) {//una vez que el archivo recibe el request lo procesa y lo devuelve
   var contenido= response;//paso la respuesta a variable contenido
   var texto=contenido.split("$$").join("<p>"); //reemplazo las etiquelas $$ y $$. por <p> y </p> para que pueda ser utilizadas nuevamente para colocar el boton
         var texto2=texto.split("##").join("</p>");
           document.getElementById('editor').innerHTML = texto2;
           },
           error: function (data) {
               console.log(data);
           }
       })

       //seteamos en el input de guardar el id de clase seleccionado
       $("#idclase").val(id);

  }

</script>
