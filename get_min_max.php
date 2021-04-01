<?php

function minFunc($arr){
    $minNum = $arr[0];

    foreach($arr as $ar){
        if($ar < $minNum){
            $minNum = $ar;
        }
    }
    return $minNum;
}

function maxFunc($arr){
    $maxNum = 0;

    foreach($arr as $ar){
        if($ar > $maxNum){
            $maxNum = $ar;
        }
    }
    return $maxNum;
}

function get_max_and_min($arr){
    return ["max"=>maxFunc($arr),"min"=>minFunc($arr)];
}

$sample = array( 135, 2.4, 2.67, 1.23, 332, 2, 1.02); 
$output = get_max_and_min($sample); 
var_dump($output);