#! /usr/bin/python
print 'Content-type: text/html'
print ''
for i in range(3,11):
    print i
    print"Hey"
print "Bla"
favourite_foods=("dark chocolate","peanut butter","toast","rib","coffe","avocado")
print '<br>'
for i in range(6):
    print '<br>'
    print favourite_foods[i]
x=0
while x<=10:
    print x
    x+=1
ages={}
ages["Slavko"]=30
ages["Jana"]=26
ages["Mimi"]=25
print"<br>"
for age in ages:
    print age+" is "+str(ages[age])+"<br>"