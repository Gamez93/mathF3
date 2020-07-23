#!C:\Python27\python.exe
# -*- coding: utf-8 -*-
##Para compatibilidad en windows si se va a utilizar en linux cambiar a la carpeta dondes esta instalado python
print "Content-type:text/html\r\n\r\n"

##Import para envio de datos post con el navegador
import cgi,cgitb
##Import de la libreria de sympy

#Se importa libreria ply.lex que apoyara en la deteccion de tokens
import ply.lex as lex

#Lista principal de tokens
tokens = (

	#Palabras Reservadas
    'sen',
    'sin',
	'sqrt',
    'cos',
    'tan',
	'cot',
	'sec',
	'csc',
    'arcsen',
    'arcsin',
    'arccos',
    'arctan',
    'senh',
    'sinh',
    'cosh',
    'tanh',
	'coth',
	'sech',
	'csch',
    'SIN',
    'SEN',
    'COS',
    'TAN',
    'exponencial',
	'pi',
    'logaritmoNatural',
    'variable',
	'derivada',
	'limite',
	'cuando',
	'vale',
	'infinito',
	'la',
	'el',
    'de',
	'primera',
	'segunda',
    'tercera',
    'cuarta',
	'uno',
	'dos',
	'tres',
	'cuatro',
	'cinco',
	'seis',
	'siete',
	'ocho',
	'nueve',
	'diez',
	'cero',
    'dominio',
    'ENTERO',

	#Algunos simbolos utilizados
	'PLUS',
	'MINUS',
	'TIMES',
	'DIVIDE',
    'POW',
    'MOD',
	'LESS',
	'LESSEQUAL',
	'GREATER',
	'GREATEREQUAL',
	'EQUAL',
	'DEQUAL',
	'DISTINT',
	'LPAREN',
	'RPAREN',
	'LBRACKET',
	'RBRACKET',
	'LBLOCK',
	'RBLOCK',
    'POINT',

	#Otros tokens
   'palabraomitir',
	'NUMBER',
   'int',
   'number'
)

#Algunas expresiones regulares para ciertos tokens en especial la parte de simbolos
t_PLUS 	 = r'\+'
t_MINUS	 = r'-'
t_TIMES  = r'\*'
t_DIVIDE = r'/'
t_MOD = r'\%'
t_POW = r'(\*{2} | \^)'
t_EQUAL  = r'='
t_LESS 	 = r'<'
t_GREATER = r'>'
t_LPAREN = r'\('
t_RPAREN  = r'\)'
t_LBRACKET = r'\['
t_RBRACKET = r'\]'
t_LBLOCK   = r'{'
t_RBLOCK   = r'}'
t_POINT = r'.'

#Expresiones regulares màs extensas para otros tokens

#EXpresion regular para palabra reservada: derivada
def t_derivada(t):
    r'derivada'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: la
def t_la(t):
    r'la'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: el
def t_el(t):
    r'el'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: de
def t_de(t):
    r'de'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: dominio
def t_dominio(t):
    r'dominio'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: limite
def t_limite(t):
    r'limite'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresión regular para palabra reservada: cuando
def t_cuando(t):
    r'cuando'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: vale
def t_vale(t):
    r'vale'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: infinito
def t_infinito(t):
    r'infinito'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: uno
def t_uno(t):
    r'uno'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: dos
def t_dos(t):
    r'dos'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expreseion regular para palabra reservada: tres
def t_tres(t):
    r'tres'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: cuatro
def t_cuatro(t):
    r'cuatro'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: cinco
def t_cinco(t):
    r'cinco'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: seis
def t_seis(t):
    r'seis'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: siete
def t_siete(t):
    r'siete'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: ocho
def t_ocho(t):
    r'ocho'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: nueve
def t_nueve(t):
    r'nueve'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: diez
def t_diez(t):
    r'diez'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: cero
def t_cero(t):
    r'cero'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: primera
def t_primera(t):
    r'primera'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: segunda
def t_segunda(t):
    r'segunda'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: tercera
def t_tercera(t):
    r'tercera'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: cuarta
def t_cuarta(t):
    r'cuarta'
    pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para palabra reservada: sinh
