<?php
    $message="";
    if(array_key_exists("name",$_POST)||array_key_exists("password",$_POST)){
        if($_POST["name"]==""){
            echo "<p>Your name is missing</p>";
        }
        else if($_POST["password"]==""){
            echo "<p>Your password is missing.</p>";
        }
        else{
            $link=mysqli_connect("shareddb-v.hosting.stackcp.net","addcash4m2users-3134379931","653_!8n.wl)7","addcash4m2users-3134379931");
            $name=mysqli_real_escape_string($link,$_POST["name"]);
            $password=mysqli_real_escape_string($link,$_POST["password"]);
            $query="SELECT `password` FROM `advertizers` WHERE `name`='".$name."'";
            $result=mysqli_query($link,$query);
            if(mysqli_num_rows($result)>0){
                echo "<p>Name already taken, log in if that is your account!</p><button>Log in</button>";
            } else{
                echo "Ke vneseme nov korisnik.";
                $query="INSERT INTO `advertizers`(`name`,`password`)VALUES('".$name."','".$password."')";
                if(mysqli_query($link,$query)){
                    echo "<p>You are Singed up!</p>";
                } else{
                    echo "<p>We can't sign you up right now, please try later.</p>";
                }
            }
        }
    }
?>
<html>
    <br><form method="post">
        <input type="text" name="name" placeholder="name?"></input>
        <br><input type="password" name="password" placeholder="password?"></input>
        <br><button type="submit">Sign up</button>
    </form>
</html>