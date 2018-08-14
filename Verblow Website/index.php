<!DOCTYPE html>

<?php
    
    $url = "https://www.bitstamp.net/api/ticker/";
    $fgc = file_get_contents($url);
    $json = json_decode(fgc, true);

    $price = $json["last"];
    $high = $json["high"];
    $low = $json["low"];
    $date = date("m-d-Y - h:i:sa");
    $open = $json["open"];
    
if ($open < $price) {
    //If price went up
    
    $indicator = "+";
    $change = $price - $open;
    $percent = $change / $open;
    $percent = $percent * 100;
    $percentChange = $indicator.number_format($percent, 2);
    $color = "green";
    
}

if ($open > $price) {
    //If price went down
    
        $indicator = "-";
        $change = $open - $price;
        $percent = $change / $open;
        $percent = $percent * 100;
        $percentChange = $indicator.number_format($percent, 2);
        $color = "red";
  
}
    
?>

<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/Grid.css">
        <link rel="stylesheet" type="text/css" href="rescources/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
        
        <title>Verblow</title>
    
        
    </head>
    
    <body>
        <header>
            
            <nav>
                
                <div class="row">

                    <ul class="main-nav">
                        <img src="rescources/img/VerblowIcon.png" alt="Verblow Logo" class="logo"> 
                        <li><a href="#" class="last">About us</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Buy Bitcoin</a></li>
                        <li><a href="#" class="first">Get Started</a></li>
                    </ul>
                
                </div>
            </nav>
            
            <div class="tagline-text-box">
                <h1>Cryptocurrency Made For You.</h1>
                <a class="btn btn-full" href="#">Get Started</a>
                <a class="btn btn-ghost" href="#">Learn More</a>
                
            </div>
            
        
        </header>
    
        <div class="bitcoin-price">
            <h1>Bitcoin</h1>
            <h2><?php echo $price; ?></h2>
            <h3 style="color: <?php echo $color; ?>;"><?php echo $percentChange; ?></h3>
            <a href="#">Buy Bitcoin</a>
            
        </div>
        
    </body>

</html>