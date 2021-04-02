<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotes - Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            font-family: 'Roboto', sans-serif;
        }
        .container{
            max-width: 800px;
            margin:40px auto;
            padding:40px;
            box-shadow: 0px 2px 9px #0000003d;
        }
        form label{
            width: 30%;
            display: block;
            text-align: right;
            font-size: .87em;
        }
        form input, form select{
            width: 50%;
            padding: 5px;
        }
        .btn{
            width: auto;
        }
        .form-group{
            margin-top:10px;
        }
        .form-group > *{
            display: inline-block;
        }
        .btn{
            border: none;
            padding:5px 15px;
            background: #78dbf9;
            font-size: .9em;
            cursor: pointer;
        }

        .form-group > textarea{
            vertical-align: middle;
        }

        .error{
            background: #fd6666;
            width: 50%;
            padding:7px 12px;
            color: #861717;
            font-size: .8em;
            margin: 10px 0px 0px 31%;
        }

        .container h1{
            text-align:center;
            margin-bottom:30px;
        }

        .success{
            background: #66d166;
            width: 50%;
            padding:7px 12px;
            color: #238810;
            font-size: .8em;
            margin: 10px 0px 0px 31%; 
        }

        .email-list{
            height: 400px;
            overflow: auto;
        }

        .email-list > *{
            text-align: center;
        }

        .email-list > * > *{
            display: inline-block;
        }
        .email-list span{
            color: green;
        }

        form span{
            color: red;
        }

        .email-list i{
            color: red;
        }
        .delete{
            background: none;
            border: none;
            cursor: pointer;
        }
        textarea{
            padding: 10px;
        }
        .skip-quotes{
            text-decoration: none;
            color:blue
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to QuotingDojo</h1>
        <form action="quotes_process.php" method="POST">
            <div class="form-group">
                <label for="name">Your Name: <span>*</span></label>
                <input type="text" id="name" name="name" class="form-control" value="<?= (isset($_SESSION["old"]["name"])) ? $_SESSION["old"]["name"]: ''?>">
                <?php 
                    if(isset($_SESSION["error"]["name"])){
                        ?>
                        <p class="error"><?= $_SESSION["error"]["name"] ?></p>
                        <?php
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="quote">Your Quote: <span>*</span></label>
                <textarea name="quote" id="quote" cols="50" rows="10"><?= (isset($_SESSION["old"]["quote"])) ? $_SESSION["old"]["quote"]: ''?></textarea>
                <?php 
                    if(isset($_SESSION["error"]["quote"])){
                        ?>
                        <p class="error"><?= $_SESSION["error"]["quote"] ?></p>
                        <?php
                    }
                ?>

                <?php 
                    if(isset($_SESSION["success"])){
                        ?>
                        <p class="success"><?= $_SESSION["success"] ?></p>
                        <?php
                    }
                ?>
            </div>
            <div class="form-group">
                <label></label>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                <a href="quotes_main.php" class="skip-quotes">Skip to qoutes!</a>
            </div>
           
        </form>
    </div>
    
</body>
</html>