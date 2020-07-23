#!C:\Python27\python.exe
# -*- coding: utf-8 -*-
##Para compatibilidad en windows si se va a utilizar en linux cambiar a la carpeta donde esta instalado python
print "Content-type:text/html\r\n\r\n"

##import para envio de datos post con el navegador
import cgi,cgitb
## import de la libreria de sympy
# -*- coding: utf-8 -*-
from sympy import *
import sympy as syp

cgitb.enable() #for debugging
form = cgi.FieldStorage()
##name es la variable que se obtiene de la funcion
name = form.getvalue('valor')






import ply.lex as lex
resultado_lexema = []
# list of tokens
tokens = (

	
	'derivada',
	'cuando',
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
        'sech',
        'tanh',
        'coth',
        'csch',
        'h',
        'exponencial',
	'pi',
        'logaritmoNatural',
        'limite',
        'x',
		'a',
        'vale',
	'infinito',
	'la',
        'el',
        'de',
	'primera',
        'l',
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
        'tiende',
        'AMPERSAN', 
	
	
	'PLUS',
	'MINUS',
	'TIMES',
	'DIVIDE',
	'LESS',
	'LESSEQUAL',
	'GREATER',
        'NUMERAL',
	'GREATEREQUAL',
	'EQUAL',
	'DEQUAL',
	'DISTINT',
	'SEMICOLON',
	'COMMA',
	'LPAREN',
	'RPAREN',
	'LBRACKET',
	'RBRACKET',
	'LBLOCK',
	'RBLOCK',
        'PLUSPLUS',
        'MINUSMINUS',
      
        'AND',
        'OR',
        'NOT',
        
		
	
	'NUMBER',
        
        'FLOAT',
)


t_PLUS 	 = r'\+'
t_MINUS	 = r'-'
t_TIMES  = r'\*'
t_DIVIDE = r'/'
t_EQUAL  = r'='
t_AMPERSAN = r'\&'

t_LESS 	 = r'<'
t_GREATER = r'>'
t_SEMICOLON = ';'
t_COMMA	 = r','
t_LPAREN = r'\('
t_RPAREN  = r'\)'
t_LBRACKET = r'\['
t_RBRACKET = r'\]'
t_LBLOCK   = r'{'
t_RBLOCK   = r'}'
t_AND = r'\&\&'
t_OR = r'\|{2}'
t_NOT = r'\!'


def t_derivada(t):
	r'derivada'
	return t

def t_cuando(t):
	r'cuando'
	return t


	
def t_NUMBER(t):
	r'\d+'
	t.value = int(t.value)
	return t


def t_LESSEQUAL(t):
	r'<='
	return t

def t_GREATEREQUAL(t):
	r'>='
	return t

def t_DEQUAL(t):
	r'=='
	return t

def t_PLUSPLUS(t):
    r'\+\+'
    return t

def t_MINUSMINUS(t):
    r'\-\-'
    return t

#Expresion regular para palabra reservada: sin
def t_sin(t):
    r'sin'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: sen
def t_sen(t):
    r'sen'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: sqrt
def t_sqrt(t):
    r'sqrt'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion


def t_cos(t):
    r'cos'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: TAN
def t_tan(t):
    r'tan'
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

def t_h(t):
    r'h'
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


#Expresion regular para palabra reservada: limite
def t_limite(t):
    r'limite'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: x
def t_x(t):
    r'x'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion


#Expresion regular para palabra reservada: vale
def t_vale(t):
    r'vale'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: infinito
def t_infinito(t):
    r'infinito'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: la
def t_la(t):
    r'la'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion


#Expresion regular para palabra reservada: el
def t_el(t):
    r'el'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion


#Expresion regular para palabra reservada: el
def t_l(t):
    r'l'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: de
def t_de(t):
    r'de'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion


#Expresion regular para palabra reservada: el
def t_primera(t):
    r'primera'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: segunda
def t_segunda(t):
    r'segunda'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: tercera
def t_tercera(t):
    r'tercera'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: cuarta
def t_cuarta(t):
    r'cuarta'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: uno
def t_uno(t):
    r'uno'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: dos
def t_dos(t):
    r'dos'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: tres
def t_tres(t):
    r'tres'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: cuatro
def t_cuatro(t):
    r'cuatro'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: cinco
def t_cinco(t):
    r'cinco'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion


#Expresion regular para palabra reservada: seis
def t_seis(t):
    r'seis'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: siete
def t_siete(t):
    r'siete'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: ocho
def t_ocho(t):
    r'ocho'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: nueve
def t_nueve(t):
    r'nueve'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: diez
def t_diez(t):
    r'diez'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion


#Expresion regular para palabra reservada: cero
def t_cero(t):
    r'cero'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: dominio
def t_dominio(t):
    r'dominio'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: dominio
def t_a(t):
    r'a'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

#Expresion regular para palabra reservada: tiende
def t_tiende(t):
    r'tiende'
    return t #Devuelve la definicion o expresion de la palabra reserva dentro de la funcion

def t_NUMERAL(t):
    r'\#'
    return t

def t_DISTINT(t):
	r'!='
	return t




def t_newline(t):
	r'\n+'
	t.lexer.lineno += len(t.value)

t_ignore = ' \t'


def t_comments_ONELine(t):
     r'\/\/(.)*\n'
     t.lexer.lineno += 1
     

def t_error(t):
	
	estado = "** Error en la Linea {:4} Valor {:16} Posicion {:4}".format(str(t.lineno), str(t.value),str(t.lexpos))
	resultado_lexema.append(estado)
	t.lexer.skip(20)

# Prueba de ingreso
def prueba(data):
    global resultado_lexema #En prueba, se pasa la variable global data.

    analizador = lex.lex()
    analizador.input(data)

   
    while True:
        tok = analizador.token()
        if not tok:
            break
       
       ## estado = "Linea {:4} Tipo {:16} Valor {:16} Posicion {:4}".format(str(tok.lineno),str(tok.type) ,str(tok.value), str(tok.lexpos) )
        estado=""
        resultado_lexema.append(estado)
    return resultado_lexema

 # instanciamos el analizador lexico
analizador = lex.lex()

# main

if __name__ == '__main__':
  
      
        data = name
       
        prueba(data) # tomamos los contenidos del archivo, losguardamos en "data" y se lo pasamos a la fucnion "prueba"
        for i in range(0,len(resultado_lexema)):
           print(resultado_lexema[i])


