<?php
include('Classes.php');
session_start();
// session_destroy();
?>
<HTML>
<HEAD>
<META NAME="description" CONTENT="A full deck of Playing Card Icons">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
<META NAME="keywords" CONTENT="Playing Cards, deck of cards, deck, cards, icons, images">
<TITLE>Playing Cards</TITLE>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&family=Roboto&display=swap" rel="stylesheet">
<style>
    *{
        margin: 0;
        padding: 0;
        outline: none;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
        color: white;
    }
    body{
        background: rgb(0, 102, 51);
    }
    h2{
        font-family: 'Noto Sans JP', sans-serif;
        color: white;
        text-align: center;
        margin-top: 40px;
    }
    .container{
        width: 1000px;
        margin: auto;
        text-align: center;
    }
    .container .mt-60{
        margin-top: 60px;
    }
    form{
        padding-top: 20px;
        text-align: center;
    }
    form input[type="submit"]{
        padding: 40px 40px;
        font-size: 1.3em;
        background-color: gold;
        border: none;
        box-shadow: 0px 0px 5px rgba(0,0,0,.8);
        color: black;
        cursor: pointer;
    }
    .container > div{
        padding-top: 20px;
    }
    .deck-of-cards{
        position: absolute;
        left:30%;
    }
    .deck-of-cards > *{
        position: absolute;
     
    }
    .deck-of-cards img:nth-child(2){
        left: 12px;
    }
    .deck-of-cards img:nth-child(3){
        left: 6px;
    }
    .container form input[type="submit"]{
        width: 136px;
        height: 105px;
        transform: translate(0px,0px);
        transition: .2s all ease-in-out;
    }
    .container form input[type="submit"]:hover{
        transform: translate(0px,-10px);
    }
    .container form{
        display: inline-block;
        margin:0px 20px;
    }
    li{
        list-style-type: none;
    }
    .activies-container{
        margin-top: 40px;
        width: 100%;
        height: 200px;
        overflow: auto;
        background: white;
    }
    .activies-container li{
        color: black;
        margin: 10px 0px;
    }
    input[type="text"]{
        color: black;
    }

</style>
</HEAD>
<body>
    <h2>Blackjack Card Game</h2>
    <?php if(!isset($_SESSION["game"]["start"])){?>
        <form action="game_process.php" method="POST">
            <input type="hidden" name="action" value="start">
            <input type="submit" name="submit" value="Start Game">
        </form>
    <?php }?>
    <?php if(isset($_SESSION["game"]["start"])){ ?>
        <div class="deck-of-cards">
            <img src="images/b2fv.png" alt="">
            <img src="images/b2fv.png" alt="">
            <img src="images/b2fv.png" alt="">
            <img src="images/b2fv.png" alt="">
        </div>
        <div class="container">
            <h3 class="mt-60">Dealer</h3>
            <h3 style="margin-top:20px;"><?php 
              $dealer = $_SESSION["game"]["dealer"];
              echo $dealer->holdingNumber;
            
            ?></h3>
            <div class="dealer-cards">
                <?php 
              
                //   var_dump($dealer);
                foreach($dealer->cards as $card){
                ?>
                    <?php if(count($dealer->cards) > 1){?>
                        <img src="<?= $card->image ?>" alt="">
                    <?php }else{?>
                        <img src="images/b2fv.png" alt="">
                        <img src="<?= $card->image ?>" alt="">
                    <?php } ?>
                <?php }?>
            </div>
            <?php 
            
            $player = $_SESSION["game"]["player"];

            if(!isset($_SESSION["game"]["text"])){ ?>
                <div>
                    <form action="game_process.php" method="POST">
                        <input type="hidden" name="action" value="stay">
                        <input type="submit" name="submit" value="Stand">
                    </form>
                    <form action="game_process.php" method="POST">
                        <input type="hidden" name="action" value="hit">
                        <input type="submit" name="submit" value="Hit">
                    </form>
                </div>
            <?php }else{ ?>
                <div>
                    <h2 style="margin-top: 0px;">Game Over</h2>
                    <p><?= (isset($_SESSION["game"]["text"])) ? $_SESSION["game"]["text"] : "" ?></p>
                    <form action="game_process.php" method="POST">
                        <input type="hidden" name="action" value="reset">
                        <input type="submit" name="submit" value="Reset">
                    </form>
                </div>
                <?php }?>
            <h3 class="mt-60"><?= $player->holdingNumber ?></h3>
            <h3 style="margin-top:20px;">Player</h3>
            <div class="player-cards">
                <?php 
                  
                    //  var_dump($player);
                    foreach($player->cards as $card){
                ?>
                  <img src="<?= $card->image ?>" alt="">
                <?php } ?>
            </div>
            <div class="coins-container">
                <label for="">Coins: </label>
                <input type="text" value="<?= $player->coins ?>" disabled="disabled">
            </div>

            <!-- <?php if(isset($_SESSION["game"]["activities"])){?>
            <div class="activies-container">
                <ul>
                    <?php
                    $activities = $_SESSION["game"]["activities"];
                    
                    for($i = count($activities)-1; $i >= 0; $i--){ ?>
                    <li> 
                    <?= $activities[$i] ?></li>
                    <?php }?>
                </ul>
            </div>
            <?php } ?> -->
        </div>
    <?php } ?>
</body>
</HTML>
