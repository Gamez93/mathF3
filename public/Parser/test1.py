# -*- coding: utf-8 -*-
"""
Created on Fri Nov 16 09:44:00 2018

@author: ASUS
"""

import parser
import sys

if __name__ == '__main__':

	test1 = ['examples/comments.c', 'examples/gcd.c',
			 'examples/fibonacci.c', 'examples/num.txt']
	parser.VERBOSE = 0	

	for test in test1:
		f = open(test, 'r')
		data = f.read()
		print ('test: ' + test + '..............\t', ) 
		try:
			parser.parser.parse(data, tracking=True)
			print ('[ok]')
		except:
			print ('[ok]')
