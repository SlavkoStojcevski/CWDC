<?php
    $inname='<form method="post"><input type="text" name="name" placeholder="name?"></input><button type="submit">Submit</button></form>';
    $inpass='<form method="post"><input type="password" name="password" placeholder="password?"></input><button type="submit">Submit</button></form>';
    $message="";
    $name="";
    $password="";
    if(!$_POST){
        $message=$inname;
    }
    if(array_key_exists("name",$_POST)){
        $link=mysqli_connect("shareddb-v.hosting.stackcp.net","addcash4m2users-3134379931","653_!8n.wl)7","addcash4m2users-3134379931");
        if($_POST["name"]==""){
            echo "<p>Please enter a name.</p>";
            $message=$inname;
        } else{
            $name=mysqli_real_escape_string($link,$_POST["name"]);
            $query="SELECT `password` FROM `advertizers` WHERE `name`='".$name."'";
            $result=mysqli_query($link,$query);
            if(mysqli_num_rows($result)>0){
                $message=$inpass;
            } else{
                $query="INSERT INTO `advertizers`(`name`)VALUES('".$name."')";
                mysqli_query($link,$query);
                $message=$inpass;
                if(array_key_exists("password",$_POST)){
                    if($_POST["password"]==""){
                        echo "<p>Please enter a password.</p>";
                        $message=$inpass;
                    } else{
                        $password=mysqli_real_escape_string($link,$_POST["password"]);
                        $query="INSERT INTO `advertizers`(`password`)VALUES('".$password."') WHERE `name`='".$name."'";
                        mysqli_query($link,$query);
                    }
                } else {
                    echo "<p>Please enter a password.</p>";
                    $message=$inpass;
                }
            }
        }
    }
?>
<html>
    <p><?echo $message;?></p>
</html>