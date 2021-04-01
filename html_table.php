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
    </style>
</head>
<body>
    <div class="container">
        <table cellspacing="0">
            <thead>
                <tr>
                    <td>User #</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Full Name</td>
                    <td>Full Name in upper case</td>
                    <td>Length of full name <span class="light">(without spaces)</span></td>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            $users = array( 
                array('first_name' => 'Michael', 'last_name' => 'Choi'),
                array('first_name' => 'John', 'last_name' => 'Supsupin'),
                array('first_name' => 'Mark', 'last_name' => 'Guillen'),
                array('first_name' => 'KB', 'last_name' => 'Tonel'),
                array('first_name' => 'Patrick', 'last_name' => 'Noceja'),
                array('first_name' => 'Mar', 'last_name' => 'Roxas'),
                array('first_name' => 'Zeth', 'last_name' => 'Marfil'),
                array('first_name' => 'Ethan', 'last_name' => 'Villacora'),
                array('first_name' => 'Naruto', 'last_name' => 'Uzumaki'),
                array('first_name' => 'Sasuke', 'last_name' => 'Uchiha'),
                array('first_name' => 'Sheenia', 'last_name' => 'Life'),
                array('first_name' => 'Sora', 'last_name' => 'Otoshimono'),
                array('first_name' => 'Haru', 'last_name' => 'Kun'),
                array('first_name' => 'Magic', 'last_name' => 'Bunny'),
             );
             for($i = 0; $i < count($users); $i++){
            ?>
                <tr class="<?php if(($i+1)%5 == 0){ echo 'fifth';}else{ echo ''; }?>">
                   <td class="id"><?= $i+1 ?></td>
                   <td><?= $users[$i]["first_name"] ?></td>
                   <td><?= $users[$i]["last_name"] ?></td>
                   <td><?= $users[$i]["first_name"]." ".$users[$i]["last_name"] ?></td>
                   <td><?= strtoupper($users[$i]["first_name"]." ".$users[$i]["last_name"]) ?></td>
                   <td><?= strlen($users[$i]["first_name"]) + strlen($users[$i]["last_name"])  ?></td>
                 
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>