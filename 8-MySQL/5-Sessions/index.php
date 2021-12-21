<?php
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    session_start();
    $message="";
    $email="";
    $password="";
    if($_POST){
        if(!$_POST["email"]){
			$message.="<br>Yor email adress is missing.";
        }
        if(!$_POST["password"]){
            $message.="<br>The password field is empty.";
        }
        if($message!=""){
            $message='<div class="alert alert-danger" role="alert"><strong>There were error(s) in your form:</strong>'.$message.'</div>';
        } else{
            $email=$_POST["email"];
            $password=$_POST["password"];
            $link=mysqli_connect("shareddb-t.hosting.stackcp.net","users0-31333112fd","kwa7g4dd08","users0-31333112fd");
            if(mysqli_connect_error()){
                die("We are experiencing minor technical issues, please come back later.");
            } else {
                $query="SELECT id FROM users WHERE email='".mysqli_real_escape_string($link,$email)."'";
                if($result=mysqli_query($link,$query)){
                    if(mysqli_num_rows($result)>0){
                        $message='<div class="alert alert-danger" role="alert"><strong>You already have a user with that email.</strong></div>';
                    } else{
                        $query="INSERT INTO users (email,password) VALUES ('".mysqli_real_escape_string($link,$email)."',
                        '".mysqli_real_escape_string($link,$password)."')";
                        if(mysqli_query($link,$query)){
                            $message='<div class="alert alert-success" role="alert"><strong>You have successfully signed up. Logging you in....</strong></div>';
                            $_SESSION['email']=$email;
                            header("Location: session.php");
                        } else{
                            $message="We are experiencing minor technical issues, please come back later.";
                        }
                    }
                }
                else $message="We are experiencing minor technical issues, please come back later.";
            }
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Sign up</title>
  </head>
  <body>
    <div class="container">
        <br><h3>Sign up!</h3>
        <form method="post">
          <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="password">
          </div>
          <button id="signup" type="submit" class="btn btn-primary my-1">Submit</button>
        </form>
        <br><div id="message"><? echo $message; ?></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>