<?php
session_start();
require_once('/var/www/html/voice-in-tamil/conf/database_conn.php');
$mysqli = db_connect();

$target_dir = "/var/www/html/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"].".wav");
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    $message="Sorry, file already exists.";
    echo $message;
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $message="Sorry, your file is too large.";
    echo $message;
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "wav") {
    $message="Sorry, only wav files are allowed.";
    echo $message;
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $message="Sorry, your file was not uploaded.";
    echo $message;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {                                
        $voiceFileName=$_FILES["fileToUpload"]["name"];
        
        $query="INSERT INTO voice_provider SET voice_file_name = '$voiceFileName'";
        $result=$mysqli->query($query);

        if ($result) { 
            $_SESSION['last_id'] = $mysqli->insert_id;
            echo "OK";
        } else {
            echo "Connection failure. Please try again.";

        }
    } else {
        echo "Connection failure. Please try again.";
    }
}
    