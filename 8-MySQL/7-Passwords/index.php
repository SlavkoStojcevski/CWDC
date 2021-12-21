<?php
    $hash=password_hash("password",PASSWORD_DEFAULT);
    echo $hash."<br>";
    if(password_verify("password",$hash)){
        echo "Valid password.";
    } else {
        echo "Invalid password.";
    }
?>