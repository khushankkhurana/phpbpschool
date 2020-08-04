<?php
  
    $name = $_FILES['fileToUpload']['name'];
    $temp_name = $_FILES['fileToUpload']['temp_name'];

    if (isset($name)) {

        if (!empty($name)) {
            $location = '../fees/image';
        }

        if (move_uploaded_file($temp_name, $location.$name)) {
            echo 'uploaded';
        }

    } else {
        echo 'please uploaded';
    }
?>