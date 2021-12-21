<?php
    $names=array("Slavko","Jana","Mimi","Vale","Velika","Ivan");
    $relationship=false;
    foreach($names as $value){
        if(strtolower($_POST["name"])==strtolower($value)){
            $relationship=true;
        }
    }
    $message=$relationship?"<p>You are family.</p>":"<p>I don't know you.</p>";
    echo $message;
?>
<form method="post">
    <p>Are you family?</p>
    <input name="name" type="text">
</form>