#!C:\Python27\python.exe
##para compatibilidad en windows si se va a utilizar en linux cambiar a la carpeta dondes esta instalado pyton
print "Content-type:text/html\r\n\r\n"
# -*- coding: utf-8 -*-                            
##import para envio de datos post con el navegador
import cgi,cgitb
## import de la libreria de sympy
from sympy import *
import sympy as syp

cgitb.enable() #for debugging
form = cgi.FieldStorage()
##name es la variable que obtengo de la funcion
name = form.getvalue('valor')
##name = "limite de (x**2-4)/(x-2) cuando x tiende infinito"
##paso todo a minusculas
name.lower()


##respecto a que variable se va a utlizar en la funcion
x = syp.Symbol("x")
##separo el contenido name en texto donde hago un array de todas las palabras para su manupulacion
texto=name
palabras=texto.split()

## funcion que me ayuda a calcular la PRIMERA DERIVADA de las funciones y jecutando paso a paso la funcion
def cal_derivada(cambio,valor,derivada):
    for derivada in derivada:
        cambio= cambio + derivada
        

    def cambiar(buscar , reemplazar):
        reemplazar_caja_amarilla= "\\textcolor{blue}{" + reemplazar + "}"
        x = cambio.replace(buscar,reemplazar_caja_amarilla);
        return x
    i=0
    print "Procedimiento\\, Paso \\,a \\,Paso:"
    while i< len(valor):
        if valor[i] == "+" or valor[i] == "-":
            
            i =i+1
        else:
            derivada = diff(valor[i])
            
            cambio= cambiar(str(valor[i]) , str(derivada))
            print "\\newline" + cambio
            i =i+1
                
        i =i+1
    


##funcion para el calculo de derivada dependiendo del grado
##OJO solo realiza opereaciones de grado primera derivada de la funcion
def derivada(grado):
    i=0
    while i< len(palabras):##busco en la palabra que contenga derivada si la contiene entonces realiza el proceso de calculo
        palabra=palabras[i]
        if palabra == "derivada":##la palabra contiene derivada 
            if grado==1: ##es de grado 1 entonces es la primera derivada
                derivada=palabras[i+2:]##corto la palabra hasta donde se encuentra la funcion
                
                valor = derivada##pason la funcion a la variable valor
                cambio=""##creo una variable vacia auxiliar
                j=0
                cal_derivada(cambio,valor,derivada)##llamo la funcion cal_derivada que calcula la primera derivada paso a paso 
            ##aqui agregar si elif si el grado es 2 entonces necesita hacer la segunda derivada
            ##elif grado==2:
                ##logica del programa para realizar la segunda derivada paso a paso
            ##asi para los demas grados ya sea tercera derivada o cuarta derivada
          

            
            
            
        i=i+1;



