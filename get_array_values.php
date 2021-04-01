<?php

function print_lists($A){

    $lists = "<ul>";

    foreach($A as $a){
        $lists .= "<li>".$a."</li>";
    }
    $lists .= "</ul>";
    echo $lists;
}


$A = array(2,3,'hello');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lists</title>
</head>
<body>

    <?php print_lists($A); ?>
    
</body>
</html>