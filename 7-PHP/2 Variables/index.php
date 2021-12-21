<?php
    $name="<p>Slav";
    $verb="cod";
    $ongoing=$verb."ing for </p>";
    $experience=10;
    $start=19;
    $total=$start+$experience;
    $result=$experience." out of $total years";
    $state=true;
    echo $name.$ongoing." $result, $state story.<br>";
    $container="verb";
    echo $$container;
?>