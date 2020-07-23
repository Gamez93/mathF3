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

##print (name)#Imprime contenido del archivo

import ply.yacc as yacc#Importa de la libreria ply.yacc el parser que nos ayudar a identificar nuestra sintaxis
from lexer import tokens#Importa los tokens obtenidos en el lexer
import lexer
import sys

#Le da al parser yacc token por token para que no se trabe
VERBOSE = 1

#Definicion de las pruducciones y reglas gramaticales
#Directivas de inclusión

#Regla para la definicion de expresion
def p_declaracion_expr(p):
    'declaracion : expression'
    # print("Resultado: " + str(t[1]))
    p[0] = p[1]#Muestra la sucesion de pasos en la operacion

#Regla para la definicion de operaciones basicas
def p_expression_operaciones(p):
    '''
    expression  :   expression PLUS expression
                |   expression MINUS expression
                |   expression TIMES expression
                |   expression DIVIDE expression
                |   expression POW expression
                |   variable POW expression
                |   expression MOD expression
    '''

    #Operacion suma
    if p[2] == '+':
        #prueba si hay error de tipo en la operacion
        try:
            p[0] = p[1] + p[3]
        #excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion resta
    elif p[2] == '-':
        #Prueba si hay error de tipo en la operacion
        try:
            p[0] = p[1] - p[3]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacio de multiplicacion
    elif p[2] == '*':
        #Prueba si hay error de tipo en la operacion
        try:
            p[0] = p[1] * p[3]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de division
    elif p[2] == '/':
        #Prueba si hay error de tipo en la operacion
        try:
            p[0] = p[1] / p[3]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de modulo
    elif p[2] == '%':
        #Prueba si hay error de tipo en la operacion
        try:
            p[0] = p[1] % p[3]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de elevacion o potencia
    elif p[2] == '**':
        #Prueba si hay error de tipo en la operacion
        try:
            p[0] = p[1] ** p[3]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

#Reglas para agrupacion de operaciones
def p_expresion_grupo(p):
    '''
    expression  : LPAREN expression RPAREN
                | LBRACKET expression RBRACKET
                | LBLOCK expression RBLOCK
    '''
    #Prueba si la operacion tiene error de tipo
    try:
        p[0] = p[2]
    #Excepcion para errores de tipo, si es encontrada es omitida
    except TypeError:
        pass

#Reglas para expresiones logicas o de comparacion
def p_expresion_logicas(p):
    '''
    expression   :  expression LESS expression
                |  expression GREATER expression
                |  expression LESSEQUAL expression
                |  expression GREATEREQUAL expression
                |  expression DEQUAL expression
                |  expression DISTINT expression
                |  LPAREN expression RPAREN LESS LPAREN expression RPAREN
                |  LPAREN expression RPAREN GREATER LPAREN expression RPAREN
                |  LPAREN expression RPAREN LESSEQUAL LPAREN expression RPAREN
                |  LPAREN  expression RPAREN GREATEREQUAL LPAREN expression RPAREN
                |  LPAREN  expression RPAREN DEQUAL LPAREN expression RPAREN
                |  LPAREN  expression RPAREN DISTINT LPAREN expression RPAREN
    '''
    #Operacion de menor que
    if p[2] == "<":
        #Prueba de error de tipo en la operacion
        try:
            p[0] = p[1] < p[3]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de mayor que
    elif p[2] == ">":
        #Prueba de error de tipo en la operacion
        try:
            p[0] = p[1] > p[3]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de menor o igual que
    elif p[2] == "<=":
        #Prueba de error de tipo en la operacion
        try:
            p[0] = p[1] <= p[3]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de mayor o igual que
    elif p[2] == ">=":
        #Prueba de error de tipo en la operacion
        try:
            p[0] = p[1] >= p[3]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de igualdad
    elif p[2] == "==":
        #Prueba de error de tipo en la operacion
        try:
            p[0] = p[1] is p[3]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de diferencia
    elif p[2] == "!=":
        #Prueba de error de tipo en la operacion
        try:
            p[0] = p[1] != p[3]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de menor que con simbolos de agrupacion
    elif p[3] == "<":
        #Prueba de error de tipo en la operacion
        try:
            p[0] = p[2] < p[4]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de mayor que con simbolos de agrupacion
    elif p[2] == ">":
        #Prueba de error de tipo en la operacion
        try:
            p[0] = p[2] > p[4]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de menor o igual que con simbolos de agrupacion
    elif p[3] == "<=":
        #Prueba de error de tipo en la operacion
        try:
            p[0] = p[2] <= p[4]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de mayor o igual que con simbolos de agrupacion
    elif p[3] == ">=":
        #Prueba de error de tipo en la operacion
        try:
            p[0] = p[2] >= p[4]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de igualdad con simbolos de agrupacion
    elif p[3] == "==":
        #Prueba de error de tipo en la operacion
        try:
            p[0] = p[2] is p[4]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

    #Operacion de diferencia con simbolos de agrupacion
    elif p[3] == "!=":
        #Prueba de error de tipo en la operacion
        try:
            p[0] = p[2] != p[4]
        #Excepcion para error de tipo, si es encontrada es omitida
        except TypeError:
            pass

