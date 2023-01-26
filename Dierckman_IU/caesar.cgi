#! /usr/bin/env python
print('Content-type: text/html\n')

import cgi

form = cgi.FieldStorage()
html = """
<!doctype html>
<html>
    <head>
	   <meta charset="utf-8">
	   <title>Form in CGI</title>
    </head>
    <body>
	   <p>{content}</p>
    </body>
</html>"""

alphabetDict = {0:"a",1:"b",2:"c",3:"d",4:"e",5:"f",6:"g",7:"h",8:"i",9:"j",10:"k",11:"l",12:"m",13:"n",14:"o",15:"p",16:"q",17:"r",18:"s",19:"t",20:"u",21:"v",22:"w",23:"x",24:"y",25:"z"}
cipheredMessage = ""
method = form.getfirst('direction')
message = form.getfirst('message')
crypt = form.getfirst('key')
if direction == "encrypt":
	for letter in message.lower():
		original = alphabetDict.keys().index(letter)
		cipheredNum = original + key
		cipheredMessage = cipheredMessage + alphabetDict[cipheredNum]


print(html.format(content = cipheredMessage))
