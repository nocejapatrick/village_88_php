<?php 


function draw_stars($arrs){
    foreach($arrs as $arr){

        for($i = 0; $i < $arr; $i++){
            echo "*";
        }
        echo "<br>";
    }
}


function draw_stars2($arrs){
    foreach($arrs as $arr){

        if(is_numeric($arr)){
            for($i = 0; $i < $arr; $i++){
                echo "*";
            }
        }else{
            $firstLetter = substr($arr,0,1);
         
            for($i = 0; $i < strlen($arr);$i++){
                echo strtolower($firstLetter);
            }
        }

        echo "<br>";
    }
}



$x = array(4,6,1,3,5,7,25);

draw_stars($x);

$x = array(4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith");
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
draw_stars2($x);