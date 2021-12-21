<?php
  $zamenki=array("jas","ti","toj","taa","toa","nie","vie","tie");
  for($i=0;$i<sizeof($zamenki);$i+=2){
      echo $zamenki[$i]."<br>";
  }
  for($i=10;$i>-5;$i-=2){
      echo $i."<br>";
  }
  foreach($zamenki as $key=>$value){
      $zamenki[$key]=$value." sum";
  }
  foreach($zamenki as $key=>$value){
      echo "Zamenka broj $key e $value.<br>";
  }
?>