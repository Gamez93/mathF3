<!--****************************************************************************************************** -->
<!--OJO-->
<!--Los div editables tiene la particularidad que clonan hijo de su dom por lo que al tener un div crea mas div para editarse en este caso la aplicacion-->
<!--tiene un detalle que es si se elimina todo el contenido que contenga etiqueta <p> deja de funcionar la funcion para colocar el boton-->
<!--por lo que la siuiente funcion detecta que si el edito no tiene etiqueta p le inserta nuevamente para que siempre se pueda seguir usando -->

<!--****************************************************************************************************** -->
<script>
$(function(){
//si estoy sobre el div editor
$("#editor").mouseover(function(){
  if ( $("#noborrar").length > 0 ) { //si la etiqueta p con el id #noborrar se encuentra entonces puede reailzar el evento de colocar el boton
//			console.log('Yes content');
  } else {
//console.log('No content');
			//si se borra la etiqueta p con el id no boorar entonces se inserta nuevamente la etiqueta p con el id no borrar
			document.getElementById("editor").innerHTML= "<p id='noborrar'>Universidad Centroamericana &#34;Jos&eacute; Sime&oacute;n Cañas&#34;</<p>"


  }
});
});
</script>

<!--****************************************************************************************************** -->
<!--logica de calculo -->

<script>
//funcion: realizarparser() se encarga mediante ajax enviar el contenido selecionado mediante ctrl
// al archivo parser que es el que verifica que sea correcto los token y la sintaxis para el calculo
function realizaParser(valor){
	    var respuesta= ""
        var parametros = {
                "valor" : valor

        };
        $.ajax({async:false,
                data:  parametros, //datos que se envian a traves de ajax
                url:   '../public/Parser/parser.py', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                      // $("#resultado").html("Procesando, espere por favor...");
					  //alert("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

					 respuesta =  response;//recibo la respuesta del archivo parser


                }

        });

		return respuesta //retorno la respuesta del parser
}







//parser de token solo verifica que esten los tokens correctos

function verificaTokens(valor){
	    var respuesta= ""
        var parametros = {
                "valor" : valor

        };
        $.ajax({async:false,
                data:  parametros, //datos que se envian a traves de ajax
                url:   '../public/Parser/verificarTokens.py', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                      // $("#resultado").html("Procesando, espere por favor...");
					  //alert("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

					 respuesta =  response;//recibo la respuesta del archivo parser


                }

        });

		return respuesta //retorno la respuesta del parser
}



</script>



<script>


