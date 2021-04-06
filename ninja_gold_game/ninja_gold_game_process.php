<?php
session_start();


$action = "earned";
$place_arr = array("farm"=>[10,20],"cave"=>[5,10],"house"=>[2,5],"casino"=>[0,50]);
$coins = rand($place_arr[$_POST["user_actions"]][0], $place_arr[$_POST["user_actions"]][1]);

if(isset($_POST["user_actions"]) && $_POST["user_actions"]== "casino"){
    $casinoAction = ["earned","lost"];
    $action = $casinoAction[rand(0,1)];
    $coins = rand(0,50);
}

if($action == "earned"){

    $_SESSION["players_gold"] += $coins;

}else if($action == "lost"){

    $_SESSION["players_gold"] -= $coins;
}


$_SESSION["users_activities"][] = array("place"=>$_POST["user_actions"], "action"=> $action, "action_date"=> date("Y-m-d H:i:s"),"coins"=>$coins);

header("location: ninja_gold_game.php");