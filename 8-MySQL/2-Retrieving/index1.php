<?php
    $link=mysqli_connect("shareddb-t.hosting.stackcp.net","users0-31333112fd","kwa7g4dd08","users0-31333112fd");
    if(mysqli_connect_error()){
        die("There was an error while trying to connect to the database.");
    } else{
        $query="SELECT * FROM users";
        if($result=mysqli_query($link,$query)){
            $row=mysqli_fetch_array($result);
            echo "Your email is: ".$row['email']."<br>"."Your password is: ".$row['password'];
        }
    }
?>