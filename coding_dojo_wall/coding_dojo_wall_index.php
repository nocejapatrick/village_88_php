<?php 
session_start();
if(!isset($_SESSION["user"])){
    header("location: login_registration.php");
}
require_once('new_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            font-family: 'Open Sans', sans-serif;
           
        }
        p{
            line-height: 1.625em;
        }
        .container{
            max-width: 1200px;
            margin: auto;
        }
        nav{
            padding: 15px;
            box-shadow: 0 0 5px #d4d4d4;
        }
        nav .container > *{
            display: inline-block;
            vertical-align: middle;
            width: 49%;
        }
        nav .container div > *{
            display: inline-block;
        }

        nav .container div{
            text-align: right;
        }

        .logout{
            border:none;
            background: transparent;
            color: #bebebe;
            margin-left: 10px;
            cursor: pointer;
        }

        .message_form {
            margin-top: 40px;
            text-align: right;
        }

        .comment_form{
            margin-left: 40px;
            margin-top: 20px;
            text-align: right;
        }

        .message_form label, .comment_form label{
            display: block;
            width: 100%;
            font-size: 1.5em;
            font-weight: 600;
            margin-bottom: 10px;
            text-align: left !important;
        }

        .comment_form label{
            font-size: 1.2em;
        }
        .message_form textarea, .comment_form textarea{
            padding:20px;
            font-size: 1.3em;
            text-align: left !important;
        }

        .message_form input[type="submit"], .comment_form input[type="submit"]{
            border: none;
            padding:5px 15px;
            cursor: pointer;
            background: #84ccff;
            box-shadow: 2px 2px 3px #8e8e8e;
        }

        .comment_form input[type="submit"]{
            background: #86ff84;
        }

        .wall{
            margin-top: 50px;
        }
        .wall p{
            margin-top: 10px;
        }

        .wall .comment{
            margin-top:20px;
            margin-left: 40px;
        }

        .message{
            margin:40px 0px;
        }
        p{
            text-align: left;
        }

        .error{
            border: 1px solid red;
        }
        .error::placeholder{
            color: red;
            font-size: 1em;
        }

        .delete_message{
            background: #ff8585 !important;
        }
    </style>
</head>
<body>
    <nav>
        <div class="container">
            <h2>CodingDojo Wall</h2>
            <div>
                <h4>Welcome <?= $_SESSION["user"]["name"] ?></h4>
                <form action="dojo_wall_login_register_process.php" method="POST">
                    <input type="hidden" name="action" value="logout">
                    <input type="submit" class="logout" name="submit" value="logout">
                </form>
            </div>
        </div>
    </nav>
    <div class="post-message">
        <div class="container">
            <form action="message_comment_process.php" class="message_form" method="POST">
                <input type="hidden" name="action" value="message">
                <div>
                    <label for="message">Post a message</label>
                    <textarea name="message" id="message" cols="105" rows="3" class="<?= (isset($_SESSION["error"]["message"])) ? "error" : "" ?>" placeholder="<?= (isset($_SESSION["error"]["message"])) ?  $_SESSION["error"]["message"]: "" ?>"></textarea>
                    
                </div>
                <input type="submit" name="submit" value="Post a message">
            </form>
        </div>
    </div>
    <div class="wall">
        <div class="container">
            <?php 
            $query = "SELECT users.id as user_id,messages.id, CONCAT(users.first_name,' ',users.last_name) AS name, messages.message, DATE_FORMAT(messages.created_at,'%M %D %Y') AS date_created, messages.created_at as created_at FROM messages LEFT JOIN users ON messages.user_id = users.id";
            $messages = fetch_all($query);
            for($i = count($messages) - 1; $i >= 0; $i--){?>
            <div class="message">
                <h4><?= $messages[$i]["name"] ?> - <?= $messages[$i]["date_created"] ?></h4>
                <p><?= $messages[$i]["message"] ?></p>
                <?php 
                    $timeCreated = strtotime($messages[$i]["created_at"]);
                    $thiryMinutes = $timeCreated+(60*30);

                if($_SESSION["user"]["id"] == $messages[$i]["user_id"] && strtotime(date('Y-m-d H:i:s')) <= $thiryMinutes){ 
                    
                    ?>
                    <form action="message_comment_process.php" class="comment_form" method="POST">
                        <input type="hidden" name="action" value="delete_message">
                        <input type="hidden" name="message_id" value="<?= $messages[$i]["id"] ?>">
                        <input type="submit" name="submit" class="delete_message" value="Delete Message">
                    </form>
                <?php } ?>
                <?php 
                    $query = "SELECT CONCAT(users.first_name,' ',users.last_name) AS name, comments.`comment`,DATE_FORMAT(comments.created_at,'%M %D %Y') AS date_created
                    FROM messages
                    LEFT JOIN comments ON comments.message_id = messages.id
                    LEFT JOIN users ON comments.user_id = users.id
                    WHERE comments.message_id = '".$messages[$i]["id"]."'";
                    $comments = fetch_all($query);
                    for($j = count($comments) - 1; $j >= 0; $j--){
                ?>
               
                <div class="comment">
                    <h4><?= $comments[$j]["name"] ?> - <?= $comments[$j]["date_created"] ?> </h4>
                    <p><?= $comments[$j]["comment"] ?> </p>
                </div>
                <?php } ?>
                <?php ?>
                <form action="message_comment_process.php" class="comment_form" method="POST">
                    <input type="hidden" name="action" value="comment">
                    <input type="hidden" name="message_id" value="<?= $messages[$i]["id"] ?>">
                    <div>
                        <label for="comment">Post a comment</label>
                        <textarea name="comment" id="comment" cols="101" rows="3" class="<?= (isset($_SESSION["error"]["comment".$messages[$i]["id"]])) ? "error" : "" ?>" placeholder="<?= (isset($_SESSION["error"]["comment".$messages[$i]["id"]])) ? $_SESSION["error"]["comment".$messages[$i]["id"]] : "" ?>"></textarea>
                    </div>
                    <input type="submit" name="submit" value="Post a message">
                </form>
            </div>
            <?php } ?>
            
        </div>
    </div>
 
</body>
</html>
