<?php
session_start();
include_once('new_connection.php');

function errorMessage($string,$message){
    $_SESSION["error"][$string] = $message;
    unset($_SESSION["old"][$string]);
}

function oldValue($string,$val){
    $_SESSION["old"][$string] = $val;
    unset($_SESSION["error"][$string]);
}


if(isset($_POST["submit"]) && isset($_POST["action"])){
    unset($_SESSION["error"]);
    unset($_SESSION["old"]);
    unset($_SESSION["success"]);

    if($_POST["action"] == "register"){

        if(empty($_POST["email"])){
            errorMessage("email","Email is required");
        }else{
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

                errorMessage("email","Email should be valid");
                
            }else{

                $user = fetch_record("SELECT * from users where email='".escape_this_string($_POST["email"])."'");

                if(isset($user)){

                    errorMessage("email","Email already exists");

                }else{

                    oldValue("email",$_POST["email"]);

                }


              
            }
          
        }


        if(empty($_POST["first_name"])){
            errorMessage("first_name","First Name is required");
        }else{
            if(!preg_match('/^[a-zA-Z -]+$/', $_POST["first_name"])){

                errorMessage("first_name","First Name should only consist of letters");

            }else{

                if(strlen($_POST["first_name"]) <= 1){

                    errorMessage("first_name","First Name should be 2 characters and above");

                }else{

                    oldValue("first_name",$_POST["first_name"]);
                }
                
            }
            
        }

        if(empty($_POST["last_name"])){
            errorMessage("last_name","Last Name is required");
        }else{

            if(!preg_match('/^[a-zA-Z -]+$/', $_POST["last_name"])){

                errorMessage("last_name","Last Name should only consist of letters");

            }else{

                if(strlen($_POST["last_name"]) <= 1){

                    errorMessage("last_name","Last Name should be 2 characters and above");

                }else{
                    oldValue("last_name",$_POST["last_name"]);
                }
              
            }
           
        }


        if(empty($_POST["password"])){
            errorMessage("password","Password is required");
        }else{
            if(strlen($_POST["password"]) < 8){
                errorMessage("password","Password should be 8 characters and above"); 
            }else{
                unset($_SESSION["error"]["password"]);
            }
        }


        if(empty($_POST["confirm_password"])){
            errorMessage("confirm_password","Confirm Password is required");
        }else{
            if($_POST["confirm_password"] != $_POST["password"]){
                errorMessage("confirm_password","Confirm password should be equal to password"); 
            }else{
                unset($_SESSION["error"]["confirm_password"]);
            }
        }

        unset($_SESSION["success"]);

        if(empty($_SESSION["error"])){

            unset($_SESSION["old"]);

            $_SESSION["success"] = "Account successfully registered";
           
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $password = $_POST["password"].$salt;
            $password = md5($password);

             $query = "INSERT INTO users (first_name, last_name, email, password, salt, created_at, updated_at) VALUES
                       ('".escape_this_string($_POST["first_name"])."', '".escape_this_string($_POST["last_name"])."', '".escape_this_string($_POST["email"])."', '".$password."', '".$salt."', '".date('Y-m-d H:i:s')."', NULL)";

            run_mysql_query($query);
        }

        header("location: dojo_wall_login_register.php");

    }

    if($_POST["action"] == "login"){


        if(empty($_POST["email"])){

            errorMessage("login_email","Email is required"); 

        }else{
          
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

                errorMessage("login_email","Email should be valid");
                
            }else{

                oldValue("login_email",$_POST["email"]);
                
            }

        }

        if(empty($_POST["password"])){

            oldValue("login_email",$_POST["email"]);
            errorMessage("login_password","Password is required"); 

        }
        
        if(empty($_SESSION["error"])){
            $user = $user = fetch_record("SELECT * from users where email='".escape_this_string($_POST["email"])."'");
            $password = $_POST["password"].$user["salt"];
            $password = md5($password);

            if($password == $user["password"]){

                $_SESSION["user"]["id"] = $user["id"];
                $_SESSION["user"]["name"] = $user["first_name"] . " ". $user["last_name"];
                unset($_SESSION["error"]);
                unset($_SESSION["success"]);
                unset($_SESSION["old"]);
                // var_dump($user["first_name"] . " ". $user["last_name"]);
                // die;
                header("location: coding_dojo_wall_index.php");
            }else{
                oldValue("login_email",$_POST["email"]);
                errorMessage("login_password","Password do not match");  
            }
       

        }

    }

    if($_POST["action"] == "logout"){
        unset($_SESSION["user"]);
        header("location: dojo_wall_login_register.php");
    }

    if(!empty($_SESSION["error"])){
        header("location: dojo_wall_login_register.php");
    }
 
}

// 