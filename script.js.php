<?php 
header('Content-Type: application/javascript');
?>
    $(document).ready(function(){
        <?php 
            $num1 = rand(1,50);
            $num2 = rand(1,50);
            ?>
        alert("<?= $num1 ?> x <?= $num2 ?> = <?= $num1*$num2;?>")
    });
