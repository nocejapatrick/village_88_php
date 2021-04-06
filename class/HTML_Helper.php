<?php
class HTML_Helper{

    public function print_table($arr){
        $headers = array();

        foreach($arr[0] as $key=>$value){
            $headers[] = ucwords(str_replace("_"," ",$key));
        }

        ?>
        <table>
            <thead>
                <tr>
                <?php foreach($headers as $header){?>
                    <td><?= $header ?></td>
                <?php }?>
                </tr>
            </thead>
            <tbody>
            <?php foreach($arr as $ar) {?>
                <tr>
                     <?php foreach($ar as $a){ ?>
                        <td><?= $a ?></td>
                    <?php } ?>
                </tr>
            <?php }?>
            </tbody>
        </table>

        <?php
    }

    public function print_select($str_name,$arr){
        ?>
        <label for="<?= $str_name ?>"><?= ucwords($str_name) ?></label>
        <select name="<?= $str_name ?>" id="">
            <?php foreach($arr as $ar){?>
                <option value="<?= $ar ?>"><?= $ar ?></option>
            <?php } ?>
        </select>
        <?php
    }
}

$tableHelper = new HTML_Helper();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            font-family: 'Open Sans', sans-serif;
        }
        .container{
            max-width: 1000px;
            margin: 40px auto;
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
        form{
            width: 100%;
            margin-top: 40px;
        }
        select{
            width: 100%;
            font-size: 1.3em;
            padding: 5px 10px;
        }
        label{
            font-weight: bold;
            font-size: 1.5em;
            margin-bottom: 10px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
            <?php 

        $arr = array(
            array("first_name" => "Michael", "last_name" => "Choi", "nick_name" => "Sensei"),
            array("first_name" => "Patrick", "last_name" => "Noceja", "nick_name" => "Pat"),
            array("first_name" => "Zeth", "last_name" => "Marfil", "nick_name" => "Zetty")
        );

        $tableHelper->print_table($arr); 

        ?>
        <form action="send_form.php" method="POSt">
            <?php
                $tableHelper->print_select("state",["CA", "WA", "UT", "TX", "AZ", "NY"]);
            ?>
        </form>
    </div>
   
</body>
</html>