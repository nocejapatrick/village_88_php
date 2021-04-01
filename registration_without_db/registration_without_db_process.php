<?php
session_start();


if(isset($_POST["submit"])){
  
    if(empty($_POST["email"])){

        $_SESSION["error"]["email"] = "Email is required";
        unset($_SESSION["old"]["email"]);

    }else{

        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

            $_SESSION["error"]["email"] = "Email has to be valid";
            $_SESSION["old"]["email"] = $_POST["email"];

        }else{

            unset($_SESSION["error"]["email"]);
            $_SESSION["old"]["email"] = $_POST["email"];

        }
     
    }
    // var_dump($_SESSION);

    if(empty($_POST["first_name"])){

        $_SESSION["error"]["first_name"] = "First Name is required";
        unset($_SESSION["old"]["first_name"]);

    }else{
        unset($_SESSION["error"]["first_name"]);
        $_SESSION["old"]["first_name"] = $_POST["first_name"];
    }



    if(empty($_POST["last_name"])){

        $_SESSION["error"]["last_name"] = "Last Name is required";
        unset($_SESSION["old"]["last_name"]);

    }else{
        unset($_SESSION["error"]["last_name"]);
        $_SESSION["old"]["last_name"] = $_POST["last_name"];
    }


    if(empty($_POST["password"])){

        $_SESSION["error"]["password"] = "Password is required";

    }else{

        if(strlen($_POST["password"]) > 6){

            unset($_SESSION["error"]["password"]);

        }else{

            $_SESSION["error"]["password"] = "Password should be 6 characters and above";
        }
      
    }


    if(empty($_POST["confirm_password"])){

        $_SESSION["error"]["confirm_password"] = "Confirm Password is required";

    }else{

        if($_POST["confirm_password"] == $_POST["password"]){

            unset($_SESSION["error"]["confirm_password"]);

        }else{

            $_SESSION["error"]["confirm_password"] = "Confirm Password should be equal to password";
        }
      
    }

    if(!empty($_POST["birth_date"])){
        $dateExploded = explode("-",$_POST["birth_date"]);

        if(!checkdate($dateExploded[1],$dateExploded[2],$dateExploded[0])){

            $_SESSION["error"]["birth_date"] = "Birth Date should be valid";

        }else{

            unset($_SESSION["error"]["birth_date"]);
        }
    }else{

        unset($_SESSION["error"]["birth_date"]);

    }


    if(!empty($_FILES) && empty($_SESSION["error"])){
        $upload = "uploads/".basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $upload);
    }

}
if(empty($_SESSION["error"])){
    $_SESSION["success"] = "Thanks for submitting your information";
}else{
    unset($_SESSION["success"]);
}


// var_dump(empty($_SESSION["error"]));

header("location: registration_without_db.php");