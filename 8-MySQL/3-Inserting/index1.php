<?php
    $link=mysqli_connect("shareddb-t.hosting.stackcp.net","users0-31333112fd","kwa7g4dd08","users0-31333112fd");
    if(mysqli_connect_error()){
        die("there was an error while trying to connect to the database.");
    } else {
        //$query="INSERT INTO `users`(`email`,`password`) VALUES('hastenswift@gmail.com','tomce_hacker_boy')";
        $query="UPDATE `users` SET password='ksjafncna32875546fbn87' WHERE email='slavko.stojcevski1990@gmail.com' LIMIT 1";
        mysqli_query($link,$query);
        $query="SELECT * FROM users";
        if($result=mysqli_query($link,$query)){
            $row=mysqli_fetch_array($result);
            echo "Your email is: ".$row['email']."<br>"."Your password is: ".$row['password'];
        }
    }
?>