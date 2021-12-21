#! /usr/bin/python
print 'Content-type: text/html'
print ''
i=4
if i%2==0:
    print "Paren"
else:
    print "Neparen"
#create a program that displays the first 50 primes
n=0 #Broj na prosti broevi
broj=1
while n<50:
    delitel=1
    broj_na_deliteli=0
    while delitel<=broj:
        if broj%delitel==0:
            broj_na_deliteli+=1
        delitel+=1
    if broj_na_deliteli<=2:
        n+=1
        print("<br>"+str(n)+": "+str(broj))
    broj+=1
    