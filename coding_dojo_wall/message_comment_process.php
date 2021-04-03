<?php 
session_start();
require_once('new_connection.php');


if(isset($_POST["submit"]) && isset($_POST["action"])){

    unset($_SESSION["error"]);

    if($_POST["action"] == "message"){

        if(empty($_POST["message"])){

            $_SESSION["error"]["message"] = "Message is required";
        }else{
            unset($_SESSION["error"]["message"]);
            $query = "INSERT INTO messages (user_id, message, created_at, updated_at) VALUES 
                      (".$_SESSION["user"]["id"].", '".escape_this_string($_POST["message"])."', '".date("Y-m-d H:i:s")."', NULL)";
            run_mysql_query($query);
        }

          header("location: coding_dojo_wall_index.php");
    }

  
    
    if($_POST["action"] == "comment"){

        if(empty($_POST["comment"])){

            $_SESSION["error"]["comment".$_POST["message_id"]] = "Comment is required";

        }else{

            unset($_SESSION["error"]["comment".$_POST["message_id"]]);

            $query = "INSERT INTO comments (message_id, user_id, comment, created_at, updated_at) VALUES
                      (".$_POST["message_id"].", ".$_SESSION["user"]["id"].", '".escape_this_string($_POST["comment"])."', '".date("Y-m-d H:i:s")."', NULL)";
             run_mysql_query($query);
        }

        header("location: coding_dojo_wall_index.php");
    }

    if($_POST["action"] == "delete_message"){

        $query = "DELETE FROM messages WHERE id = ".$_POST["message_id"]."";
        run_mysql_query($query);
        header("location: coding_dojo_wall_index.php");

    }

}
