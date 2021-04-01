<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checker Board</title>
    <style>
        *,html,body{
            margin:0;
            padding:0;
            box-sizing: border-box;
            outline: none;
        }

        .container{
            max-width:1300px;
            margin:40px auto;
            text-align: center;
        }

        .container > *{
            width: 45%;
            display: inline-block;
            vertical-align: middle;
            margin: 0px 20px;
            border: 1px solid black;
        }

        .container > * > * {
            display: inline-block;
            height: 69px;
            overflow: hidden;
         
        }

        .container > * > * > *{
            display: inline-block;
            width: 69px;
            height: 69px;
        }
        .red{
            background: red;
        }
        .black{
            background: black;
        }

        .white{
            background: #ffffe0;
        }

        .green{
            background: #556b2f;
        }

    </style>
</head>
<body>
    <div class="container">
        <div> <?php for($i = 1; $i <= 8; $i++){?><div><?php for($j = 1; $j <= 8; $j++){ ?> <div class="<?= (($i + $j)%2==0) ?'red':'black'; ?>"></div><?php }?></div> <?php } ?>
        </div>
        <div> <?php for($i = 1; $i <= 8; $i++){?><div><?php for($j = 1; $j <= 8; $j++){ ?> <div class="<?= (($i + $j)%2==0) ?'white':'green'; ?>"></div> <?php }?></div>
            <?php } ?>
        </div>
    </div>
</body>
</html>