<?php
    if($_GET){
        $nb=$_GET["number"];
        $i=2;
        $isPrime=true;
        while($i<$nb){
            if($nb%$i==0){
                $isPrime=false;
                $i=$nb-2;
            }
            $i++;
        }
        if($isPrime){
            echo "<p>".$nb." is a prime number!</p>";
        } else{
            echo "<p>".$nb." is not a prime.</p>";
        }
    } else{
        echo "<p>Please enter a number.</p>";
    }
?>
<p>Is it prime???</p>
<p>Please enter a whole number</p>
<form>
    <input name="number" type="number" min="0">
    <input type="submit" value="check">
</form>