<?php
session_start();
require_once('/var/www/html/voice-in-tamil/conf/database_conn.php');
$mysqli = db_connect();

$username = escape_string ($_SESSION["username"], $mysqli);
$gender = escape_string ($_SESSION["gender"], $mysqli);
$age = escape_string ($_SESSION["age"], $mysqli);
$selectedDisease = escape_string ($_POST["selectedDisease"], $mysqli);
$selectedDescription = escape_string ($_POST["selectedDescription"], $mysqli);

$last_id = $_SESSION['last_id'];

if($last_id != null){
    if ($mysqli->query("UPDATE voice_provider SET username='$username', gender='$gender', age='$age', selected_symptom='$selectedDisease', selected_description='$selectedDescription' WHERE id='$last_id'")) {
        $_SESSION['last_id'] = null;
        echo "OK";
    } else {
        echo $mysqli->error;
    }
}
else{
    echo "Please Select the audio first!";
}



function escape_string ($s, $mysqli) {
    $s  =  $mysqli->real_escape_string($s);
    return  $s;
}
?>
