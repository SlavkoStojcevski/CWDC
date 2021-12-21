<?php
    $link=mysqli_connect("shareddb-v.hosting.stackcp.net","addcash4m2users-3134379931","653_!8n.wl)7","addcash4m2users-3134379931");
    if(mysqli_connect_error()){
        die("An error occurred while connecting");
    } else {
        $query="select * from advertizers";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        echo "<br>Your email is: ".$row["email"]." <br>and your password is: ".$row["password"].".";
    }
?>