<?php
    //setcookie("customerid","123",time()+60*60);
    setcookie("customerid","",time()-60*60);
    //$_COOKIE["customerid"]="test";
    echo $_COOKIE["customerid"];
?>