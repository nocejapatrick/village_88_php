<?php
$odds = [];

for($i = 1; $i <= 20000; $i++){
    if($i%2 == 1){
        $odds[] = $i;
    }
 
}

var_dump($odds);