#Regla de sintaxis para la definicion que deriva expresion en termino
def p_expression_term(p):
    'expression : term'
    #Prueba de error de tipo en la operacion
    try:
        p[0] = p[1]
    #Excepcion para error de tipo, si es encontrada es omitida
    except TypeError:
        pass

#Regla de sintaxis para la definicion que deriva termino en factor
def p_term_factor(p):
    'term : factor'
    #Prueba de error de tipo en la operacion
    try:
        p[0] = p[1]
    #Excepcion para error de tipo, si es encontrada es omitida
    except TypeError:
        pass

#Regla de sintaxis para la definicion que deriva factor en numero
def p_factor_num(p):
    'factor : NUMBER'
    #Prueba de error de tipo en la operacion
    try:
        p[0] = p[1]
    #Excepcion para error de tipo, si es encontrada es omitida
    except TypeError:
        pass

#Regla de sintaxis para la definicion factores para operaciones trigonometricas
def p_factor_expr(p):
    '''
    factor  : sin LPAREN expression RPAREN
            |  sen LPAREN expression RPAREN
            |  cos LPAREN expression RPAREN
            |  tan LPAREN expression RPAREN
			|  cot LPAREN expression RPAREN
			|  sec LPAREN expression RPAREN
			|  csc LPAREN expression RPAREN
            |  arcsin LPAREN expression RPAREN
            |  arcsen LPAREN expression RPAREN
            |  arccos LPAREN expression RPAREN
            |  arctan LPAREN expression RPAREN
            |  sinh LPAREN expression RPAREN
            |  senh LPAREN expression RPAREN
            |  cosh LPAREN expression RPAREN
            |  tanh LPAREN expression RPAREN
			|  coth LPAREN expression RPAREN
			|  sech LPAREN expression RPAREN
			|  csch LPAREN expression RPAREN
            |  exponencial POW expression
			|  exponencial POW LPAREN expression RPAREN
			|  pi TIMES expression
			|  pi PLUS expression
			|  pi MINUS expression
			|  pi DIVIDE expression
			|  pi POW LPAREN expression RPAREN
			|  pi POW expression
			|  sqrt LPAREN expression RPAREN
            |  logaritmoNatural LPAREN expression RPAREN
            | LPAREN expression RPAREN
    '''
    #Prueba de error de tipo en la operacion
    try:
        p[0] = p[2]
    #Excepcion para error de tipo, si es encontrada es omitida
    except TypeError:
        pass

#Regla de definicion de sintaxis que deriva la expresion a numero o variable
def p_expresion_numero(p):
    '''
    expression  : NUMBER
                | variable
    '''
    #Prueba de error de tipo en la operacion
    try:
        p[0] = p[1]
    #Excepcion para error de tipo, si es encontrada es omitida
    except TypeError:
        pass

#Detecta el vacio y esta es omitida
def p_empty(p):
    'empty :'
    pass

#Deteccion e impresion de errores encontrados
def p_error(p):

    #Comprueba la lista de todo los tokens de la linea ingresada a analizar
	if VERBOSE:
        #Si esta no es vacia
		if p is not None:
            #El mensaje lanza el error y tambien la posicion de este
			print ("Error sintáctico en la linea " + str(p.lexer.lineno) + " Token inesperado  " + str(p.value))
        #Si lo es imprime este mensaje de error
		else:
			print ("Error de sintaxis en la linea " + str(lexer.lexer.lineno))
	else:
        #Excepcion de error
		raise Exception('syntax', 'error')

#Construccion  del parser
parser = yacc.yacc()

print (name)#Imprime contenido del archivo
#print("Sintaxis correcta")
parser.parse(name, tracking=True)
