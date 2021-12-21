#! /usr/bin/python
print 'Content-type: text/html'
print ''
def test():
    print 'ahcda'
test()
def print_number(number):
    print number
print_number(9)
a=3
b=4
def stepen():
    return a**b
print stepen()
print "<br>"
def highest_denominator(n,m):
    high_denominator=1
    delitel=1
    while delitel<=n:
        if n%delitel==0 and m%delitel==0:
            high_denominator=delitel
        delitel+=1
    return high_denominator
print highest_denominator(4,6)
def dodadi():
    c=7
    a=10
    return a
print dodadi()
print a
print c