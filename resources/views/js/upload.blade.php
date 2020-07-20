
<!--lee archivo txt y lo muestra SI LO OCUPA-->
 <script>
//funcion para leer un archivo de texto con formato math

 function leerArchivo(e) {
  var archivo = e.target.files[0];

  if (!archivo) {
    return;
  }
  var lector = new FileReader();
  lector.onload = function(e) {
    var contenido = e.target.result; //obtengo el contenido del archivo
	var texto=contenido.split("$$").join("<p>"); //reemplazo las etiquelas $$ y $$. por <p> y </p> para que pueda ser utilizadas nuevamente para colocar el boton
	 texto=texto.split("##").join("</p>");

    mostrarContenido(texto);//mando a llamar la funcion mostrar contenido con el texto correcto
  };
  lector.readAsText(archivo);

  $('#ModalUpload').modal('hide')
}

function mostrarContenido(contenido) {
  //var elemento = document.getElementById('editor').innerText;
  //$("#editor").html(contenido).innerText;
  document.getElementById('editor').innerHTML = contenido;//paso el contenido al editor div, que guarda todo el contenido
  var modal = document.getElementById("myModal"); //llamo al modal que es para subir el arhivo
  $("#file-input").val('');
  modal.style.display = "none"; //cierro al modal al subirse el archivo
  $("#vertical-menu").load(' #vertical-menu'); //refresco el div verdical-menu para que se muestre automaticamente
}

document.getElementById('file-input').addEventListener('change', leerArchivo, false);

 </script>
