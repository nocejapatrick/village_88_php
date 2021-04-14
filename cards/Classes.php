<?php

class Human{
    public $cards;
    public $holdingNumber;
    public $name;
}

class Card{
    public $image;
    public $type;
    public $number;
    public $name;

    public function __construct($type,$number,$image,$name){
        $this->image = $image;
        $this->type = $type;
        $this->number = $number;
        $this->name = $name;
    }
}

class Deck{
    public $cards;

    public function __construct(){
        $this->cards = array();
        $this->cards_initialized();
    }

    private function cards_initialized(){
        $cardsArr = ['c','d','h','s'];
        $cardNameArr = array("c"=>"Clubs","d"=>"Diamond","h"=>"Hearts","s"=>"Spades");

        for($i = 1,$j = 0; $i <= 40; $i++){
            $num = ($i%10==0) ? 10 : $i%10;
            $this->cards[] = new Card($cardsArr[$j],$num, 'images/'.$cardsArr[$j].$num.".png",($num > 1) ? $num." of ".$cardNameArr[$cardsArr[$j]] : "Ace of ".$cardNameArr[$cardsArr[$j]]);
            if($i % 10 == 0){
                $this->cards[] = new Card($cardsArr[$j].'j',10, 'images/'.$cardsArr[$j].'j'.".png","Jack of ".$cardNameArr[$cardsArr[$j]]);
                $this->cards[] = new Card($cardsArr[$j].'k',10, 'images/'.$cardsArr[$j].'k'.".png","King of ".$cardNameArr[$cardsArr[$j]]);
                $this->cards[] = new Card($cardsArr[$j].'q',10, 'images/'.$cardsArr[$j].'q'.".png","Queen of ".$cardNameArr[$cardsArr[$j]]);
                $j++;
            }
        }
    }

}

class Dealer extends Human{
    public $deck;
    public $bet;

    public function __construct(){
       $this->reset();
       $this->name = "Dealer";
    }

    public function SetSession(){
        $_SESSION["game"]["dealer"] = $this;
    }

    public function shuffle(){
        shuffle($this->deck->cards);
    }

    public function reset(){
        $this->deck = new Deck();
        $this->holdingNumber = 0;
        $this->cards = array();
        $this->shuffle();
        unset($_SESSION["game"]["over"]);
        unset($_SESSION["game"]["text"]);
    }

    public function deal($to){
        $card = array_pop($this->deck->cards);
        $to->cards[] = $card;
        $to->holdingNumber += $card->number;

        $_SESSION["game"]["activities"][] = $to->name." received ".$card->name;

       
        return $this;
    }

    public function checkWinner($player){
        if($this->holdingNumber > 21){
            $_SESSION["game"]["text"] = "Player Wins";
            return true;
        }
        if($this->holdingNumber > $player->holdingNumber){
            $_SESSION["game"]["text"] = "Player Lose";
            return true;
        }
        if($this->holdingNumber == $player->holdingNumber){
            $_SESSION["game"]["text"] = "Draw";
            return true;
        }

        if($this->holdingNumber > 17 && $this->holdingNumber < 21){
            if($this->holdingNumber > $player->holdingNumber){
                $_SESSION["game"]["text"] = "Player Lose";
            }else if($this->holdingNumber < $player->holdingNumber){
                $_SESSION["game"]["text"] = "Player Wins";
            }else{
                $_SESSION["game"]["text"] = "Draw";
            }
            return true;
        }

        return false;
    }

    public function checkIfBust($player){
        if($player->holdingNumber > 21){
            return true;
        }
        if($player->holdingNumber == 21){
            $_SESSION["game"]["text"] = "Player Wins";
        }
    }
}





class Player extends Human{
    public $coins;

    public function __construct(){
        $this->reset();
        $this->name = "Player";
        $this->coins = 1000;
    }

    public function SetSession(){
        $_SESSION["game"]["player"] = $this;
    }

    public function reset(){
        $this->cards = array();
        $this->holdingNumber = 0;
    }
    public function hit(){

    }

    public function stay(){

    }
}


