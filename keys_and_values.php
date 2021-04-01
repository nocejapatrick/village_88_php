<?php

function keys_and_values($user){
    echo "There are ". count($user) . " keys in this array:";

   foreach($user as $key => $value)
    {
        echo $key . "<br>";
    }

    foreach($user as $key => $value)
    {
        echo "The value in the key '".$key."' is '".$value."' <br>";
    }
    
}

$users['first_name'] = "Michael";
$users['last_name'] = "Choi";

keys_and_values($users);