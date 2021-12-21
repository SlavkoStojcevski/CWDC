<?php
    $niza=array(1,1.5,"jabolko","krusa","banana","kivi");
    $niza[sesti]=("6s");
    print_r($niza);
    echo $niza;
    echo $niza[sesti];
    echo "<br>";
    $niza2[0]="rukola";
    $niza2[1]="spanak";
    $niza2[2]="krusa";
    $niza2["preliv"]="kecap";
    print_r($niza2);
    echo "<br><br>";
    $niza3=array(
        "Makedonija"=>"Makedonski",
        "Anglija"=>"Angliski",
        "Svajcarija"=>"Svicarski"
        );
    echo sizeof($niza3);
    $niza3[]="Spanski";
    unset($niza3["Makedonija"]);
    print_r($niza3);
?>