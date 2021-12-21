<?php
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $weather="";
    function getelement($begining,$end,$website){
        $site=file_get_contents($website);
        $first=explode($begining,$site);
        if(sizeof($first)>1){
            $second=explode($end,$first[1]);
            if(sizeof($second)>1){
                return $second[0];
            } else return "We have temporary issues.";
        } else return "We have temporary issues.";
    }
    if(array_key_exists("city",$_GET)){
        $city=str_replace(" ","",$_GET["city"]);
        $url="https://www.weather-forecast.com/locations/".$city."/forecasts/latest";
        $url_headers = @get_headers($url);
        if(!$url_headers || $url_headers[0] == 'HTTP/1.1 404 Not Found'){$weather = $city." can't be found.";}
        else {
            $weather=getelement("<th></th>","</span></p></td>",$url);
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        html { 
          background: url(cover.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
        body{background: none;text-align: center;}
        .stuff{
            background: none;border: none;
            text-align:center;outline: none !important;
            font-size:120%;color: white;
        }
        ::placeholder{color:white;}
        #box{
            margin-left: 25%;
            width: 50%;
            height: inherit;
            background-color: rgba(0, 0, 0, 0.3);
            color: white;font-size: xx-large;
        }
    </style>
    <title>Weather <?php if(array_key_exists("city",$_GET)){echo $city;} ?></title>
  </head>
  <body>
    <div>
        <br><h1 style="color:white">Weather?</h1><br>
        <form>
            <input onclick="this.value=''" onfocus="this.placeholder=''"name="city"class="stuff"placeholder="Enter a city"
            value="<?php if(array_key_exists("city",$_GET))echo$_GET["city"];?>"><br><br>
            <button class="stuff" style="cursor:pointer;"><strong>Search</strong></button><br><br>
            <div id="box"><?php if($weather){echo $weather;}?></div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>