//evento para que solo se haga una vez por click + ctrl

	//evento donde llama la funcion
	//funcion eventoCalcular():,verifica la variable bandera llamarfuncion este en false para que pueda ser ejecutada una vez
		function eventoCalcular(){

				pressCTRL()//funcion con logica de envio de calculo

        }
		//creo variable contenido en vacio
		var contenido="";
        //creo variable texto vacio
		var texto="";

		//funcion pressCTRL(): encargado de generar el boton de calculo y atras al presionar el boton ctrl
			function pressCTRL() {
				$('p').hover(function () {//si estoy sobre una etiqueta <p>
					var $p = $(this); //genero varibale global
					var $r = $(this); //genero variable global
					document.onkeydown = function (e) { //si se genero el evento keydow con la letra ctrl
						if (e.ctrlKey  ) { //si se presiono la tecla ctrl y tambien la bandera llamarFuncion esta en false llamarFuncion==false
						 contenido = $p.text(); //obtengo el contenido que esta sobre el cursor
						 numero=0;
							if ($($p).find('button').length === 0 && $($r).find('button').length === 0){ //si no hay ningun boton en el div editor
								texto = document.getElementById("editor").innerHTML; //obtengo el contendo de editor para almacer y ser utulizado para regresar a un estado anterior
								//creo un boton el de calculor ../public/img/uca.png
								$($p).append('<button id="play" style="background:url(../public/img/6.png) no-repeat; border:none; width:51px; height:20px;position:center;"  title="'+contenido+'"  >'+""+'</button>');//creo el boton de calculo

								//creo el boton de atras
								$($r).append('<button id="regreso"  style="background:url(../public/img/7.png) no-repeat; border:none; width:51px; height:20px;position:center;"    >'+""+'</button>');//creo el boton de calculo
								//oculto el boton de atras para ser mostrado hasta que se genere el calculo
								//document.getElementById("regreso").style.visibility = "hidden";
								//bloqueo la bandera llamarFuncion con true asi no poder generar mas botones y solo ejecutar una vez este evento


							}


						}
					}
				});
			}
			//si presiona el boton de calcular
			$('#play ').live('click', function(){

				contenido= $("#play").attr("title")

				var funcion = contenido//obtengo el contenido que esta sobre el mouse nuevamente para realizar algunas validaciones
				var reemplazar=""


				// verificando tokens en el contenido
				// si hay algun token que no es correcto mostrara el error donde se cometio el problema

				var verifica_tokens= verificaTokens(contenido)


				if(verifica_tokens.search("Error") != -1 ){
					 texto = document.getElementById("editor").innerHTML;
					 verifica_tokens=verifica_tokens.split("Content-type:text/html").join(" ") //quitando este mensaje del error esta linea es para la compatibilidad

					//muestro un alert con el error que obtendo del parser
					Swal.fire({
						title: '<strong>Error de Sintaxis</strong>',
						type: 'error',
						html:
							'<p style="color:#FF0000";     >'+
							verifica_tokens +
							'</p> ',
							showCloseButton: true,
							animation: false,
							customClass: {
							popup: 'animated tada'
						}

					})

				//document.getElementById("regreso").remove();//remuevo el boton regreso sin ser ejecutado por el error
				$("#play").remove();//remuevo el boton
				$("#regreso").remove();//remuevo el boton
				}else{
					//aqui veo ya con el paser la funcion si es correcta si es derivada corto en la posicion 20 y verifico con el parser

					if(contenido.search("primera") != -1 ){
						funcionDerivadas=funcion.substr(20)
						var respuesta_parser_Derivadas = realizaParser(funcionDerivadas)

						if (respuesta_parser_Derivadas.search("Error") != -1 ){//si la respusta del parse contiene la palabra error entonces es por que hay algun error de token o de sintaxis por lo que no puede ser procesado en el calculo
							texto = document.getElementById("editor").innerHTML;
							respuesta_parser_Derivadas=respuesta_parser_Derivadas.split("Content-type:text/html").join(" ") //quitando este mensaje del error esta linea es para la compatibilidad

								//muestro un alert con el error que obtendo del parser
							Swal.fire({
								title: '<strong>Error de Sintaxis</strong>',
								type: 'error',
								html:
									'<p style="color:#FF0000";     >'+
									respuesta_parser_Derivadas +
										'</p> ',
									showCloseButton: true,
									animation: false,
									customClass: {
									popup: 'animated tada'
									}

								})

								//document.getElementById("regreso").remove();//remuevo el boton regreso sin ser ejecutado por el error
								$("#play").remove();//remuevo el boton
								$("#regreso").remove();//remuevo el boton
							}else{
								reemplazar = funcion.substr(20) //corto hasta donde esta la funcion
								funcion= funcion.substr(20)//corto hasta donde esta la funcion

							funcion=funcion.split("**").join("^")//reemplazo los ** del contenido por ^ en la funcion para el calculo

							//console.log(funcion)
							realizaProceso(contenido,funcion,reemplazar) //ejecuto la funcion que realiza el calculo con el contenido la funcion y la funcion reemplazada
							//document.getElementById("regreso").style.visibility = "visible";//muestro el boton de regreso
							//texto = document.getElementById("editor").innerHTML;
								$("#play").attr("value","");
								$("#play").remove();//remueve el boton de la pantalla
							}

						}
						else if(contenido.search("dominio") != -1){
							funcionDominio= funcion.substr(11) //para cortar la funcion del contenido
							var respuesta_parser_Dominio = realizaParser(funcionDominio)

								if (respuesta_parser_Dominio.search("Error") != -1 ){//si la respusta del parse contiene la palabra error entonces es por que hay algun error de token o de sintaxis por lo que no puede ser procesado en el calculo
									texto = document.getElementById("editor").innerHTML;
									respuesta_parser_Dominio=respuesta_parser_Dominio.split("Content-type:text/html").join(" ") //quitando este mensaje del error esta linea es para la compatibilidad

									//muestro un alert con el error que obtendo del parser
									Swal.fire({
										title: '<strong>Error de Sintaxis</strong>',
										type: 'error',
										html:
										'<p style="color:#FF0000";     >'+
										respuesta_parser_Dominio +
										'</p> ',
										showCloseButton: true,
										animation: false,
										customClass: {
										popup: 'animated tada'
										}

									})
								$("#play").remove();//remuevo el boton
								$("#regreso").remove();//remuevo el boton

								//document.getElementById("regreso").remove();//remuevo el boton regreso sin ser ejecutado por el error
								}else{
									reemplazar = funcion.substr(11) //para cortar la funcion del contenido
									funcion= funcion.substr(11) //para cortar la funcion del contenido

									funcion=funcion.split("**").join("^") // reemplazo ** de la funcion por ^


									realizaProceso(contenido,funcion,reemplazar) //ejecuto la funcion que realiza el calculo con el contenido la funcion y la funcion reemplazada
									//document.getElementById("regreso").style.visibility = "visible"; //muestro el boton regreso
									$("#play").attr("value","");
									$("#play").remove();//remueve el boton de la pantalla
									}
						}

						else if(contenido.search("limite") != -1){

									funcionLimite=funcion
									//limpiando previa de datos sucios del contenido
									if(funcionLimite.search("cuando") !=-1){
									fin=funcionLimite.search("cuando");
									funcionLimite= funcionLimite.substring(0,fin)
									}

							var respuesta_parser_limite = realizaParser(funcionLimite)

								if (respuesta_parser_limite.search("Error") != -1 ){//si la respusta del parse contiene la palabra error entonces es por que hay algun error de token o de sintaxis por lo que no puede ser procesado en el calculo
									texto = document.getElementById("editor").innerHTML;
									respuesta_parser_limite=respuesta_parser_limite.split("Content-type:text/html").join(" ") //quitando este mensaje del error esta linea es para la compatibilidad

									//muestro un alert con el error que obtendo del parser
									Swal.fire({
										title: '<strong>Error de Sintaxis</strong>',
										type: 'error',
										html:
										'<p style="color:#FF0000";     >'+
										respuesta_parser_limite +
										'</p> ',
										showCloseButton: true,
										animation: false,
										customClass: {
										popup: 'animated tada'
										}

									})
									$("#play").remove();//remuevo el boton
									$("#regreso").remove();//remuevo el boton

								//document.getElementById("regreso").remove();//remuevo el boton regreso sin ser ejecutado por el error
								}else{
									reemplazar = funcion.substr(11) //para cortar la funcion del contenido
									funcion= funcion.substr(10) //para cortar la funcion del contenido

									funcion=funcion.split("**").join("^") // reemplazo ** de la funcion por ^

									console.log("esto es lo que te envio de previa " + funcion)
									realizaProceso(contenido,funcion,reemplazar) //ejecuto la funcion que realiza el calculo con el contenido la funcion y la funcion reemplazada
									//document.getElementById("regreso").style.visibility = "visible"; //muestro el boton regreso
									$("#play").attr("value","");
									$("#play").remove();//remueve el boton de la pantalla


									}


						}


				}

			})
			//si presiona el boton de regreso se realiza el siguiente evento
			$('#regreso').live('click', function(){
				//remuevo el boton
				//$(this).remove();
				$("#editor").html(texto);//paso el texto anterior que tenia antes de ser ejecutado el calculo
				$("#play").remove();//remuevo el boton
				$("#regreso").remove();//remuevo el boton
			})
			//evento de boton regreso
			function regreso(){
				llamarFuncion= false;//variable bandera la regreso a false para que pueda ser utilizado nuevamente
				$("#editor").html(texto);//paso el texto anterior que tenia antes de ser ejecutado el calculo
				$("#play").remove();//remuevo el boton
				$("#regreso").remove();//remuevo el boton
			}

	</script>







