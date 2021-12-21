<?php
    session_start();
    $diary="";
    $name="";
    $old_diary="";
    $link=mysqli_connect("shareddb-v.hosting.stackcp.net","addcash4m2users-3134379931","653_!8n.wl)7","addcash4m2users-3134379931");
    if(array_key_exists("name",$_COOKIE)){
        $_SESSION["name"]=$_COOKIE["name"];
    }
    if(array_key_exists("name",$_SESSION)){
        $name=$_SESSION["name"];
    } else{
        header("Location: welcome.php?logout=1");
    }
    if(array_key_exists("submit",$_POST)){
        if(array_key_exists("diary",$_POST)){
            $diary=mysqli_real_escape_string($link,$_POST["diary"]);
        }
        mysqli_query($link,"UPDATE `advertizers` SET `diary`='".$diary."' WHERE `name`='".$name."' LIMIT 1");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
            color:#0099FF;
            text-align:center;
            background: none;
        }
        form{
            width:90%;
            height:90%;
        }
        #diary{
            width:100%;
            height:100%;
        }
        h3{
          color:white;  
        }
    </style>
  </head>
  <body>
    <div id="welcome">
        <br><br><h1>Welcome<?echo " ".$name?></h1><br>
        <button class='btn btn-danger' onclick="location.href='welcome.php?logout=1'">Log out</button>
    </div>
    <br><p><h3>Your toughts:</h3></p>
    <form class="container-fluid" method="post">
        <textarea rows="15" id="diary" name="diary" class="form-control"><?echo mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `advertizers` WHERE `name`='".$name."'"))["diary"];?></textarea>
        <br><button type="submit"name="submit"class="btn btn-primary">Submit</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>