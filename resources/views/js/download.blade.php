
<!--Logica Para Descargar Archivos de clase-->
<script>
  //Funcion para descragar archivos de clase
  document.getElementById('descargar_txt').addEventListener('click', function () {
    var datos = obtenerDatos();
    descargarArchivo(generarTexto(datos), "{{$clase->tema}}"+'.math');//para cambiar el nombre del archivo y la extension
  }, false);

  //Función de ayuda: reúne los datos a exportar en un solo objeto
  function obtenerDatos() {
  	//reemplazo el contenido de latex y le doy el formato $$ ## del archivo de texto .math
  	var contenido= document.getElementById("editor").innerHTML
  	//var texto = contenido.replace(/<[^>]*>?/g, '');
  	var texto=contenido.split("<p>").join("$$");//agregando etiqueta de apertura $$
  	 texto=texto.split("</p>").join("##"); //agregando etiqueta de cierre ##
       texto = texto.replace(/{(?:.|\n)*?}/gm, '');
  	 texto=texto.split("Funcion").join("");
  	  texto=texto.split("\\newline").join("");
  	 texto=texto.split(" \\,a \\,Derivar\\,, Paso \\,a \\,Paso:").join("");
  	  texto=texto.split("\\textcolor").join("");
      return {
          nombre: texto  ,
      };
  };

  function descargarArchivo(contenidoEnBlob, nombreArchivo) {
    var reader = new FileReader();
    reader.onload = function (event) {
        var save = document.createElement('a');
        save.href = event.target.result;
        save.target = '_blank';
        save.download = nombreArchivo || 'archivo.math';
        var clicEvent = new MouseEvent('click', {
            'view': window,
                'bubbles': true,
                'cancelable': true
        });
        save.dispatchEvent(clicEvent);
        (window.URL || window.webkitURL).revokeObjectURL(save.href);
    };
    reader.readAsDataURL(contenidoEnBlob);
  };

  //Genera un objeto Blob con los datos en un archivo TXT
  function generarTexto(datos) {
    var texto = [];
    texto.push(datos.nombre);
    texto.push('\n');

    //El contructor de Blob requiere un Array en el primer parámetro
    //así que no es necesario usar toString. el segundo parámetro
    //es el tipo MIME del archivo
    return new Blob(texto, {
        type: 'text/plain'
    });
  };
</script>
