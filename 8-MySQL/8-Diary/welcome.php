<?php
    session_start();
    $message="";
    function login($name){
        $_SESSION["name"]=$name;
        if(array_key_exists("stay",$_POST)){
            if($_POST["stay"]){
                setcookie("name",$name,time()+(60*60*24));
            }
        }
        header("Location: diary.php");
    }
    if(array_key_exists("logout",$_GET)){
        if($_GET["logout"]==1){
            session_destroy();
            setcookie("name","",time()-(60*60*24));
            $_COOKIE["name"]="";
            header("Location: welcome.php");
        }
    }
    if(array_key_exists("name",$_SESSION) OR array_key_exists("name",$_COOKIE)){
        if($_SESSION["name"] OR $_COOKIE["name"]){
            header("Location: diary.php");
        }
    }
    if(array_key_exists("signup",$_POST)){
        if(array_key_exists("name",$_POST)){
            if($_POST["name"]==""){
                $message.="<p>Name field is empty!</p>";
            }
        }
        if(array_key_exists("password",$_POST)){
            if($_POST["password"]==""){
                $message.="<p>Password field is empty!</p>";
            }
        }
        if($message==""){
            $link=mysqli_connect("shareddb-v.hosting.stackcp.net","addcash4m2users-3134379931","653_!8n.wl)7","addcash4m2users-3134379931");
            $name=mysqli_real_escape_string($link,$_POST["name"]);
            $password=mysqli_real_escape_string($link,$_POST["password"]);
            $query="SELECT `password` FROM `advertizers` WHERE `name`='".$name."'";
            if($result=mysqli_query($link,$query)){
                if(mysqli_num_rows($result)>0){
                    $row=mysqli_fetch_array($result);
                    if(password_verify($password,$row[0])){
                        login($name);
                    } else{
                        $message.="<p>That name already exists, pick another name, or try logging in if the user is yours.</p>";
                    }
                } else{
                    $hash=password_hash($password,PASSWORD_DEFAULT);
                    $query="INSERT INTO `advertizers`(`name`,`password`)VALUES('".$name."','".$hash."')";
                    if(mysqli_query($link,$query)){
                        login($name);
                    } else{
                        $message.="<p>Experiencing some minor difficulties right now, can't enter new users, please try again later.</p>";
                    }
                }   
            }
            else{
                $message.="<p>Experiencing some minor difficulties right now, can not search, please try again later.</p>";
            }
        }
        if($message!=""){
            $message='<div class="alert alert-danger" role="alert"><strong>There were error(s) in your form:</strong><br><br>'.$message.'</div>';
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Secret diary</title>
    <style>
        html { 
          background: url(everardo-sanchez-DVepzdHCIso-unsplash.jpg) no-repeat center center fixed;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
        body{
            background: none;
            text-align: center;
            padding-top: 7%;
        }
        h1{
            color:#007BFF;
        }
        label{
            color:white;
        }
        .container{
            width:360px;
        }
    </style>
  </head>
  <body>
    <h1><b>Secret Diary</b></h1>  
    <div class="container">
        <br>
        <form method="post">
          <fieldset class="form-group">
            <label for="name">Name</label>
            <input name="name" type="name" class="form-control" id="name" aria-describedby="nameHelp">
          </fieldset>
          <fieldset class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="password">
          </fieldset>
          <fieldset class="custom-control custom-checkbox">
              <input name="stay" type="checkbox" class="custom-control-input" id="customCheck1" checked>
              <label class="custom-control-label" for="customCheck1">Keep me logged in</label>
          </fieldset><br>
          <fieldset id="buttons">
              <p><button name="signup" id="Login" type="submit" class="btn btn-success my-1">Log in</button></p>
              <p><button name="signup" id="Login" type="submit" class="btn btn-success my-1">Sign up</button></p>
          </fieldset>
        </form>
        <br><div id="message"><? echo $message; ?></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>