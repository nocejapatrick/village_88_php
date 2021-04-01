<?php 
session_start();

if(isset($_POST["submit"]) && $_POST["submit"]=="restart"){
    session_unset();
}

if(!isset($_SESSION["number"])){
    $_SESSION["number"] = rand(0,100);
    $_SESSION["guessing"] = true;
}

if(isset($_POST["user_num"])){
    $_SESSION["users_pick"] = $_POST["user_num"];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Great Number Game</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
    *{
        margin:0;
        padding:0;
        outline: none;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
    }
    .container{
        max-width:800px;
        margin: 50px auto;
        
    }
    .container *{
        text-align: center;
    }
    h1,p{
        margin-top: 10px;
    }

    .box{
        margin: 20px auto;
        width: 350px;
        padding: 150px 0px;
        font-size: 1.5em;
        color: white;
    }
    .red{
        background: #f14242;
       
        color: white;
    }
    form{
        margin-top:20px;
        text-align: center;
    }
    .green{
        background: green;
    }
    .restart-btn{
        padding: 4px 12px;
        background: green;
        color: white;
        border:1px solid white;
        cursor: pointer;
        
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Great Number Game</h1>
        <p>I am thinking of a number between 1 and 100</p>
        <p>Take a guess!</p>
        <?php if(isset($_SESSION["users_pick"]) && $_SESSION["users_pick"] < $_SESSION["number"]){ ?>
            <div class="box red">
                Too Low!
            </div>
        <?php }else if(isset($_SESSION["users_pick"]) && $_SESSION["users_pick"] > $_SESSION["number"]){ ?>
            <div class="box red">
                Too High!
            </div>
        <?php }else if(isset($_SESSION["users_pick"]) && $_SESSION["users_pick"] == $_SESSION["number"]){
                 $_SESSION["guessing"] = false;
            ?>
            <div class="box green">
                <?= $_SESSION["number"];?> was the number
                <form action="great_number_game.php" method="POST">
                    <input type="submit" name="submit" value="restart" class="restart-btn">
               </form>
            </div>

            <?php } ?>
        <?php if( $_SESSION["guessing"] == true){ ?>
        <form action="great_number_game.php" method="POST">
                <input type="text" name="user_num" class="input">
                <input type="submit" name="submit" value="submit">
        </form>
        <?php } ?>
    </div>
</body>
</html>