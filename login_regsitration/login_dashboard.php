<?php 
session_start();
if(!isset($_SESSION["user"])){
    header("location: login_registration.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome <?= $_SESSION["user"]["name"] ?></h1>
    <form action="login_registration_process.php" method="POST">
        <input type="hidden" name="action" value="logout">
        <input type="submit" name="submit" value="logout">
    </form>
    
</body>
</html>
