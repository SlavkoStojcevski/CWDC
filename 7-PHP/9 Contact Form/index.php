<?php
    $message="";
    if($_POST){
        if(!$_POST["email"]){
			$message.="<br>Yor email adress is missing.";
        }
        if(!$_POST["subject"]){
            $message.="<br>The subject field is empty.";
        }
        if(!$_POST["content"]){
            $message.="<br>The content field is empty.";
        }
        if($message!=""){
            $message='<div class="alert alert-danger" role="alert"><strong>There were error(s) in your form:</strong>'.$message.'</div>';
        } else{
            if(mail("slavko.stojcevski1990@gmail.com",$_POST["subject"],$_POST["content"])){
                $message.='<div class="alert alert-success" role="alert"><strong>Your message was sent, we\'ll contact you as soon as possible.</strong></div>';
            } else{
                $message.='<div class="alert alert-danger" role="alert">Your message couldn\'t be sent, please try again later.</div>';
            }
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Contact Form</title>
  </head>
  <body>
    <div class="container">
        <br><h3>Get in touch!</h3>
        <div id="message"><? echo $message; ?></div>
        <form method="post">
          <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input name="subject"  type="text" class="form-control" id="subject">
          </div>
          <div class="form-group">
            <label for="text">What would you like to ask us?</label>
            <textarea name="content"  class="form-control" id="content" rows="3"></textarea>
          </div>
          <button id="submit" type="submit" class="btn btn-primary my-1">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $("form").submit(function (e){
            var message="";
            if($("#email").val()==""){
				message+="<br>Yor email adress is missing.";
            }
            if($("#subject").val()==""){
                message+="<br>The subject field is empty.";
            }
            if($("#content").val()==""){
                message+="<br>The content field is empty.";
            }
            if(message!=""){
                $("#message").html('<div class="alert alert-danger" role="alert"><strong>There were error(s) in your form:</strong>'+message+'</div>');
                return false;
            } else{
                return true;
            }
        });
    </script>
  </body>
</html>