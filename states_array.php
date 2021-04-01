<?php 



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            max-width:500px;
            margin:auto;
        }

        form{
            width:100%;
        }

        select{
            width:100%;
            margin: 10px 0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="">
            <?php 
                 $states = array('CA', 'WA', 'VA', 'UT', 'AZ');
            ?>

            <select name="" id="">
                <?php for($i = 0; $i < count($states); $i++){?>
                    <option value="<?= $states[$i] ?>"><?= $states[$i] ?></option>
                <?php }?>
            </select>

            <select name="" id="">
                <?php foreach($states as $state){?>
                    <option value="<?= $state ?>"><?= $state ?></option>
                <?php }?>
            </select>

            <?php 
                 $states = array('CA', 'WA', 'VA', 'UT', 'AZ','NJ','NY','DE');
            ?>

            <select name="" id="">
                <?php foreach($states as $state){?>
                    <option value="<?= $state ?>"><?= $state ?></option>
                <?php }?>
            </select>
        </form>
    </div>
</body>
</html>