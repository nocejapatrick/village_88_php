<?php
session_start();

$coins = 0;
$place = "";
$action = "";

if(isset($_POST["user_actions"]) && $_POST["user_actions"]== "farm"){
    $coins = rand(10,20);
    $action = "earned";
}else if(isset($_POST["user_actions"]) && $_POST["user_actions"]== "cave"){
    $coins = rand(5,10);
    $action = "earned";
}else if(isset($_POST["user_actions"]) && $_POST["user_actions"]== "house"){
    $coins = rand(2,5);
    $action = "earned";
}else if(isset($_POST["user_actions"]) && $_POST["user_actions"]== "casino"){
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