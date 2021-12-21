#! /usr/bin/python
print 'Content-type: text/html'
print ''
age=33
print age
pi=3.14
print "<br>"
print pi
name="whatever"
print "<br>"
print 'Ime: '+name
print "<br>"
print pi/age
number="9"
print "<br>"
print int(number)*age
print "<br>"
print name[0]
print "<br>"
print name[3:5]
list=['Jas','Ti',"Toj",5,2.3]
print "<br>"
print list[0]
print "<br>"
print list[4]
print "<br>"
print list[0:len(list)]
tuple=(1,2,3,4)
print "<br>"
print tuple
print "<br>"
print tuple[0]
list[4]="Taa"
print "<br>"
print list[4]
#Can not update tuples,but can strings
dict={}
dict["dad"]="Jane"
dict["mom"]="Janis"
dict["random"]="random"
dict[7]="sreka"
print "<br>"
print dict
print "<br>"
print dict["random"]
print "<br>"
print dict.keys()
print "<br>"
print dict.values()