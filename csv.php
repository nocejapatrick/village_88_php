<?php 
ini_set('auto_detect_line_endings', true);
$file = fopen('us-500.csv', 'r') or die('Unable to open file!');


$header = null;
$datas = array();
while(($row = fgetcsv($file)) !== false){
    if($header === null){
        $header = $row;
        continue;
    }

    $newRow = array();
    for($i = 0; $i<count($row); $i++){
        $newRow[$header[$i]] = $row[$i];
    }

    $datas[] = $newRow;
}

fclose($file);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $recordNum = 0;
    foreach($datas as $data){ 
        $recordNum++;
        ?>
        <h1>Record <?= $recordNum ?></h1>
        <ul>
            <li>First Name: <?= $data["first_name"] ?></li>
            <li>Last Name: <?= $data["last_name"] ?></li>
            <li>Company Name: <?= $data["company_name"] ?></li>
            <li>Address: <?= $data["address"] ?></li>
            <li>City: <?= $data["city"] ?></li>
            <li>Country: <?= $data["county"] ?></li>
            <li>State: <?= $data["state"] ?></li>
            <li>Zip: <?= $data["zip"] ?></li>
            <li>Phone 1: <?= $data["phone1"] ?></li>
            <li>Phone 2: <?= $data["phone2"] ?></li>
            <li>Email: <?= $data["email"] ?> </li>
            <li>Web: <?= $data["web"] ?></li>
        </ul>
        
    <?php } ?>
</body>
</html>