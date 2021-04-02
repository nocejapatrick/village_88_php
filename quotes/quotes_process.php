<?php 
session_start();

include_once('../mysql/new_connection.php');

if(isset($_POST["submit"])){
    unset($_SESSION["success"]);

    if(empty($_POST["name"])){

        $_SESSION["error"]["name"] = "Name is required";
        unset($_SESSION["old"]["name"]);

    }else{

        $_SESSION["old"]["name"] = $_POST["name"];
        unset($_SESSION["error"]["name"]);
    }
    
    if(empty($_POST["quote"])){

        $_SESSION["error"]["quote"] = "Quote is required";
        unset($_SESSION["old"]["quote"]);

    }else{

        $_SESSION["old"]["quote"] = $_POST["quote"];
        unset($_SESSION["error"]["quote"]);
    }


    if(empty($_SESSION["error"])){
        $query = "INSERT INTO quotes (quote,created_at,updated_at,name) value ('".$_POST["quote"]."','".date('Y-m-d H:i:s')."',NULL,'".$_POST["name"]."')";
        run_mysql_query($query);
        unset($_SESSION["error"]);
        unset($_SESSION["old"]);
        $_SESSION["success"] = "Quote successfully added";
    }

}

header("location: quotes.php");