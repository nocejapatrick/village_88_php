<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
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
        h2{
            display: inline;
            border-bottom: 1px solid black;
            padding-bottom:2    px;
        }
        .infos{
            margin-top: 40px;
            padding-left: 50px;
        }
        .infos > *{
            width: 40%;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submitted Information</h2>
        <div class="infos">
            <p>Name: </p>
            <p><?= (isset($_POST["name"])) ? $_POST["name"]: ""?></p>
        </div>
        <div class="infos">
            <p>Dojo Location: </p>
            <p><?= (isset($_POST["dojo_location"])) ? $_POST["dojo_location"]: ""?></p>
        </div>
        <div class="infos">
            <p>Favorite Language: </p>
            <p><?= (isset($_POST["favorite_language"])) ? $_POST["favorite_language"]: ""?></p>
        </div>
        <div class="infos">
            <p>Comment: </p>
            <p><?= (isset($_POST["comment"])) ? $_POST["comment"]: ""?></p>
        </div>
    </div>
</body>
</html>