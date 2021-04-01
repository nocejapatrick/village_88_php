<?php
 header('Content-type: text/css');
 $color = array("red","yellow","blue","green","orange");
 $random = rand(0,4);
?>
h1{
    color:<?php echo $color[$random];?>;
}

<?php 
$random = rand(0,4);

?>
p{
    color:<?php echo $color[$random];?>;
}