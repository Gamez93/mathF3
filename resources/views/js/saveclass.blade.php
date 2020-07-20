<!--funcion que guarda en la base de datos tabla clases -->
<script>
	function saveContenido() {
		var contenido = document.getElementById("editor").innerHTML;

		var texto=contenido.split("<p>").join("$$"); //agrego formato de archivo math de apertura
					texto=texto.split("</p>").join("##"); //agrego formato de archivo math de cierre
					texto = texto.replace(/{(?:.|\n)*?}/gm, '');
					texto=texto.split("Funcion").join("");
					texto=texto.split("\\newline").join("");
					texto=texto.split(" \\,a \\,Derivar\\,, Paso \\,a \\,Paso:").join("");
					texto=texto.split("\\textcolor").join("");


		$("#contenido").val(texto);
	}
</script>