i=0
##itero cada palabra 
##si encuentro en el texto la palabra primera , dominio o limite es por que se necesita derivar o dominio o limite por lo que corta obtiene la funcion sintaxis(derivada de f(x) ,dominio de f(x),limite de f(x) )
##se mueve el texto de derivada de para obtener la funcion en especifico	
##se llama la funcion de derivada o limite o dominio de sympy para realizar la respuesta
##***************este es el bucle principal para agregar mas funcionalidades al archivo de calculo*******************
##ejemplo para agregar mas funcionalidades si en la palabra se recibe integral de la funcion x**2
##colocar en un elif palabra==""integral:
##luego cortar la palabra hasta donde esta la funcion y realizar el calculo necesario para hacer la integral en ese elif
while i< len(palabras):
    palabra=palabras[i]
    if palabra == "primera":##DERIVADAS
        derivada(1)
    
    elif palabra=="limite":##LIMITES
        ##busco la palabra (vale) y lo corto
        valor_de_x =palabras[i+7]##siempre esta en la 6 posicion
        
        if(valor_de_x=="infinito"):##si valor de x es infinito
            limite=palabras[i+2]##corto la parte donde esta la funcion
            valor = limit(limite,x,oo)##opero el limite y lo paso al valor 
            print 'Limite :  '+ str(valor)##imprimo
        elif(valor_de_x=="uno" or valor_de_x=="1"):
            limite=palabras[i+2]##corto la parte donde esta la funcion
            valor = limit(limite,x,1)##opero el limite y lo paso al valor 
            print 'Limite :  '+ str(valor)##imprimo
        elif(valor_de_x=="dos" or valor_de_x=="2"):
            limite=palabras[i+2]##corto la parte donde esta la funcion
            valor = limit(limite,x,2)##opero el limite y lo paso al valor 
            print 'Limite :  '+ str(valor)##imprimo
        elif(valor_de_x=="tres" or valor_de_x=="3" ):
            limite=palabras[i+2]##corto la parte donde esta la funcion
            valor = limit(limite,x,3)##opero el limite y lo paso al valor 
            print 'Limite :  '+ str(valor)##imprimo
        elif(valor_de_x=="cuatro" or valor_de_x=="4"):
            limite=palabras[i+2]##corto la parte donde esta la funcion
            valor = limit(limite,x,4)##opero el limite y lo paso al valor 
            print 'Limite :  '+ str(valor)##imprimo
        elif(valor_de_x=="cinco" or valor_de_x=="5"):
            limite=palabras[i+2]##corto la parte donde esta la funcion
            valor = limit(limite,x,5)##opero el limite y lo paso al valor 
            print 'Limite :  '+ str(valor)##imprimo
        elif(valor_de_x=="seis" or valor_de_x=="6"):
            limite=palabras[i+2]##corto la parte donde esta la funcion
            valor = limit(limite,x,6)##opero el limite y lo paso al valor 
            print 'Limite :  '+ str(valor)##imprimo
        elif(valor_de_x=="siete" or valor_de_x=="7"):
            limite=palabras[i+2]##corto la parte donde esta la funcion
            valor = limit(limite,x,7)##opero el limite y lo paso al valor 
            print 'Limite :  '+ str(valor)##imprimo
        elif(valor_de_x=="ocho" or valor_de_x=="8"):
            limite=palabras[i+2]##corto la parte donde esta la funcion
            valor = limit(limite,x,8)##opero el limite y lo paso al valor 
            print 'Limite :  '+ str(valor)##imprimo
        elif(valor_de_x=="nueve" or valor_de_x=="9"):
            limite=palabras[i+2]##corto la parte donde esta la funcion
    
            valor = limit(limite,x,9)##opero el limite y lo paso al valor 
            print 'Limite :  '+ str(valor)##imprimo
        elif(valor_de_x=="diez"or valor_de_x=="10"):
            limite=palabras[i+2]##corto la parte donde esta la funcion
            valor = limit(limite,x,10)##opero el limite y lo paso al valor 
            print 'Limite :  '+ str(valor)##imprimo
        elif(valor_de_x=="cero" or valor_de_x=="0"):
            limite=palabras[i+2]##corto la parte donde esta la funcion
            valor = limit(limite,x,0)##opero el limite y lo paso al valor 
            print 'Limite :  '+ str(valor)##imprimo
        else:##si no dice infinito entonces tiene algun valor numerico
            print 'Limite : valor de x entre uno - diez  '##imprimo

    elif palabra=="dominio":##DOMINIO
	## se necesita verificar cual de los casos de dominio se tiene si es un radicar, si tiene raiz o si es una funcion donde su dominio es de -00 a 00	
        dominio=palabras[i+2]
        def dominio_racional(funcion):
            den = denom(funcion)
            poles = solve(den,x)
            ##print(poles) ##aqui da solo el dominio de una funcion sin intervalos del infinito
            domain = Interval(-00, 00) - FiniteSet.fromiter(poles)
            ##print(domain)
            print 'El\\,dominio\\, por\\, ser\\, una\\, fraccion\\,su\\, intervalo\\, es\\, : \\newline'
            print 'Funcion \\,Simpleficada : \\newline'
            print( '(  '+str(simplify(funcion))+')  \\newline')
            print 'Dominio : \\newline'
            print( '(  '+str(poles)+')  \\newline ')
            

        fraccion="false"
        raiz="false"
        i=0
        ##verificando si es fraccion la funcion
        while i < len(dominio) :
            if dominio[i]=="/":
              fraccion="true"
            i=i+1

        i=0
        ##verificando si tiene raiz (sqrt) se verifica si se tiene una t y si esta es por quee scribieron sqrt
        while i < len(dominio) :
          if dominio[i]=="t":
              raiz="true"
              valor=dominio[i+1:]
              #print(valor)
          i=i+1
        ##si la funcion es fraccion y no tiene raiz
        if fraccion=="true" and raiz=="false":
            dominio_racional(dominio)
        ## si es fraccion y tiene raiz		
        elif fraccion=="true" and raiz=="true":
            print 'El\\,dominio\\, por\\, ser\\, una\\,fraccion\\, con \\, raiz\\, su\\, intervalo\\, es\\, : \\newline'
            print 'Funcion \\,Simpleficada : \\newline'
            print( '(  '+str(simplify(valor))+')  \\newline')
            print 'Dominio : \\newline'
            print( '(  '+str(solve(valor,x))+')  \\newline')
        ##si no es fraccion y tiene raiz	
        elif fraccion=="false" and raiz=="true":
            print 'El\\,dominio\\, por\\, ser\\, una\\, funcion\\, con \\, raiz\\, su\\, intervalo\\, es\\, : \\newline'
            print 'Funcion \\,Simpleficada : \\newline'
            print( '(  '+str(simplify(valor))+')  \\newline')
            print 'Dominio : \\newline'
            print( '(  '+str(solve(valor,x))+')')
        ##si solo es una funcion que va de -00 a 00	
        else:
            print 'El\\,dominio\\, por\\, ser\\, una\\, funcion\\,su\\, intervalo\\, es\\, : \\newline'
            print '-\\infin < x < \\infin \\newline'
            print '(-\\infin ,\\infin ) \\newline'


    i=i+1;




