<?php 
session_start();
include_once('../mysql/new_connection.php');

if(isset($_POST["submit"])){

    if(empty($_POST["email"])){

        $_SESSION["message"]["text"] = "Email is required.";
        $_SESSION["message"]["status"] = "error";
        unset($_SESSION["old"]["email"]);

    }else{

        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

            $_SESSION["old"]["email"] = $_POST["email"];
            $_SESSION["message"]["text"] = "Email not valid.";
            $_SESSION["message"]["status"] = "error";

        }else{

            $_SESSION["message"]["text"] = "The email address you entered ". $_POST["email"]. " is a VALID email address! Thank you!";
            $_SESSION["message"]["status"] = "success";

            unset($_SESSION["old"]["email"]);

            $query = "INSERT INTO emails (email,created_at,updated_at) VALUES ('".$_POST["email"]."','".date('Y-m-d H:i:s')."', NULL)";
            run_mysql_query($query);
          
           

        }

     

    }

}

if(isset($_POST["delete"])){
    $query = "DELETE FROM emails WHERE id = '". $_POST["delete"]."'";
    run_mysql_query($query);
}

// var_dump($_SESSION);

header("location: mysql_email_validation.php");