<?php

function displayGrade($num){

    if($num < 70){
        return "D";
    }else if($num > 69 && $num < 80){
        return "C";
    }else if($num > 79 && $num < 90){
        return "B";
    }else if($num > 89 && $num <= 100){
        return "A";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade</title>
</head>
<body>
    <?php for($i = 1; $i <= 100; $i++){
        $num = rand(50,100);
        ?>
        <h1>Your Score: <?= $num; ?>/100</h1>
        <h2>Your grade is <?= displayGrade($num); ?></h2>
    <?php }?>
</body>
</html>