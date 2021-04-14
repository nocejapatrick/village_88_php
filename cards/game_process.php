<?php


include('Classes.php');
session_start();

if(isset($_POST["submit"])){
    if($_POST["action"] == "start"){
    
        $dealer = new Dealer();
        $player = new Player();
        $dealer->deal($dealer)->deal($player)->deal($player);
   
        $_SESSION["game"]["start"] = true;
        $dealer->SetSession();
        $player->SetSession();
        header("location: card_game.php");
    }

    $player = $_SESSION["game"]["player"];
    $dealer = $_SESSION["game"]["dealer"];

    if($_POST["action"] == "hit"){
        $dealer->deal($player);

        if($dealer->checkIfBust($player)){
            $_SESSION["game"]["text"] = "Player Lose";
        }

        header("location: card_game.php");
    }

    if($_POST["action"] == "stay"){

        
        while(!$dealer->checkWinner($player)){
            $dealer->deal($dealer);
        }

        header("location: card_game.php");
    }

    if($_POST["action"] == "reset"){

        $player->reset();
        $dealer->reset();
        $_SESSION["game"]["activities"] = array();
        unset($_SESSION["game"]["text"]);

        $dealer->deal($dealer)->deal($player)->deal($player);

        $player->SetSession();
        $dealer->SetSession();

      

        header("location: card_game.php");
    }
}
