#! /usr/bin/python
print 'Content-type: text/html'
print ''
import cgi
import random
form=cgi.FieldStorage()
reds=0
whites=0
if "answer" in form:
    answer=form.getvalue("answer")
else:
    answer=""
    for i in range(4):
        answer+=str(random.randint(0,9))
if "guess" in form:
    guess=form.getvalue("guess")
    acuracy=[0,0,0,0]
    for i in range(4):
        if answer[i]==guess[i]:
            acuracy[i]=1
            reds+=1
        else:
            for n in range(4):
                if answer[i]==guess[n]:
                    whites+=1
                    break
else:
    guess=""
if "guesses" in form:
    guesses=int(form.getvalue("guesses"))+1
else:
    guesses=0
if guesses==0:
    message="Gues a four digit number:"
elif reds==4:
    message="You guessed the number in "+str(guesses)+" guesses.<br><a href='http://stuffinlinetesting-com.stackstaging.com/Python/6%20Mastermind%20Game/index.py'>Play again</a>"
else:
    message="Your "+str(guesses)+" guess was "+guess+" and you have "+str(reds)+" right digits in the right place and "+str(whites)+" right digits in the wrong place"
print "<p>"+message+"</p><form method='post'>"
print "<input name='guess'type='text'>"
print "<input type='hidden'name='answer'value='"+answer+"'>"
print "<input type='hidden'name='guesses'value='"+str(guesses)+"'>"
print "<br><br><input type='submit' value='Guess!!'></form>"