<script>
//funcion realizarProceso() que envia el contenido del texto seleccionado para obetener la respuesta matematica
//enviar al archivo Lenguaje.py que es el que realiza el caculo de la funcion que envio
function realizaProceso(valor,previa,reemplazar){
        var parametros = {
                "valor" : valor

        };
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   '../public/Calculo/Lenguaje/Lenguaje.py', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                      // $("#resultado").html("Procesando, espere por favor...");
					  alert("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

					var contenido = valor;
					//se obtiene la respuesta del archivo lenguaje.py con la solucion del calculo
					var respuesta =  response;
					//cambiando el formato de python para ser mostrado en latex
					//quitando el ** por ^

					var funcion=respuesta.split("**").join("^")

					funcion =  funcion

					console.log(funcion)


					//limpiando previa de datos sucios del contenido
					console.log("esto es previa" + previa);
					if(previa.search("cuando") !=-1){
					fin=previa.search("cuando");
					previa= previa.substring(0,fin)
					}
					//console.log(fin)


					// la respuesta le paso por la funcion que me genera visualmente el formato latex
					//en r1 y r2 son las respuesta pero ya con formato latex que sera mostrado en el div de editor
					var r1 = katex.renderToString("\\newline\\newline Funcion: "+previa+ "\\newline ", {


					throwOnError: false
					});

					//limpiando si es limite datos sucios del contenido
					if(funcion.search("Limite") !=-1){
					finlimite=previa.search("Limite");
					funcion= funcion.substring(finlimite)
					}



				  var r2 = katex.renderToString(funcion, {
                   throwOnError: false
                  });

					// se concadena el contenido seleccionado por el usuario con la respuesta del calculo
					r = contenido.split(reemplazar).join("")//se quita la funcion sin latex y se concadena con la respuesta
					 r = r.concat( r1 + r2);

					// se obtiene todo el texto del div editar completo
					 var texto = document.getElementById("editor").innerHTML;
					// se busca y se remplaza el texto completo con la respuesta obtenida para concatenar con la informacion que se tenia previaente pero ya con la solucion del calculo
					 var todoTexto = texto.replace(contenido,r);
					//se ingresa nuevamente el texto al div editar y se muestra

					$("#editor").html(todoTexto);




                }

        });


}

   </script>




