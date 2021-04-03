<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Table</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        *{
            margin:0;
            padding:0;
            outline:none;
            box-sizing:border-box;
            font-family: 'Roboto', sans-serif;
        }

        .container{
            max-width: 1100px;
            margin:20px auto;
        }
        table{
            width: 100%;
        
        }
        table td{
       
            padding: 10px;
            border-right:1px solid #c8c8c8;
            border-top:1px solid #c8c8c8;
        }
        table tr td:first-child{
            border-left:1px solid #c8c8c8;
        }
        table tbody tr:last-child td{
            border-bottom:1px solid #c8c8c8;
        }
        thead td{
            font-weight:bold;
        }
        .light{
            font-weight:300;
        }
        .fifth{
            background: #303030;
        }
        .fifth td{
            color:white;
        }
        form{
            text-align: center;
            box-shadow: 0px 0px 5px black;
            margin: 40px 0px;
            padding: 60px 0px;
        }
        form label{
            font-weight: 600;
        }

        form [type="submit"]{
            border: none;
            padding:5px 15px;
            cursor: pointer;
            background: #84ccff;
            box-shadow: 2px 2px 3px #8e8e8e;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form enctype='multipart/form-data' action="csv_process.php" method="POST">
        
            <label>Upload CSV file Here</label>
            
            <input type='file' name='filename'>
            </br>
            <input type='submit' name='submit' value='Upload Products'>
            
        </form>
        <table>
            <thead>
                <tr>
                    <?php if(isset($_SESSION["csv"])){ ?>
                        <?php foreach($_SESSION["csv"][0] as $key => $value){?>
                        <td><?= $key ?></td>
                    <?php }
                    
                    }?>
                </tr>
            </thead>
            <tbody>
            <?php 
            if(isset($_SESSION["csv"])){

                $datas = $_SESSION["csv"];
                 for($i = 0; $i < count($datas); $i++){
            ?>
                <tr class="<?php if(($i+1)%5 == 0){ echo 'fifth';}else{ echo ''; }?>">
                <?php foreach($datas[$i] as $data){?>
                   <td><?= $data; ?></td>
                 <?php } ?>
                </tr>
            <?php }
            }
            
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>