<?php 
session_start();
if(isset($_SESSION["user"])){
    header("location: login_dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration & Login- Coding Dojo Wall</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
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
        span{
            color:red;
        }

        .success{
            background: #66d166;
            width: 50%;
            padding:7px 12px;
            color: #238810;
            font-size: .8em;
            margin: 10px 0px 0px 31%; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration</h1>
        <form action="dojo_wall_login_register_process.php" method="POST">
            <input type="hidden" name="action" value="register">
            <div class="form-group">
                <label for="email">Email: <span>*</span></label>
                <input type="text" id="email" name="email" class="form-control" value="<?= (isset($_SESSION["old"]["email"])) ? $_SESSION["old"]["email"]: ''?>">
                <?php 
                    if(isset($_SESSION["error"]["email"])){
                        ?>
                        <p class="error"><?= $_SESSION["error"]["email"] ?></p>
                        <?php
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="first_name">First Name: <span>*</span></label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="<?= (isset($_SESSION["old"]["first_name"])) ? $_SESSION["old"]["first_name"]: ''?>">
                <?php 
                    if(isset($_SESSION["error"]["first_name"])){
                        ?>
                        <p class="error"><?= $_SESSION["error"]["first_name"] ?></p>
                        <?php
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name: <span>*</span></label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="<?= (isset($_SESSION["old"]["last_name"])) ? $_SESSION["old"]["last_name"]: ''?>">
                <?php 
                    if(isset($_SESSION["error"]["last_name"])){
                        ?>
                        <p class="error"><?= $_SESSION["error"]["last_name"] ?></p>
                        <?php
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="password">Password: <span>*</span></label>
                <input type="password" id="password" name="password" class="form-control">
                <?php 
                    if(isset($_SESSION["error"]["password"])){
                        ?>
                        <p class="error"><?= $_SESSION["error"]["password"] ?></p>
                        <?php
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password: <span>*</span></label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                <?php 
                    if(isset($_SESSION["error"]["confirm_password"])){
                        ?>
                        <p class="error"><?= $_SESSION["error"]["confirm_password"] ?></p>
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
                <input type="submit" name="submit" value="Sign Up" class="btn btn-primary">
            </div>
           
        </form>
    </div>

    <div class="container">
        <h1>Login</h1>
        <form action="dojo_wall_login_register_process.php" method="POST">
            <input type="hidden" name="action" value="login">
            <div class="form-group">
                <label for="email">Email: <span>*</span></label>
                <input type="text" id="email" name="email" class="form-control" value="<?= (isset($_SESSION["old"]["login_email"])) ? $_SESSION["old"]["login_email"]: ''?>">
                <?php 
                    if(isset($_SESSION["error"]["login_email"])){
                        ?>
                        <p class="error"><?= $_SESSION["error"]["login_email"] ?></p>
                        <?php
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="password">Password: <span>*</span></label>
                <input type="password" id="password" name="password" class="form-control">
                <?php 
                    if(isset($_SESSION["error"]["login_password"])){
                        ?>
                        <p class="error"><?= $_SESSION["error"]["login_password"] ?></p>
                        <?php
                    }
                ?>
            </div>
            <div class="form-group">
                <label></label>
                <input type="submit" name="submit" value="Login" class="btn btn-primary">
            </div>
           
        </form>
    </div>
</body>
</html>