<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            outline:none;
            font-family: 'New Tegomin', serif;
        }
        .container{
            max-width:800px;
            margin:auto;
        }

        table{
            width:100%;
        }

        td{
            border: 1px solid black;
            padding:20px;
            text-align:center;
        }
        .even{
            background:#d3d3d3;
        }
        .bold{
            font-weight:600;
            font-size:1.4em;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <tbody>
            <?php for($i = 0; $i < 10; $i++){?>
                <tr class="<?php if($i % 2 == 0) { echo 'odd'; }else { echo 'even';}?>">
                    <?php for($j = 0; $j < 10; $j++){?>

                      
                        <?php 
                            if($j == 0 && $i ==0) {
                               echo "<td></td>";
                            }else if($i == 0){

                                echo "<td class='bold'>".$j."</td>";

                            }else if($j == 0){
                                echo "<td class='bold'>".$i."</td>";

                            }else{

                                echo "<td>".$j*$i."</td>";

                            }
                            ?>
                  

                    <?php } ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
   
</body>
</html>