<?php 
session_start();

if(isset($_POST["submit"]) && isset($_FILES['filename'])){
    
    ini_set('auto_detect_line_endings', true);
    $file = fopen($_FILES['filename']['tmp_name'], 'r') or die('Unable to open file!');

    $header = null;
    $datas = array();
    while (($row = fgetcsv($file)) !== false) {
        if ($header === null) {
            $header = $row;
            continue;
        }

        $newRow = array();
        for ($i = 0; $i < count($row); $i++) {
            $newRow[$header[$i]] = $row[$i];
        }

        $datas[] = $newRow;
    }

    
    $_SESSION["csv"] = $datas;
    header("location: csv_web_app.php");


    $upload = "csv_uploads/".basename($_FILES["filename"]["name"]);
    if(!file_exists($upload)){
        move_uploaded_file($_FILES["filename"]["tmp_name"], $upload);
    }
   

}


?>