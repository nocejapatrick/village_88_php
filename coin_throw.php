<?php


$headOrtail = array("head"=>0,"tail"=>0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coin Throw</title>
</head>
<body>
<h2>Starting the program</h2>
    <?php 
        for($i = 0; $i <= 5000; $i++){
            $rand = rand(0,1);
            $headOrtail[array_keys($headOrtail)[$rand]]++;
    ?>
        <h4>Attemp # <?= $i ?>: Throwing a coin... It's a <?= array_keys($headOrtail)[$rand] ?>! Got <?= $headOrtail["head"] ?> heads(s) so far and <?= $headOrtail["tail"] ?> tail(s) so far</h4>
    <?php 
        
    }?>
    <h2>Ending the program thank you</h2>
</body>
</html>