<?php 


function multiply($arr)
{
   for($i = 0; $i < count($arr); $i++){
    $arr[$i] = $arr[$i] * 5;
   }
   return $arr;
}
$A = array(2,4,10,16);

$B = multiply($A);
var_dump($B);

echo "<br>";
echo "<br>";
echo "<br>";

function multiply2($arr,$times){

    for($i = 0; $i < count($arr); $i++){
         $arr[$i] = $arr[$i] * $times;
    }
    return $arr;
}

$B = multiply2($A, 3);  
var_dump($B);