def t_sinh(t):
    r'sinh'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: senh
def t_senh(t):
    r'senh'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: cosh
def t_cosh(t):
    r'cosh'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: tanh
def t_tanh(t):
    r'tanh'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada:	coth
def t_coth(t):
    r'coth'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: sech
def t_sech(t):
    r'sech'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: csch
def t_csch(t):
    r'csch'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: SIN
def t_SIN(t):
    r'SIN'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: COS
def t_COS(t):
    r'COS'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: TAN
def t_TAN(t):
    r'TAN'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: sin
def t_sin(t):
    r'sin'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: sen
def t_sen(t):
    r'sen'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: cot
def t_cot(t):
    r'cot'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: sec
def t_sec(t):
    r'sec'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: csc
def t_csc(t):
    r'csc'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: sqrt
def t_sqrt(t):
    r'sqrt'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: cos
def t_cos(t):
    r'cos'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: tan
def t_tan(t):
    r'tan'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: arcsen
def t_arcsen(t):
    r'arcsen'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: arcsin
def t_arcsin(t):
    r'arcsin'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: arccos
def t_arccos(t):
    r'arccos'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: arctan
def t_arctan(t):
    r'arctan'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: e o exponencial
def t_exponencial(t):
    r'e'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: pi
def t_pi(t):
    r'pi'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: ln o logaritmo natural
def t_logaritmoNatural(t):
    r'ln'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para una letra de la A a Z minusculas o mayuscalas que se tomará como variable
def t_variable(t):
    r'[a-zA-Z]{1}'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para identificar cualquier digito o numero
def t_NUMBER(t):
	r'\d+'
	t.value = int(t.value) #Castea valor a entero
	return t #Devuelve la definicion o expresion de la palabra reservada dentro de la funcion

#Expresion regular para cualquier conjunto de letras que formen palabras fuera de las ya detectadas como reservadas
def t_palabraomitir(t):
	r'\w+(_\d\w)*'
	pass#Permite hacer caso omiso, ya que este token queremos que sea detectado pero no impreso en la salida

#Expresion regular para simbolo: <= (menor o igual)
def t_LESSEQUAL(t):
	r'<='
	return t #Devuelve la definicion o expresion de la palabra reservada dentro de la funcion

#Expresion regular para simbolo: >= (mayor o igual)
def t_GREATEREQUAL(t):
	r'>='
	return t #Devuelve la definicion o expresion de la palabra reservada dentro de la funcion

#Expresion regular para simbolo: == o de comparacion
def t_DEQUAL(t):
	r'=='
	return t #Devuelve la definicion o expresion de la palabra reservada dentro de la funcion

#Expresion regular para simbolo: != o distinto
def t_DISTINT(t):
	r'!='
	return t #Devuelve la definicion o expresion de la palabra Reservada dentro de la funcion

#Expresion regular que detecta nueva linea
def t_newline(t):
	r'\n+'
	t.lexer.lineno += len(t.value)#Agrega el valor de longitud

#Ignorar
t_ignore = ' \t'#Ignora todos los simbolos dentro de t_ignore en este caso solo la tabulacion

#Otras expresiones regulares

#Deteccion de algun error lexico
def t_error(t):
	print ("Error léxico: " + str(t.value[0]))#Imprime el error encontrado y su posicion
	t.lexer.skip(1)#Salta dicho error

#Definicion que ira probando la entrada dada a la funcion
def test(data, lexer):
	lexer.input(data)
	while True:#Se seguira ejecutando hasta encontrar algo que no sea un token
		tok = lexer.token()
		if not tok:
			break
		print (tok)#Imprime los tokens

#Creacion del lexer
lexer = lex.lex()

# Fragmento de código que corre el Lexer automáticamente para hacer las pruebas que se consideren necesarias en consola
# Permite verificar que el lexer esté funcionando de manera correcta

if __name__ == '__main__':

	# Test
	data = '''
		/* comentario
   			de varias lineas
		*/
    mate
	1+1
   sin(x)
   sen(x)

   3 + 4 * 10
  + sin(x) *2
	'''

	#Constructor del lexer y llamado a test para que verifique la apertura del archivo
	lexer.input(data)
	test(data, lexer)
