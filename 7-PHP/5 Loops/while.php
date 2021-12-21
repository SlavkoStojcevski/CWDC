<?php
    $bla=[];
    $i=0;
    $j=1;
    while($i<10){
        $bla[$i]=$j*10;
        echo $bla[$i]."<br>";
        $j++;
        $i++;
    }
    $bla=[];
    $i=0;
    $j=1;
    do{
        $bla[$i]=$j*10;
        echo $bla[$i]."<br>";
        $j++;
        $i++;
    }
    while($i<10)
?>