<!--****************************************************************************************************** -->

<script>
// funcion ayuda():muestra la ayuda con indicaciones de manejo del programa al presionar el boton de ayuda
	function ayuda() {

		//alert con la ayuda para el usuario
		Swal.fire({
					title: '<strong>AYUDA</strong>',
					type: 'success',
					html:
					'<p align="justify" >1-Para realizar una operacion: se tiene que seleccionar con el cursos la funcion y apretar el boton de grafica. </p>'+
					'<p  align="justify">2- Para graficar la funcion seleccionar la funcion con el cursos y apretar boton de ?. </p>'+
					'<p  align="justify">3- Para operar la funcion poner sobre la funcion el cursor y dar un click y presionar el boton ctrl.</p>'+
					'<p  align="justify">4-Sintaxis de ejecucion primera derivada de f(x) , dominio de f(x), limite de f(x) cuando x tiende a 0...9-infinito.</p>',

					showCloseButton: true,


						});

}
</script>

<!--****************************************************************************************************** -->







   <script>
// funcion graficar: funcion principal que ayuda a sustituir las diferencias de sintaxis entre sympy y math.js
	function graficar() {
    alert(1);
// variable contenido: obtiene la seleccion del usuario sombreando el texto que necesita, en este caso es la funcion a graficar
		var contenido = window.getSelection().anchorNode.data.substring( window.getSelection().anchorOffset,window.getSelection().extentOffset );
// variable funcion: la libreria para graficar tiene distinta sintaxis al de sumpy por lo que es necesario remplazar
// las diferencias entre las dos librerias en este caso se busca en el texto si colocaron ** que es elevar y lo sustituye por ^
		var funcion= contenido.replace("**","^");
//grafica la funcion en el div plot
		draw(funcion);
}
</script>



  	<script>
	var valor="0";
  function draw(valor) {
    try {

	  //aqui pongo el valor para graficar
      //var expression = document.getElementById('valor').value
	  var expression=valor;
      const expr = math.compile(expression)
	  // evalua la exprecion repetidamente para diferentes valores de x
     const xValues = math.range(-10, 10, 0.5).toArray()
     const yValues = xValues.map(function (x) {
     return expr.eval({x: x})
      })

      // grafica la grafica con la libreria
      const trace1 = {
        x: xValues,
        y: yValues,
        type: 'scatter'
      }
      const data = [trace1]
	  //plot es el div donde se va a colocar la grafica
      Plotly.newPlot('plot', data)
    }
    catch (err) {
      console.error(err);
      alert(err);
    }
  }
//id_boton_grafica: es el boton donde se va a realizar el evento de llamdado para realizar la grafica
    document.getElementById('id_boton_grafica').onsubmit = function (event) {
    event.preventDefault()
    draw(valor)
  }

  draw(valor)
</script>
